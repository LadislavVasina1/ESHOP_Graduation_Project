<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logoIcon.png">
    <title>Zadejte stejné heslo x)</title>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Načtení ikon -->
    <style>
    body {
        color:white;
        background: #000000;
        background: -webkit-linear-gradient(to left, #434343, #000000);
        background: linear-gradient(to left, #434343, #000000);


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
        <h1>Zadejte pokaždé stejné heslo.</h1>
        <br>
        <h6>Přejděte zpět na registrační formulář.</h6>
        <br>
        <i class="material-icons mb-1">arrow_downward</i>
        <a href="../register.php" class="btn" role="button">Zpět</a>
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