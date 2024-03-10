<?php

include "navbar.php";
include "db_connect.php";

$sqlTemp = $conn->prepare("INSERT INTO directors (fname, lname, gender, description) VALUES (?,?,?,?)");

$sqlTemp->bind_param("ssss", $fname, $lname, $gender, $description);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$description = $_POST['description'];


$sqlTemp->execute();



echo "First Name: " . $fname . "<br>";
echo "Last Name: " . $lname . "<br>";
echo "Gender: " . $gender . "<br>";
echo "Description: " . $description . "<br>";



echo "<a href='javascript:history.go(-1)'>Back</a>";

$sqlTemp->close();

$conn->close();