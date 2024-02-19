<?php

// Yhdistä tietokantaan
    include("./connect.php");

    //Haetaan käyttäjän tiedot
        $fName=isset($_POST["fName"]) ? $_POST["fName"] :"";
        $lName=isset($_POST["lName"]) ? $_POST["lName"] :"";
        $email=isset($_POST["email"]) ? $_POST["email"] :"";
        $username=isset($_POST["username"]) ? $_POST["username"] : 0;
        $password=isset($_POST["password"]) ? $_POST["password"] :"";

    //Määritellään talun nimi ja kentät, joihin halutaan lisätä tiedot

        $sql="insert into users (fName, lName, email, username, password) values (?, ?, ?, ?, ?)";

        $stmt=mysqli_prepare($yhteys, $sql);

        //Liitetään muuttujien arvot valmisteltuun lausekkeeseen

        mysqli_stmt_bind_param($stmt, 'sssss', $fName, $lName, $email, $username, $password);

        mysqli_stmt_execute($stmt);

        mysqli_close($yhteys);

        header("Location:../pages/login.html");

        exit;
    

?>