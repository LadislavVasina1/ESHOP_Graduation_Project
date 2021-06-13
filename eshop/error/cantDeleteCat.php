<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logoIcon.png">
    <title>Nelze odstranit kategorii</title>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Načtení ikon -->
    <style>
    body {
        color: white;
        background: #CB356B;
        background: -webkit-linear-gradient(to right, #BD3F32, #CB356B);
        background: linear-gradient(to right, #BD3F32, #CB356B);
    }

    div {
        height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .btn {
        background-color: white;
        width:14vw;
    }

    @media (max-width: 666px) {
        h1 {
            width: 70vw;
        }
    }

    @media (max-width: 841px) {
        h4 {
            width: 70vw;
        }
    }
    </style>
</head>

<body>
    <div>
        <h1>Nelze odstranit danou kategorii.</h1>
        <br>
        <h4>Kategorie je navázána na jinou kategorii.</h4>
        <br>
        <h6>Přejděte zpět na správu kategorií.</h6>
        <br>
        <i class="material-icons mb-1">arrow_downward</i>
        <a href="../spravaKategorii.php" class="btn" role="button">Zpět</a>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>