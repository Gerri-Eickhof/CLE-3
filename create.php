<?php

if (isset($_POST['create'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $email = validate($_POST['email']);

    $user_data = 'username=' .$username. '$email=' .$email;

    if (empty($username)) {
        header("Location: contacts.php?error=Vul een gebruikersnaam in&$user_data");
    }else if (empty($email)){
        header("Location: contacts.php?error=Vul een Email in&$user_data");
    }else{

        $sql = "INSERT INTO users(username, email) VALUES('$username', '$email')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "success";
        }else{
            header("Location: contacts.php?error=Er is een onbekende fout opgetreden&$user_data");
        }
    }
}