<?php 

      include_once("autentikasi.php");
      include_once("partials/head.php"); 
      include_once("partials/header.php"); 
      include_once("config/conn.php");
      include_once("utils.php");

      $categories = mysqli_query($conn, "SELECT * FROM category LIMIT 10");
      $produk = mysqli_query($conn, "SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id ORDER BY item_id DESC LIMIT 6");

?>

<section>
      <!-- div.container -->
      <div class="container">
            <section>
            <h1>Category</h1>
            <div class="row gap-3 py-5">
            <?php foreach($categories as $c) { ?>
                  <a class="col-3 text-decoration-none" href="produk.php?category=<?= $c['category_id']?>">
                  <div class="card">
                        <div class="card-body fs-5">
                               <?= $c['category_name']?>
                        </div>
                  </div>
                  </a>
             <?php } ?>
            </div>
            </div>
            </section>
            <section>
            <div class="container">
            <h1>Products</h1>
            <div class="row gap-3 py-5">
            <?php foreach($produk as $p) { ?>
                  <a class="col-3 text-decoration-none" href="detail-product.php?id=<?= $p['item_id']?>">
                  <div class="card">
                        <div class="card-body fs-5">
                              <img src="public/assets/images/produk/<?= $p['item_image']?>"
                              class="product-image"
                              alt="<?= $p['item_name']?>">
                              <h5 class="py-2"><?= $p['item_name']?></h5>
                              <p class="text-success"><?= rupiahFormat($p['item_price'])?></p>
                        </div>
                  </div>
                  </a>
             <?php } ?>
            </div>
            </div>
            </section>
      </div>
      </div>
</section>
<?php include_once("partials/foot.php"); ?>