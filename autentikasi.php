<?php
session_start();

if(!isset($_SESSION['auth'])){
    echo"<script>window.location='login.php'</script>";

}

?>