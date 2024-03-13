<?php

include 'navbar.php';
include 'db_connect.php'; // Make sure this file contains your database connection

$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

$moviesSql = "SELECT * FROM movies WHERE title LIKE ?";
$genreSql = "SELECT * FROM movies WHERE genre LIKE ?";
$actorsfSql = "SELECT * FROM actors WHERE fname LIKE ?";
$actorslSql = "SELECT * FROM actors WHERE lname LIKE ?";
$directorsfSql = "SELECT * FROM directors WHERE fname LIKE ?";
$directorslSql = "SELECT * FROM directors WHERE lname LIKE ?";

$results = ['movies' => [], 'actors' => [], 'directors' => []];

function searchTable($conn, $sql, $searchTerm, &$results, $table)
{
    if ($stmt = $conn->prepare($sql)) {
        $term = "%$searchTerm%";
        $stmt->bind_param("s", $term); // Ensure that this line is correctly formatted
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $results[$table][] = $row;
        }
        $stmt->close();
    }
}

searchTable($conn, $moviesSql, $searchTerm, $results, 'movies');
searchTable($conn, $genreSql, $searchTerm, $results, 'movies');
searchTable($conn, $actorsfSql, $searchTerm, $results, 'actors');
searchTable($conn, $actorslSql, $searchTerm, $results, 'actors');
searchTable($conn, $directorsfSql, $searchTerm, $results, 'directors');
searchTable($conn, $directorslSql, $searchTerm, $results, 'directors');

// HTML to display results
echo "<div class='container mt-5'>";
echo "<h2>Search Results for '$searchTerm'</h2>";

// Display movie results
echo "<h3>Movies</h3>";
foreach ($results['movies'] as $movie) {
    echo "<H3><a href='movie_info.php?title=" . urlencode($movie['title']) . "'><img src='" . htmlspecialchars($movie['poster']) . "' alt='Movie Poster' style='width: 100px; height: auto;'><a href='movie_info.php?title=" . urlencode($movie['title']) . "'>" . htmlspecialchars($movie['title']) . "</a></H3>";
}

// Display Actor results
echo "<h3>Actors</h3>";
foreach ($results['actors'] as $actor) {
    echo "<H3><a href='actor_profile.php?fname=" . urlencode($actor['fname']) . "&lname=" . urlencode($actor['lname']) . "'>" . htmlspecialchars($actor['fname']) . " " . htmlspecialchars($actor['lname']) . "</a></H3>";
}

// Display Director results
echo "<h3>Directors</h3>";
foreach ($results['directors'] as $director) {
    echo "<H3><a href='director_profile.php?fname=" . urlencode($director['fname']) . "&lname=" . urlencode($director['lname']) . "'>" . htmlspecialchars($director['fname']) . " " . htmlspecialchars($director['lname']) . "</a></H3>";
}

echo "</div>";
