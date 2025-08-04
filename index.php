<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $data = http_build_query([
        'id' => $id,
        'status' => $status
    ]);

    $options = [
        "http" => [
            "method" => "POST",
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "content" => $data
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents("http://skripsifachri.free.nf/api/update_slot.php", false, $context);

    echo $result;
} else {
    echo json_encode([
        "success" => false,
        "message" => "Gunakan metode POST"
    ]);
}
?>
