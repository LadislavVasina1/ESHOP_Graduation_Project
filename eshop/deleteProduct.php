<?php
session_start();
require_once("DbConnection.class.php");
      
if(isset($_SESSION['user_id'])){
    if ($_SESSION['opravneni']!=3) 
    {
      header('Location:logout.php');
  }
else{
    $idProduktu = htmlspecialchars($_GET['idProduktu']);
    $imageSource = $_GET['imageSource'];


try{

$sql = "DELETE FROM eshop.produkty_has_Atributy WHERE produkty_idProduktu = :produkty_idProduktu";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":produkty_idProduktu", $idProduktu, PDO::PARAM_STR);
$stmt->execute();

$sql = "DELETE FROM eshop.produkty WHERE idProduktu = :idProduktu";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":idProduktu", $idProduktu, PDO::PARAM_STR);
$stmt->execute();
unlink($imageSource);

header("Location: spravaProduktu.php");
exit();
}catch (PDOException $e) {
    ?><script>
alert('<?php echo("Produkt byl již někdy objednán! Nelze odstranit.");  ?>');
window.location = "spravaProduktu.php";
</script><?php
}


}
}else{
    header('Location:logout.php');
  }
    


?>