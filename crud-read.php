<?php
require_once "included/db-connection.php";

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($link, $sql);

