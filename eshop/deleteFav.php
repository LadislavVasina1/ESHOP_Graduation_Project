<?php
require_once("DbConnection.class.php");

$id = htmlspecialchars($_GET['id']);

$sql = "DELETE FROM eshop.oblibene WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_STR);
$stmt->execute();

header("Location: oblibene.php");
exit();

?>