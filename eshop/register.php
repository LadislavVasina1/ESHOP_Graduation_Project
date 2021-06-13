<?php

session_start();

require 'DbConnection.class.php';

//Pokud POST['register'] existuje tak můžeme přepokládat, že byl registrační formulář vyplněn

if(isset($_POST['register'])){
    
    //Získání hodnot z formuláře
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $surname = !empty($_POST['surname']) ? trim($_POST['surname']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $repeat = !empty($_POST['repeat']) ? trim($_POST['repeat']) : null;
    $street = !empty($_POST['street']) ? trim($_POST['street']) : null;
    $town = !empty($_POST['town']) ? trim($_POST['town']) : null;
    $zipcode = !empty($_POST['zipcode']) ?  str_replace(' ', '',trim($_POST['zipcode']) ) : null;
    $regexpPassword = "/^(?=.*?[0-9])(?=.*?[a-z])(?=.*?[A-Z]).{8,30}$/";
    

    $username = strip_tags($username);
    $name = strip_tags($name);
    $surname = strip_tags($surname);
    $email = strip_tags($email);
    $street = strip_tags($street);
    $town = strip_tags($town);
    $zipcode = strip_tags($zipcode);


    //? Ověření správnosti emailu
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header('Location: error/wrongEmail.php');
        exit();
    }
    //? Ověření síly hesla
    if(preg_match($regexpPassword,$pass,$matches)){
        if ($pass !== $repeat) {
            header('Location: error/wrongPassRepeat.php');
        exit();
        }
    }  
       
    else{ 
       header('Location: error/strengthErr.php');
        exit();

    }


    //? Kontrola jestli uživ. jméno již není zaregistrováno
    $sql = "SELECT COUNT(username) AS num FROM uzivatele WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    

    //? Nastavení zadaného uživ. jmena do připraveného dotazu
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    
    //? Načtení řádku
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //? Pokud uživatel již existuje => ERROR
    if($row['num'] > 0){
        header('Location: error/wrongUser.php');
        exit();
      ?>
<?php
    }
    
    //? Hashování hesla
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //? Připravení INSERTu
    $sql = "INSERT INTO uzivatele (username, jmeno, prijmeni, email, password, ulice_cislo, obec, psc) VALUES (:username, :name, :surname, :email, :password, :street, :town, :zipcode)";
    $stmt = $pdo->prepare($sql);
    
    //Nastavení proměnných
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':street', $street);
    $stmt->bindValue(':town', $town);
    $stmt->bindValue(':zipcode', $zipcode);
    
    //Provedení dotazu a vytvoření nového uživatele
    $result = $stmt->execute();
    
    //Pokud byla regstrace úspěšná
    if($result){
        echo 'Thank you for registering with our website.';
        sleep(3);
        header('Location: index.php');

        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logoIcon.png">
    <!-- Title Page-->
    <title>Registrace</title>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<body>
    <dYXiv class="page-wrapper bg-gra-01 p-t-20 pb-3">
        <div class="wrapper wrapper--w680">
            <div class="card card-4 pb-4 bg-dark">
                <div class="card-body">
                    <h2 class="title">Registrační formulář</h2>
                    <form action="register.php" method="post">

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Jméno</label>
                                    <input class="input--style-4" type="text" name="name" required="true"
                                        autofocus="true">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Příjmení</label>
                                    <input class="input--style-4" type="text" name="surname" required="true">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" required="true">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Uživ. jméno</label>
                                    <input class="input--style-4" type="text" name="username" required="true">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Heslo</label>
                                    <input class="input--style-4" type="password" name="password" required="true"
                                        id="pass1">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Zadejte heslo znovu</label>
                                    <input class="input--style-4" type="password" name="repeat"
                                        aria-describedby="passwordHelpBlock" required="true" id="pass2">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space mb-2">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" onclick="showPassword()" class="custom-control-input"
                                        id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Zobrazit heslo</label>
                                </div>
                            </div>
                            <script>
                            function showPassword() {
                                var x = document.getElementById("pass1");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                                var y = document.getElementById("pass2");
                                if (y.type === "password") {
                                    y.type = "text";
                                } else {
                                    y.type = "password";
                                }
                            }
                            </script>
                        </div>



                        <small id="passwordHelpBlock" class="form-text mb-3">
                            <p id="passLength">Minimální délka hesla je 8 znaků a heslo musí obsahovat:</p>
                            <ul>
                                <script>
                                $("#pass1").keyup(function() {

                                    let heslo = $("#pass1").val();
                                    //let check = /^(?=.*?[0-9])(?=.*?[a-z])(?=.*?[A-Z]).{8,30}$/;

                                    let length = /^(?=.*.).{8,}$/
                                    if (!length.test(heslo)) {
                                        $("#passLength").css('color', 'red');
                                    } else {
                                        $("#passLength").css('color', 'limegreen');
                                    }

                                    let upper = /^(?=.*[A-Z]).{1,}$/;
                                    if (!upper.test(heslo)) {
                                        $("#upper").css('color', 'red');
                                    } else {
                                        $("#upper").css('color', 'limegreen');
                                    }

                                    let lower = /^(?=.*[a-z]).{1,}$/;
                                    if (!lower.test(heslo)) {
                                        $("#lower").css('color', 'red');
                                    } else {
                                        $("#lower").css('color', 'limegreen');
                                    }

                                    let number = /^(?=.*[0-9]).{1,}$/;
                                    if (!number.test(heslo)) {
                                        $("#number").css('color', 'red');
                                    } else {
                                        $("#number").css('color', 'limegreen');
                                    }
                                });

                                </script>
                                <li id="upper">1 velké písmeno (A-Z)</li>
                                <li id="lower">1 malé písmeno (a-z)</li>
                                <li id="number">1 číslici (0-9)</li>
                            </ul>
                        </small>

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Ulice a č.p.</label>
                                    <input class="input--style-4" type="text" name="street" required="true">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Obec</label>
                                    <input class="input--style-4" type="text" name="town" required="true">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">PSČ</label>
                                    <input class="input--style-4" type="text" maxlength="10" name="zipcode"
                                        required="true">
                                </div>
                                <div id="regBtnDiv" class="col-12 p-0">
                                    <input id="regBtn" class="btn px-1" type="submit" name="register"
                                        value="Registrovat">
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



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
