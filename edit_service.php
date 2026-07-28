<?php
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

include_once("partials/head.php"); 
include_once("partials/header.php"); 

$id = $_GET['id'];
$produk = mysqli_query($conn, "SELECT * FROM service WHERE service_id='$id'");
$produk = mysqli_fetch_assoc($produk);

?>

<main>
    <section>
    <div class="container py-5">
        <div class="card">
        <div class="card-body">
            <h1 class="mb-4 fs-4">Edit Service</h1>
                <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="brand_produk" class="form-label">Nama Service</label>
            <input type="text" value="<?= $produk["service_name"]; ?>" class="form-control" id="nama_service" name="nama_service">
         </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Harga Service</label>
            <input type="text" value="<?= $produk["service_price"]; ?>" class="form-control" id="harga_service" name="harga_service">
        </div>
        <div class="mb-3">
            <label for="harga_produk" class="form-label">Durasi Service</label>
            <input type="text" value="<?= $produk["service_duration"]; ?>" class="form-control" id="durasi_service" name="durasi_service">
        </div>
        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
        <button class="btn btn-info">Batal</button>
        </form>
    </div>
    </div>
    </div>
    </section>
</main>

<?php include_once("partials/foot.php")?>

<?php $id = $_GET['id'];
    if(isset($_POST['edit'])){
    $nama_service = $_POST['nama_service'];
    $harga_service = $_POST['harga_service'];
    $durasi_service = $_POST['durasi_service'];

    $simpan = mysqli_query($conn, "UPDATE service SET service_name='$nama_service',service_price='$harga_service',service_duration='$durasi_service' 
    WHERE service_id='$id' ");

    if($simpan){
       
        echo "<script>alert('Produk Berhasil Disimpan!')</script>";
        echo "<script>window.location='service.php'</script>";
    }else {
        echo "<script>alert('Produk Gagal Disimpan!')</script>";
    }
    }
?>
