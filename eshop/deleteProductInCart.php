<?php
session_start();
require_once("DbConnection.class.php");

$idUzivatele = $_SESSION['user_id'];
$idProduktu = htmlspecialchars($_GET['idProduktu']);


if (isset($_POST['smazatPolozkuKosiku'])) {
    $sql = "DELETE FROM eshop.kosik WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":idUzivatele", $idUzivatele);
    $stmt->bindValue(":idProduktu", $idProduktu);
    $stmt->execute();
    header("Location: kosik.php");
}
if (isset($_POST['pridatPolozkuKosiku'])) {
    $sql1 = "SELECT qty FROM eshop.kosik WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->bindValue(':idProduktu', $idProduktu);
    $stmt->execute();
    $actualQty = $stmt->fetch(PDO::FETCH_ASSOC);

    $newQty = $actualQty['qty']+1;

    $sql2 = "UPDATE eshop.kosik SET qty=:qty WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql2);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->bindValue(':idProduktu', $idProduktu);
    $stmt->bindValue(':qty', $newQty);
    $stmt->execute();

    header("Location: kosik.php");
}
if (isset($_POST['odebratPolozkuKosiku'])) {
    $sql3 = "SELECT qty FROM eshop.kosik WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql3);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->bindValue(':idProduktu', $idProduktu);
    $stmt->execute();
    $actualQty = $stmt->fetch(PDO::FETCH_ASSOC);

    $newQty = $actualQty['qty']-1;

    $sql4 = "UPDATE eshop.kosik SET qty=:qty WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql4);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->bindValue(':idProduktu', $idProduktu);
    $stmt->bindValue(':qty', $newQty);
    $stmt->execute();

    $sql5 = "SELECT qty FROM eshop.kosik WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql5);
    $stmt->bindValue(':idUzivatele', $idUzivatele);
    $stmt->bindValue(':idProduktu', $idProduktu);
    $stmt->execute();
    $actualQty = $stmt->fetch(PDO::FETCH_ASSOC);

    if($actualQty['qty']==0){
        $sql = "DELETE FROM eshop.kosik WHERE idUzivatele = :idUzivatele AND idProduktu = :idProduktu";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":idUzivatele", $idUzivatele);
        $stmt->bindValue(":idProduktu", $idProduktu);
        $stmt->execute();
        header("Location: kosik.php");
    }

    header("Location: kosik.php");
}

exit();

?>