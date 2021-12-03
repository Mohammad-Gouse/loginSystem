<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <form action="" method="post">
                <h1>Login</h1>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

</body>

</html>

<?php

// Variables
$servername = "localhost";
$username = "root";
$password = "";
$database = "loginSystem";

// creating a connection to database
$connect = new mysqli($servername, $username, $password, $database);

// Now lets check the connection
if ($connect->error) {
    die("Connection failed: " . $connect->connect_error);
    // The die() is an inbuilt function, it is used to print message and exit from the current php
}
// echo "Connected Successfully<br>";

//session is super global variable
//session variables stores user information to be used across multiple pages
session_start();

if (isset($_SESSION['userName'])) {
    header("location: welcome.php");
}


//isset is used to check whether the variable is set or not
if (isset($_POST['username'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select * from loginTable where user_name = '$user' and user_password = '$pass' ";
    $result = mysqli_query($connect, $sql);
    // print_r($result);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // print_r($row);

        $_SESSION['userName'] = $row['user_name'];
        header("location: welcome.php");
    } else {
        echo "<script>alert('Incorrect username or Password')</script>";
    }
}



?>