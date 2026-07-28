<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopee";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("koneksi gagal");
}

    ?>