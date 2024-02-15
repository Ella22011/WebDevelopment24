<?php

// Yhdistä tietokantaan
    include("./connect.php");

        $fName=isset($_POST["fName"]) ? $_POST["fName"] :"";
        $lName=isset($_POST["lName"]) ? $_POST["lName"] :"";
        $email=isset($_POST["email"]) ? $_POST["email"] :"";
        $username=isset($_POST["username"]) ? $_POST["username"] : 0;
        $password=isset($_POST["password"]) ? $_POST["password"] :"";

        $sql="insert into users (fName, lName, email, username, password) values (?, ?, ?, ?, ?)";

        $stmt=mysqli_prepare($yhteys, $sql);

        mysqli_stmt_bind_param($stmt, 'sssss', $fName, $lName, $email, $username, $password);

        mysqli_stmt_execute($stmt);

        mysqli_close($yhteys);

        header("Location:../pages/thankyou.html");

        exit;
    

?>