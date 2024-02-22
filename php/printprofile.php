<?php
// Tarkista, onko käyttäjä kirjautunut sisään
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Hae käyttäjän tiedot tietokannasta
    // Voit käyttää samaa tietokantayhteyttä connect.php-tiedostosta
    $stmt = $yhteys->prepare("SELECT fName, lName, email, username FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Näytä käyttäjän tiedot lomakkeella, jotta niitä voi muokata
    echo '
    <label for="fName">First Name:</label><br>
    <input type="text" id="fName" name="fName" value="' . $user['fName'] . '"><br>
    <label for="lName">Last Name:</label><br>
    <input type="text" id="lName" name="lName" value="' . $user['lName'] . '"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="' . $user['email'] . '"><br><br>
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value="' . $user['username'] . '" readonly><br>
    <input type="submit" value="Save Changes">';
}
?>
