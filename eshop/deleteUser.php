<?php
session_start();
require_once("DbConnection.class.php");
      
if(isset($_SESSION['user_id'])){
    if ($_SESSION['opravneni']!=3) 
    {
      header('Location:logout.php');
  }
else{
    $id = htmlspecialchars($_GET['id']);


      try{
        $sql = "DELETE FROM uzivatele WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        header("Location: spravaUzivatelu.php");
        } catch (PDOException $e) {
        ?><script>
   alert('Uživatel nelze odstranit, protože již provedl na e-shopu nějakou akci.');
    window.location.href = "spravaUzivatelu.php";
    </script>
    <?php
          }

exit();
}
}else{
    header('Location:logout.php');
  }



?>