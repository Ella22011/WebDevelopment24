<?php


$servername = $config['palvelin'];
$username = $config['tunnus'];
$password = $config['pass'];
$dbname = $config['tk'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (empty($_POST["fName"]) || empty($_POST["lName"]) || empty($_POST["email"]) || empty($_POST["donationAmount"])) {
        die("All fields are required.");
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO donations (fName, lName, email, monthlyDonation, paymentMethod) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdd", $fName, $lName, $email, $monthlyDonation, $paymentMethod);

    // Set parameters and execute
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $monthlyDonation = isset($_POST["monthlyDonation"]) ? $_POST["monthlyDonation"] : null;
    $paymentMethod = $_POST["paymentMethod"];

    if ($stmt->execute()) {
        echo "Thank you for your donation!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
