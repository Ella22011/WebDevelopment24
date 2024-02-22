<?php
// Tarkista, onko käyttäjä kirjautunut sisään
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Hae käyttäjän tiedot tietokannasta
    // Voit käyttää samaa tietokantayhteyttä connect.php-tiedostosta
    $stmt = $yhteys->prepare("SELECT fName, lName, email, username FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    
    echo '<p>First Name: ' . $user['fName'] . '</p>';
    echo '<p>Last Name: ' . $user['lName'] . '</p>';
    echo '<p>Email: ' . $user['email'] . '</p>';
    echo '<p>Username: ' . $user['username'] . '</p>';
}
?>
