<?php
require_once("config/conn.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];



    
    $hapus = mysqli_query($conn,"DELETE FROM category WHERE category_id='$id'");
    if($hapus){
        echo "<script>alert('Category Berhasil Dihapus!')</script>";
    }else{
        echo "<script>alert('Category Gagal Dihapus!')</script>";
}
    echo"<script>window.location='category.php'</script>";
}
?>