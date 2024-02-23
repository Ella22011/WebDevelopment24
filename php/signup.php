<?php
include("./connect.php"); // Yhdistää tietokantaan

session_start(); // Aloittaa uuden istunnon tai jatkaa olemassa olevaa istuntoa

// Hakee käyttäjän syöttämät tiedot lomakkeelta
$fName = isset($_POST["fName"]) ? $_POST["fName"] : "";
$lName = isset($_POST["lName"]) ? $_POST["lName"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

//isset($_POST["muuttujan_nimi"]), tarkistaa onko kyseistä muuttujaa lähetetty lomakkeen kautta,
// ja jos se on lähetetty, se palauttaa true, muuten false.

// Tarkistetaan, onko käyttäjänimi jo käytössä
$query = "SELECT * FROM users WHERE username=?";
$stmt = mysqli_prepare($yhteys, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "Käyttäjänimi on jo käytössä!"; // Jos käyttäjänimi on jo käytössä, tulostaa tämä virheilmoituksen

} else { // Käyttäjänimi on uniikki, lisää käyttäjän tietokantaan


    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Salaa salasanan ennen sen tallentamista tietokantaan

    // Määritetään SQL- eli tietokantakysely käyttäjän lisäämiseksi
    $sql = "INSERT INTO users (fName, lName, email, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($yhteys, $sql); // Valmistelee vielä SQL-lausekkeen

    // Sitoo muuttujien arvot valmisteltuun kyselyyn
    mysqli_stmt_bind_param($stmt, "sssss", $fName, $lName, $email, $username, $hashed_password);
    // "sssss" on merkkijono, joka määrittelee, millaisia parametreja sitoutetaan ja millaisia ne ovat.
    // Jokainen merkki vastaa aina yhtä parametria, ja tässä tapauksessa "s" tarkoittaa, että parametri on merkkijono (string).


    mysqli_stmt_execute($stmt); // Suoritaa kyselyn

    // Suljetaan lopuksi tietokantayhteys, jotta vähennetään resurssien käyttöä palvelimella ja voi parantaa yleistä suorituskykyä.
    mysqli_close($yhteys);

    // Kirjataan käyttäjä automaattisesti sisään
    $_SESSION['user'] = $username;

    // Ohjataan käyttäjä lahjoitus sivulle
    header("Location:../pages/donate.php");
    exit; //exit-funktiolla varmistetaan, että ohjaus tapahtuu ja mitään muuta koodia ei suoriteta tämän jälkeen.
}
?>

