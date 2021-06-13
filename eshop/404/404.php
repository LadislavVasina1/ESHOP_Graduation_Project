<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR 404 – Nenalezeno :(</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="../img/logoIcon.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <script src="canvas.js"></script>
    <style>
    body {
        height: 100%;
        background-color: #000000;
        margin: 3px;
    }

    canvas {
        border: 1px solid #000000;
        background-color: #000000;
    }

    div {
        height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    @media (max-width: 885px) {
        h1 {
            width: 70vw;
        }
    }

    #container {
        
        position: relative;
    }

    #container canvas,
    #overlay {
        position: absolute;
        color: white;
        height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .btn{
        border: solid 1px #03f7eb;
        color: #03f7eb;
        border-radius:25px;
        width:13em;
    }
    .btn:hover{
        color: #000000;
        background-color: #03f7eb;
        transition:0.3s;
    }
    h4{
        margin-top:8px;
    }
    </style>
</head>

<body>
    <div id="container">
        <canvas style="height: 100%; width:100%;"></canvas>
        <div id="overlay">
            <h1>ERROR 404 - Stránka neexistuje</h1>
            <br>
            <h5>Přejděte zpět na hlavní stránku.</h5>
            <br>
            <i class="material-icons mb-1">arrow_downward</i>
            <a href="../index.php" class="btn" role="button"><h4>ZPĚT</h4></a>
        </div>
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