
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_library.css">
    <link rel="shortcut icon" href="https://store.steampowered.com/favicon.ico" />
    <title>Twoje gry</title>
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
<main>
    <div id="tytuly">
<?php
    $db = new mysqli("localhost", "root", "", "steam");
echo "<p id='przywitanie'>Witaj użytkowniku numer ".$_COOKIE['current_user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
?>
<div id="main">
<?php
$q = $db->prepare("SELECT * FROM userlogowanie JOIN games_users ON userlogowanie.ID = games_users.USER_ID JOIN games ON games_users.GAME_ID = games.ID WHERE userlogowanie.ID = ?;");
$q->bind_param("s", $_COOKIE['current_user']);
$q->execute();
$result = $q->get_result();
$gameROWS = $result->fetch_all(MYSQLI_ASSOC);
foreach ($gameROWS as $ROW) {
    echo $ROW['TITLE']."<br><br>";
    echo "<img src=".$ROW['LOGO_URL']."><br><br>";
}

?>
    </div>
</main>
</body>
</html>