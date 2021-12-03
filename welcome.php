<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body bgcolor="#e9f5fb" align="center" >
    <h1>Welcome, <?php session_start(); echo $_SESSION['userName']; ?> </h1>
    <h2>Login Successfull</h2>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php

    if( !isset($_SESSION['userName'])){
        header("location:index.php");
    }
?>
