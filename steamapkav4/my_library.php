<?php
session_start();
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "login")
?>
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
<div id="logo">
<img src="https://store.fastly.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" height="100px" width="200px">
</div>
<?php
    $db = new mysqli("localhost", "root", "", "steam");
echo "<p id='przywitanie'>Witaj użytkowniku numer ".$_COOKIE['current_user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
?>
<div id="main">
<section id="left">
<?php
$q = $db->prepare("SELECT * FROM userlogowanie JOIN games_users ON userlogowanie.ID = games_users.USER_ID JOIN games ON games_users.GAME_ID = games.ID WHERE userlogowanie.ID = ?;");
$q->bind_param("s", $_COOKIE['current_user']);
$q->execute();
$result = $q->get_result();
$gameROWS = $result->fetch_all(MYSQLI_ASSOC);
foreach ($gameROWS as $ROW) {
    echo $ROW['TITLE']."<br>";
}
?>
</section>
<section id="right">
<?php
$db = new mysqli("localhost", "root", "", "steam");
$q = $db->prepare("SELECT * FROM userlogowanie JOIN games_users ON userlogowanie.ID = games_users.USER_ID JOIN games ON games_users.GAME_ID = games.ID WHERE userlogowanie.ID = ?;");
$q->bind_param("s", $_COOKIE['current_user']);
$q->execute();
$result = $q->get_result();
$gameROWS = $result->fetch_all(MYSQLI_ASSOC);
foreach ($gameROWS as $ROW) {
    echo "<img src=".$ROW['LOGO_URL'].">";
}
?>
</section>
</div>
</body>
</html>