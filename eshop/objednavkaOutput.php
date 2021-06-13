<?php
session_start();
include 'DbConnection.class.php';
if(!isset($_SESSION['user_id'])){
    header('Location: index.php');
}

$idObjednavky = $_GET['idObjednavky'];

$sql = "SELECT idUzivatele FROM objednavky WHERE idObjednavky = :idObjednavky";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idObjednavky', $idObjednavky);
$stmt->execute();
$idVlastnika = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SESSION['opravneni'] == 3){}
else{
if($_SESSION['user_id']!== $idVlastnika['idUzivatele']){
    header('Location:logout.php');
}
}

include '../MPLV/mpdf/vendor/autoload.php';
include 'header.php';





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
if($objednavkaContentCount == 0){
?>
<script>window.location.href = "spravaObjednavek.php"</script>
<?php
}



?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Objednávka č. </title>
    <style>
    #right{
        color:white;
    }
    #rightCard{
        border-radius:14px;
    }
    #total,.totalProductPrice{
        float:right;
    }
    .nazevProduktu{
        max-width:30%;
        float:left;
    }
      .list-group-item:nth-child(odd){
        background-color:#00b295;
    }
    .list-group-item:nth-child(even){
        background-color:grey;
    }
    .aaa{
        border-radius:14px;
    }
    .faktura {
        color: #4af7ee;
    }

    .faktura:hover {
        color: #4af7ee;
    }
    </style>
    <script>
    document.title = 'Objednávka č. ' + "<?php echo $idObjednavky;  ?>";
    </script>
</head>

<body>
<?php if($_SESSION['opravneni'] == 3){}
else{ ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Domů</a></li>
            <li class="breadcrumb-item"><a href="profile.php">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Objednávka č. <?php echo $idObjednavky; ?></li>
        </ol>
    </nav>
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl m-1 profileContainers border border-secondary p-3" id="left">
<?php

$sql3 = "SELECT id, username, jmeno, prijmeni, email, ulice_cislo, obec, psc FROM eshop.uzivatele WHERE id = :idUzivatele";
$stmt = $pdo->prepare($sql3);
$stmt->bindValue(':idUzivatele', $idVlastnika['idUzivatele']);
$stmt->execute();
$uzivatelInfo = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($uzivatelInfo);

?>          <h5><b>Doručovací adresa</b></h5><br>
            <h6><?php echo $uzivatelInfo['jmeno'].' '.$uzivatelInfo['prijmeni']  ?></h6>
            <h6><?php echo $uzivatelInfo['ulice_cislo']?></h6>
            <h6><?php echo $uzivatelInfo['psc'].' '.$uzivatelInfo['obec']?></h6>
            <h6>Česká republika</h6>
            <br>    
            <h6><b>Platba dobírkou.</b></h6>
            <h6>Kontaktní informace: <?php echo $uzivatelInfo['email']?></h6>
            <?php if($_SESSION['opravneni'] == 3){}else{ ?>
            <a class ="faktura" href="pdfOutput.php?idObjednavky=<?php echo $idObjednavky; ?>&idUzivatele=<?php echo $_SESSION['user_id']; ?>">Faktura v PDF</a>
            
            <div class="card bg-dark text-center mt-5 aaa">
  <div class="card-body">
  <ul class="list-group">
  <li class="list-group-item"><b>Děkujeme za Váš nákup.</b></li>
  <li class="list-group-item"><b>Vaše objednávka se vyřizuje.</b></li>
  <li class="list-group-item"><b>Objednávka bude vyexpedována co nejdříve.</b></li>
</ul>
  </div>
</div><?php } ?>

            </div>

            <div class="col-md m-1 profileContainers border border-secondary p-3" id="right">
                <div class="card bg-dark text-left" id="rightCard">
                    <div class="card-body">
                    <?php 
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
                        
                       //print_r($produktObjednavky);
                        ?>
                        <div class="row justify-content-between ml-1 mr-1">
                        <img class="miniatura" src="<?php echo $produktObjednavky['imageSource']; ?>" alt="miniatura obrázku<?php echo $produktObjednavky['nazevProduktu']?>">
                        <h6 class="nazevProduktu mr-0"><a style="color:white;" href="productOutput.php?idProduktu=<?php echo $objednavkaContent[$i]['produkty_idProduktu'] ?>"><?php echo $produktObjednavky['nazevProduktu']; ?></a></h6>
                        <h6 class="totalProductPrice"><?php echo $objednavkaContent[$i]['qty']; ?>ks za <?php echo $vyslednaCena; ?>Kč</h6></div>
                        <hr>
                <?php    }//print_r($objednavkaContentInfo);
                    ?>  
                    </div>
                    <div class="card-footer">
                        Celková cena objednávky <b id="total"><?php $total = number_format($total, 2, ',', ' '); echo $total; ?>Kč</b>
                    </div>
                </div>

            </div>
</body>

</html>