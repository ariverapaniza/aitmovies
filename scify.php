<?php
include "navbar.php";
include "db_connect.php"; // Include your database connection

$genre = 'Science-Fiction';
$genreSql = "SELECT * FROM movies WHERE genre = ?";
$movies = [];

if ($stmt = $conn->prepare($genreSql)) {
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    $stmt->close();
}

echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center"></br><h3>Science-Fiction Genre!</h3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div></br></br></br>';

echo '<div class="container">
        <div class="row justify-content-center">';

foreach ($movies as $movie) {
    $description = $movie['description'];
    $maxWords = 10;
    $words = explode(' ', $description);

    if (count($words) > $maxWords) {
        $excerpt = implode(' ', array_slice($words, 0, $maxWords)) . '...';
        $readMoreLink = '<a href="movie_info.php?title=' . urlencode($movie['title']) . '" class="read-more-link">Read more</a>';
        $fullDescription = '<span class="full-description" style="display:none;">' . htmlspecialchars($description) . '</span>';
    } else {
        $excerpt = $description;
        $readMoreLink = '';
        $fullDescription = '';
    }


    echo '<div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <a href="movie_info.php?title=' . urlencode($movie['title']) . '">
                <img src="' . htmlspecialchars($movie['poster']) . '" class="card-img-top" alt="..." style="height: 200px; object-fit: contain;">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><a href="movie_info.php?title=' . urlencode($movie['title']) . '">' . htmlspecialchars($movie['title']) . '</a></h5>
                    <p class="card-text">' . htmlspecialchars($excerpt) . $readMoreLink . $fullDescription . '</p>
                </div>
            </div>
        </div>';
}

echo '</div>
    </div>';
