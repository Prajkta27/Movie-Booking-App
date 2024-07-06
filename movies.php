<?php
include 'db.php';

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

$movies = array();
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

echo json_encode($movies);

$conn->close();
?>
