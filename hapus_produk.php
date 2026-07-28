<?php
require_once("config/conn.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $produk = mysqli_query($conn, "SELECT * FROM product WHERE item_id='$id'");
    $produk = mysqli_fetch_assoc($produk);
    $gambar_produk = $produk['item_image'];

    $hapus = mysqli_query($conn,"DELETE FROM product WHERE item_id='$id'");
    if($hapus){
    $dest = "public/assets/images/produk/$gambar_produk";
    unlink($dest);
        echo "<script>alert('Produk Berhasil Dihapus!')</script>";
    }else{
        echo "<script>alert('Produk Gagal Dihapus!')</script>";
}
    echo"<script>window.location='produk.php'</script>";
}
?>




