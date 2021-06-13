<?php 
session_start();

include("header.php");
require 'DbConnection.class.php';
?>
<style>
    #emptyCart {
        display: flex;
        color:white;
        justify-content: center;
    }
    
    @media (max-width: 430px) {
        #emptyCartMessage {
            width: 58vh;
            margin-left: 1em;
            

        }
    }
    .productImg{
        display:block;
        width:70px;
        height:70px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>

<?php
if(!isset($_SESSION['user_id'])){?>
<div class="mt-5" id="emptyCart">
    <h1 id="emptyCartMessage">Pro využití košíku se musíte přihlásit!</h1>
<div>
<?php exit();}

if (isset($_SESSION['user_id'])) {
    $idUzivatele = htmlspecialchars($_SESSION['user_id']);

if(isset($_POST['vlozitDoKosiku'])){
    

$idProduktu = htmlspecialchars($_GET['idProduktu']);
$qty = 1;


try{
$sql = "INSERT INTO eshop.kosik (idUzivatele, idProduktu, qty) VALUES (:idUzivatele, :idProduktu, :qty)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idUzivatele', $idUzivatele);
$stmt->bindValue(':idProduktu', $idProduktu);
$stmt->bindValue(':qty', $qty);
$stmt->execute();
}
//? Pokud je již produkt v košíku ->  qty+1 
catch(PDOException $e){
    if ($e->errorInfo[1] == 1062) {
        $sql1 = "SELECT qty FROM eshop.kosik WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
        $stmt = $pdo->prepare($sql1);
        $stmt->bindValue(':idUzivatele', $idUzivatele);
        $stmt->bindValue(':idProduktu', $idProduktu);
        $stmt->execute();
        $actualQty = $stmt->fetch(PDO::FETCH_ASSOC);

        $newQty = $actualQty['qty']+1;
        $sql2 = "UPDATE eshop.kosik SET qty=:qty WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
        $stmt = $pdo->prepare($sql2);
        $stmt->bindValue(':idUzivatele', $idUzivatele);
        $stmt->bindValue(':idProduktu', $idProduktu);
        $stmt->bindValue(':qty', $newQty);
        $stmt->execute();
     }
}
}
$sql3 = "SELECT * FROM eshop.kosik WHERE idUzivatele = :idUzivatele";
$stmt = $pdo->prepare($sql3);
$stmt->bindValue(':idUzivatele', $idUzivatele);
$stmt->execute();
$kosikContent = $stmt->fetchAll(PDO::FETCH_BOTH);

$sql4 = "SELECT COUNT(*) AS kosikContentCount FROM eshop.kosik WHERE idUzivatele = :idUzivatele";
$stmt = $pdo->prepare($sql4);
$stmt->bindValue(':idUzivatele', $idUzivatele);
$stmt->execute();
$kosikContentCount = $stmt->fetch(PDO::FETCH_ASSOC);

for ($i=0; $i < $kosikContentCount['kosikContentCount']; $i++) { 
//print_r($kosikContent[$i]);echo "<br>";
}

}

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Košík</title>
    <style>
    .cart {
        color: #ab2346;
    }

    #smazatKosik {
        display: flex;
        justify-content: center;
    }

    #dokoncitObjednavku {
        display: flex;
        justify-content: center;
        border:red;
    }

    .img-thumbnail {
        background-color: transparent;
        background: transparent;
        border: 0px;
        max-width: 50%;
    }

    .imgTh {
        max-width: 50%;
    }

    @media (max-width: 1100px) {

        #imgRow,
        #imgColumn,
        #lastCell {
            display: none;
        }
    }
    </style>
    <script>
    document.title = 'Košík';
    </script>
</head>

<body>

    <?php   if($kosikContentCount['kosikContentCount'] == 0){?>
    <div class="mt-5" id="emptyCart">
        <h1 id="emptyCartMessage">Máte prázdný košík!</h1>
    </div>
    <style>
    #smazatKosik {
        display: none;

    }

    #dokoncitObjednavku {
        display: none;

    }
    </style>
    <?php
                }
                else{?> <div style="overflow-x:auto;">
        <table class="table table-striped table-dark">

            <thead>
                <tr>
                    <th scope="col" id="imgColumn"></th>
                    <th scope="col">Název produktu</th>
                    <th scope="col">Počet</th>
                    <th scope="col">Cena za 1ks</th>
                    <th scope="col">Výsledná cena</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody> <?php
            $total = 0;
                for ($i=0; $i < $kosikContentCount['kosikContentCount']; $i++) { 
    
    $sql5 = "SELECT idProduktu, nazevProduktu, cenaProduktu, imageSource FROM eshop.produkty WHERE idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql5);
    $stmt->bindValue(':idProduktu', $kosikContent[$i]['idProduktu']);
    $stmt->execute();
    $kosikProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

                <tr>
                    <td id="imgRow">
                    <!--<img class="img-thumbnail imgTh" src="<?php // echo $kosikProduct[0]['imageSource'] ?>"
                            alt="obrázek <?php // echo $kosikProduct[0]['nazevProduktu'] ?>">-->
                            <div class="productImg" style="background-image:url('<?php  echo $kosikProduct[0]['imageSource'] ?>')"></div>
                            
                    </td>
                    <td><a class="odkazNaProduktKosik"
                            href="productOutput.php?idProduktu=<?php echo $kosikProduct[0]['idProduktu'] ?>"><?php  echo $kosikProduct[0]['nazevProduktu']?></a>
                    </td>
                    <td><?php  echo $kosikContent[$i]['qty']?> <br></td>
                    <td><?php  echo number_format($kosikProduct[0]['cenaProduktu'], 2, ',', ' ')." Kč"?></td>
                    <td><?php  $vyslednaCena = sprintf("%.2f",$kosikContent[$i]['qty'] * $kosikProduct[0]['cenaProduktu']);$total = $total + $vyslednaCena; 
                    echo "<b>".number_format($vyslednaCena, 2, ',', ' ')." Kč</b>" ?>
                    <td>
                        <form class="mb-3"
                            action="deleteProductInCart.php?idProduktu=<?php echo $kosikProduct[0]['idProduktu']; ?>"
                            method="post">

                            <button class="btn" type="submit" name="pridatPolozkuKosiku">
                                <i class="material-icons">
                                    add_circle
                                </i>
                            </button>
                            <button class="btn" type="submit" name="odebratPolozkuKosiku">
                                <i class="material-icons">
                                    remove_circle
                                </i>
                            </button>
                            <button class="btn" type="submit" name="smazatPolozkuKosiku">
                                <i class="material-icons">
                                    remove_shopping_cart
                                </i>
                            </button>
                        </form>
                    </td>
                    </td>
                </tr>
                <?php }?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Celková cena objednávky</td>
                    <td><?php echo "<b><p style='color:red;'>".number_format(sprintf("%.2f",$total), 2, ',', ' ')." Kč</p></b>"?>
                    </td>
                    <td id="lastCell"></td>
                </tr>
                <?php
            } ?>


            </tbody>

        </table>
    </div>
    <div id="smazatKosik">
        <form class="mb-3" action="deleteCart.php?action=delete&idUzivatele=<?php echo $_SESSION["user_id"]; ?>"
            method="post">
            <input type="submit" name="smazatKosik" value="Smazat košík" id="deleteBtn"
                                class="btn btn-outline-primary ml-auto">
        </form>
    </div>

    <div id="dokoncitObjednavku">
        <form class="mb-3" action="objednavka.php" method="post">
        <input type="submit" name="dokoncitObjednavku" value="Dokončit objednávku" id="dokoncitObjednavkuBtn" class="btn btn-outline-primary ml-auto">
        </form>
    </div>

</body>

</html>