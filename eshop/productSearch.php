<style>
    #emptyCart {
        display: flex;
        justify-content: center;
        color:white;
    }
    
    @media (max-width: 430px) {
        #emptyCartMessage {
            width: 58vh;
            margin-left: 1em;

        }
    }
</style>
<?php
session_start();
require_once 'DbConnection.class.php';


if(isset($_POST['searchForm'])||isset($_POST['searchBtn'])){

    $text = $_POST['searchForm'];
    if(empty($text)){
        //echo $_SERVER['HTTP_REFERER'];
        //exit();
header('Location:'.$_SERVER['HTTP_REFERER']);
    }
include 'header.php';
try{
$sql1 = "SELECT COUNT(*) FROM produkty WHERE nazevProduktu LIKE :text";
$stmt = $pdo->prepare($sql1);
$stmt->bindValue(':text', '%'.$text.'%');
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);


$sql2 = "SELECT * FROM produkty WHERE nazevProduktu LIKE :text";
$stmt = $pdo->prepare($sql2);
$stmt->bindValue(':text', '%'.$text.'%');
$stmt->execute();
$poleProduktu = $stmt->fetchAll(PDO::FETCH_ASSOC);

} 
catch(PDOException $e){?>
    <div class="mt-5" id="emptyCart">
    <h1 id="emptyCartMessage">Hledaný produkt nemáme v katalogu!</h1>
    
<div>
<?php exit(); }
$pocet = implode("",$count);
//echo $pocet;
if ($pocet==0) {
?>
        <div class="mt-5" id="emptyCart">
            <h1 id="emptyCartMessage">Hledaný produkt nemáme v katalogu!</h1>
        <div>
        <?php exit();
}

for ($i=0; $i < $pocet ; $i++) { 

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

<?php }
}else{

if(isset($_POST['smallSearchForm'])||isset($_POST['smallSearchBtn']) ){
    $smallText= $_POST['smallSearchForm'];
    
    if(empty($smallText)){
        header('Location:'.$_SERVER['HTTP_REFERER']);
            }
            include 'header.php';
try{   
    $sql1 = "SELECT COUNT(*) FROM produkty WHERE nazevProduktu LIKE :smallText";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':smallText', '%'.$smallText.'%');
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    $sql2 = "SELECT * FROM produkty WHERE nazevProduktu LIKE :smallText";
    $stmt = $pdo->prepare($sql2);
    $stmt->bindValue(':smallText', '%'.$smallText.'%');
    $stmt->execute();
    $poleProduktu = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e){ 
    ?>
    <div class="mt-5" id="emptyCart">
    <h1 id="emptyCartMessage">Hledaný produkt nemáme v katalogu!</h1>
    
<div>
<?php exit(); 

}
    $pocet = implode("",$count);
    if ($pocet==0) {
        ?>
                <div class="mt-5" id="emptyCart">
                    <h1 id="emptyCartMessage">Hledaný produkt nemáme v katalogu!</h1>
                <div>
                <?php exit();
        }
    for ($i=0; $i < $pocet ; $i++) { 
  
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
    
    <?php }

}}
if(isset($_POST['smallSearchForm'])||isset($_POST['smallSearchBtn'])||isset($_POST['searchForm'])||isset($_POST['searchBtn'])){
}else{
  header('Location:index.php');  
} 
?><style>
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
</style>