<?php
    //Première méthode
    //$con = mysqli_connect("localhost", "root", "", "geststock");

    //Autre méthode
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "geststock");
    $con = mysqli_connect(HOST, USER, PASSWORD, DB);
    $con1 = new PDO('mysql:host=localhost;dbname=geststock', 'root', '');
?>