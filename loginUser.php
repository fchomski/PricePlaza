<?php

//Redirects to site_home once user is created
header( 'Location: site_home.html' );

function connectToDB() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pplaza";

    $con = mysqli_connect($host, $user, $pass, $db);

    return $con;
}

function validateUser() {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = connectToDB();

    if($conn) {
        echo '<script>alert("The Database has been connected to!")</script>'; 
        $sql = "SELECT * FROM User WHERE email = " . $email . ", password = " . $password;
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) == 0) { 
            echo '<script>window.alert("Invalid email or password. Try again.");</script>';
        }
        $conn -> close();
    }
}

validateUser();

?>