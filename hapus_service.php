<?php
require_once("config/conn.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];



    
    $hapus = mysqli_query($conn,"DELETE FROM service WHERE service_id='$id'");
    if($hapus){
        echo "<script>alert('Service Berhasil Dihapus!')</script>";
    }else{
        echo "<script>alert('Service Gagal Dihapus!')</script>";
}
    echo"<script>window.location='service.php'</script>";
}
?>