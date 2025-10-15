<?php
include 'config.php';

$loket = $_POST['loket'];

// Mengambil antrean yang masih berstatus 'menunggu'
$sql = "SELECT * FROM antrian WHERE status='menunggu' ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $nomor_antrian = $row['nomor_antrian'];
    
    // Memperbarui status antrean
    $sql_update = "UPDATE antrian SET status='dipanggil', loket='$loket' WHERE id='$id'";
    if ($conn->query($sql_update) === TRUE) {
        echo json_encode(["nomor_antrian" => $nomor_antrian, "loket" => $loket]);
    } else {
        echo json_encode(["error" => "Gagal memperbarui status"]);
    }
} else {
    echo json_encode(["nomor_antrian" => null]);
}

$conn->close();
?>
