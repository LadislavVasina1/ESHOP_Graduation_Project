<?php

session_start();

require 'DbConnection.class.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

include('header.php');


?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Osobní stránka uživatele</title>
    <script>
    document.title = 'Osobní stránka uživatele ' + "<?php echo $_SESSION['username']; ?>";
    </script>
    <style>
    .profileLink {
        color: #ab2346;
    }

    a {
        color: #4af7ee;
    }

    a:hover {
        color: #4af7ee;
    }
    </style>
</head>

<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Domů</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-xl m-1 profileContainers border border-secondary p-3" id="left">
                <form action="changeUserInfo.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Jméno</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?php echo $_SESSION['jmeno']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surname">Příjmení</label>
                            <input type="text" class="form-control" id="surname" name="surname"
                                value="<?php echo $_SESSION['prijmeni']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" id="email" name="email"
                                value="<?php echo $_SESSION['email']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="street">Ulice a č. p.</label>
                            <input type="text" class="form-control" id="street" name="street"
                                value="<?php echo $_SESSION['ulice_cislo']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="town">Město</label>
                            <input type="text" class="form-control" id="town" name="town"
                                value="<?php echo $_SESSION['obec']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Stát</label>
                            <input type="text" class="form-control" id="inputState" value="Česká republika" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="zipcode">PSČ</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode"
                                value="<?php echo $_SESSION['psc']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="submit" name="changeUserInfo" value="Upravit informace" id="signinBtn"
                                class="btn btn-outline-primary ml-auto" href="changeUserInfo.php">
                        </div>
                    </div>

                </form>
            </div>


            <div class="col-md m-1 profileContainers border border-secondary p-3" id="right">
                <h4 class="mb-3 objednavkyText" style="color:white">Objednávky</h4>

                <?php 

                    $sql = "SELECT * FROM eshop.objednavky WHERE idUzivatele = :idUzivatele";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':idUzivatele',$_SESSION['user_id']);
                    $stmt->execute();

                    $vsechnyObjednavky = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($vsechnyObjednavky);

                    $sql2 = "SELECT COUNT(*) AS pocetObjednavek FROM eshop.objednavky WHERE idUzivatele = :idUzivatele";
                    $stmt = $pdo->prepare($sql2);
                    $stmt->bindValue(':idUzivatele', $_SESSION['user_id']);
                    $stmt->execute();
                    $pocetObjednavek = $stmt->fetch(PDO::FETCH_ASSOC);
                    //echo $pocetObjednavek['pocetObjednavek'];

                    for ($i=0; $i < $pocetObjednavek['pocetObjednavek']; $i++) { 
                        $sql3 = "SELECT * FROM eshop.objednavky_has_produkty WHERE objednavky_idObjednavky = :idObjednavky";
                        $stmt = $pdo->prepare($sql3);
                        $stmt->bindValue(':idObjednavky', $vsechnyObjednavky[$i]['idObjednavky']);
                        $stmt->execute();
                        $objednavkyInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        //print_r($objednavkyInfo);

                        $sql4 = "SELECT COUNT(*) AS pocetProduktuObjednavky FROM eshop.objednavky_has_produkty  WHERE objednavky_idObjednavky = :idObjednavky";
                        $stmt = $pdo->prepare($sql4);
                        $stmt->bindValue(':idObjednavky', $vsechnyObjednavky[$i]['idObjednavky']);
                        $stmt->execute();
                        $pocetProduktuObjednavky = $stmt->fetch(PDO::FETCH_ASSOC);
                        //echo $pocetProduktuObjednavky['pocetProduktuObjednavky'];        

                        $vyslednaCena=0;

                        for ($l=0; $l < $pocetProduktuObjednavky['pocetProduktuObjednavky']; $l++) { 
                            $qty = $objednavkyInfo[$l]['qty'];
                            $cena = number_format($objednavkyInfo[$l]['cenaPriObjednani'], 2, ',', ' ');
                            $celkovaCena= $qty*$objednavkyInfo[$l]['cenaPriObjednani'];
                            $vyslednaCena = $vyslednaCena + $celkovaCena;
                        }
                        
                        ?>

                <div style="overflow-x:auto">
                    <table class="table table-hover table-striped table-dark objednavkyTable">
                        <thead>
                            <tr>
                                <th scope="col" style="border-top-width: 0px;"><a
                                href="objednavkaOutput.php?idObjednavky=<?php echo $vsechnyObjednavky[$i]['idObjednavky']  ?>"><?php $datum= date("d.m.Y",strtotime($vsechnyObjednavky[$i]['datum'])); echo $datum; ?></a>
                                </th>
                                <th scope="col" style="border-top-width: 0px;">za
                                    <?php echo number_format($vyslednaCena, 2, ',', ' '); ?> Kč</th>
                                <th scope="col" style="border-top-width: 0px;"><a
                                        href="objednavkaOutput.php?idObjednavky=<?php echo $vsechnyObjednavky[$i]['idObjednavky']  ?>"><?php echo $vsechnyObjednavky[$i]['idObjednavky']; ?></a>
                                </th>
                                <th scope="col" style="border-top-width: 0px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                       for ($j=0; $j < $pocetProduktuObjednavky['pocetProduktuObjednavky']; $j++) { 
                      
                           $qty = $objednavkyInfo[$j]['qty'];
                           $cena = number_format($objednavkyInfo[$j]['cenaPriObjednani'], 2, ',', ' ');

                           $sql5 = "SELECT idProduktu ,nazevProduktu, imageSource FROM eshop.produkty WHERE idProduktu = :idProduktu";
                           $stmt = $pdo->prepare($sql5);
                           $stmt->bindValue(':idProduktu', $objednavkyInfo[$j]['produkty_idProduktu']);
                           $stmt->execute();
                           $produktyObjednavky = $stmt->fetch(PDO::FETCH_ASSOC);
                           //print_r($produktyObjednavky);
                           ?>

                            <tr>
                                <td><img class="miniatura" src="<?php echo $produktyObjednavky['imageSource']; ?>" alt="miniatura obrázku<?php echo $produktyObjednavky['nazevProduktu']?>"></td>
                                <td><a style="color:white;" href="productOutput.php?idProduktu=<?php echo $produktyObjednavky['idProduktu'] ?>"><?php echo $produktyObjednavky['nazevProduktu']; ?></a></td>
                                <td><?php echo $qty; ?>ks za <?php  echo $cena; ?> Kč</td>
                                <td></td>
                            </tr>
                            <?php   
                    }
                       ?>

                        </tbody>
                    </table>
                </div>

                <?php 
                    }
?>
            </div>
        </div>
    </div>
</body>

</html>