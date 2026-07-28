<?php 
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

$categories = mysqli_query($conn, "SELECT * from category");
$produk = mysqli_query($conn, "SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id;");

      include_once("partials/head.php"); 
      include_once("partials/header.php"); 

if(isset($_GET['category'])){
      $filteredCategory = $_GET['category'];
      if($filteredCategory == ''){
            $produk = mysqli_query($conn, "SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id");
      } else {
            $produk = mysqli_query($conn, "SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id WHERE product.category_id='$filteredCategory'");
      }
}
?>
<section>
      <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                        <h1 class="h3 mb-3">Produk</h1>
                        <div class="d-flex gap-3 mb-3">
                              <div>
                              <a href="tambah_produk.php" class="btn btn-primary">Tambah</a>
                              </div>
                              <div>
                                    <form action="" method="GET" class="d-flex gap-3">
                                    <div class="d-flex align-items-center">
                                    <label for="">Filter : </label>
                                    <select id="filterCategory" name="category" class="form-control" style="width:200px">
                                    <option value="">--Semua--</option>

                                    <?php
                                    foreach($categories as $c) { ?>
                                    <option value="<?= $c['category_id'] ?>" <?= isset($_GET['category']) ? ($_GET['category'] == $c['category_id'] ? "selected" : '') : '' ?>><?= $c['category_name'] ?></option>
                                    <?php }  
                                    ?>

                                    <!-- <?php
                                    foreach($categories as $c) { ?>
                                    <option value="<?= $c['category_id'] ?>" <?php if(isset($_GET['category'])) {
                                                if($_GET['category'] == $c['category_id']){
                                                      echo 'selected';
                                                }
                                    }?>><?=$c['category_name'] ?></option>
                                    <?php } ?> -->
                                 </select>
                              </div>
                              <button name="filterCategory" class="btn btn-primary">Cari</button>
                              </form>
                        </div>
                        </div>
                        
                        <div>
                        <table class="table">
                              <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($produk as $row) {?>
                                    <tr>
                                    <th scope="row"> <?= $no++ ?> </th>
                                    <td><img src="public/assets/images/produk/<?= $row['item_image']?>" width="100"></td>
                                    <td><?= $row['item_brand'] ?> </td>
                                    <td><?= $row['category_name'] ?> </td>
                                    <td><?= $row['item_name'] ?> </td>
                                    <td><?= rupiahFormat($row['item_price']) ?> </td>
                                    <td><?= $row['stok_barang'] ?> </td>
                                    <td><a href="edit_produk.php?id=<?= $row['item_id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="hapus_produk.php?id=<?= $row['item_id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                    <?php } ?>
                              </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</section>

<?include_once("partials/foot.php"); ?>