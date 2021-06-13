<?php 
include("sprava.php");

//************************************************************************************************************ */
if(isset($_POST["pridat"])){
 
    $sql = "SELECT idKategorie FROM kategorie WHERE nazevKategorie = :nazevKategorie";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nazevKategorie', $_POST['level']);   
    $stmt->execute();
    //Načtení řádku
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($row['idKategorie']);
     
    
    
    $nazevKategorie = htmlspecialchars($_POST['name']);
    $nadrazenaKategorie = $row['idKategorie'];
    
    $sql = "INSERT INTO eshop.kategorie (nazevKategorie, nadrazenaKategorie) VALUES (:nazevKategorie, :nadrazenaKategorie)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':nazevKategorie', $nazevKategorie);
    
    $stmt->bindValue(':nadrazenaKategorie', $nadrazenaKategorie);
   
    
    $stmt->execute();
    //header("Location: spravaKategorii.php");

   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Správa kategorií</title>
    <style>
    .spravaKategorii {
        color: #ab2346;
    }
    .roundCorners{
        border-radius:25px;
    }
    .buttons{
        display:flex;
        justify-content:center;
    }
    h3{
        color:white;
    }
    #addBtn{
        background-color:#03f7eb;
    }
    #addBtn:hover{
        background-color:#00b295;
    }
    </style>
    <script>
    document.title = 'Správa kategorií';
    </script>
</head>

<body>
<!-- ********************************************************************************************************************** -->
        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group mt-3">
                    <h3>Název kategorie</h3>
                    <input type="text" name="name" required="true" class="form-control roundCorners" placeholder="Zadejte název kategorie">
                </div>
                <div class="form-group">
                    <h3>Nadřazená kategorie</h3>
                    <select  required name="level" class="browser-default custom-select roundCorners">

                        <?php


   $sql = "SELECT * FROM kategorie WHERE idKategorie = 5 OR idKategorie = 6";
   $q = $pdo->query($sql);
   $q->setFetchMode(PDO::FETCH_ASSOC);
    
    while ($row = $q->fetch()): $nazev = $row['nazevKategorie'];
    ?>

                        <option value="<?php echo htmlspecialchars($row['nazevKategorie']) ?>"> <?php echo htmlspecialchars($row['nazevKategorie']); ?></option><?php 
                        
                        endwhile; ?> 
                    </select>
                </div>
                <div class="form-group buttons">
                    <input type="submit" name="pridat" id="addBtn" class="btn roundCorners mr-2" value="Přidat">
                    <input type="reset" class="btn btn-warning roundCorners" value="Reset"
                        onClick="window.location.href=window.location.href">
                </div>

            </form>
        </div>
        </div>
    <?php 
    $sql = "SELECT idKategorie, nazevKategorie, nadrazenaKategorie FROM kategorie";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    ?>
<div style="overflow-x:auto;">    
    <table class="table table-striped table-dark">
        <tr>
            <th scope="col">idKategorie</th>
            <th scope="col">nazevKategorie</th>
            <th scope="col">nadrazenaKategorie</th>
        </tr>

        <?php

    while ($kategorie = $stmt->fetch()):
?>
        <tr>
            <td><?php echo $kategorie[0]?></td>
            <td><?php echo $kategorie[1]?></td>
            <td><?php echo $kategorie[2]?></td>
            <?php 
            if(!is_null($kategorie[2])){?>
            <form id="delete" action="deleteCategory.php" method="get" enctype="multipart/form-data">
                <td><a class="btn btn-danger btn-block roundCorners" href="deleteCategory.php?idKategorie=<?php echo $kategorie[0]?>"
                        onclick="return confirm('Jste si jistí?')">Smazat
                        kategorii</a></td>
            </form>
            <?php
            }
            else{
               ?> <td></td> <?php
            }
        ?>
        </tr>

        <?php
    endwhile;
?>
</table>
</div>

</body>

</html>