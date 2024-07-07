<!-- movies.php -->
<?php
include 'db.php';

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

$movies = array();
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Movies</h1>
    <div id="moviesList">
        <?php if (!empty($movies)): ?>
            <ul>
                <?php foreach ($movies as $movie): ?>
                    <li><?php echo htmlspecialchars($movie['title']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>


