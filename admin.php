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

echo json_encode($bookings);

$conn->close();
?>
