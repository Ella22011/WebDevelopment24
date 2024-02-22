<?php
session_start();
include "./connect.php"; // Sisällytetään tietokantayhteyden määrittely

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../pages/login.php");
    exit;
}

// Tarkista, että kaikki tarvittavat kentät on täytetty
if (empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['email']) || empty($_POST['username'])) {
    echo "Kaikki kentät ovat pakollisia!";
    exit;
}

// Päivitä käyttäjän tiedot tietokantaan
$stmt = $yhteys->prepare("UPDATE users SET fName=?, lName=?, email=?, username=? WHERE user_id=?");
$stmt->bind_param("ssssi", $_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['username'], $_SESSION['user_id']);
$stmt->execute();

echo "Tiedot päivitetty onnistuneesti!";
?>