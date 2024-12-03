<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_sklep.css">
    <link rel="shortcut icon" href="https://store.steampowered.com/favicon.ico" />
    <title>Witamy na Steam</title>
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
        $conn = mysqli_connect("localhost", "root", "", "steam");
        $sql = "SELECT * FROM `games`;";
        $result = $conn->query(query: $sql);
        while ($row = $result -> fetch_array()) {
            echo $row[5]."<br><br>";
            echo "<form action='kupnogry.php' method='get'>";
            echo "<input type='submit' name='submit' value='$row[0]'"."<br><br>";
            echo "</form>";
            echo "<img src=".$row[6].">"."<br>";
            echo "Data wydania: $row[8]"."<br><br>";
        }
        $conn -> close();
        ?>
        </div>
    </main>
</body>
</html>