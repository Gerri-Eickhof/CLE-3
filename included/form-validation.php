<?php
$errors =[];
if ($username == "") {
    $errors['username'] = 'Gebruikersnaam mag niet leeg zijn';
}if ($firstname == "") {
    $errors['firstname'] = 'Voornaam mag niet leeg zijn';
}
if ($lastname == "") {
    $errors['lastname'] = 'Achternaam mag niet leeg zijn';
}
if ($gender == "") {
    $errors['gender'] = 'Geslacht mag niet leeg zijn';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}
if ($profile_picture == "") {
    $errors['profile_picture'] = 'U moet een profiel foto opgeven';
}