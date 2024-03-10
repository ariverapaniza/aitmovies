<?php

include "navbar.php";
include "db_connect.php";

$sqlTemp = $conn->prepare("INSERT INTO login (username, password, fname, lname, email, address) VALUES (?,?,?,?,?,?)");

$sqlTemp->bind_param("ssssss", $username, $passwordHashed, $fname, $lname, $email, $address);

$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

$sqlTemp->execute();



echo "Username: " . $username . "<br>";
//echo password_hash($password, PASSWORD_DEFAULT) . "<br>";
echo "Password: " . $password . "<br>";
echo "Password Hashed: " . $passwordHashed . "<br>";



echo "<a href='javascript:history.go(-1)'>Back</a>";

$sqlTemp->close();

$conn->close();
