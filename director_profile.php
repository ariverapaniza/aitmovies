<!DOCTYPE html>
<html lang="en">

<head>
    <title>Directors Profile</title>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'db_connect.php';

    $directorId = $_GET['directorid'] ?? '';

    // Query to get actor details
    $directorQuery = "SELECT * FROM directors WHERE directorid = ?";
    $directorStmt = $conn->prepare($directorQuery);
    $directorStmt->bind_param("i", $directorId);
    $directorStmt->execute();
    $directorResult = $directorStmt->get_result();
    $director = $directorResult->fetch_assoc();

    if ($director) {
        echo "<div class='container mt-5'>";
        echo "<h1>" . htmlspecialchars($director['fname']) . " " . htmlspecialchars($director['lname']) . "</h1>";
        echo "<img src='" . htmlspecialchars($director['photo']) . "' class='img-fluid' alt='Director Image'>";
        echo "<p>" . htmlspecialchars($director['description']) . "</p>";
        echo "</div>";
    } else {
        echo "<p>Director not found.</p>";
    }
    $directorStmt->close();
    $conn->close();
    ?>
</body>

</html>