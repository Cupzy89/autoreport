<?php
include 'config.php';

// Mendapatkan nomor antrean terakhir dari database
$sql = "SELECT MAX(nomor_antrian) AS max_antrian FROM antrian WHERE DATE(timestamp) = CURDATE()";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$nomor_antrian = $row['max_antrian'] + 1;

// Menyimpan nomor antrean baru ke database
$sql = "INSERT INTO antrian (nomor_antrian, loket, status) VALUES ('$nomor_antrian', 0, 'menunggu')";
if ($conn->query($sql) === TRUE) {
    echo $nomor_antrian;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
