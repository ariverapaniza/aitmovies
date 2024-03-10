<?php

include "navbar.php";

//include "db_connect.php";

echo '<br><br><br><br><div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br>
                <h3 class="text-center">Login!</h3>
                <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
                <form action="form_process_login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required><br>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required><br>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form><br>
                Not Registered? <a href="register.php"> Register Here</a>
            </div>
        </div>
    </div>';
