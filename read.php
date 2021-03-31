<?php require_once "crud-read.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/crud.css">
</head>
<body>
<div class="container">
    <div class="box">
        <h4 class = "display-4 text-center">Read</h4><hr><br>
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <?php if (mysqli_num_rows($result)) { ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gebruikersnaam</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            while ($rows = mysqli_fetch_assoc($result)){
                $i++;
            ?>
            <tr>
                <th scope="row"><?=$i?></th>
                <td><?=$rows['username']?></td>
                <td><?php echo $rows['email']?></td>
                <td>
                    <a href="update.php?id=<?=$rows['id']?>" class="btn btn-success"> Update
                    <a href="crud-delete.php?id=<?=$rows['id']?>" class="btn btn-danger">Verwijder</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php } ?>
        <div class="link-right">
            <a href="contacts.php" class="link-primary">Create</a>
        </div>
    </div>

</div
</body>
</html>
