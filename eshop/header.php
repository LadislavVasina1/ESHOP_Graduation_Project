<?php 
/*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
*/
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logoIcon.png">
    <link href="../MPLV/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Načtení ikon -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- Načtení fontu -->
    <link href="../MPLV/css/mp.css" rel="stylesheet"> <!-- Načtení css -->

    <title>Hlavní stránka</title>
    <noscript>
    <h6 style="color:white;">!!!Pro používání tohoto webu si aktivujte JavaScript!!!</h6>
    </noscript>
    <style>
    body {
        padding-right: 0 !important
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="topNavBar" style="background-color:rgb(69,69,69)">

        <body>
            <a href="index.php"><img id="logo" src="../MPLV/img/logo.svg" style="width:63px; height:30px;"
                    class="ml-2 mb-2"></a>
        </body>

        <button class="navbar-toggler ml-auto mr-sm-1 mb-2" type="button" data-toggle="collapse"
            data-target="#searchIcon" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="material-icons">search</i></span>
        </button>
        <button class="navbar-toggler  mr-sm-1 mb-2" id="favBtn" type="button" data-toggle="collapse"
            aria-expanded="false">
            <a href="oblibene.php"><i class="material-icons fav">favorite</i></a>

        </button>
        <button class="navbar-toggler mr-sm-1 mb-2" id="cartBtn" type="button" data-toggle="collapse"
            aria-expanded="false">
            <a href="kosik.php"><i class="material-icons cart">shopping_cart</i></a>
        </button>


        <button class="navbar-toggler mr-sm-1 mb-2 adminBtns" type="button" aria-expanded="false">
            <a href="sprava.php"><i class="material-icons">tune</i></a>
        </button>

        <button class="navbar-toggler  mr-sm-1 mb-2 adminBtns" type="button" aria-expanded="false">
            <a href="logout.php"><i class="material-icons">power_settings_new</i></a>
        </button>

        <button class="navbar-toggler mr-sm-1 mb-2" id="signinIconBtn" type="button" style=" cursor: pointer;"
            data-toggle="modal" data-target="#exampleModalCenter" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="material-icons">perm_identity</i></span>
        </button>

        <button class="navbar-toggler mr-sm-1 mb-2 profileBtn" type="button" style=" cursor: pointer;"
            data-toggle="collapse" data-target="#userInfo" aria-controls="smallNavKat" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="material-icons">person</i></span>
        </button>

        <button id="menu" class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#smallNavKat"
            aria-controls="smallNavKat" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="material-icons">menu</i></span>
        </button>

        <!-- Modal sign in START -->
        <div class="modal fade p-0" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Přihlášení</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="login-form" action="login.php" method="post">
                            <input class="form-control" type="text" id="username" name="username" required="true"
                                autofocus="true" placeholder="Uživatelské jméno" autoselect><br>
                            <input class="form-control" type="password" id="password" name="password" required="true"
                                placeholder="Heslo"><br>
                                
                    <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" onclick="showPassword()" class="custom-control-input"
                                        id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1"><p class="mb-0" style="color:white;">Zobrazit heslo</p></label>
                                </div>
                            <script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
                            <br><a class="ml-1" style="color:white" href="register.php">Nemáš účet? Zaregistruj se
                                zde!</a>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="login" value="Přihlásit se" id="signinBtn"
                            class="btn btn-outline-primary mx-auto" href="login.php">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal sign in END -->

        <div class="collapse navbar-collapse" id="searchIcon" style="background-color:rgb(49,54,56)">
            <div class="collapse navbar-collapse" id="searchIcon" style="background-color:rgb(49,54,56)">

                <ul class="navbar-nav mx-auto">

                    <div id="hledatIcon" class="row pr-3">
                        <form class="col m-1" style="width:79%" action="productSearch.php" method="post">
                        <div class="input-group">
                            <input id="smallSearchForm" name="smallSearchForm" class="form-control" type="search"
                                placeholder="např. apple, asus, ..." aria-label="Search">
                                <div class="input-group-append">
    <button class="btn btn-outline-secondary" id="smallRecord" type="button" onclick="record()"><i
                                class="material-icons" id="smallRecordIcon">keyboard_voice</i></button>
  </div>
                        </div>

                        <button id="smallSearchBtn" name="smallSearchBtn" class="col mt-1"
                            type="submit">Hledat</button>
                        <button id="smallSearchIconBtn" class="col mt-1" type="submit"><i
                                class="material-icons mt-2" id="smallSearchIcon">search</i></button></form>
                    </div>
            </div>
            </ul>

        </div>
        <div id="search1" class="input-group ml-5">
            <form class="form-inline my-lg-0" action="productSearch.php" method="post">
                <input id="searchForm" class="form-control" type="search" name="searchForm" placeholder="např. apple, asus, ..."
                    aria-label="Search" onclick="record()">


        <script>
        function record() {
            var recognition = new webkitSpeechRecognition();
            recognition.lang = "cs-CZE";

            recognition.onresult = function(event) {
                console.log(event);
                document.getElementById('searchForm').value = event.results[0][0].transcript;

                document.getElementById('smallSearchForm').value = event.results[0][0].transcript;

            }
            recognition.start();

            recognition.onspeechend = function() {
            recognition.stop();
            console.log('Speech recognition has stopped.');
            }

        }
    </script>
            
           <button id="searchBtn" name="searchBtn" class="btn btn-search" type="submit"> <i id="hledat"
                    class="material-icons">search</i> </button>   
</form> 
<button id="recordBtn" name="recordBtn" class="btn btn-search" onclick="record()"> <i id="record"
                    class="material-icons">keyboard_voice</i> </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">



            </ul>

            <?php
//?Kontrola jestli je uživatel přihlášen
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    ?>
            <style>
            .profileBtn {
                display: none;
            }

            .adminBtns {
                display: none;
            }
            #favBtn{
                display:none;
            }
            </style>

            <ul id="signinFullsize" class="navbar-nav">
                <li class="nav-item"><a class="nav-link" style="cursor: pointer; border-right:solid 1px grey;"
                                        href="kosik.php"><i class="material-icons mt-1 cart">shopping_cart</i></a></li>

                <li class="nav-item"><a class="nav-link" data-toggle="modal" style="cursor: pointer;"
                        data-target="#exampleModalCenter"><i class="material-icons mt-1">perm_identity</i></a></li>

                
            </ul>




            <?php
}

if(isset($_SESSION['user_id'])){
  if ($_SESSION['opravneni']>=3) {?>
            <style>
            .profileBtn {
                display: none;
            }

            #signinIconBtn {
                display: none;
            }

            @media (max-width: 992px) {
                .bigAdminBtns {
                    display: none;
                }

            }
            </style>
            <ul id="signinFullsize" class="navbar-nav">
                <li class="nav-item"><a class="nav-link" style="cursor: pointer; border-left:solid 1px grey;"
                        href="oblibene.php"><i class="material-icons mt-1 fav">favorite</i></a></li>
                <li class="nav-item"><a class="nav-link" style="cursor: pointer; border-left:solid 1px grey;"
                        href="kosik.php"><i class="material-icons mt-1 cart">shopping_cart</i></a></li>
                <li class="nav-item"><a class="nav-link" style="cursor: pointer; border-left:solid 1px grey;"
                        href="sprava.php"><i class="material-icons tune mt-1 bigAdminBtns">tune</i></a></li>
                <li class="nav-item"><a class="nav-link" style="cursor: pointer; border-left:solid 1px grey;"
                        href="logout.php"><i class="material-icons mt-1 bigAdminBtns">power_settings_new</i></a>
                </li>
            </ul>
            <?php
}
else{
    $username = $_SESSION['username'];
   ?>
            <style>
            #signinIconBtn {
                display: none;
            }

            .adminBtns {
                display: none;
            }

            #topNameLink {
                color: #03f7eb;
                padding-top: 0.75rem;
                padding-bottom: 1rem;
            }

            #topNameLink:hover {
                color: #c9daea;
            }
            </style>
            <ul id="signinFullsize" class="navbar-nav">
                <li class="nav-item" style="cursor: pointer; border-left:solid 1px grey;"><a class="nav-link"
                        href="oblibene.php"><i class="material-icons fav mt-1">favorite</i></a></li>
                <li class="nav-item" style="cursor: pointer; border-left:solid 1px grey;"><a class="nav-link"
                        href="kosik.php"><i class="material-icons mt-1 cart">shopping_cart</i></a></li>
                <li class="nav-item" style="cursor: pointer; border-left:solid 1px grey;"><a class="nav-link"
                        href="logout.php"><i class="material-icons mt-1">power_settings_new</i></a></li>
                <li class="nav-item" style="cursor: pointer; border-left:solid 1px grey;"><a class="nav-link mr-4"
                        id="topNameLink" href="profile.php"><?php echo($username);?></a></li>
            </ul>



            <?php 
}}?>

        </div>
    </nav>

    <nav class="navbar justify-content-center navKat" style="background-color:rgb(49,54,56)">
        <ul class="nav">
            <li class="nav-item kategorie">
                <a class="nav-link" href="output.php?kategorieId=1"><i
                        class="material-icons laptopIcon">laptop</i></a>
                        <a style="text-decoration:none" href="output.php?kategorieId=1"><p class="text-white popisKat">Notebooky</p></a>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="output.php?kategorieId=2"><i
                        class="material-icons phoneIcon">phone_android</i></a>
                <p class="text-white popisKat">Mobily</p>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="output.php?kategorieId=3"><i
                        class="material-icons monitorIcon">desktop_windows</i></a>
                <p class="text-white popisKat">Monitory</p>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link kategorie" href="output.php?kategorieId=4"><i
                        class="material-icons audioIcon">headset_mic</i></a>
                <p class="text-white popisKat">Audio</p>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="output.php?kategorieId=5"><i
                        class="material-icons komponentyIcon">memory</i></a>
                <p class="text-white popisKat">Komponenty</p>
            </li>
            <li class="nav-item kategorie">
                <a class="nav-link" href="output.php?kategorieId=6"><i
                        class="material-icons prislusenstviIcon">mouse</i></a>
                <p class="text-white popisKat">PC doplňky</p>
            </li>
        </ul>


    </nav>

    <!-- Small navKat -->
    <div class="collapse navbar-collapse smallnavKat" id="smallNavKat" style="background-color:rgb(49,54,56)">
     
        <div class="row smallKatRow" onclick="location.href='output.php?kategorieId=1'">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="output.php?kategorieId=1">
                    <i class="material-icons laptopIcon">laptop</i></a>
                <a class="text-white d-inline" href="output.php?kategorieId=1">Notebooky</a>
            </div>
        </div>
     
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="output.php?kategorieId=2">
                    <i class="material-icons phoneIcon">phone_android</i></a>
                <a class="text-white d-inline" href="output.php?kategorieId=2">Mobily</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="output.php?kategorieId=3">
                    <i class="material-icons monitorIcon">desktop_windows</i></a>
                <a class="text-white d-inline" href="output.php?kategorieId=3">Monitory</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="output.php?kategorieId=4">
                    <i class="material-icons audioIcon">headset_mic</i></a>
                <a class="text-white d-inline" href="output.php?kategorieId=4">Audio</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="output.php?kategorieId=5">
                    <i class="material-icons komponentyIcon">memory</i></a>
                <a class="text-white d-inline" href="output.php?kategorieId=5">Komponenty</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="output.php?kategorieId=6">
                    <i class="material-icons prislusenstviIcon">mouse</i></a>
                <a class="text-white d-inline" href="output.php?kategorieId=6">PC doplňky</a>
            </div>
        </div>


        <?php
if(isset($_SESSION['user_id'])){
    if ($_SESSION['opravneni']>=3) {
?>
        <div class="row smallKatRow" id="smallCartRow" style="border-top: solid 1px #454545">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="kosik.php">
                    <i class="material-icons cart">shopping_cart</i></a>
                <a class="text-white d-inline" href="kosik.php">Košík</a>
            </div>
        </div>
        <div class="row smallKatRow" id="smallFavRow">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="oblibene.php">
                    <i class="material-icons fav">favorite</i></a>
                <a class="text-white d-inline" href="oblibene.php">Oblíbené</a>
            </div>
        </div>
        <?php 
    }}
    else{ ?>
        <div class="row smallKatRow" id="smallCartRow" style="border-top: solid 1px #454545">
        <div class="col smallKat">
            <a class="nav-link active d-inline" href="kosik.php">
                <i class="material-icons cart">shopping_cart</i></a>
            <a class="text-white d-inline" href="kosik.php">Košík</a>
        </div>
    </div>
    <?php } ?>

    </div>
    <!-- End of the small navKat -->

    <!-- Small userInfo -->
    <div class="collapse navbar-collapse userInfo" id="userInfo" style="background-color:rgb(40,52,54)">
        <div class="row smallKatRow" id="smallCartRow">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="kosik.php">
                    <i class="material-icons cart">shopping_cart</i></a>
                <a class="text-white d-inline" href="kosik.php">Košík</a>
            </div>
        </div>
        <div class="row smallKatRow" id="smallFavRow">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="oblibene.php">
                    <i class="material-icons fav">favorite</i></a>
                <a class="text-white d-inline" href="oblibene.php">Oblíbené</a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link active d-inline" href="profile.php">
                    <i class="material-icons profileLink">account_circle</i></a>
                <a class="text-white d-inline" href="profile.php"><?php echo($username);?></a>
            </div>
        </div>
        <div class="row smallKatRow">
            <div class="col smallKat">
                <a class="nav-link d-inline" href="logout.php">
                    <i class="material-icons">power_settings_new</i></a>
                <a class="text-white d-inline" href="logout.php">Odhlásit se</a>
            </div>
        </div>
    </div>
    <!-- End of the small userInfo -->


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