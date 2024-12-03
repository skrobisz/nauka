<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kupnogry.css">
    <link rel="shortcut icon" href="https://store.steampowered.com/favicon.ico" />
    <title>Kupno</title>
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
        <?php
            //$kupionagra = $_GET('submit');
            //$conn = mysqli_connect("localhost", "root", "", "steam");
            //$kwerenda1 = "SELECT * FROM userlogowanie JOIN games_users ON userlogowanie.ID = games_users.USER_ID JOIN games ON games_users.GAME_ID = games.ID WHERE userlogowanie.ID = ?;";
            //$kwerenda2 = "INSERT INTO games_users (ID, USER_ID, GAME_ID) VALUES (NULL, ".$_COOKIE['current_user'].", '$kupionagra'); SELECT * FROM games;";
            //$result1 = $conn->query(query: $kwerenda2);
            //while($row = $result1->fetch_row()) {
                    //echo "Pomyślnie kupiono: $row[5]";
                //}
        ?>
    </main>
</body>
</html>