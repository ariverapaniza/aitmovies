<?php

include "navbar.php";
include "db_connect.php";

// Function to upload image and return the file path
function uploadImage($imageField)
{
    $target_dir = "uploads/";
    // Check if the file is uploaded
    if (isset($_FILES[$imageField]) && $_FILES[$imageField]['error'] == 0) {
        $target_file = $target_dir . basename($_FILES[$imageField]["name"]);
        if (move_uploaded_file($_FILES[$imageField]["tmp_name"], $target_file)) {
            return $target_file;
        }
    }
    return null;
}

// Upload images and get their paths
$photo = uploadImage('photo');

$sqlTemp = $conn->prepare("INSERT INTO actors (fname, lname, gender, description, movie1, movie2, movie3, photo) VALUES (?,?,?,?,?,?,?,?)");

$sqlTemp->bind_param("ssssssss", $fname, $lname, $gender, $description, $movie1, $movie2, $movie3, $photo);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$description = $_POST['description'];
$movie1 = $_POST['movie1'];
$movie2 = $_POST['movie2'];
$movie3 = $_POST['movie3'];


$sqlTemp->execute();



echo "First Name: " . $fname . "<br>";
echo "Last Name: " . $lname . "<br>";
echo "Gender: " . $gender . "<br>";
echo "Description: " . $description . "<br>";
echo "Movie 1: " . $movie1 . "<br>";
echo "Movie 2: " . $movie2 . "<br>";
echo "Movie 3: " . $movie3 . "<br>";
echo "Photo: " . $photo;



echo "<a href='javascript:history.go(-1)'>Back</a>";

$sqlTemp->close();

$conn->close();
