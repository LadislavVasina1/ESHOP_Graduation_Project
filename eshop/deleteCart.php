<?php
require_once("DbConnection.class.php");

$id = htmlspecialchars($_GET['idUzivatele']);

$sql = "DELETE FROM eshop.kosik WHERE idUzivatele = :idUzivatele";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":idUzivatele", $id, PDO::PARAM_STR);
$stmt->execute();

header("Location: kosik.php");
exit();

?>