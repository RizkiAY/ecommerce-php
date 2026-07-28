<?php
require_once("config/conn.php");
?>

<?php include_once("partials/head.php"); 
      include_once("partials/header.php"); 
?>

<main>
    <section>
    <div class="container py-5">
        <div class="card">
        <div class="card-body">
            <h1 class="mb-4 fs-4">Category Produk</h1>
            <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category_name" class="form-label">Nama Category</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
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
    $nama_category = $_POST['category_name'];
    
    $simpan = mysqli_query($conn, "INSERT INTO category (category_name)
    VALUES ('$nama_category')");

    if($simpan){
       
        echo "<script>alert('Category Berhasil Disimpan!')</script>";
        echo "<script>window.location='category.php'</script>";
    }else {
        echo "<script>alert('Category Gagal Disimpan!')</script>";
    }
    }
