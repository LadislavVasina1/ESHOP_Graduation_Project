<?php
session_start();
require 'Db.Connection.class.php';

if(isset($_POST['searchBtn'])){
    $vybranaKategorie = $_POST['search'];
    
    $sql = 'SELECT idAtributu, atribut, jednotka FROM eshop.kategorie_has_atributy join kategorie on kategorie_idKategorie = idKategorie
    join eshop.atributy on atributy_idAtributu = idAtributu where nazevKategorie = :vybranaKategorie';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':vybranaKategorie', $vybranaKategorie);
    $stmt->execute();
    $atributy = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($atributy, JSON_UNESCAPED_UNICODE);
}


?>