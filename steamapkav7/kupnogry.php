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
            if(isset($_POST['submit']) && isset($_COOKIE['current_user'])) {
                $gra = $_POST['submit'];
                $ciastko = $_COOKIE['current_user'];
                echo "Pomyślnie zakupiono grę";
                $conn = mysqli_connect("localhost", "root", "", "steam");
                $kwerenda = "INSERT INTO games_users (ID, USER_ID, GAME_ID) VALUES (NULL, $ciastko, $gra);";
                mysqli_query($conn, $kwerenda);
                mysqli_close($conn);
            }
            else {
                //echo "<script>alert('Proszę się zalogować aby kupić grę!')</script>";
                header("Location: logowanie.php");
            }

        ?>
    </main>
</body>
</html>