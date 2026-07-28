<?php 
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

$category = mysqli_query($conn, "SELECT * FROM category");

      include_once("partials/head.php"); 
      include_once("partials/header.php"); 
?>
<section>
      <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                        <h1 class="h3 mb-3">Category</h1>
                        <div>
                              <a href="tambah_category.php" class="btn btn-primary">Tambah</a>
                        </div>
                        <div>
                        <table class="table">
                              <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Category</th>
                                    <th scope="col">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($category as $row) { ?>
                                    <tr>
                                    <th scope="row"> <?= $no++ ?> </th>
                                    <td><?= $row['category_name'] ?> </td>
                                    <td><a href="edit_category.php?id=<?= $row['category_id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="hapus_category.php?id=<?= $row['category_id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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