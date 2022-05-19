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
                                    <h4>Edit Courses
                                    <a href="course_view" class="btn btn-primary float-end">View Courses</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($_GET["id"])) {
                                        $course_id = $_GET["id"];
                                        $coursequery = $db->query(
                                            "SELECT * FROM courses WHERE id='$course_id' LIMIT 1"
                                        );
                                        if ($coursequery->num_rows > 0) {
                                            $courserow = $coursequery->fetch_array(); ?>
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
                                                ] ?>"<?= $academy_item["id"] ==
$courserow["academy_id"]
    ? "selected"
    : "" ?>>
                                                <?= $academy_item["name"] ?>
                                            </option>
                                                <?php } ?>
                                        </select>
                                                <?php } else { ?>
                                                <h6>No Academy Course Available</h6>
                                                <?php }
                                            ?>

                                        </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="hidden" name="course_id" value="<?= $courserow[
                                            "id"
                                        ] ?>">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $courserow[
                                                "name"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug(URL)</label>
                                            <input type="text" name="slug" value="<?= $courserow[
                                                "slug"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" required class="form-control" id="summernote"  rows="4"><?= htmlentities(
                                                $courserow["description"]
                                            ) ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image</label>
                                            <input type="hidden" name="old_image" value="<?= $courserow[
                                                "image"
                                            ] ?>" class="form-control"></textarea>
                                            <input type="file" name="image" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                        <label for="">Status</label><br>
                                            <input type="checkbox" name="status" <?= $courserow[
                                                "status"
                                            ] == "1"
                                                ? "checked"
                                                : "" ?> width="70px" height="70px"/> 
                                            Checked = Hidden, UnChecked = Visible
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="course_update">Update course</button>
                                        </div>
                                    </div>
                                </form>

                                            <?php
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
