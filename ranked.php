<?php

$movieSql = "SELECT m.*, MAX(r.rating) as max_rating FROM movies m 
             INNER JOIN review r ON m.title = r.rmovie 
             WHERE r.rating >= 3
             GROUP BY m.title";

$movies = [];

if ($stmt = $conn->prepare($movieSql)) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    $stmt->close();
}

echo '<div class="container mt-5">
    <div id="rankedMoviesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">';

$first = true;
$counter = 0;
foreach ($movies as $movie) {
    if ($counter % 4 == 0) {
        if ($counter > 0) {
            echo '</div></div>';
        }
        echo '<div class="carousel-item ' . ($first ? 'active' : '') . '"><div class="d-flex">';
        $first = false;
    }
    echo '<div class="card" style="width: 18rem; flex: 0 0 auto;">
            <a href="movie_info.php?title=' . urlencode($movie['title']) . '">
                <img src="' . htmlspecialchars($movie['poster']) . '" class="card-img-top" alt="Movie Poster" style="height: 400px; object-fit: contain;">
            </a>
          </div>';
    $counter++;
}
if ($counter % 4 !== 0 || $counter == 4) {
    echo '</div></div>';
}

echo '    </div>
        <a class="carousel-control-prev" href="#rankedMoviesCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#rankedMoviesCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>';

echo '
<style>
    .carousel-item .d-flex {
        justify-content: start;
        overflow-x: auto;
    }

    .carousel-item .card {
        margin-right: 10px;
    }
</style>


<script>
    $(document).ready(function() {
        $("#rankedMoviesCarousel").carousel({
            interval: 3000
        });
    });
</script>
';
