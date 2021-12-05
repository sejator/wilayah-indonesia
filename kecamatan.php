<?php
require_once('koneksi.php');

$id = $_GET['id'];
$query = query("SELECT id, nama FROM wil_kecamatan WHERE id_kabupaten = $id");
$result = $query->fetch_all(MYSQLI_ASSOC);
echo json_encode($result);