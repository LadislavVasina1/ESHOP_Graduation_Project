<?php
session_start();
require_once("DbConnection.class.php");
      
if(isset($_SESSION['user_id'])){
    if ($_SESSION['opravneni']!=3) 
    {
        header('Location:logout.php');
  }
else{
    $idObjednavky = htmlspecialchars($_GET['idObjednavky']);

$sql = "DELETE FROM eshop.objednavky_has_produkty WHERE objednavky_idObjednavky = :idObjednavky";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":idObjednavky", $idObjednavky, PDO::PARAM_STR);
$stmt->execute();

$sql2 = "DELETE FROM eshop.objednavky WHERE idObjednavky = :idObjednavky";
$stmt = $pdo->prepare($sql2);
$stmt->bindValue(":idObjednavky", $idObjednavky, PDO::PARAM_STR);
$stmt->execute();

header("Location: spravaObjednavek.php");
exit();

}
}
  else{
      header('Location:logout.php');
  }


?>