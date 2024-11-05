<?php
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "login") {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    $db = new mysqli("localhost", "root", "", "steam");
    
    $q = $db->prepare("SELECT * FROM logowanie WHERE email = ? LIMIT 1");
    
    $q->bind_param("s", $email);
    
    $q->execute();
    
    $result = $q->get_result();
    
    $userROW = $result->fetch_assoc();
    if($userROW == null) {
        echo "Błędny email lub hasło <br>";
    } else {
        if(password_verify($password, $userROW['passwordHash'])) { 
            echo "Zalogowano poprawnie <br>";
        } else {
            echo "Błędny email lub hasło <br>";
        }
    }
}
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "register") {

    $db = new mysqli("localhost", "root", "", "steam");

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $passwordReapeat = $_REQUEST['passwordReapeat'];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if($password == $passwordReapeat) {
    $q = $db->prepare("INSERT INTO logowanie VALUES (NULL, ?, ?)");
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
<p>Zaloguj się</p>
<form action="index.php" method="get">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="passwordInput">Hasło:</label>
    <input type="password" name="password" id="passwordInput">
    <input type="hidden" name="action" value="login">
    <input type="submit" value="Zaloguj">   
</form>
<p>Zarejestruj się</p>
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