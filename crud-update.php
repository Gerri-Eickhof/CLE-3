
<?php
if (isset($_GET['id'])) {
    require_once "included/db-connection.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }else {
        header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    require_once "included/db-connection.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $id = validate($_POST['id']);

    if (empty($username)) {
        header("Location: update.php?id=$id&error=Vul Gebruikersnaam in");
    }else if (empty($email)) {
        header("Location: update.php?id=$id&error=Vul een email in");
    }else {

        $sql = "UPDATE users
               SET username='$username', email='$email'
               WHERE id=$id ";
        $result = mysqli_query($link, $sql);
        if ($result) {
            header("Location: read.php?success=successfully updated");
        }else {
            header("Location: update.php?id=$id&error=unknown error occurred&$user_data");
        }
    }
}else {
    header("Location: read.php");
}
