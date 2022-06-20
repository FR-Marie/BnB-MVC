<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!---------- GOOGLE FONT ---------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!---------- ICONES MATERIALIZE ---------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!---------- MATERIALIZE ---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!---------- CSS ---------->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

    <title><?= $title ?></title>



    </head>
    <body>

    <header>
        <?php
        require_once "navbar.php";
        ?>
    </header>

    <div class="container">
        <?php
        echo $content;
        ?>
    </div>


    <footer>
        <?php
        require_once "footer.php";
        ?>
    </footer>

    <!---------- JAVASCRIPT MATERIALIZE---------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/javascript.js"></script>
    </body>
    </html>
