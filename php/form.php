<?php
include("./connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validate form data
        $errors = array();
        $fName = $_POST["fName"] ?? '';
        $lName = $_POST["lName"] ?? '';
        $email = $_POST["email"] ?? '';
        $donation = $_POST["donation"] ?? '';
        $paymentMethod = $_POST["paymentMethod"] ?? '';
        $donationDate = $_POST["donationDate"] ?? '';

        if (empty($fName)) {
            $errors[] = "First name is required";
        }
        if (empty($lName)) {
            $errors[] = "Last name is required";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email address is required";
        }
        if (empty($donation) || !is_numeric($donation) || $donation <= 0) {
            $errors[] = "Valid donation amount is required";
        }
        if (empty($paymentMethod)) {
            $errors[] = "Payment method is required";
        }
        if (empty($donationDate)) {
            $errors[] = "Donation date is required";
        }

        if (empty($errors)) {
            // Prepare SQL statement
            $query = "INSERT INTO donations (first_name, last_name, email, donation_amount, payment_method, donation_date) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $yhteys->prepare($query);

            // Bind parameters
            $stmt->bind_param("ssssss", $fName, $lName, $email, $donation, $paymentMethod, $donationDate);

            // Execute statement
            if ($stmt->execute()) {
                echo "Thank you for your donation!";
            } else {
                echo "Error: Donation could not be processed.";
            }

            // Close statement
            $stmt->close();
        } else {
            // Display validation errors
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close database connection
mysqli_close($yhteys);
?>
