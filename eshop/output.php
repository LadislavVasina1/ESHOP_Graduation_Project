<?php
session_start();
include("header.php");
require_once("DbConnection.class.php");

if(!isset($_SESSION['user_id'])){ ?>
<script>
//document.getElementsByName("vlozitDoOblibenych").disabled = true;
</script>
<?php } 

    $kategorieId = htmlspecialchars($_GET["kategorieId"]);


//? Zjištění jestli má kategorie podkategorie
    $sql1 = "SELECT COUNT(*) AS pocetPodkategorii FROM kategorie WHERE nadrazenaKategorie=:nadrazenaKategorie";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':nadrazenaKategorie', $kategorieId);
    $stmt->execute();
    $pocetPodkategorii = $stmt->fetch(PDO::FETCH_ASSOC);

//? Zjištění jestli má kategorie nadřazenou kategorii
    $sql5 = "SELECT COUNT(nadrazenaKategorie) AS pocetNadrazenychKategorii FROM kategorie WHERE idKategorie=:idKategorie";
    $stmt = $pdo->prepare($sql5);
    $stmt->bindValue(':idKategorie', $kategorieId);
    $stmt->execute();
    $pocetNadrazenychKategorii = $stmt->fetch(PDO::FETCH_ASSOC);

 //? Získání počtu výrobků v dané kategorii  
    $sql1 = "SELECT COUNT(*) FROM produkty WHERE kategorieId=:kategorieId";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':kategorieId', $kategorieId);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);


if ($pocetPodkategorii['pocetPodkategorii'] != 0) {
    //print_r($pocetPodkategorii);
 /*   $sql4 = "SELECT * FROM eshop.kategorie WHERE nadrazenaKategorie ='".$kategorieId."'";
    $q = $pdo->query($sql4);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $poleKategorii = array();
    $i = 0;
    while ($row = $q->fetch()): $nazev = $row['nazevKategorie'];
    $polePodkategorii[] = $row;
    endwhile;*/
    //print_r($polePodkategorii)

    $sql4 = "SELECT * FROM kategorie WHERE nadrazenaKategorie=:kategorieId";
    $stmt = $pdo->prepare($sql4);
    $stmt->bindValue(':kategorieId', $kategorieId);
    $stmt->execute();
    $polePodkategorii = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($polePodkategorii);

    ?>
<div class="list-group">
<?php 
    for ($i=0; $i < $pocetPodkategorii['pocetPodkategorii'] ; $i++) { 
    ?><a id= "<?php echo $i; ?>"href="output.php?kategorieId=<?php echo $polePodkategorii[$i]['idKategorie'] ?>" class="list-group-item bg-dark list-group-item-action" style="color:white;"><?php echo $polePodkategorii[$i]['nazevKategorie'] ?></a><?php
}
?>


</div>
    <?php
}else{
    if($count['COUNT(*)'] == 0){
        ?> 
        <script>window.location ='index.php'</script>
        <?php
    }
}




 /*   
    $sql2 = "SELECT * FROM eshop.produkty WHERE kategorieId ='".$kategorieId."'";
    $q = $pdo->query($sql2);
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $poleProduktu = array();
    $i = 0;   
    while ($row = $q->fetch()): $nazev = $row['nazevProduktu'];
    $poleProduktu[] = $row;

  endwhile;*/

  $sql4 = "SELECT * FROM produkty WHERE kategorieId=:kategorieId";
  $stmt = $pdo->prepare($sql4);
  $stmt->bindValue(':kategorieId', $kategorieId);
  $stmt->execute();
  $poleProduktu = $stmt->fetchAll(PDO::FETCH_ASSOC);

//? Získání názvu kategorie 
   $sql3 = "SELECT nazevKategorie FROM eshop.kategorie WHERE idKategorie=:kategorieId";
   $stmt = $pdo->prepare($sql3);
   $stmt->bindValue(':kategorieId', $kategorieId);
   $stmt->execute();
   $nazevKategorie = $stmt->fetch(PDO::FETCH_ASSOC);

   //print_r(array_multisort (array_column($poleProduktu, 'cenaProduktu'), SORT_DESC, $poleProduktu));
   //array_multisort (array_column($poleProduktu, 'cenaProduktu'), SORT_DESC, $poleProduktu);
   //array_multisort($poleProduktu[0], SORT_ASC);

/*
$nazevProduktu= $poleProduktu[0]['nazevProduktu'];
echo $nazevProduktu;
*/

if($pocetNadrazenychKategorii['pocetNadrazenychKategorii'] >= 1){  ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Domů</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $nazevKategorie['nazevKategorie']; ?></li>
  </ol>
<?php }
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <script>
    document.title = "<?php echo $nazevKategorie['nazevKategorie']; ?>";
    </script>
</head>
<style>
<?php switch ($kategorieId) {
    case 1:
        ?>.laptopIcon{color: #ab2346;} <?php ;  break;
    case 2:
        ?>.phoneIcon{color: #ab2346;} <?php ;  break;
    case 3:
        ?>.monitorIcon{color: #ab2346;} <?php ;  break;
    case 4:
        ?>.audioIcon{color: #ab2346;} <?php ;  break;
    case 5 :
        ?>.komponentyIcon{color: #ab2346;} <?php ;  break;
    case 6:
        ?>.prislusenstviIcon{color: #ab2346;} <?php ;  break;   
    case 7:
        ?>.komponentyIcon{color: #ab2346;} <?php ;  break;   
    case 8:
        ?>.komponentyIcon{color: #ab2346;} <?php ;  break;   
    case 9:
        ?>.komponentyIcon{color: #ab2346;} <?php ;  break;   
    case 10:
        ?>.komponentyIcon{color: #ab2346;} <?php ;  break;   
    case 11:
        ?>.prislusenstviIcon{color: #ab2346;} <?php ;  break;  
    case 12:
        ?>.prislusenstviIcon{color: #ab2346;} <?php ;  break;    
}
?>

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

#dropdownMenuLink{
    width:98%;
}
.dropdown-menu{
    width:98%;
    text-align:center;
}
}
.dropdown-menu{
    background-color:#212529;
}
.dropdown-item{
    color:#03f7eb;
}
#dropdownMenuLink{
    background-color:#212529;
    color:white;
}

</style>
<body>

<?php if($kategorieId ==5 || $kategorieId ==6){}else{ ?>
<div class="dropdown  mt-1 ml-2">
  <a class="btn dropdown-toggle bg-dark " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Řazení podle ceny
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" id="asc" href="?kategorieId=<?php echo $kategorieId ?>&order=asc">Vzestupně</a>
    <a class="dropdown-item" id="dsc" href="?kategorieId=<?php echo $kategorieId ?>&order=dsc">Sestupně</a> 
  </div>
</div>

<?php
}
$order = isset($_GET['order']) ? htmlspecialchars($_GET['order']) : '';
$pocet = implode("",$count);


if($order=="asc"){
function compareOrder($a, $b)
{
  return $a['cenaProduktu'] - $b['cenaProduktu'];
}
usort($poleProduktu, 'compareOrder');
}else{
if($order=='dsc'){
    function compareOrder($a, $b)
    {
      return $b['cenaProduktu'] - $a['cenaProduktu'];
    }
    usort($poleProduktu, 'compareOrder');
}

}

for ($i=0; $i < $pocet ; $i++) { 
  //print_r($poleProduktu[$i]) ;
  $kratkyPopis = substr($poleProduktu[$i]['popisProduktu'],0,119)."...";
 ?>
    <div class="card text-white bg-dark border-dark">
        <img src="<?php echo $poleProduktu[$i]['imageSource'];?>" class="card-img-top" onclick="location.href='productOutput.php?idProduktu=<?php echo $poleProduktu[$i]['idProduktu'] ?>'"
            alt="Obrázek <?php echo $poleProduktu[$i]['nazevProduktu'];?>">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><a class="productLink" href="productOutput.php?idProduktu=<?php echo $poleProduktu[$i]['idProduktu'] ?>"><?php echo $poleProduktu[$i]['nazevProduktu'];?></a></h5>
            <p class="card-text"><a class="productLink2" href="productOutput.php?idProduktu=<?php echo $poleProduktu[$i]['idProduktu'] ?>"> <?php echo $kratkyPopis ?></a></p>
        </div>
        <div class="card-footer bg-dark border-light pr-2 pb-1">
            <h6 class="card-text mt-1 cena" style="color:red"><b><?php echo number_format($poleProduktu[$i]['cenaProduktu'], 2, ',', ' ')." Kč";?></b></h6>
            <form class="ml-1 mt-1 mb-1 tlacitka"
                action="kosik.php?action=add&idProduktu=<?php echo $poleProduktu[$i]["idProduktu"]; ?>" method="post">
                <button class="btn pridat btn1" type="submit" name="vlozitDoKosiku">
                    <p class="mb-0">Přidat do košíku</p>
                </button>
            </form>
            <?php if(!isset($_SESSION['user_id'])){?>
            <form class="ml-1 mr-3 mt-1 mb-1 tlacitka"
                action="oblibene.php?action=add&idProduktu=<?php echo $poleProduktu[$i]["idProduktu"]; ?>"method="post">
                <span tabindex="0" data-toggle="tooltip" title="Přihlašte se, aby jste mohli tento produkt přidat do oblíbených.">
                <button class="btn btn-danger pridat" style="pointer-events: none;" type="submit" name="vlozitDoOblibenych" disabled>
                    <p class="mb-0">Přidat do oblíbených</p>
                </button>
            </span>
            </form>
            <?php }else{
                
                ?>
                <form class="ml-1 mr-1 mt-1 tlacitka"
                action="oblibene.php?action=add&idProduktu=<?php echo $poleProduktu[$i]["idProduktu"]; ?>"
                method="post">
                <button class="btn btn-danger pridat fav" type="submit" name="vlozitDoOblibenych">
                    <p class="mb-0">Přidat do oblíbených</p>
                </button>
            </form>
           <?php } ?>

        </div>
    </div>

    <?php
}
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</body>