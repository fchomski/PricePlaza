<?php

function openConnection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "price_plaza_db";

    $con = mysqli_connect($host, $user, $pass, $db);

    if($con) 
        echo "Connected successfully to the PricePlaza Database :)";
    $sql = "INSERT INTO user(fName, lName, email, pwrd, profileImg) VALUES ('Florencia', 'Chomski', 'fchomski@hotmail.ca', 'password')";
    $query = mysqli_query($con, $sql);
    if($query) 
        echo "Data inserted successfully!";
}

?>
