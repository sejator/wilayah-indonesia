<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'wilayah_indonesia';

$koneksi = mysqli_connect($hostname, $username, $password, $database);

function query($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query);
    return $hasil;
}