<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
    <img src="https://store.fastly.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" height="100px" width="200px">
<div id="rejestracja">
<p id="rej">Zarejestruj się:</p>
<form action="index.php" method="get">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="passwordInput">Hasło:</label>
    <input type="password" name="password" id="passwordInput">
    <label for="passwordReapeatInput">Wpisz ponownie hasło:</label>
    <input type="password" name="passwordReapeat" id="passwordReapeatInput">
    <input type="hidden" name="action" value="register">
    <input type="submit" value="Zarejestruj">   
</form>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "register") {
    $db = new mysqli("localhost", "root", "", "steam");
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $passwordReapeat = $_REQUEST['passwordReapeat'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if($password == $passwordReapeat) {
    $q = $db->prepare("INSERT INTO userlogowanie VALUES (NULL, ?, ?)");
    $passwordHash = password_hash($password, PASSWORD_ARGON2I);
    $q->bind_param("ss", $email, $passwordHash);
    $result = $q->execute();
    if($result) {
        echo "Prawidłowo zarejestrowano konto";
    } else {
        echo "Wystąpił błąd";
    }
} else {
        echo "Hasła nie są zgodne - spróbuj ponownie!";
    }
}
?>