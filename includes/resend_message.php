<?php
include 'header.php';
if (isset($_SESSION['resend_verification']))
{

?>
<div class="alert alert-warning alert-dismissable fade show" role="alert">
    <?= $_SESSION['resend_verification'];?>
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['resend_verification']);
}
?>
<script src="../js/bootstrap5.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>