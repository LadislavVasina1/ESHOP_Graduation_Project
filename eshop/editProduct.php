<?php 

   include 'sprava.php';

if(isset($_SESSION['user_id'])){
    if ($_SESSION['opravneni']!=3) 
    {
      header('Location:logout.php');
  }
else{


    
    $idProduktu = htmlspecialchars($_GET['idProduktu']);

    $sql1 = "SELECT COUNT(*) AS pocet FROM produkty WHERE idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':idProduktu',$idProduktu);
    $stmt->execute();

    $produkt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo $produkt[0]['pocet'];


    if($produkt[0]['pocet'] == 0){?>
        <script>
        alert('Tento produkt neexistuje!');
        window.location.href = 'spravaProduktu.php';
        </script>
   <?php }


    $sql2 = "SELECT nazevProduktu, cenaProduktu, popisProduktu FROM produkty WHERE idProduktu = :idProduktu";
    $stmt = $pdo->prepare($sql2);
    $stmt->bindValue(':idProduktu',$idProduktu);
    $stmt->execute();

    $produkt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($produkt);

    if(isset($_POST['changeProductInfo'])){

        $idProduktu = htmlspecialchars($_GET['idProduktu']);

        $nazevProduktu = !empty($_POST['nazevProduktu']) ? trim($_POST['nazevProduktu']) : null;
        $cenaProduktu = !empty($_POST['cena']) ? trim($_POST['cena']) : null;

        $nazevProduktu = strip_tags($nazevProduktu);
        $cenaProduktu = strip_tags($cenaProduktu);

        $sql = "UPDATE produkty SET nazevProduktu=:nazevProduktu, 
                cenaProduktu=:cenaProduktu WHERE idProduktu=:idProduktu";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idProduktu', $idProduktu);
        $stmt->bindValue(':nazevProduktu', $nazevProduktu);
        $stmt->bindValue(':cenaProduktu', $cenaProduktu);

        $stmt->execute();
    
        ?>
        <script>window.location.href="spravaProduktu.php"</script>
        <?php
    }
 
    ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úprava produktu</title>
    <style>
    .spravaProduktu {
        color: #ab2346;
    }

    .roundCorners {
        border-radius: 25px;
    }

    .buttons {
        display: flex;
        justify-content: center;
    }
    h3{
        color:white;
    }

    #addBtn {
        background-color: #03f7eb;
    }

    #addBtn:hover {
        background-color: #00b295;
    }
    textarea{
        min-height:11em;
    }
    </style>
    <script>
    document.title = 'Úprava produktu';
    </script>
</head>
<body>
    
</body>
</html>
<div class="container mt-3">
<h3 class="ml-4">Úprava produktu v katalogu</h3>
<form class="was-validated m-3" action="#" method="post">
<div class="form-group">
        <input type="text" id="nazevProduktu" name="nazevProduktu" required="true" 
        placeholder="Název produktu" value="<?php echo $produkt[0]['nazevProduktu']; ?>"
            class="form-control roundCorners">
        <span class="help-block"></span>
</div>
    <div class="form-group">
        <input type="number" min="0" max="999999" id="cena" name="cena" required="true" 
        placeholder="Cena (Kč)" value="<?php echo $produkt[0]['cenaProduktu']; ?>"
            class="form-control roundCorners">
        <span class="help-block"></span>
    </div>
    <div class="buttons">
        <input type="submit" name="changeProductInfo" id="addBtn" value="Upravit produkt" 
        class="btn roundCorners mr-2 ">
    </div>
</div> 
</form>

<?php
}
}else{
    header('Location:logout.php');
  }

?>
