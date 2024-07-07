<!-- book.php -->
<?php
include 'db.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $movie_id = $_POST['movie_id'];
    $seats = $_POST['seats'];

    $sql = "INSERT INTO bookings (user_id, movie_id, seats) VALUES ('$user_id', '$movie_id', '$seats')";
    if ($conn->query($sql) === TRUE) {
        $message = "Booking successful!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Fetch available movies for the dropdown
    $sql = "SELECT id, title FROM movies";
    $result = $conn->query($sql);

    $movies = array();
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Book Seats</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form id="bookForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="user_id" id="userId" value="1"> <!-- Set the user ID here -->
        <select name="movie_id" id="movieId" required>
            <option value="">Select a movie</option>
            <?php foreach ($movies as $movie): ?>
                <option value="<?php echo htmlspecialchars($movie['id']); ?>"><?php echo htmlspecialchars($movie['title']); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="seats" id="seats" placeholder="Seats (e.g., A1,A2)" required>
        <button type="submit">Book</button>
    </form>
    <script src="js/scripts.js"></script>
</body>
</html>
