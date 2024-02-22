<?php
// Tarkistaa, onko käyttäjä kirjautunut sisään
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    
    $stmt = $yhteys->prepare("SELECT fName, lName, email, username FROM users WHERE user_id = ?");// Hakee käyttäjän tiedot tietokannasta
    $stmt->bind_param("i", $_SESSION['user_id']); //bind_param() -metodi määrittelee, mitkä arvot korvaavat valmistellun lauseen parametrit.
                                                  //i tarkoittaa, että arvo on kokonaisluku (integer)
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    
    echo '<p>First Name: ' . $user['fName'] . '</p>'; //
    echo '<p>Last Name: ' . $user['lName'] . '</p>';
    echo '<p>Email: ' . $user['email'] . '</p>';
    echo '<p>Username: ' . $user['username'] . '</p>';
}
?>
