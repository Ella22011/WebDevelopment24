<?php
session_start();
include "./connect.php"; // Sisällytetään tietokantayhteyden määrittely

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../pages/login.php");
    exit;
}