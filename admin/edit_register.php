<?php

include "../includes/authentication.php";
include "../includes/adminauthentication.php";
include "includes/header.php";
include "includes/sidebar.php";

// if (isset($_SESSION['auth'])){
//   $_SESSION['message'] = "You are already logged in";
//   header('Location:../user/home.php');
//   exit();
// }
?>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Users</h4>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item ">Users</li>
                            
                        </ol>
                        <div class="row">
                            <div class="col-md-12">  
                                  <?php include "includes/message.php"; ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit User
                                    <a href="view_registered.php" class="btn btn-danger float-end">Back</a>

                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($_GET["id"])) {
                                        $user_id = $_GET["id"];
                                        $editquery = $db->query(
                                            "SELECT * FROM spectradb WHERE id='$user_id'"
                                        );
                                        if ($editquery->num_rows > 0) {
                                            foreach ($editquery as $user) { ?>
                                    
                                <form action="editcode.php" method="POST">
                                    <input type="hidden" value="<?= $user[
                                        "id"
                                    ] ?>" name="id">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $user[
                                                "name"
                                            ] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" value="<?= $user[
                                                "username"
                                            ] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="email" value="<?= $user[
                                                "email"
                                            ] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Role</label>
                                            <select name="usertype" required class="form-control">
                                            <option value="">--Select Role--</option>
                                            <option value="admin" <?= $user[
                                                "usertype"
                                            ] == "admin"
                                                ? "selected"
                                                : "" ?>>Admin</option>
                                            <option value="" <?= $user[
                                                "usertype"
                                            ] == ""
                                                ? "selected"
                                                : "" ?>>User</option>
                                            <option value="super" <?= $user[
                                                "usertype"
                                            ] == "super"
                                                ? "selected"
                                                : "" ?>>Super Admin</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Phone</label>
                                            <input type="text" name="phone" value="<?= $user[
                                                "phone"
                                            ] ?>" class="form-control">
                                        </div>
                                        <?php if (
                                            $_SESSION["auth_role"] == "super"
                                        ): ?>
                                        <?php endif; ?>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" <?= $user[
                                                "status"
                                            ] == "1"
                                                ? "checked"
                                                : "" ?>> 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <button type="submit" class="btn btn-primary" name="update_user">Update Details</button>
                                        </div>
                                    </div>
                                </form>
                                    <?php }
                                        } else {
                                             ?>
                                        <h4>No Record Found</h4>
                                        <?php
                                        }
                                    } ?>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        include "includes/footer.php";
                        include "includes/scripts.php";


?>
