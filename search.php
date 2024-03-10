<?php

include 'navbar.php';
include 'db_connect.php'; // Make sure this file contains your database connection

$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

$moviesSql = "SELECT * FROM movies WHERE title LIKE ?";
// $actorsSql = "SELECT * FROM actors WHERE name LIKE ?";
// $directorsSql = "SELECT * FROM directors WHERE name LIKE ?";

$results = ['movies' => []]; //, 'actors' => [], 'directors' => []

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
// searchTable($conn, $actorsSql, $searchTerm, $results, 'actors');
// searchTable($conn, $directorsSql, $searchTerm, $results, 'directors');

// HTML to display results
echo "<div class='container mt-5'>";
echo "<h2>Search Results for '$searchTerm'</h2>";

// Display movie results
echo "<h3>Movies</h3>";
foreach ($results['movies'] as $movie) {
    echo "<p><a href='movie_info.php?title=" . urlencode($movie['title']) . "'>" . htmlspecialchars($movie['title']) . "</a></p>";
}

// Add similar sections for actors and directors if needed

echo "</div>";