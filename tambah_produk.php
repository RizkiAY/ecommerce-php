<?php
require_once("config/conn.php");
$fetchProduk = mysqli_query($conn, "SELECT * from product");
$categories = mysqli_query($conn, "SELECT * from category");
?>

<?php include_once("partials/head.php"); 
      include_once("partials/header.php"); 
?>

<main>
    <section>
    <div class="container py-5">
        <div class="card">
        <div class="card-body">
            <h1 class="mb-4 fs-4">Tambah Produk</h1>
                <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="brand_produk" class="form-label">Brand Produk</label>
            <input type="text" class="form-control" id="brand_produk" name="brand_produk">
         </div>
         <div class="mb-3">
            <label for="category_produk" class="form-label">Category Produk</label>
            <select name="category_produk" id="category_produk" class="form-control">
                <option value="">--Pilih Category--</option>
                <?php
                foreach($categories as $row) { ?>
                  <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                <?php }  
                ?>
            </select>
         </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="harga_produk" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="harga_produk" name="harga_produk">
        </div>
        <div class="mb-3">
            <label for="stok_barang" class="form-label">Stok Barang</label>
            <input type="text" class="form-control" id="stok_barang" name="stok_barang">
        <div class="mb-3">
            <label for="gambar_produk" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
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
    $brand_produk = $_POST['brand_produk'];
    $category_produk = $_POST['category_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $stok_barang = $_POST['stok_barang'];
    $gambar_produk = $_FILES['gambar_produk'];

    $gambar_ext = pathinfo($gambar_produk['name'], PATHINFO_EXTENSION);
    $nama_gambar_produk = time() . "." . $gambar_ext;
    $tmp_gambar = $gambar_produk['tmp_name'];

    $simpan = mysqli_query($conn, "INSERT INTO product (item_id,item_brand,category_id,item_name,item_price,stok_barang,item_image)
    VALUES (NULL, '$brand_produk','$category_produk','$nama_produk','$harga_produk','$stok_barang','$nama_gambar_produk')");

    if($simpan){
        $dest = "public/assets/images/produk/$nama_gambar_produk";
        move_uploaded_file($tmp_gambar, $dest);

        echo "<script>alert('Produk Berhasil Disimpan!')</script>";
        echo "<script>window.location='produk.php'</script>";
    }else {
        echo "<script>alert('Produk Gagal Disimpan!')</script>";
    }
    }
