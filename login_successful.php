<?php




include "navbar.php";
include "db_connect.php";

//echo "Login Successful! <br>";
echo '<br><br><div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><H3> Login Successful!</H3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div>';
if (isset($_SESSION['username'])) {
    echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><H3>Welcome ' . $_SESSION['username'] . '</H3><br>
            </div>
        </div>
    </div>';
} else {
    echo "<H3>Username not set in session</H3><br>";
}

echo "<H3><a href='javascript:history.go(-1)'>Back</a></H3>";
