<?php
session_start();
require_once("DbConnection.class.php");
      
if(isset($_SESSION['user_id'])){
  if ($_SESSION['opravneni']!=3) 
  {
    header('Location:logout.php');
}
else{
  try{
$idKategorie = htmlspecialchars($_GET['idKategorie']);

$sql = "DELETE FROM eshop.kategorie WHERE idKategorie = :idKategorie";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":idKategorie", $idKategorie, PDO::PARAM_STR);
$stmt->execute();

header("Location: spravaKategorii.php");
exit();
}
catch (PDOException $e) {
    if ($e->getCode() != 23000) {
        
    }
    else{
        header("Location: error/cantDeleteCat.php");
    }
  }     
}
}else{
  header('Location:logout.php');
}


?>