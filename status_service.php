<?php
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

$id = $_GET['id'];
$simpan = mysqli_query($conn, "UPDATE service SET service_status='Berhasil' WHERE service_id='$id' ");
    if($simpan){
       
        echo "<script>alert('Service Berhasil!')</script>";
    }else {
        echo "<script>alert('Service Gagal!')</script>";
    }
   
    echo "<script>window.location='service.php'</script>";  
?>
