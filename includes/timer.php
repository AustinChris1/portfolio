<?php
include 'header.php';
if(isset($_SESSION['login_attempts'])){

}
      if(isset($_SESSION['locked'])){
    $diff = time() - $_SESSION['locked'];
    if($diff > 30){
      unset($_SESSION['locked']);
      unset($_SESSION['login_attempts']);
    }
  }


?>
<style>
  .aler{
    display: none;
  }
</style>
<script src="../js/bootstrap5.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>