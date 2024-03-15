<!DOCTYPE html>
<html>
<?php
include 'head.php';
?>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/AITMovies_mod_s.png" alt="Logo" width="167" height="51"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="movie_categories.php">Categories</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="directors.php">Directors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movies.php">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_panel.php">Admin Panel</a>
                    </li> -->
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
                        // Display this menu item only if the user is logged in and is an admin
                        echo '<li class="nav-item">
                <a class="nav-link" href="admin_panel.php">Admin Panel</a>
              </li>';
                    }
                    ?>
                </ul>
                <form class="d-flex ms-auto" action="search.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="query">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php
                //session_start();
                if (isset($_SESSION['username'])) {
                    // User is logged in
                    echo '<div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . htmlspecialchars($_SESSION['username']) . '
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                                <li><a class="dropdown-item" href="user_profile.php">User Profile</a></li>
                            </ul>
                          </div>';
                } else {
                    // User is not logged in
                    echo '<a class="btn btn-outline-primary ms-2" type="button" href="login.php">Sign In</a>';
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="script.js"></script>


</html>