<?php
include 'db.php';

$user_id = $_POST['user_id'];
$movie_id = $_POST['movie_id'];
$seats = $_POST['seats'];

$sql = "INSERT INTO bookings (user_id, movie_id, seats) VALUES ('$user_id', '$movie_id', '$seats')";
if ($conn->query($sql) === TRUE) {
    echo "Booking successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
