<?php
session_start();
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "login")
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje gry</title>
</head>
<body>
<style>
    body {
        background-color: grey;
        text-align: center;
        font-family: arial;
    }

    #header {
        background-color: black;
        color: white;
        font-size: 40px;
    }
</style>
<h1 id="header">Twoje gierki:</h1>
</body>
</html>
<?php
    $db = new mysqli("localhost", "root", "", "steam");
echo "<p >Witaj użytkowniku numer ".$_COOKIE['current_user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
$q = $db->prepare("SELECT * FROM userlogowanie JOIN games_users ON userlogowanie.ID = games_users.USER_ID JOIN games ON games_users.GAME_ID = games.ID WHERE userlogowanie.ID = ?;");
$q->bind_param("s", $_COOKIE['current_user']);
$q->execute();

$result = $q->get_result();
$gameROWS = $result->fetch_all(MYSQLI_ASSOC);
foreach ($gameROWS as $ROW) {
    echo $ROW['TITLE']."<br>";
}
?>