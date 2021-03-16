<?php
    $dbHost = "localhost"; //host of server
    $dbUser = "root"; //user
    $dbPass = ""; //password of user
    $db = "cle3-db"; //name of database

    //connecting to the database's
    $link = mysqli_connect($dbHost, $dbUser, $dbPass, $db);

// Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>