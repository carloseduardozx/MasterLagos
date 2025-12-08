<?php
header("Content-Type: application/json");
include "db.php";

$result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
$reviews = [];

while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);
$conn->close();
?>