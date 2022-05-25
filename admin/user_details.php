<?php

include_once "../includes/authentication.php";
include_once "../includes/adminauthentication.php";
// include 'middleware/superadminauth.php';

include "includes/header.php";
include "includes/sidebar.php";
?>
<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include "includes/message.php"; ?>
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                    </h4>
                </div>
                <div class="card-body">
                <?php if (isset($_GET["id"])) {
                                        $user_id = $_GET["id"];
                                        $editquery = $db->query(
                                            "SELECT * FROM spectradb WHERE id='$user_id'"
                                        );
                                        if ($editquery->num_rows > 0) {
                                            foreach ($editquery as $user) { 
                                                $total_bal = $user['ref_bal'] + $user['balance'];
                                                ?>
                                    
                                <form action="" method="POST">
                                    <input type="hidden" value="<?= $user["id"] ?>" name="id">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" value="<?= $user["username"] ?>" class="form-control">
                                        </div>

                                    <div class="col-md-6 mb-3">
                                            <label for="">Mined balance</label>
                                            <input type="text" name="" value="<?= $user[
                                                "balance"
                                            ] ?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Refferer</label>
                                            <input type="text" name="" value="<?= $user[
                                                "referrer"
                                            ] ?>" readonly class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Refferal Balance</label>
                                            <input type="text" name="" value="<?= $user[
                                                "ref_bal"
                                            ] ?>" readonly class="form-control">
                                        </div>     
                                        <div class="col-md-6 mb-3">
                                            <label for="">Total Balance</label>
                                            <input type="text" name="" readonly value="<?php echo $total_bal; ?>" class="form-control">
                                        </div>               
                                     </div>
                                     <?php }
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                    <?php
                        }
                    } ?>            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
include "includes/scripts.php";


?>