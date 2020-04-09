<?php

$id = $name = $price = $rating = $description = $priceHistoryID = "";

function connectToDB() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pplaza";

    $con = mysqli_connect($host, $user, $pass, $db);

    return $con;
}

function displayData() {
    $conn = connectToDB();

    if($conn) { 
        $sql = "SELECT * FROM products";
        $query = mysqli_query($conn, $sql);  
        if($query == false) 
            echo "Error! " . $conn -> error;
        
        
    }
}

?>