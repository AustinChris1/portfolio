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
                            
                        </ol>
                        <div class="row mt-4">
                            <div class="col-md-12">
                            <?php include "includes/message.php"; ?>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Courses
                                    <a href="course_view" class="btn btn-primary float-end">View Courses</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="editcode.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <?php
                                            $academy = $db->query(
                                                "SELECT * FROM academy WHERE status ='0'"
                                            );
                                            if ($academy->num_rows > 0) { ?>
                                        <label for="">Academy Course List</label>
                                        <select name="academy_id" required class="form-control">
                                            <option value="">--Select Academy Course--</option>
                                            <?php foreach (
                                                $academy
                                                as $academy_item
                                            ) { ?>
                                                <option value="<?= $academy_item[
                                                    "id"
                                                ] ?>"><?= $academy_item[
    "name"
] ?></option>
                                                <?php } ?>
                                        </select>
                                                <?php } else { ?>
                                                <h6>No Academy Course Available</h6>
                                                <?php }
                                            ?>

                                        </div>
                                    <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug(URL)</label>
                                            <input type="text" name="slug" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" required class="form-control" id="summernote"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="course_add">Save course</button>
                                        </div>
                                    </div>
                                </form>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        include "includes/footer.php";
                        include "includes/scripts.php";


?>
