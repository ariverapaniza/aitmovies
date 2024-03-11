<?php

include "navbar.php";


echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center"></br><h3>Admin Panel!</h3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div></br></br></br>';

echo '<div class="container">
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <a href="actors.php">
            <img src="img/actor.png" class="card-img-top" alt="..." style="height: 200px; object-fit: contain;">
            </a>
            <div class="card-body">
                <h5 class="card-title">Add an Actor</h5>
                <p class="card-text">In here you can add different actors that have worked in different movies.</p>
                <a href="actors.php" class="btn btn-primary">Add an Actor</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <a href="directors.php">
            <img src="img/director.png" class="card-img-top" alt="..." style="height: 200px; object-fit: contain;">
            </a>
            <div class="card-body">
                <h5 class="card-title">Add a Director</h5>
                <p class="card-text">In here you can add different directors that have worked in different movies.</p>
                <a href="directors.php" class="btn btn-primary">Add a Director</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <a href="movies.php">
            <img src="img/movie.png" class="card-img-top" alt="..." style="height: 200px; object-fit: contain;">
            </a>
            <div class="card-body">
                <h5 class="card-title">Add a Movie</h5>
                <p class="card-text">In here you can add movies with most of the needed information like genre, classification, language, etc.</p>
                <a href="movies.php" class="btn btn-primary">Add a Movie</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <a href="register_admin.php">
            <img src="img/admin_account.png" class="card-img-top" alt="..." style="height: 200px; object-fit: contain;">
            </a>
            <div class="card-body">
                <h5 class="card-title">Create an Admin Account</h5>
                <p class="card-text">In here you can create Admin accounts that can manage the website.</p>
                <a href="register_admin.php" class="btn btn-primary">Create an Admin Account</a>
            </div>
        </div>
    </div>
</div>
</div>';
