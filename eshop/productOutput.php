<?php
session_start();
require "DbConnection.class.php";


$productId = htmlspecialchars($_GET['idProduktu']);

//? Získání informací o daném produktu
/*$sql = "SELECT * FROM eshop.produkty WHERE idProduktu ='".$productId."'";
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$product = array();
$i = 0;
while ($row = $q->fetch()): $nazev = $row['nazevProduktu'];
$product[] = $row;
endwhile;*/

$sql1 = "SELECT * FROM eshop.produkty WHERE idProduktu = :productId";
$stmt = $pdo->prepare($sql1);
$stmt->bindValue(':productId', $productId);
$stmt->execute();
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(empty($product)){
  
    header('Location:index.php');
}

require "header.php";
//? Získaní atributů daného produktu
/*$sql2 = "SELECT produkty_idProduktu, atributy_idAtributu, atribut, replace(concat_ws('','<b>',atribut,':</b> ',hodnota, jednotka),'_',' ') from produkty_has_atributy
        join atributy on atributy_idAtributu = idAtributu 
        where produkty_idProduktu ='".$productId."' ";
$q = $pdo->query($sql2);
$q->setFetchMode(PDO::FETCH_ASSOC);
$atributy = array();
$i = 0;
while ($row = $q->fetch()): $nazev = $row['atribut'];
$atributy[] = $row;
endwhile;*/
$sql2 = "SELECT produkty_idProduktu, atributy_idAtributu, atribut, replace(concat_ws('','<b>',atribut,':</b> ',hodnota, jednotka),'_',' ') from produkty_has_atributy
join atributy on atributy_idAtributu = idAtributu 
where produkty_idProduktu = :productId";
$stmt = $pdo->prepare($sql2);
$stmt->bindValue(':productId', $productId);
$stmt->execute();
$atributy = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($atributy[0]["concat_ws('','<b>',atribut,':</b> ',hodnota, jednotka)"]);
//? Získaní počtu atributů daného produktu
$sql3 = "SELECT count(atribut) from produkty_has_atributy join atributy on atributy_idAtributu = idAtributu where produkty_idProduktu = :productId";
$stmt = $pdo->prepare($sql3);
$stmt->bindValue(':productId', $productId);
$stmt->execute();
$pocetAtributu = $stmt->fetch(PDO::FETCH_ASSOC);

//echo $pocetAtributu['count(atribut)'];

//? Získání názvu kategorie, ve které je produkt uložen
/*$sql4 = "SELECT nazevKategorie FROM eshop.kategorie WHERE idKategorie ='".$product[0]['kategorieId']."'";
$q = $pdo->query($sql4);
$q->setFetchMode(PDO::FETCH_ASSOC);
$category = array();
$i = 0;
while ($row = $q->fetch()): $nazev = $row['nazevKategorie'];
$category[] = $row;
endwhile;*/
$sql4 = "SELECT nazevKategorie FROM eshop.kategorie WHERE idKategorie = :kategorieId";
$stmt = $pdo->prepare($sql4);
$stmt->bindValue(':kategorieId', $product[0]['kategorieId']);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script>
    document.title = "<?php echo $product[0]['nazevProduktu']; ?>";
    </script>
    <style>
    .card {
        color: white;
    }

    .list-group-item {
        border-color: white;
    }

    #btn1 {
        justify-content: flex-center;
        background-color: #00b295;
        color: white;
        width:100%;
    }
    #btn1:hover{
        background-color:#03f7eb;
        color:black;
    }
    .fav { 
        width:100%;
    }
    .d-inline-block{
        width:100%;
    }

    .tlacitka {
        width: 97%;
    }
    #cena{
        color:red;
        display:flex;
        justify-content:center;
    }
    .list-group-item:nth-child(odd){
        background-color:#313638;
    }
    .list-group-item:nth-child(even){
        background-color:#343a40;
    }
    .card-img{
        
    }

    </style>
</head>

<body>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Domů</a></li>
    <li class="breadcrumb-item"><a href="output.php?kategorieId=<?php echo $product[0]['kategorieId']; ?> "><?php echo $category[0]['nazevKategorie'] ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $product[0]['nazevProduktu']; ?></li>
  </ol>
</nav>

    <div class="card bg-dark mb-3 mt-3 ml-3 mr-3" style="max-width: 70hv;">
        <div class="row no-gutters">
            <div class="col-md-4 imgPriceBns pr-4 pl-4">
                <img src="<?php echo $product[0]['imageSource']; ?>" class="card-img mt-4 mb-4 ml-2"
                    alt="obrázek <?php echo $product[0]['nazevProduktu']; ?>">
                <h1 id="cena">
                <b><?php echo number_format($product[0]['cenaProduktu'], 2, ',', ' ')/*str_replace('.', ',',$product[0]['cenaProduktu'])*/; ?> Kč</b>
                </h1>

                <form class="ml-1 mr-1 mt-1 tlacitka"
                    action="kosik.php?action=add&idProduktu=<?php echo $product[0]["idProduktu"]; ?>" method="post">
                    <button class="btn pridat" id="btn1" type="submit" name="vlozitDoKosiku">
                        <p class="mb-0">Přidat do košíku</p>
                    </button>
                </form>
                <?php 
                if(!isset($_SESSION['user_id'])){?>
                    <form class="ml-1 mr-1 mt-1 mb-1 tlacitka"
                action="oblibene.php?action=add&idProduktu=<?php echo $product[0]["idProduktu"]; ?>"
                method="post">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Přihlašte se, aby jste mohli tento produkt přidat do oblíbených.">
                <button class="btn btn-danger pridat fav" style="pointer-events: none;" type="submit" name="vlozitDoOblibenych" disabled>
                    <p class="mb-0">Přidat do oblíbených</p>
                </button>
            </span>
            </form>
                <?php }else{
                
                ?>
                <form class="ml-1 mr-1 mt-1 tlacitka"
                action="oblibene.php?action=add&idProduktu=<?php echo $product[0]["idProduktu"]; ?>"
                method="post">
                <button class="btn btn-danger pridat fav mb-1" type="submit" name="vlozitDoOblibenych">
                    <p class="mb-0">Přidat do oblíbených</p>
                </button>
            </form>
           <?php } ?>

            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $product[0]['nazevProduktu']; ?></h3>
                    <p class="card-text"><?php echo $product[0]['popisProduktu']; ?></p>
                    <ul class="list-group">
                        <?php for($i=0; $i < $pocetAtributu['count(atribut)']; $i++){ ?>
                        <li class="list-group-item">
                            <?php echo($atributy[$i]["replace(concat_ws('','<b>',atribut,':</b> ',hodnota, jednotka),'_',' ')"]); ?>
                        </li>
                        <?php }  ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>