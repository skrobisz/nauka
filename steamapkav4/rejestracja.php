<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_rej.css">
    <link rel="shortcut icon" href="https://store.steampowered.com/favicon.ico" />
    <title>Utwórz swoje konto</title>
</head>
<body>
    <header>
        <img src="https://store.fastly.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" height="100px" width="200px">
            <a href="sklep.php">SKLEP</a>
            <a href="https://steamcommunity.com/">SPOŁECZNOŚĆ</a>
            <a href="https://store.steampowered.com/about/">INFORMACJE</a>
            <a href="https://help.steampowered.com/pl/">POMOC TECHNICZNA</a>
    </header>
<p id="utworz">UTWORZ SWOJE KONTO</p>
<div id="rejestracja">
<p id="rej">Zarejestruj się:</p>
<form action="rejestacja.php" method="get">
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