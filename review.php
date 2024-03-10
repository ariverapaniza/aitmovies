<!DOCTYPE html>
<html lang="en">

<body>
    <?php

    $currentMovieTitle = $movie['title'];
    echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><br><br><H3>Review this Movie!</H3>
            </div>
        </div>
    </div>';


    echo '<br><div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="form_process_review.php" method="POST" enctype="multipart/form-data" class="text-left">
                <div class="form-group">'; ?>
    <input type="hidden" name="rmovie" value="<?php echo $currentMovieTitle; ?>">
    <?php
    echo '<label for="rtitle">Title:</label><br>
    <input type="text" class="form-control" id="rtitle" name="rtitle" required><br>
    </div>
    <div class="form-group">
        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating" class="form-select" aria-label="Rating form-select">
            <option selected>Select Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="review">Description:</label><br>
        <textarea class="form-control" id="review" name="review" required></textarea><br>
    </div><br>
    <input type="submit" class="btn btn-primary" value="Add Review"><br>
    </form>
    <br>
    </div>
    </div>
    </div>';


    echo "<br>"; ?>
</body>