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
            <form action="form_process_directors.php" method="POST" class="text-left">
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
                    <label for="description">Description:</label><br>
                    <input type="text" class="form-control" id="description" name="description" required><br>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Add Director"><br>
            </form>
            <br>
        </div>
    </div>
</div>';


echo "<br>";