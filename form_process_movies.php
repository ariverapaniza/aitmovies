<?php

include "navbar.php";
include "db_connect.php";

// Function to upload image and return the file path
function uploadImage($imageField)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES[$imageField]["name"]);
    if (move_uploaded_file($_FILES[$imageField]["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return null;
    }
}

// Upload images and get their paths
$poster = uploadImage('poster');
$image1 = uploadImage('image1');
$image2 = uploadImage('image2');
$image3 = uploadImage('image3');
$image4 = uploadImage('image4');

// Prepare SQL statement with placeholders for movie data and image paths
$sqlTemp = $conn->prepare("INSERT INTO movies (title, length, genre, classification, releaseyear, language, productioncompany, description, trailer, poster, image1, image2, image3, image4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

// Bind parameters to the prepared statement
$sqlTemp->bind_param("ssssssssssssss", $title, $length, $genre, $classification, $releaseyear, $language, $productioncompany, $description, $trailer, $poster, $image1, $image2, $image3, $image4);

// Assign values from POST data to variables
$title = $_POST['title'];
$length = $_POST['length'];
$genre = $_POST['genre'];
$classification = $_POST['classification'];
$releaseyear = $_POST['releaseyear'];
$language = $_POST['language'];
$productioncompany = $_POST['productioncompany'];
$description = $_POST['description'];
$trailerURL = $_POST['trailer'];

// Extract the YouTube video ID from the URL
parse_str(parse_url($trailerURL, PHP_URL_QUERY), $youtubeParams);
if (isset($youtubeParams['v'])) {
    $trailer = $youtubeParams['v'];
} else {
    $trailer = ''; // Or handle this case as you see fit
}

// Execute the prepared statement
$sqlTemp->execute();

// Output confirmation and entered data
echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center"></br><h3>Movie Successfully Added!</h3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </br></br></br>';
echo "Title: " . $title . "<br>";
echo "Length: " . $length . "<br>";
echo "Genre: " . $genre . "<br>";
echo "Classification: " . $classification . "<br>";
echo "Release Year: " . $releaseyear . "<br>";
echo "Language: " . $language . "<br>";
echo "Production Company: " . $productioncompany . "<br>";
echo "Description: " . $description . "<br>";
echo "Trailer: " . $trailer . "<br>";
if ($poster) echo "Poster: " . $poster . "<br>";
if ($image1) echo "Image 1: " . $image1 . "<br>";
if ($image2) echo "Image 2: " . $image2 . "<br>";
if ($image3) echo "Image 3: " . $image3 . "<br>";
if ($image4) echo "Image 4: " . $image4 . "<br>";

echo "<a href='javascript:history.go(-1)'>Back</a></div>
        </div>
    </div>";

// Close the statement and the connection
$sqlTemp->close();
$conn->close();
