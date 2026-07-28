<?php
require_once("config/conn.php");
$fetchProduk = mysqli_query($conn, "select * from product");
?>

<?php include_once("partials/head.php"); 
      include_once("partials/header.php"); 
?>

<main>
    <section>
    <div class="container py-5">
        <div class="card">
        <div class="card-body">
            <h1 class="mb-4 fs-4">Service Produk</h1>
                <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_service" class="form-label">Nama Service</label>
            <input type="text" class="form-control" id="nama_service" name="nama_service">
         </div>
        <div class="mb-3">
            <label for="harga_service" class="form-label">Harga Service</label>
            <input type="text" class="form-control" id="harga_service" name="harga_service">
        </div>
        <div class="mb-3">
            <label for="durasi_service" class="form-label">Durasi Service</label>
            <input type="text" class="form-control" id="durasi_service" name="durasi_service">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-info">Batal</button>
        </form>
    </div>
    </div>
    </div>
    </section>
</main>

<?php include_once("partials/foot.php"); ?>

<?php include_once("partials/foot.php")?>

<?php
require_once("config/conn.php");

if(isset($_POST['submit'])){
    $nama_service = $_POST['nama_service'];
    $harga_service = $_POST['harga_service'];
    $durasi_service = $_POST['durasi_service'];
    
    $simpan = mysqli_query($conn, "INSERT INTO service (service_id,service_name,service_price,service_duration,service_status)
    VALUES (NULL, '$nama_service','$harga_service','$durasi_service','Dalam Proses...')");

    if($simpan){
       
        echo "<script>alert('Produk Berhasil Disimpan!')</script>";
        echo "<script>window.location='service.php'</script>";
    }else {
        echo "<script>alert('Produk Gagal Disimpan!')</script>";
    }
    }
