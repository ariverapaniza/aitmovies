<?php

session_start(); // Start the session at the beginning
include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user by username only
$sqlLogin = "SELECT * FROM login WHERE username = ?";
$stmt = mysqli_prepare($conn, $sqlLogin);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$resultLogin = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultLogin)) {
    if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['admin'] = $row['admin']; // Store admin status in session

        // Redirect to login_successful.php
        header("Location: login_successful.php");
        exit();
    } else {
        // Password is not correct
        echo "Password Not Verified!<br>";
        header("Location: index.php?error=Incorrect password");
        exit();
    }
} else {
    // No user found with that username
    echo "0 results";
    header("Location: index.php?error=Incorrect username");
    exit();
}
