<?php
require_once('koneksi.php');

$id = $_GET['id'];
$query = query("SELECT id, nama FROM wil_kabupaten WHERE id_provinsi = $id ORDER BY id DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);
echo json_encode($result);