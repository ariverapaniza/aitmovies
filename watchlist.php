<?php

include 'navbar.php';
include 'db_connect.php';

if (isset($_POST['add_to_watchlist'])) {
    $movieTitle = $_POST['movie_title'];
    $username = $_SESSION['username'];

    $stmt = $conn->prepare("INSERT INTO watchlist (watchlist, wusername, wmovie) VALUES (1, ?, ?)");
    $stmt->bind_param("ss", $username, $movieTitle);
    $stmt->execute();
    $stmt->close();


    echo 'Success';
    exit;
}
