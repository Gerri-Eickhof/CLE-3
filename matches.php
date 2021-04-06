<?php
session_start();
require_once 'included/db-connection.php'; //connecting the db_connection to this file
?>

<<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>
    <script>
        $(function(){
            $("#header").load("./included/header.html");
            $("#footer").load("./included/footer.html");
        });
    </script>
    <div id="header"></div>
    <div id="footer"></div>
</head>
<body>
    <div><h1>je ma</h1></div>
</body>
</html>