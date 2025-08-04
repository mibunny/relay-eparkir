<?php
include '../includes/db_connect.php';

$result = $conn->query("SELECT id, slot_number, status FROM slots");
$slots = [];

while ($row = $result->fetch_assoc()) {
    $slots[] = $row;
}

header('Content-Type: application/json');
echo json_encode($slots);
