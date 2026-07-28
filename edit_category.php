<?php
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

include_once("partials/head.php"); 
include_once("partials/header.php"); 

$id = $_GET['id'];
$category = mysqli_query($conn, "SELECT * FROM category WHERE category_id='$id'");
$category = mysqli_fetch_assoc($category);

?>

<main>
    <section>
    <div class="container py-5">
        <div class="card">
        <div class="card-body">
            <h1 class="mb-4 fs-4">Edit Category</h1>
                <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="brand_produk" class="form-label">Nama Category</label>
            <input type="text" value="<?= $category["category_name"]; ?>" class="form-control" id="category_name" name="category_name">
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
    $nama_category = $_POST['category_name'];

    $simpan = mysqli_query($conn, "UPDATE category SET category_name='$nama_category' WHERE category_id='$id' ");

    if($simpan){
       
        echo "<script>alert('Category Berhasil Disimpan!')</script>";
        echo "<script>window.location='category.php'</script>";
    }else {
        echo "<script>alert('Category Gagal Disimpan!')</script>";
    }
    }
?>
