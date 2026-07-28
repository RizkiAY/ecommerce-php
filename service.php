<?php 
include_once("autentikasi.php");

require_once("config/conn.php");
require_once("utils.php");

include_once("partials/head.php"); 
include_once("partials/header.php"); 

$service = mysqli_query($conn, "SELECT * FROM service");
?>
<section>
      <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                        <h1 class="h3 mb-3">Service</h1>
                        <div>
                              <a href="tambah_service.php" class="btn btn-primary">Tambah</a>
                        </div>
                        <div>
                        <table class="table">
                              <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($service as $row) { ?>
                                    <tr>
                                    <th scope="row"> <?= $no++ ?> </th>
                                    <td><?= $row['service_name'] ?> </td>
                                    <td><?= rupiahFormat($row['service_price']) ?> </td>
                                    <td><?= $row['service_duration'] ?> </td>
                                    <td><?= $row['service_status'] ?> </td>
                                    <td><a href="edit_service.php?id=<?= $row['service_id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="hapus_service.php?id=<?= $row['service_id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    <a href="status_service.php?id=<?= $row['service_id'] ?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a></td>
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