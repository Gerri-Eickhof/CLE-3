<?php

if (isset($_POST['create'])){
    require_once "included/db-connection.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $email = validate($_POST['email']);

    $user_data = 'username=' .$username. '&email=' .$email;

    if (empty($username)) {
        header("Location: contacts.php?error=Vul een gebruikersnaam in&$user_data");
    }else if (empty($email)){
        header("Location: contacts.php?error=Vul een Email in&$user_data");
    }else{

        $sql = "INSERT INTO users(username, email) VALUES('$username' , '$email')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            header("Location: read.php?success=Succesvol aangemaakt&$user_data");
        }else{
            header("Location: contacts.php?error=Er is een fout opgetreden, gebruikersnaam is misschien al in gebruik&$user_data");
        }
    }
}