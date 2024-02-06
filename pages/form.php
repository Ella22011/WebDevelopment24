<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (empty($_POST["fName"]) || empty($_POST["lName"]) || empty($_POST["email"]) || empty($_POST["donationAmount"])) {
        die("All fields are required.");
    }

    $servername = "localhost";
    $username = "trtkp23_15";
    $password = "nKudfqeT";
    $dbname = "web_trtkp23_1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO donations (first_name, last_name, email, donation_amount, monthly_donation, payment_method) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdss", $first_name, $last_name, $email, $donation_amount, $monthly_donation, $payment_method);

    // Set parameters and execute
    $first_name = $_POST["fName"];
    $last_name = $_POST["lName"];
    $email = $_POST["email"];
    $donation_amount = $_POST["donationAmount"];
    $monthly_donation = isset($_POST["monthlyDonation"]) ? $_POST["monthlyDonation"] : null;
    $payment_method = $_POST["paymentMethod"];

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
