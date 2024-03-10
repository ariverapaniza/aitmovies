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


echo '<br><br><div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><H3> Register Successful!</H3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div>';
echo "Username: " . $username . "<br>";
//echo password_hash($password, PASSWORD_DEFAULT) . "<br>";
echo "Password: " . $password . "<br>";
echo "Password Hashed: " . $passwordHashed . "<br>";



echo "<a href='javascript:history.go(-1)'>Back</a>";

$sqlTemp->close();

$conn->close();
