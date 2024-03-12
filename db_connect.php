<?php

// this is the procedural not the OOP, it is preferred to use OOP.

$servername = "localhost";
$username = "root";
$password = "";
$database = "aitmoviesdb";

$conn = mysqli_connect($servername, $username, $password, $database, "3307");  // 3307 is the port number for XAMPP. IN case you need to use the default port, you can remove the last parameter.