<?php
include_once '../databases/db_connect.php';
include '../includes/authentication.php';
include 'header.php';
include 'navbar.php';


?>
<?php

if(isset($_POST['mine'])){

}

?>
<div class="container-fluid px-4">
    <?php
    include '../includes/message.php';
    ?>
    </ol>
    <div class="row mt-4">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>User Profile
                    </h4>
                </div>
                <div class="card-body">

<form action="mine.php" method="post">

<div class="row">
<div class="col-md-6 mb-3">
    <input type="submit" name="mine"value="Mine" class="btn btn-primary">
</div>
</div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<script>
    setTimeout(function() {
        $("#loading").hide();
    }, 2100);
    setTimeout(function() {
        $(".content").show();
    }, 2000);
</script>
<style>
    .card {
        margin-top: 22vh !important;
    }
</style>