<?php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $slot_id = $_POST['id'] ?? null;
    $status = $_POST['status'] ?? null;

    if ($slot_id && in_array($status, ['available','occupied'])) {
        // Ambil status saat ini
        $stmt = $conn->prepare("SELECT status FROM slots WHERE id = ?");
        $stmt->bind_param("i", $slot_id);
        $stmt->execute();
        $stmt->bind_result($current_status);
        $stmt->fetch();
        $stmt->close();

        // Jangan ubah status jika sedang booked
        if ($current_status === 'booked') {
            echo json_encode(['success' => false, 'message' => 'Slot is booked, cannot update']);
            exit;
        }

        // Update status jika bukan booked
        $stmt = $conn->prepare("UPDATE slots SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $slot_id);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Status updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
