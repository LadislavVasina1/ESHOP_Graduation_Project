<?php
session_start();

include 'DbConnection.class.php';

if(isset($_POST['changeUserInfo'])){
    
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $surname = !empty($_POST['surname']) ? trim($_POST['surname']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $street = !empty($_POST['street']) ? trim($_POST['street']) : null;
    $town = !empty($_POST['town']) ? trim($_POST['town']) : null;
    $zipcode = !empty($_POST['zipcode']) ?  str_replace(' ', '',trim($_POST['zipcode']) ) : null;

    
    //? Ověření správnosti emailu
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header('Location: error/wrongEmail.php');
        exit();
    }


    $sql = "UPDATE eshop.uzivatele SET jmeno=:jmeno, prijmeni=:prijmeni, email=:email, ulice_cislo=:ulice_cislo, obec=:obec, psc=:psc WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_SESSION['user_id']);
    $stmt->bindValue(':jmeno', $name);
    $stmt->bindValue(':prijmeni', $surname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':ulice_cislo', $street);
    $stmt->bindValue(':obec', $town);
    $stmt->bindValue(':psc', $zipcode);
    $stmt->execute();

    $_SESSION['jmeno']= $name;
    $_SESSION['prijmeni']= $surname;
    $_SESSION['email']= $email;
    $_SESSION['ulice_cislo']= $street;
    $_SESSION['obec']= $town ;
    $_SESSION['psc']= $zipcode;
    

    header('Location: profile.php');
}
header('Location: profile.php');

?>