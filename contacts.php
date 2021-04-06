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
    <form action="./create.php" method="post">
        <h4 class = "display-4 text-center">Account toevoegen</h4><hr><br>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="username">Gebruikersnaam</label>
            <input type="name" class="form-control" id="username" name="username" value="<?php if (isset($_GET['username'])) echo ($_GET['username']); ?>" placeholder="Voer gebruikersnaam in">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_GET['email'])) echo ($_GET['email']); ?>" placeholder="Voer email in">
        </div>
        <button type="submit" name="create" class="btn btn-primary">Toevoegen</button>
        <a href="read.php" class="link-primary"> Bekijk</a>
    </form>
</div
</body>
</html>
