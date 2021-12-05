<?php
require_once('koneksi.php');

$query = query("SELECT id, nama FROM wil_provinsi");
$result = $query->fetch_all(MYSQLI_ASSOC);