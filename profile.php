<?php 

      require_once("config/conn.php");
      include_once("autentikasi.php");
      include_once("partials/head.php"); 
      include_once("partials/header.php"); 
      
    $fetchuser = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username]'");
    $user = mysqli_fetch_assoc($fetchuser);
?>
<section style="background-color:#eee" class="min-vh-100">
<div class="container">
            <div class="pt-4">
                  <div class="shadow bg-white p-4">
                        <h1 class="h3 mb-3">PROFILE</h1>
                        <div class="d-flex align-items-start gap-5">
                            <div>
                                <img src="public/assets/images/logo/logo.png" width="150" alt="">
                            </div>
                        <table class="table w-auto">
                             
                              <tbody>
                              <tr>
                                    <td class="border-0" style="width:130px">Nama</td>
                                    <td class="border-0" style="width:5px">:</td>
                                    <td class="border-0" style="width:200px"><?= $user['nama']?></td>
                              </tr>
                              <tr>
                                    <td class="border-0" style="width:130px">Username</td>
                                    <td class="border-0" style="width:5px">:</td>
                                    <td class="border-0" style="width:200px"><?= $user['username']?></td>
                              </tr>

                              </tbody>
                              </table>
                        </div>
                        <a href="edit-profile.php" class="btn btn-primary mt-5">Edit</a>
                  </div>
            </div>
      </div>
</section>
<?php include_once("partials/foot.php"); ?>