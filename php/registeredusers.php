<?php
// Yhdistä tietokantaan
include("./connect.php");

// Hae rekisteröityneet käyttäjätietokannasta
$sql = "SELECT * FROM users";
$result = mysqli_query($yhteys, $sql);

// Tulosta HTML-taulukko rekisteröityneistä käyttäjistä
echo "<h2>Registered Users</h2>";
echo "<table border='1'>";
echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['fName']}</td><td>{$row['lName']}</td><td>{$row['email']}</td><td>{$row['username']}</td></tr>";
}
echo "</table>";

// Sulje tietokantayhteys
mysqli_close($yhteys);
?>