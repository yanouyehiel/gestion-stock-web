<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestStock</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <?php include("header.php") ?>

    <?php 

        if (isset($_GET["page"])) {
            $page = $_GET["page"].".php";
            include("nav/".$page);
        } else {
            include("accueil.php");
        }
    ?>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>