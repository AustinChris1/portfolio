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
                                    <h4>Add Category
                                    <a href="category_view" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="editcode.php" method="POST">
                                    <div class="row">
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
                                            <textarea name="description" id="summernote" required class="form-control"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="">Meta Description</label>
                                            <textarea name="meta_description" max="191" required class="form-control"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea name="meta_keyword" max="191" required class="form-control"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Navbar Status</label><br>
                                            <input type="checkbox" name="navbar_status" width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="category_add">Save Category</button>
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
