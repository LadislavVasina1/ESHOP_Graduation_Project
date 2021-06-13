<?php 
//include("sprava.php");
//require_once("DbConnection.class.php");

if(isset($_POST['submit'])){
$target_dir = "../MPLV/productImages/";

if(isset($_FILES["fileToUpload"]["name"])){
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
/*
echo $target_file;
echo '<br>';
echo time();
echo '<br>';
echo $_FILES["fileToUpload"]["name"];
echo '<br>';
*/
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//echo strlen($imageFileType);
$odsazeni = strlen($imageFileType) + 1;
$odsazeni = $odsazeni *(-1);
//echo $odsazeni;
$target_file = substr_replace($target_file,time(),$odsazeni).'.'.$imageFileType;
//echo $target_file;
    
}
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jfif" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JFIF, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

require_once("DbConnection.class.php");
//echo $_POST['level'];
$sql = "SELECT idKategorie FROM kategorie WHERE nazevKategorie = :nazevKategorie";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nazevKategorie', $_POST['level']);   
$stmt->execute();
//Načtení řádku
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($row['idKategorie']);

//*************************************************** NASTAVOVÁNÍ PROMĚNNÝCH PRO PŘIPRAVENÉ DOTAZY *********************************************************************************************************
$nazevProduktu = htmlspecialchars($_POST['nazevProduktu']);
$cena = htmlspecialchars($_POST['cena']);
$popisProduktu = htmlspecialchars($_POST['popisProduktu']);
$kategorieId = htmlspecialchars($row['idKategorie']);
$imageSource = $target_file;

//*************************************************** VKLÁDÁNÍ ZÁKLADNÍCH PARAMETRŮ DANÉMU PRODUKTU ********************************************************************************************************
$sql = "INSERT INTO eshop.produkty (nazevProduktu, cenaProduktu, popisProduktu, kategorieId, imageSource) VALUES (:nazevProduktu, :cena, :popisProdukut, :kategorieId, :imageSource)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':nazevProduktu', $nazevProduktu);
$stmt->bindValue(':cena', $cena);
$stmt->bindValue(':popisProdukut', $popisProduktu);
$stmt->bindValue(':cena', $cena);
$stmt->bindValue(':kategorieId', $kategorieId);
$stmt->bindValue(':imageSource', $imageSource);

$stmt->execute();

//*************************************************** ZÍSKÁVÁNÍ POMOCNÝCH PROMĚNNÝCH ********************************************************************************************************************
$sql = "SELECT idProduktu, kategorieId  FROM produkty WHERE nazevProduktu = :nazevProduktu";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nazevProduktu', $nazevProduktu);
$stmt->execute();
$produkty = $stmt->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT count(atributy_idAtributu) AS num FROM kategorie_has_atributy WHERE kategorie_IdKategorie = :kategorieId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':kategorieId', $produkty['kategorieId']);
$stmt->execute();

$count = $stmt->fetch(PDO::FETCH_ASSOC);

//*************************************************** VKLÁDÁNÍ ATRIBUTŮ DANÉMU PRODUKTU ********************************************************************************************************************

foreach (array_slice($_POST, 4, -1) as $key => $value) {


    $sql = "SELECT idAtributu FROM atributy WHERE atribut = :atribut";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':atribut', $key);
    $stmt->execute();
    $atributy = $stmt->fetch(PDO::FETCH_ASSOC);

    $idAtributu = $atributy['idAtributu'];

    $sql = "INSERT INTO eshop.produkty_has_atributy (produkty_idProduktu, atributy_idAtributu, hodnota) VALUES (:produkty_idProduktu, :atributy_idAtributu, :hodnota)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':produkty_idProduktu', $produkty['idProduktu']);
    $stmt->bindValue(':atributy_idAtributu', $idAtributu);
    $stmt->bindValue(':hodnota', $value); 

    $stmt->execute();
    header('Location: spravaProduktu.php');
}
}
}include("sprava.php");
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <title>Správa produktů</title>
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

    #addBtn {
        background-color: #03f7eb;
    }

    #addBtn:hover {
        background-color: #00b295;
    }
    h3, h5, p {
        color:white;
    }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
    document.title = 'Správa produktů';

    $(document).ready(function() {
        $("#kategorie").change(function() {
            var vybranaKategorie = $("#kategorie").val();
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'vybranaKategorie=' + vybranaKategorie
            }).done(function(atributy) {
                $("#atributes").empty();
                //console.log(atributy);
                var atribut = JSON.parse(atributy);

                var pocetAtributu = atribut.length;
                if (pocetAtributu == 0) {
                    document.getElementById("popisAtributForm").style.display = "none";
                }
                var popis = '<br><h5 id="popisAtributForm">Atributy produktu</h5>';
                $("#atributes").append(popis);
                for (let i = 0; i < pocetAtributu; i++) {
                    var idAtributu = atribut[i]['idAtributu'];
                    var nazevAtributu = atribut[i]['atribut'];
                    var jednotka = atribut[i]['jednotka'];
                    var atributForm = `
                        <div class="form-group">
                        <div class="input-group mb-3">
                        <input required type="number" min="0" max="999999999" step=".01" id="${idAtributu}" name="${nazevAtributu}"  placeholder="${nazevAtributu}" class="form-control roundCorners">
                        <div class="input-group-append"><span class="input-group-text roundCorners">${atribut[i]['jednotka']}</span></div>
                        </div><span class="help-block"></span>
                        </div>`;
                    var atributFormWithoutUnits = `
                        <div class="form-group">
                        <div class="input-group mb-3">
                        <input required type="text" maxlength="99" id="${idAtributu}" name="${nazevAtributu}" placeholder="${nazevAtributu}" class="form-control roundCorners"></div>
                        <span class="help-block"></span>
                        </div>`;

                    if (jednotka == null) {
                        $("#atributes").append(atributFormWithoutUnits);
                    } else {
                        $("#atributes").append(atributForm);
                    }



                }
            })
        })
    })
    </script>
</head>

<body>
    <div class="container mt-3">

        <h3>Přidání výrobku do katalogu</h3>
        <form id="spravaProduktuForm" class="was-validated" action="spravaProduktu.php" method="post"
            enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" id="nazevProduktu" name="nazevProduktu" required="true" placeholder="Název produktu"
                    class="form-control roundCorners">
                <span class="help-block"></span>

            </div>
            <div class="form-group">
                <input type="number" min="0" max="999999" id="cena" name="cena" required="true" placeholder="Cena (Kč)"
                    class="form-control roundCorners">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <p>Popis produktu</p>
                <textarea name="popisProduktu" maxlength="65535" form="spravaProduktuForm"
                    class="md-textarea form-control roundCorners"> </textarea>

            </div>
            <div class="was-validated">
                <div class="custom-file">
                    <input class="custom-file-input" type="file" name="fileToUpload" required="true" accept="image/*"
                        id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Vybrat obrázek:</label>
                </div>
            </div>
            <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>
            <div class="form-group">
                <br>
                <h5>Kategorie, ve které bude produkt uložen</h5>
                <select required name="level" id="kategorie" class="browser-default custom-select roundCorners">
                    <option selected disabled value="">Vyberte kategorii</option>
                    <?php 
 $sql = 'select * from kategorie where nazevKategorie != "Komponenty" AND nazevKategorie != "PC doplňky"';
 $q = $pdo->query($sql);
 $q->setFetchMode(PDO::FETCH_ASSOC);
 
 while ($row = $q->fetch()): $nazev = $row['nazevKategorie'];
 ?>
   <option value="<?php echo htmlspecialchars($row['nazevKategorie']) ?>">
                        <?php echo htmlspecialchars($row['nazevKategorie']); ?></option><?php endwhile; ?>
                </select>
            </div>
            <div id="atributes">
            </div>

            <div class="buttons">
                <input type="submit" name="submit" id="addBtn" value="Přidat produkt" class="btn roundCorners mr-2 ">
                <input type="reset" class="btn btn-warning roundCorners" value="Reset"
                    onClick="window.location.href=window.location.href">
            </div>
        </form>
    </div>

    <?php 
    $sql = "SELECT idProduktu, nazevProduktu, cenaProduktu, popisProduktu, nazevKategorie, imageSource FROM eshop.produkty join kategorie on kategorieId = idKategorie;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
    <div style="overflow-x:auto" class="mt-3">
        <table class="table table-striped table-dark">
            <tr>
                <th scope="col">Název produkut</th>
                <th scope="col">Cena (Kč)</th>
                <th scope="col">Popis produktu</th>
                <th scope="col">Kategorie</th>
                <th scope="col">imageSource</th>
            </tr>

            <?php

    while ($produkty = $stmt->fetch()):
?>
            <tr>
                <td><?php echo $produkty[1]?></td>
                <td><?php echo number_format($produkty[2], 2, ',', '&nbsp'/* &nbsp = pevná mezera */)?></td>
                <td><?php echo $produkty[3]?></td>
                <td><?php echo $produkty[4]?></td>
                <td><?php echo $produkty[5]?></td>
                <form action="editProduct.php" method="get">
                    <td><a class="btn btn-warning btn-block" href="editProduct.php?idProduktu=<?=$produkty[0]?>">Upravit
                            produkt</a></td>
                </form>
                <form action="deleteProduct.php" method="get" enctype="multipart/form-data">
                    <td><a class="btn btn-danger btn-block"
                            href="deleteProduct.php?idProduktu=<?=$produkty[0]?>&imageSource=<?=$produkty[5]?>"
                            onclick="return confirm('Are you sure?')">Smazat produkt</a></td>
                </form>
            </tr>
            <script>

            </script>

            <?php
    endwhile;
?>
        </table>
    </div>


</body>

</html>