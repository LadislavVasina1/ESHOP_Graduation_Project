<?php
session_start();

require 'DbConnection.class.php';

if(isset($_POST['login'])){
    
    //Získání hodnot z login formuláře
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Získání informací o daném uživateli
    $sql = "SELECT id, username, jmeno, prijmeni, email, password, opravneni, ulice_cislo, obec, psc FROM uzivatele WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Nastavení hodnoty
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){

        header('Location: error/wrongLogin.php');
        exit();
    }
    else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Uložení oprávnění
            $_SESSION['opravneni'] = $user['opravneni'];
           
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['jmeno'] = $user['jmeno'];
            $_SESSION['prijmeni'] = $user['prijmeni'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['ulice_cislo'] = $user['ulice_cislo'];
            $_SESSION['obec'] = $user['obec'];
            $_SESSION['psc'] = $user['psc'];
            $_SESSION['logged_in'] = time();
            
            //Redirecting to our protected page
            header('Location: index.php');
/*            echo '<pre>';
              var_dump($_SESSION);
              echo '</pre>';*/
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            header('Location: error/wrongLogin.php');
            exit();
        }
    }
    
}




?>