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
                                    <h4>Edit Category
                                    <a href="category_view" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($_GET["id"])) {
                                        $category_id = $_GET["id"];
                                        $categoryedit = $db->query(
                                            "SELECT * FROM categories WHERE id='$category_id' LIMIT 1"
                                        );
                                        if ($categoryedit->num_rows > 0) {
                                            $row = $categoryedit->fetch_array(); ?>
                                <form action="editcode.php" method="POST">
                                    <input type="hidden" name="category_id" value=" <?= $row[
                                        "id"
                                    ] ?>">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $row[
                                                "name"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug(URL)</label>
                                            <input type="text" name="slug" value="<?= $row[
                                                "slug"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" id="summernote"  required class="form-control"  rows="4" ><?= $row[
                                                "description"
                                            ] ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" value="<?= $row[
                                                "meta_title"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="">Meta Description</label>
                                            <textarea name="meta_description" max="191" required class="form-control"  rows="4"><?= $row[
                                                "meta_description"
                                            ] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea name="meta_keyword" max="191" required class="form-control"  rows="4"><?= $row[
                                                "meta_keyword"
                                            ] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Navbar Status</label><br>
                                            <input type="checkbox" name="navbar_status" <?= $row[
                                                "navbar_status"
                                            ] == "1"
                                                ? "checked"
                                                : "" ?> width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" <?= $row[
                                                "status"
                                            ] == "1"
                                                ? "checked"
                                                : "" ?> width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="category_update">Update Category</button>
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
