<?php
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

include_once("partials/head.php"); 
include_once("partials/header.php"); 

$id = $_GET['id'];
$categories = mysqli_query($conn, "SELECT * from category");
$produk = mysqli_query($conn, "SELECT * FROM product WHERE item_id='$id'");
$produk = mysqli_fetch_assoc($produk);

?>

<main>
    <section>
    <div class="container py-5">
        <div class="card">
        <div class="card-body">
            <h1 class="mb-4 fs-4">Edit Produk</h1>
                <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="brand_produk" class="form-label">Brand Produk</label>
            <input type="text" value="<?= $produk["item_brand"]; ?>" class="form-control" id="brand_produk" name="brand_produk">
         </div>
         <div class="mb-3">
            <label for="category_produk" class="form-label">Category Produk</label>
            <select name="category_produk" id="category_produk" class="form-control">
                <?php
                foreach($categories as $row) { ?>
                <option value="<?= $row['category_id'] ?>" <?php echo $row['category_id'] == $produk['category_id'] ? "selected" : "" ?>><?= $row['category_name'] ?></option>
                <?php }  
                ?>
            </select>
         </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" value="<?= $produk["item_name"]; ?>" class="form-control" id="nama_produk" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="harga_produk" class="form-label">Harga Produk</label>
            <input type="number" value="<?= $produk["item_price"]; ?>" class="form-control" id="harga_produk" name="harga_produk">
        </div>
        <div class="mb-3">
            <label for="stok_barang" class="form-label">Stok Barang</label>
            <input type="number" value="<?= $produk["stok_barang"]; ?>" class="form-control" id="stok_barang" name="stok_barang">
        </div>
        <div class="mb-3">
            <label for="gambar_produk" class="form-label">Gambar Produk</label>
            <input type="hidden" value="<?= $produk["item_image"]; ?>" name="gambar_produk_lama">
            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk_baru">
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
    $brand_produk = $_POST['brand_produk'];
    $category_produk = $_POST['category_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $stok_barang = $_POST['stok_barang'];
    $gambar_produk_lama = $_POST['gambar_produk_lama'];
    $gambar_produk_baru = $_FILES['gambar_produk_baru'];
    $ada_file_baru = false;

    if($gambar_produk_baru["name"]){
    $ada_file_baru = true;
    $gambar_ext = pathinfo($gambar_produk_baru['name'], PATHINFO_EXTENSION);
    $nama_gambar_produk = time() . "." . $gambar_ext;
    $tmp_gambar = $gambar_produk_baru['tmp_name'];
    }else{
        $nama_gambar_produk=$gambar_produk_lama;
    }

    $simpan = mysqli_query($conn, "UPDATE product SET item_brand='$brand_produk',category_id='$category_produk',item_name='$nama_produk',item_price='$harga_produk',stok_barang='$stok_barang',item_image='$nama_gambar_produk' 
    WHERE item_id='$id' ");

    if($simpan){
        if($ada_file_baru){
            $dest = "public/assets/images/produk/$gambar_produk_lama";
            unlink($dest);
        }
        $dest = "public/assets/images/produk/$nama_gambar_produk";
        move_uploaded_file($tmp_gambar, $dest);

        echo "<script>alert('Produk Berhasil Disimpan!')</script>";
        echo "<script>window.location='produk.php'</script>";
    }else {
        echo "<script>alert('Produk Gagal Disimpan!')</script>";
    }
    }
?>
