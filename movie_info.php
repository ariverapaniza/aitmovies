<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
    include 'navbar.php';
    //include 'head.php';
    include 'db_connect.php';
    $movieTitle = $_GET['title'] ?? '';

    $sql = "SELECT * FROM movies WHERE title = ?";
    $title = 'Unknown Title';
    $genre = 'Unknown Genre';
    $classification = 'Unknown Classification';
    $length = 'Unknown Length';
    $releaseyear = 'Unknown Release Year';
    $language = 'Unknown Language';
    $productioncompany = 'Unknown Production Company';
    $description = 'Unknown Description';
    $trailer = 'Unknown Trailer';
    $poster = '';  // added this line
    $images = [];

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $movieTitle);
        $stmt->execute();
        $result = $stmt->get_result();
        $movie = $result->fetch_assoc();

        if ($movie) {

            $title = $movie['title'];
            $genre = $movie['genre'];
            $classification = $movie['classification'];
            $length = $movie['length'];
            $releaseyear = $movie['releaseyear'];
            $language = $movie['language'];
            $productioncompany = $movie['productioncompany'];
            $description = $movie['description'];
            $trailer = $movie['trailer'];
            $poster = $movie['poster'];  // added this line
            // Fetch images
            for ($i = 1; $i <= 4; $i++) {
                if (!empty($movie['image' . $i])) {
                    $images[] = $movie['image' . $i];
                }
            }
        }
        $stmt->close();
    }
    ?>

    <title><?php echo htmlspecialchars($title); ?> - Movie Details</title>

</head>

<body>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1><?php echo htmlspecialchars($title); ?></h1>
            </div>
            <div class="col-md-2">
                <h4>Genre: <?php echo htmlspecialchars($genre); ?></h4>
            </div>
            <div class="col-md-2">
                <form method="post" class="add-to-watchlist-form">
                    <input type="hidden" name="movie_title" value="<?php echo htmlspecialchars($movieTitle); ?>">
                    <button type="button" class="btn btn-primary btn-add-to-watchlist">Add to Watchlist</button>
                </form>
            </div>
        </div>



        <!-- Row for Poster and Carousel -->
        <div class="row mb-4 poster-carousel-row">
            <!-- Poster Column (30%) -->
            <div class="col-md-4 poster-container">
                <?php if ($poster) : ?>
                <img src="<?php echo htmlspecialchars($poster); ?>" class="img-fluid" alt="Movie Poster">
                <?php endif; ?>
            </div>

            <!-- Carousel Column (70%) -->
            <div class="col-md-8">
                <div id="movieCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <?php foreach ($images as $index => $image) : ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo htmlspecialchars($image); ?>" class="d-block w-100" alt="Movie Image">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#movieCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#movieCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-3">
                <h5>Classification: <?php echo htmlspecialchars($classification); ?></h5>
            </div>
            <div class="col-md-3">
                <h5>Length: <?php echo htmlspecialchars($length); ?></h5>
            </div>
            <div class="col-md-3">
                <h5>Release Date: <?php echo htmlspecialchars($releaseyear); ?></h5>
            </div>
            <div class="col-md-3">
                <h5>Language: <?php echo htmlspecialchars($language); ?></h5>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <h5>Production Company: <?php echo htmlspecialchars($productioncompany); ?></h5>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <h6>Description: <?php echo htmlspecialchars($description); ?></h6>
            </div>
        </div>

        <!-- Actors in this movie -->
        <div class="container mt-4">
            <h2>Actors in this Movie</h2>
            <div class="row">
                <?php
                // Query to get actors who acted in this movie
                $actorQuery = "SELECT * FROM actors WHERE movie1 = ? OR movie2 = ? OR movie3 = ?";
                $actorStmt = $conn->prepare($actorQuery);
                $actorStmt->bind_param("sss", $movieTitle, $movieTitle, $movieTitle);
                $actorStmt->execute();
                $actorResult = $actorStmt->get_result();

                if ($actorResult->num_rows > 0) {
                    while ($actorRow = $actorResult->fetch_assoc()) {
                        echo "<div class='col-md-4 text-center'>";
                        echo "<img src='" . htmlspecialchars($actorRow['photo']) . "' class='img-fluid' alt='Actor Image' style='height: 200px; object-fit: contain;'>";
                        echo "<h5>" . htmlspecialchars($actorRow['fname']) . " " . htmlspecialchars($actorRow['lname']) . "</h5>";
                        echo "<a href='actor_profile.php?actorid=" . $actorRow['actorid'] . "' class='btn btn-primary'>View Profile</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No actors available for this movie.</p>";
                }
                $actorStmt->close();
                ?>
            </div>
        </div>

        <!-- Directors in this movie -->
        <div class="container mt-4">
            <h2>Directors in this Movie</h2>
            <div class="row">
                <?php
                // Query to get directors who acted in this movie
                $directorQuery = "SELECT * FROM directors WHERE movie1 = ? OR movie2 = ? OR movie3 = ?";
                $directorStmt = $conn->prepare($directorQuery);
                $directorStmt->bind_param("sss", $movieTitle, $movieTitle, $movieTitle);
                $directorStmt->execute();
                $directorResult = $directorStmt->get_result();

                if ($directorResult->num_rows > 0) {
                    while ($directorRow = $directorResult->fetch_assoc()) {
                        echo "<div class='col-md-4 text-center'>";
                        echo "<img src='" . htmlspecialchars($directorRow['photo']) . "' class='img-fluid' alt='Directors Image' style='height: 200px; object-fit: contain;'>";
                        echo "<h5>" . htmlspecialchars($directorRow['fname']) . " " . htmlspecialchars($directorRow['lname']) . "</h5>";
                        echo "<a href='director_profile.php?directorid=" . $directorRow['directorid'] . "' class='btn btn-primary'>View Profile</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No directors available for this movie.</p>";
                }
                $directorStmt->close();
                ?>
            </div>
        </div>

        <!-- ...Trailer... -->

        <div class="text-center mt-4">
            <h2>Trailer</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trailerModal">
                Watch Trailer
            </button>
        </div>

        <!-- YouTube Trailer Modal -->
        <div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="trailerModalLabel">Movie Trailer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- YouTube Video Embed -->
                        <div class="ratio ratio-16x9">
                            <?php echo '<iframe id="youtubeTrailer" src="https://www.youtube.com/embed/' . $trailer . '" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Reviews Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Movie Reviews</h2>
                <?php
                $reviewQuery = "SELECT rtitle, rusername, rating, review FROM review WHERE rmovie = ? ORDER BY RAND() LIMIT 3";
                $stmt = $conn->prepare($reviewQuery);
                $stmt->bind_param("s", $movieTitle);
                $stmt->execute();
                $reviewResult = $stmt->get_result();

                if ($reviewResult->num_rows > 0) {
                    while ($reviewRow = $reviewResult->fetch_assoc()) {
                        echo "<div class='review'>";
                        echo "<h4>" . htmlspecialchars($reviewRow['rtitle']) . "</h4>";
                        echo "<p><strong>Username: </strong>" . htmlspecialchars($reviewRow['rusername']) . "</p>";
                        echo "<p><strong>Rating: </strong>" . htmlspecialchars($reviewRow['rating']) . "/5</p>";
                        echo "<p>" . htmlspecialchars($reviewRow['review']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No reviews available for this movie.</p>";
                }
                $stmt->close();
                ?>
            </div>
        </div>
    </div>





    <?php
    if (isset($_SESSION['username'])) {
        include 'review.php';
    } else {
        // Display a message if the user is not logged in
        echo '<div class="container text-center mt-5">
                <p>You must be logged in to leave a review.</p>
                <a href="login.php" class="btn btn-primary">Login</a>
            </div>';
    }
    echo "<br>"; ?>


</body>
<script>
$(document).ready(function() {
    $('.btn-add-to-watchlist').click(function(e) {
        e.preventDefault();
        var movieTitle = $('input[name="movie_title"]').val();
        $.ajax({
            url: 'watchlist.php',
            type: 'post',
            data: {
                'add_to_watchlist': true,
                'movie_title': movieTitle
            },
            success: function(response) {
                // Handle response here
                alert("Movie added to watchlist!");
            }
        });
    });
});
</script>

</html>