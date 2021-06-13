<?php
session_start();

include 'DbConnection.class.php';
if(!isset($_SESSION['user_id'])){
    header('Location: index.php');
}

//? Získání obsahu košíku daného uživatele
if(isset($_POST['dokoncitObjednavku'])){

    

    $sql = "SELECT * FROM eshop.kosik WHERE idUzivatele = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_SESSION['user_id']);
    $stmt->execute();

    $kosikContent = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $kosikContentCount = count($kosikContent);

    print_r($kosikContent);
    echo '<br>pocetPolozekKosiku: ' . $kosikContentCount. '<br>';

    $datum = date("Y-m-d"); 
    
    echo $datum;
    echo $_SESSION['user_id'];

    $sql2 = "INSERT INTO eshop.objednavky (idUzivatele, datum) VALUES (:idUzivatele, :datum);";
    $stmt = $pdo->prepare($sql2);
    $stmt->bindValue(':idUzivatele', $_SESSION['user_id']);
    $stmt->bindValue(':datum', $datum);
    $stmt->execute();
    $ObjednavkaId = $pdo->lastInsertId();
    echo '<br>Posledni id bylo '.$ObjednavkaId.'<br>';


    $vyslednaCena = 0;
    for ($i=0; $i < $kosikContentCount ; $i++) { 
        echo $i;

        $sql3 = "SELECT idProduktu, nazevProduktu, cenaProduktu FROM eshop.produkty WHERE idProduktu = :idProduktu";
        $stmt = $pdo->prepare($sql3);
        $stmt->bindValue(':idProduktu',$kosikContent[$i]['idProduktu']);
        $stmt->execute();

        $produktObjednavky = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($produktObjednavky);


        $sql4 = "INSERT INTO eshop.objednavky_has_produkty (objednavky_idObjednavky, produkty_idProduktu, qty, cenaPriObjednani) VALUES (:objednavky_idObjednavky, :produkty_idProduktu, :qty, :cenaPriObjednani)";
        $stmt = $pdo->prepare($sql4);
        $stmt->bindValue(':objednavky_idObjednavky', $ObjednavkaId);
        $stmt->bindValue(':produkty_idProduktu', $kosikContent[$i]['idProduktu']);
        $stmt->bindValue(':qty', $kosikContent[$i]['qty']);
        $stmt->bindValue(':cenaPriObjednani', $produktObjednavky[0]['cenaProduktu']);
        $stmt->execute();
        /*$vyslednaCena = $vyslednaCena + sprintf("%.2f",$kosikContent[$i]['qty'] * $produktObjednavky[0]['cenaProduktu']);
        echo $vyslednaCena;*/

        
        $sql5 = "DELETE FROM eshop.kosik WHERE idUzivatele=:idUzivatele";
        $stmt = $pdo->prepare($sql5);
        $stmt->bindValue(':idUzivatele',$_SESSION['user_id']);
        $stmt->execute();

        header('Location: objednavkaOutput.php?idObjednavky='. $ObjednavkaId );
    }

}
?>
