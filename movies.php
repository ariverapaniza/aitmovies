<?php

include "navbar.php";

echo "<br>";


echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><H3> Add a Movie Information!</H3><br>
            <img src="img/AITMovies_Black_mod_s.png" alt="Logo" width="469" height="144" class="d-inline-block align-text-top"><br><br>
            </div>
        </div>
    </div>';

echo '<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <br>
            <form action="form_process_movies.php" method="POST" enctype="multipart/form-data" class="text-left">
                <div class="form-group">
                    <label for="title">Title:</label><br>
                    <input type="text" class="form-control" id="title" name="title" required><br>
                </div>
                <div class="form-group">
                    <label for="length">Length:</label><br>
                    <input type="text" class="form-control" id="length" name="length" required><br>
                </div>
                <div class="form-group">
                    <label for="genre">Genre:</label><br>
                    <select id="genre" name="genre" class="form-select" aria-label="genre form-select">
                        <option selected>Select Genre</option>
                        <option value="Action">Action</option>
                        <option value="Animation">Animation</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Drama">Drama</option>
                        <option value="Fantasy">Fantasy</option>
			            <option value="Horror">Horror</option>
                        <option value="Science-Fiction">Science-Fiction</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Thriller">Thriller</option>
                        <option value="True Story">True Story</option>
                        <option value="Western">Western</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="classification">Classification:</label><br>
                    <select id="classification" name="classification" class="form-select" aria-label="classification form-select">
                        <option selected>Select Classification</option>
                        <option value="G">G: General Audience</option>
                        <option value="PG">PG: Parental Guidance Suggested</option>
                        <option value="PG-13">PG-13: Parents Strongly Suggested</option>
                        <option value="R">R: Restricted</option>
                        <option value="NC-17">NC-17: Adults Only</option>
			            <option value="NR">NR: Not Rated</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="releaseyear">Release Year:</label><br>
                    <input type="date" class="form-control datepicker" id="releaseyear" name="releaseyear" required><br>
                </div>
                <div class="form-group">
                    <label for="language">Language:</label><br>
                    <input type="text" class="form-control" id="language" name="language" required><br>
                </div>
                <div class="form-group">
                    <label for="productioncompany">Production Company:</label><br>
                    <input type="text" class="form-control" id="productioncompany" name="productioncompany" required><br>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea class="form-control" id="description" name="description" required></textarea><br>
                </div>
                <div class="form-group">
                    <label for="Trailer">Trailer:</label><br>
                    <input type="text" class="form-control" id="trailer" name="trailer" required><br>
                </div>
                <div class="form-group">
                    <label for="poster">Poster:</label><br>
                    <input type="file" class="form-control" id="poster" name="poster"><br>
                </div>
                <div class="form-group">
                    <label for="image1">Image 1:</label><br>
                    <input type="file" class="form-control" id="image1" name="image1"><br>
                </div>
                <div class="form-group">
                    <label for="image2">Image 2:</label><br>
                    <input type="file" class="form-control" id="image2" name="image2"><br>
                </div>
                <div class="form-group">
                    <label for="image3">Image 3:</label><br>
                    <input type="file" class="form-control" id="image3" name="image3"><br>
                </div>
                <div class="form-group">
                    <label for="image4">Image 4:</label><br>
                    <input type="file" class="form-control" id="image4" name="image4"><br>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Add Movie"><br>
            </form>
            <br>
        </div>
    </div>
</div>';


echo "<br>";
