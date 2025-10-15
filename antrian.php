<?php
include 'config.php';

$sql = "SELECT * FROM antrian WHERE status='dipanggil' ORDER BY timestamp DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["nomor_antrian" => $row['nomor_antrian'], "loket" => $row['loket']]);
} else {
    echo json_encode(["nomor_antrian" => null]);
}

$conn->close();
?>
