<?php 
include("sprava.php");
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Správa objednávek</title>
    <style>
    .spravaObjednavek{
        color:#ab2346;
    }
    .objednavkaOdkaz{
        color:#4af7ee;
    }
    </style>
    <script>
    document.title = 'Správa objednávek';
    </script>
</head>
<body>
<?php

$sql = "SELECT idObjednavky, idUzivatele, username, datum from objednavky join uzivatele on idUzivatele = id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<div style="overflow-x:auto;">
    <table class="table table-striped table-dark">
        <tr>
            <th scope="col">idObjednavky</th>
            <th scope="col">idUzivatele</th>
            <th scope="col">Username</th>
            <th scope="col">Datum</th>
        </tr>

        <?php


while ($objednavky = $stmt->fetch()):
    //var_dump($objednavky);
?>
        <tr>
            <td><a class="objednavkaOdkaz" href="objednavkaOutput.php?idObjednavky=<?php echo $objednavky[0]; ?>"><?=$objednavky[0]?></a></td>
            <td><?=$objednavky[1]?></td>
            <td><?=$objednavky[2]?></td>
            <td><?=$objednavky[3]?></td>
            <form id="delete" action="deleteOrder.php" method="get" enctype="multipart/form-data">
                <td><a class="btn btn-danger btn-block" href="deleteOrder.php?idObjednavky=<?=$objednavky[0]?>"
                        onclick="return confirm('Jste si jistí?')">Vymazat objednávku</a></td>
            </form>
        </tr>


        <?php
endwhile;
?>
    </table>
</div>

</body>
</html>