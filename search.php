<?php

include 'navbar.php';
include 'db_connect.php'; // Make sure this file contains your database connection

$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

$moviesSql = "SELECT * FROM movies WHERE title LIKE ?";
$genreSql = "SELECT * FROM movies WHERE genre LIKE ?";
//$actorsSearchSql = "SELECT * FROM actors WHERE id LIKE ?";
// $actorsfSql = "SELECT * FROM actors WHERE fname LIKE ?";
// $actorslSql = "SELECT * FROM actors WHERE lname LIKE ?";
$actorsSql = "SELECT actorid, fname, lname, photo FROM actors WHERE CONCAT(fname, ' ', lname) LIKE ?";
// $directorsfSql = "SELECT * FROM directors WHERE fname LIKE ?";
// $directorslSql = "SELECT * FROM directors WHERE lname LIKE ?";
$directorsSql = "SELECT directorid, fname, lname, photo FROM directors WHERE CONCAT(fname, ' ', lname) LIKE ?";

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
//searchTable($conn, $actorsSearchSql, $searchTerm, $results, 'actors');
// searchTable($conn, $actorsfSql, $searchTerm, $results, 'actors');
// searchTable($conn, $actorslSql, $searchTerm, $results, 'actors');
searchTable($conn, $actorsSql, $searchTerm, $results, 'actors');
// searchTable($conn, $directorsfSql, $searchTerm, $results, 'directors');
// searchTable($conn, $directorslSql, $searchTerm, $results, 'directors');
searchTable($conn, $directorsSql, $searchTerm, $results, 'directors');

// HTML to display results
echo "<div class='container mt-5'>";
echo "<h2>Search Results for '$searchTerm'</h2>";

// Display movie results
echo "<h3>Movies</h3></br>";
foreach ($results['movies'] as $movie) {
    echo "<H3><a href='movie_info.php?title=" . urlencode($movie['title']) . "'><img src='" . htmlspecialchars($movie['poster']) . "' alt='Movie Poster' style='width: 100px; height: auto;'><a href='movie_info.php?title=" . urlencode($movie['title']) . "'>" . htmlspecialchars($movie['title']) . "</a></H3>";
}

// Display Actor results
echo "</br><h3>Actors</h3></br>";
foreach ($results['actors'] as $actor) {
    echo "<h3><a href='actor_profile.php?actorid=" . $actor['actorid'] . "'><img src='" . htmlspecialchars($actor['photo']) . "' alt='Actor Photo' style='width: 100px; height: auto;'><a href='actor_profile.php?actorid=" . $actor['actorid'] . "'>" . htmlspecialchars($actor['fname']) . " " . htmlspecialchars($actor['lname']) . "</a>
</h3>";
}

// Display Director results
echo "</br><h3>Directors</h3></br>";
foreach ($results['directors'] as $director) {
    echo "<h3><a href='director_profile.php?directorid=" . $director['directorid'] . "'><img src='" . htmlspecialchars($director['photo']) . "' alt='Director Photo' style='width: 100px; height: auto;'><a href='director_profile.php?directorid=" . $director['directorid'] . "'>" . htmlspecialchars($director['fname']) . " " . htmlspecialchars($director['lname']) . "</a>
</h3>";
}

echo "</div>";