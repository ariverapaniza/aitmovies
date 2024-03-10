<?php

include "navbar.php";

echo "<br>";


echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><H3> Register Here!</H3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div>';

echo '<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <br>
            <form action="form_process_prepared_hash.php" method="POST" class="text-left">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required><br>
                </div>
                <div class="form-group">
                    <label for="fname">First Name:</label><br>
                    <input type="text" class="form-control" id="fname" name="fname" required><br>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label><br>
                    <input type="text" class="form-control" id="lname" name="lname" required><br>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="text" class="form-control" id="email" placeholder="name@example.com" name="email" required><br>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label><br>
                    <input type="text" class="form-control" id="address" name="address" required><br>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label><br>
                    <input type="password" class="form-control" id="password" name="password" required><br>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Register"><br>
            </form>
            <br>
            Already Registered? <a href="login.php"> Sign In</a>
        </div>
    </div>
</div>';


echo "<br>";