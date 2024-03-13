<!DOCTYPE html>
<html lang="en">

<head>
    <title>Actor Profile</title>
    <!-- Include your head styles and scripts here -->
</head>

<body>
    <?php
    include 'navbar.php';
    include 'db_connect.php';

    $actorId = $_GET['actorid'] ?? '';

    // Query to get actor details
    $actorQuery = "SELECT * FROM actors WHERE actorid = ?";
    $actorStmt = $conn->prepare($actorQuery);
    $actorStmt->bind_param("i", $actorId);
    $actorStmt->execute();
    $actorResult = $actorStmt->get_result();
    $actor = $actorResult->fetch_assoc();

    if ($actor) {
        echo "<div class='container mt-5'>";
        echo "<h1>" . htmlspecialchars($actor['fname']) . " " . htmlspecialchars($actor['lname']) . "</h1>";
        echo "<img src='" . htmlspecialchars($actor['photo']) . "' class='img-fluid' alt='Actor Image'>";
        echo "<p>" . htmlspecialchars($actor['description']) . "</p>";
        echo "</div>";
    } else {
        echo "<p>Actor not found.</p>";
    }
    $actorStmt->close();
    $conn->close();
    ?>
</body>

</html>