<?php

// this is the procedural not the OOP, it is preferred to use OOP.

$servername = "localhost";
$username = "root";
$password = "";
$database = "aitmoviesdb";

$conn = mysqli_connect($servername, $username, $password, $database, "3307");  // 3307 is the port number for XAMPP. IN case you need to use the default port, you can remove the last parameter.
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connected successfully</br>";
// }



// $sql = "SELECT * FROM login";
// if (mysqli_query($conn, $sql)) {
//     echo "Table login found</br>";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// $sql = "SELECT * FROM actors";
// if (mysqli_query($conn, $sql)) {
//     echo "Table actors found</br>";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// $sql = "SELECT * FROM directors";
// if (mysqli_query($conn, $sql)) {
//     echo "Table directors found</br>";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// $sql = "SELECT * FROM movies";
// if (mysqli_query($conn, $sql)) {
//     echo "Table movies found</br>";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


// $sql = "SELECT id, username, password FROM login";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["id"] . " - Name: " . $row["username"] . " " . $row["password"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }