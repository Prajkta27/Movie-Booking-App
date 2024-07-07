<?php
include 'db.php';

$sql = "SELECT b.id, u.name, m.title, b.seats FROM bookings b 
        JOIN users u ON b.user_id = u.id 
        JOIN movies m ON b.movie_id = m.id";
$result = $conn->query($sql);

$bookings = array();
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Admin Panel</h1>
    <div id="bookingsList">
        <?php if (!empty($bookings)): ?>
            <ul>
                <?php foreach ($bookings as $booking): ?>
                    <li>
                        <?php echo htmlspecialchars($booking['name']); ?> booked <?php echo htmlspecialchars($booking['seats']); ?> seats for <?php echo htmlspecialchars($booking['title']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No bookings found.</p>
        <?php endif; ?>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
