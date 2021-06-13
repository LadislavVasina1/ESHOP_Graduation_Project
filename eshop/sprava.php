
<?php 
session_start();
require 'DbConnection.class.php';
/*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/
      
if(isset($_SESSION['user_id'])){
  if ($_SESSION['opravneni']!=3) 
  {
    header('Location:logout.php');
}}else{
    header('Location:logout.php');
  }
?>


<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logoIcon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Načtení bootstrapu -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Načtení ikon -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- Načtení fontu -->
    <link href="../MPLV/css/mp.css" rel="stylesheet"> <!-- Načtení css -->
    <noscript>
    <h6 style="color:white;">!!!Pro používání tohoto webu si aktivujte JavaScript!!!</h6>
    </noscript>
    <title>Dashboard</title>

    <style>
    @media (min-width: 451px) {
        #menu {
            display: none !important;
        }

    }

    body {
        background-color: #121212;
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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(69,69,69)">


        <a href="index.php"><img id="logo" src="../MPLV/img/logo.svg" style="width:63px; height:30px;"
                class="ml-2 mb-2"></a>
        <div id="navBtns" class="mr-1">

            <button class="navbar-toggler mr-sm-1 mb-2 adminBtns" type="button" aria-expanded="false">
                <a href="logout.php"><i class="material-icons">power_settings_new</i></a>
            </button>

            <button id="menu" class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#smallNavControl"
                aria-controls="smallNavControl" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="material-icons">menu</i></span>
            </button>
        </div>

        <!--<div class="collapse navbar-collapse dropMenu" id="navbarSupportedContent"></div>-->
    </nav>


    <nav class="navbar justify-content-center navControl" style="background-color:rgb(49,54,56)">
        <ul class="nav">
            <li class="nav-item kategorie">
                <a class="nav-link" href="spravaProduktu.php"><i
                        class="material-icons spravaProduktu">devices_other</i></a>
                <a href="spravaProduktu.php">
                    <p class="text-white popisKat">Správa produktů</p>
                </a>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="spravaKategorii.php"><i
                        class="material-icons spravaKategorii">category</i></a>
                <a href="spravaKategorii.php">
                    <p class="text-white popisKat">Správa kategorií</p>
                </a>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="spravaUzivatelu.php"><i
                        class="material-icons spravaUzivatelu">supervised_user_circle</i></a>
                <a href="spravaUzivatelu.php">
                    <p class="text-white popisKat">Správa uživatelů</p>
                </a>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="spravaObjednavek.php"><i
                        class="material-icons spravaObjednavek">assignment</i></a>
                <a href="spravaObjednavek.php">
                    <p class="text-white popisKat">Správa Objednávek</p>
                </a>
            </li>
            </li>
        </ul>
    </nav>

    <!-- Small navKat -->
    <div class="collapse navbar-collapse smallnavControl" id="smallNavControl" style="background-color:rgb(49,54,56)">
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="spravaProduktu.php">
                    <i class="material-icons spravaProduktu">devices_other</i></a>
                <a class="text-white d-inline" href="spravaProduktu.php">Správa produktů</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="spravaKategorii.php">
                    <i class="material-icons spravaKategorii">category</i></a>
                <a class="text-white d-inline" href="spravaKategorii.php">Správa kategorií</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="spravaUzivatelu.php">
                    <i class="material-icons spravaUzivatelu">supervised_user_circle</i></a>
                <a class="text-white d-inline" href="spravaUzivatelu.php">Správa uživatelů</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="spravaObjednavek.php">
                    <i class="material-icons spravaObjednavek">assignment</i></a>
                <a class="text-white d-inline" href="spravaObjednavek.php">Správa Objednávek</a>
            </div>
        </div>
    </div>
    <!-- End of the small navKat -->



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>