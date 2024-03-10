<?php

include "navbar.php";
//session_start(); // Ensure session is started
include "db_connect.php";

$rusername = $_SESSION['username'];
$rmovie = $_POST['rmovie'];
$rtitle = $_POST['rtitle'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$sql = $conn->prepare("INSERT INTO review (rusername, rmovie, rtitle, rating, review) VALUES (?, ?, ?, ?, ?)");

$sql->bind_param("sssis", $rusername, $rmovie, $rtitle, $rating, $review); // 'sssis' for string, string, string, integer, string

if ($sql->execute()) {
    echo "<h3> Review added successfully! </h3>";
    echo "</br><a href='javascript:history.go(-1)'>Back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}