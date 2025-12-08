<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$name = $conn->real_escape_string($data["name"]);
$text = $conn->real_escape_string($data["text"]);
$stars = (int)$data["stars"];

if ($name && $text && $stars > 0 && $stars <= 5) {
    $sql = "INSERT INTO reviews (name, text, stars) VALUES ('$name', '$text', $stars)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Dados inválidos"]);
}
$conn->close();
?>