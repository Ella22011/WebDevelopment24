<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { // Tarkistaa, onko käyttäjä kirjautunut sisään
    
    $stmt = $yhteys->prepare("SELECT fName, lName, email, username FROM users WHERE user_id = ?");// Hakee käyttäjän tiedot tietokannasta
    $stmt->bind_param("i", $_SESSION['user_id']); //bind_param() -metodi määrittelee, mitkä arvot korvaavat valmistellun lauseen parametrit.
                                                  //i tarkoittaa, että arvo on kokonaisluku (integer)
    $stmt->execute(); //suorittaa yllä olevan valmistellun kyselyn
    $result = $stmt->get_result(); // hakee kyselyn TULOKSET taulukosta (eli kaikki tiedot tietyltä user_id)
    $user = $result->fetch_assoc(); //tässä vielä noudetaan KÄYTTÄJÄN tiedot

    //lopuksi tulostetaan noudetut tiedot
    echo '<p>First Name: ' . $user['fName'] . '</p>'; //
    echo '<p>Last Name: ' . $user['lName'] . '</p>';
    echo '<p>Email: ' . $user['email'] . '</p>';
    echo '<p>Username: ' . $user['username'] . '</p>';
}
?>
