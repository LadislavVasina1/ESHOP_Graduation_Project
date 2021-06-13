<?php 
session_start();
if(!isset($_SESSION['user_id'])){
header("Location: index.php");
}
else{
    $idUzivatele = $_SESSION['user_id'];
}
include("header.php");
require 'DbConnection.class.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch($action) {
case "add":
if (isset($_GET['idProduktu'])) {
    $idProduktu = htmlspecialchars($_GET['idProduktu']);
}



//Vložení do oblíbených
try{
    $sql = "INSERT INTO eshop.oblibene (idUzivatele, idProduktu) VALUES (:idUzivatele, :idProduktu)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->bindValue(':idProduktu', $idProduktu);
    $stmt->execute();
    } catch (PDOException $e) {
    ?><script>
alert('<?php echo("Produkt byl již do oblíbených přidán!");  ?>');
</script>
<?php
      }
    
     default: 
    
    //Výpis
    $sql1 = "SELECT COUNT(*) FROM oblibene WHERE idUzivatele=:idUzivatele";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);


    $sql2 = "SELECT oblibene.id, idUzivatele, oblibene.idProduktu, nazevProduktu, cenaProduktu, popisProduktu, imageSource from oblibene 
    join uzivatele on oblibene.idUzivatele = uzivatele.id join produkty on oblibene.idProduktu = produkty.idProduktu where oblibene.idUzivatele =:idUzivatele";
    $stmt = $pdo->prepare($sql2);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->execute();
    $poleProduktu = $stmt->fetchAll(PDO::FETCH_ASSOC);
  /*  $sql2 = "SELECT oblibene.id, idUzivatele, oblibene.idProduktu, nazevProduktu, cenaProduktu, popisProduktu, imageSource from oblibene 
    join uzivatele on oblibene.idUzivatele = uzivatele.id join produkty on oblibene.idProduktu = produkty.idProduktu where oblibene.idUzivatele = '".$idUzivatele."'";
    $q = $pdo->query($sql2);
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $poleProduktu = array();
    $i = 0;
    while ($row = $q->fetch()): $nazev = $row['nazevProduktu'];
    $poleProduktu[] = $row;
    
    endwhile;*/
    }

    
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oblíbené</title>
    <style>
.fav {
        color: #ab2346;
    }
    
    .card {
    float: left;
    margin: 0.4em;
    padding: 0.2em;
    height: 36em;
    width: 18rem;
}

.card-img-top {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1em;
    width: 50%;
    height: 15em;
    object-fit: contain;
    width: 100%;
    height: 30%;
}
.card-footer {
    display: flex;
    padding: 0px;
    flex-direction:column;
}

.pridat {
    width: 100%;
    border-radius: 2px;
}

.btn1 {
    background-color: #00b295;
    color: white;
}
.btn1:hover{
        background-color:#03f7eb;
        color:black;
    }

#btn {
    justify-content: flex-center;
}

.tlacitka {
    width: 100%;
    height: 100%;
}

.card-title {
    height: 7vh;
}
.cena{
    margin-left:35%;
}

@media (max-width: 1520px) {
 .card{
     width: 24%;
    }   
}
@media (max-width: 1293px) {
 .card{
     width: 32%;
    }   
}
@media (max-width: 977px) {
 .card{
     width: 48%;
    }   
}
@media (max-width: 656px) {
 .card{
     width: 98%;
    }   
}
@media (max-width: 686px) {
 #noProduct{
     width: 58vh;
     margin-left:1em;
    
    }   
}
#emptyFav {
        display: flex;
        justify-content: center;
        color:white;
    }
    </style>
    <script>
    document.title = 'Oblíbené';
    </script>
</head>

<body>
<?php 
$pocet = implode("",$count);
if($pocet==0){?>
 <div class= "mt-5" id="emptyFav"><h1 id="noProduct">Nemáte žádný produkt v oblíbených!</h1></div>
<?php }
else{
for ($i=0; $i < $pocet ; $i++) { 
  //echo $poleProduktu[$i]['idProduktu'];
  $kratkyPopis = substr($poleProduktu[$i]['popisProduktu'],0,119)."...";
 ?>
    <div class="card text-white bg-dark border-dark">
        <img src="<?php echo $poleProduktu[$i]['imageSource'];?>" class="card-img-top" onclick="location.href='productOutput.php?idProduktu=<?php echo $poleProduktu[$i]['idProduktu'] ?>'"
            alt="Obrázek <?php echo $poleProduktu[$i]['nazevProduktu'];?>">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><a class="productLink"
                    href="productOutput.php?idProduktu=<?php echo $poleProduktu[$i]['idProduktu'] ?>"><b><?php echo $poleProduktu[$i]['nazevProduktu'];?></b></a>
            </h5>
            <p class="card-text"><a class="productLink2"
                    href="productOutput.php?idProduktu=<?php echo $poleProduktu[$i]['idProduktu'] ?>">
                    <?php echo $kratkyPopis ?></a></p>
            <h6 class="card-text" style="color:red"><b><?php echo number_format($poleProduktu[$i]['cenaProduktu'], 2, ',', ' ')." Kč";?></b></h6>


        </div>
        <div class="card-footer bg-dark border-light pr-2 pb-1 pt-1">

            <form class="ml-1 mr-1 mt-1 tlacitka"
                action="kosik.php?action=add&idProduktu=<?php echo $poleProduktu[$i]["idProduktu"]; ?>" method="post">
                <button class="btn pridat btn1" type="submit" name="vlozitDoKosiku">
                    <p class="mb-0">Přidat do košíku</p>
                </button>
            </form>

            <form class="ml-1 mr-1 mt-1 tlacitka"
                action="deleteFav.php?action=delete&id=<?php echo $poleProduktu[$i]["id"]; ?>" method="post">
                <button class="btn btn-danger pridat" type="submit" name="odebratZOblibenych">
                    <p class="mb-0">Odstranit z oblíbených</p>
                </button>
            </form>
        </div>
    </div>
    <?php
}}
?>
</body>

</html>