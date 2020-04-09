<?php

$fName = $lName = $email = $profileImg = "";

function connectToDB() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pplaza";

    $con = mysqli_connect($host, $user, $pass, $db);

    return $con;
}

function createNewUser() {
    $conn = connectToDB();

    if($conn) { 
        //If connection is successful, store entered values into the appropriate variables, preventing SQL injections
        $fName = mysqli_real_escape_string($conn, $_POST["fName"]);
        $lName =  mysqli_real_escape_string($conn, $_POST["lName"]);
        $email =  mysqli_real_escape_string($conn, $_POST["email"]);
        $password =  mysqli_real_escape_string($conn, $_POST["password"]);
        $profileImg =  mysqli_real_escape_string($conn, $_POST["profileImg"]);

        //Add user to database
        $sql = "INSERT INTO user(fName, lName, email, pwd, profileImg) VALUES ('$fName', '$lName', '$email', '$password', '$profileImg')";
        $query = mysqli_query($conn, $sql);  
        if($query == false) 
            echo "Error! " . $conn -> error;
            
        //Storing email + password of the logged in user in the session variable 
        $_SESSION['email'] = $email; 
        $_SESSION['password'] = $password;
            
        //Redirects to site home page once user is created
        header('location: ../site_home.html');  
        
    }
}
createNewUser();
?>
