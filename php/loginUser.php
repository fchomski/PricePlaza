<?php

session_start();

$email = "";
$password = "";

function connectToDB() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pplaza";

    $con = mysqli_connect($host, $user, $pass, $db);

    return $con;
}
$conn = connectToDB();

if(isset($_POST['reg_user']))

// User login 
if (isset($_POST['login_user'])) { 
      
    // Data sanitization to prevent SQL injection 
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $password = mysqli_real_escape_string($db, $_POST['password']); 
   
    // Error message if the input field is left blank 
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    } 
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    } 
   
    // Checking for the errors 
    if (count($errors) == 0) { 
          
        // Password matching 
        $password = md5($password); 
          
        $query = "SELECT * FROM users WHERE username= 
                '$username' AND password='$password'"; 
        $results = mysqli_query($db, $query); 
   
        // $results = 1 means that one user with the 
        // entered username exists 
        if (mysqli_num_rows($results) == 1) { 
              
            // Storing username in session variable 
            $_SESSION['username'] = $username; 
              
            // Welcome message 
            $_SESSION['success'] = "You have logged in!"; 
              
            // Page on which the user is sent 
            // to after logging in 
            header('location: index.php'); 
        } 
        else { 
              
            // If the username and password doesn't match 
            array_push($errors, "Username or password incorrect");  
        } 
    } 
} 

$conn -> close();

function validateUser() {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = connectToDB();

    if($conn) {
        echo '<script>alert("The Database has been connected to!")</script>'; 
        $sql = "SELECT * FROM User WHERE email = " . $email . ", password = " . $password;
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) == 0) { 
            echo "Invalid email or password. Try again :)";
        }
        $conn -> close();
    }
}

?>