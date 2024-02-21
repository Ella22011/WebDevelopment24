<?php
// Aloita istunto
session_start();

// Poista istuntomuuttujat
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);

// Päätä istunto
session_destroy();

// Ohjaa käyttäjä takaisin kirjautumissivulle
header("Location: ../pages/login.php");
exit;
?>