<?php
session_start();
include 'DbConnection.class.php';
include '../MPLV/mpdf/vendor/autoload.php';

$user_id = $_SESSION['user_id'];
$idUzivateleURL= $_GET['idUzivatele'];
$idObjednavky = $_GET['idObjednavky'];



//!kontrola jestli si fakturu zobrazuje uživatel, který provedl danou objednávku
if($user_id!==$idUzivateleURL){
    header('Location: logout.php');
}
//? Získání základních informací o dané objednávce
$sql = "SELECT * FROM eshop.objednavky WHERE idObjednavky = :idObjednavky";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idObjednavky', $idObjednavky);
$stmt->execute();

$objednavkaContentInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);


//? Získání obsahu o dané objednávky
$sql2 = "SELECT * FROM eshop.objednavky_has_produkty WHERE objednavky_idObjednavky = :idObjednavky";
$stmt = $pdo->prepare($sql2);
$stmt->bindValue(':idObjednavky', $idObjednavky);
$stmt->execute();

$objednavkaContent = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
echo '<br>';
print_r($objednavkaContent);
echo '<br>';*/
$objednavkaContentCount = count($objednavkaContent);

$sql3 = "SELECT id, username, jmeno, prijmeni, email, ulice_cislo, obec, psc FROM eshop.uzivatele WHERE id = :idUzivatele";
$stmt = $pdo->prepare($sql3);
$stmt->bindValue(':idUzivatele', $_SESSION['user_id']);
$stmt->execute();
$uzivatelInfo = $stmt->fetch(PDO::FETCH_ASSOC);



$html1='
<img src="../MPLV/img/logo.svg">
<br>
<h1>Faktura č. ' .$idObjednavky. '</h1>
<hr>

<h3>Doručovací adresa:</h3>

<h4>' .$uzivatelInfo["jmeno"].' '.$uzivatelInfo["prijmeni"].'</h4>
<h4>' .$uzivatelInfo["ulice_cislo"].'</h4>
<h4>' .$uzivatelInfo["psc"].' '.$uzivatelInfo["obec"].'</h4>
<h4>Česká republika</h4>
<br>
<h4>Kontaktní informace:  '.$uzivatelInfo["email"].'</h4>
<hr>
<h3>Obsah objednávky:</h3>'
;




$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->SetTitle('Faktura č.'.$idObjednavky);
$mpdf->WriteHTML($html1);

$html2="";
$vyslednaCena = 0;
$total = 0;
for ($i=0; $i < $objednavkaContentCount; $i++) { 
                       $vyslednaCena = $objednavkaContent[$i]['qty'] * $objednavkaContent[$i]['cenaPriObjednani'];
                       $total= $total + $vyslednaCena; 
                       $vyslednaCena = number_format($vyslednaCena, 2, ',', ' ');
                       
                       $sql4 = "SELECT idProduktu ,nazevProduktu, imageSource FROM eshop.produkty WHERE idProduktu = :idProduktu";
                       $stmt = $pdo->prepare($sql4);
                       $stmt->bindValue(':idProduktu', $objednavkaContent[$i]['produkty_idProduktu']);
                       $stmt->execute();
                       $produktObjednavky = $stmt->fetch(PDO::FETCH_ASSOC);
                       $html2 = $html2. $objednavkaContent[$i]['qty'] .'ks '.$produktObjednavky["nazevProduktu"].'  <p style="float:right"><b>'. $vyslednaCena .'Kč</b></p><br>' ;
}
$total = number_format($total, 2, ',', ' ');
$html3 = '<hr><h3>Celková cena objednávky: </h3><p style="color:red"><b>'. $total.'Kč</b></p>';

$mpdf->WriteHTML($html2.$html3);


// Output a PDF file directly to the browser
//$mpdf->Output(); 
$mpdf->Output('Faktura č. ' .$idObjednavky. ''.'.pdf', 'D'); ?>
