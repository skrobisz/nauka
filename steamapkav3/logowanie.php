<?php
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "login") {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    $db = new mysqli("localhost", "root", "", "steam");
    
    $q = $db->prepare("SELECT * FROM userlogowanie WHERE email = ? LIMIT 1");
    
    $q->bind_param("s", $email);
    
    $q->execute();
    
    $result = $q->get_result();
    
    $userROW = $result->fetch_assoc();
    if($userROW == null) {
        echo "Błędny email lub hasło <br>";
    } else {
        if(password_verify($password, $userROW['passwordHash'])) { 
            setcookie('current_user', $userROW['ID'], time() + 3600);
            if(isset($_COOKIE['current_user'])) {
                header('Location: my_library.php');
                exit();
            }
            echo "Zalogowano poprawnie <br>";
        } else {
            echo "Błędny email lub hasło <br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_log.css">
    <title>Logowanie</title>
</head>
<body>
    <header>
    <img src="https://store.fastly.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" height="100px" width="200px">
    </header>
<p id="log"><strong>Logowanie</strong></p>
<div id="logowanie">
    <section id="qrcode">
    <p>LUB ZALOGUJ SIĘ Z UŻYCIEM KODU QR</p>
    <img src="https://cdn.discordapp.com/attachments/1149742931280937080/1311064668714045660/image.png?ex=67477f9f&is=67462e1f&hm=e2c690cd79b680f567430df807ac7411f0a684a63f37cb4ce8c1dd8ca0e52bd6&" height="200px" width="200px">
    </section>
    <form action="logowanie.php" method="get">
    <div id="pasy">
    <label id="pasy1" for="emailInput">ZALOGUJ SIĘ Z UŻYCIEM NAZWY KONTA</label><br>
    <input type="email" name="email" id="emailInput"><br><br><br>
    <label id="pasy2" for="passwordInput">HASŁO</label><br>
    <input type="password" name="password" id="passwordInput"><br>
    </div>
    <div id="butlog">
    <input type="hidden" name="action" value="login">
    <input type="submit" value="Zaloguj">
    </div> 
</form>
<a id="pomocy" href="pomocy.php">Pomocy, nie moge się zalogować</a>
</div>
<footer>
<p><strong>Pierwszy raz na steam?</strong></p>
<form action="rejestracja.php">
<input type="submit" value="Utwórz konto">
</form>
</footer>
</body>
</html>