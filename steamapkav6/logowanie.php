<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_log.css">
    <link rel="shortcut icon" href="https://store.steampowered.com/favicon.ico" />
    <title>Zaloguj się</title>
</head>
    <body>
        <header>
            <img src="https://store.fastly.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" height="100px" width="200px">
                    <a href="sklep.php">SKLEP</a>
                    <a href="https://steamcommunity.com/">SPOŁECZNOŚĆ</a>
                    <a href="https://store.steampowered.com/about/">INFORMACJE</a>
                    <a href="https://help.steampowered.com/pl/">POMOC TECHNICZNA</a>
                    <div id="headerlog">
                    <a href="logowanie.php">zaloguj się</a>
                    </div>
        </header>
    <p id="log">Logowanie</p>
        <div id="logowanie">
            <section id="qrcode">
                <p id="nadqr">LUB ZALOGUJ SIĘ Z UŻYCIEM KODU QR</p>
                <img src="qr.png" height="200px" width="200px">
                <p id="podqr">Użyj <a id="linkqr" href="https://store.steampowered.com/mobile">aplikacji mobilnej Steam</a>, aby zalogować się za pomocą kodu QR.</p>
            </section>
    <form action="logowanie.php" method="get">
        <div id="pasy">
            <label id="pasy1" for="emailInput">ZALOGUJ SIĘ Z UŻYCIEM NAZWY KONTA</label><br>
            <input type="email" name="email" id="emailInput"><br><br><br>
            <label id="pasy2" for="passwordInput">HASŁO</label><br>
            <input type="password" name="password" id="passwordInput"><br>
        </div>

    <div id="logpowiadomienie">
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
        echo "Sprawdź swoją nazwę konta oraz hasło i spróbuj ponownie. <br>";
    } else {
        if(password_verify($password, $userROW['passwordHash'])) { 
            setcookie('current_user', $userROW['ID'], time() + 3600);
            if(isset($_COOKIE['current_user'])) {
                header('Location: my_library.php');
                exit();
            }
        }
        }
    }
?>
    </div>
    <div id="butlog">
        <input type="hidden" name="action" value="login">
        <input type="submit" value="Zaloguj">
    </div> 
</form>
<div id="pomocydiv">
<a id="pomocy" href="https://help.steampowered.com/pl/wizard/HelpWithLogin?redir=https%3A%2F%2Fstore.steampowered.com%2Flogin%2F%3Fl%3Dpolish">Pomocy, nie moge się zalogować</a>
</div>
</div>

        <footer>
            <p id="pierwszyraz">Pierwszy raz na steam?</p>
                <form action="rejestracja.php">
                    <input type="submit" value="Utwórz konto">
                </form> 
            <p id="footerparagraf">© 2024 Valve Corporation. Wszelkie prawa zastrzeżone. Wszystkie znaki handlowe są własnością ich prawnych właścicieli w Stanach Zjednoczonych i innych krajach.</p>
        </footer>
    </body>
</html>