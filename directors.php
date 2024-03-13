<?php

include "navbar.php";

echo "<br>";


echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><H3> Add Director Information!</H3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div>';

echo '<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <br>
            <form action="form_process_directors.php" method="POST" enctype="multipart/form-data" class="text-left">
                <div class="form-group">
                    <label for="fname">First Name:</label><br>
                    <input type="text" class="form-control" id="fname" name="fname" required><br>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label><br>
                    <input type="text" class="form-control" id="lname" name="lname" required><br>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label><br>
                    <input type="text" class="form-control" id="gender" name="gender" required><br>
                </div>
                <div class="form-group">
                    <label for="movie1">Movie 1:</label><br>
                    <input type="text" class="form-control" id="movie1" name="movie1" required><br>
                </div>
                <div class="form-group">
                    <label for="movie2">Movie 2:</label><br>
                    <input type="text" class="form-control" id="movie2" name="movie2" required><br>
                </div>
                <div class="form-group">
                    <label for="movie3">Movie 3:</label><br>
                    <input type="text" class="form-control" id="movie3" name="movie3" required><br>
                </div>
                <div class="form-group">
                    <label for="photo">Actor\'s Photo:</label><br>
                    <input type="file" class="form-control" id="photo" name="photo"><br>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea class="form-control" id="description" name="description" required></textarea><br>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Add Director"><br>
            </form>
            <br>
        </div>
    </div>
</div>';


echo "<br>";
