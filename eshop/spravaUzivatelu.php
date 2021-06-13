<?php 
include('sprava.php');
/*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logoIcon.png">
    <title>Správa uživatelů</title>

    <style>
    .spravaUzivatelu {
        color: #ab2346;
    }

    @media (min-width: 451px) {
        #menu {
            display: none !important;
        }

    }

    body {
        background-color: #c9daea;
    }

    .kategorie a {
        text-decoration: none;
    }  
      #navBtns {
        display: flex;
        justify-content: flex-end;
    }

    .profileBtn {
        display: none;
    }

    #signinIconBtn {
        display: none;
    }

    .navbar-toggler {
        display: inline !important;
    }

    @media (min-width: 992px) {
        .navbar-expand-lg {
            justify-content: space-between
        }

    }
    </style>
    <script>
    document.title = 'Správa uživatelů';
    </script>
</head>

<body>
    <?php

    $sql = "SELECT id, username, concat(jmeno, \" \", prijmeni), email, ulice_cislo, obec, psc from eshop.uzivatele WHERE opravneni<3";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    ?>
    <div style="overflow-x:auto;">
        <table class="table table-striped table-dark">
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Jméno a příjmení</th>
                <th scope="col">Email</th>
                <th scope="col">Ulice a č.p.</th>
                <th scope="col">Obec</th>
                <th scope="col">PSČ</th>
            </tr>

            <?php

    
    while ($uzivatele = $stmt->fetch()):
        //var_dump($uzivatele);
?>
            <tr>
                <td><?=$uzivatele[1]?></td>
                <td><?=$uzivatele[2]?></td>
                <td><?=$uzivatele[3]?></td>
                <td><?=$uzivatele[4]?></td>
                <td><?=$uzivatele[5]?></td>
                <td><?=$uzivatele[6]?></td>
                <form id="delete" action="deleteUser.php" method="get" enctype="multipart/form-data">
                    <td><a class="btn btn-danger btn-block" href="deleteUser.php?id=<?=$uzivatele[0]?>"
                            onclick="return confirm('Are you sure?')">Vymazat uživatele</a></td>
                </form>
            </tr>


            <?php
    endwhile;
?>
        </table>
    </div>


</body>

</html>