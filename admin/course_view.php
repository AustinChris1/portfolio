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
                                    <h4>View Courses
                                    <a href="course_add" class="btn btn-primary float-end">Add Course</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // $courses = $db->query("SELECT * FROM courses WHERE status !='2'");
                                                $courses = $db->query(
                                                    "SELECT c.*, acad.name AS acadname FROM courses c, academy acad WHERE acad.id = c.academy_id"
                                                );
                                                if ($courses->num_rows > 0) {
                                                    foreach (
                                                        $courses
                                                        as $course
                                                    ) { ?>
                                                <tr>
                                                <td><?= $course["id"] ?></td>
                                                <td><?= $course["name"] ?></td>
                                                <td><?= $course[
                                                    "acadname"
                                                ] ?></td>
                                                <td>
                                                    <img src="../uploads/courses/<?= $course[
                                                        "image"
                                                    ] ?>" width="60px" height="60px" alt="">
                                            </td>
                                                <td><?= $course["status"] == "1"
                                                    ? "Hidden"
                                                    : "Visible" ?></td>
                                                <td>
                                                    <a href="course_edit?id=<?= $course[
                                                        "id"
                                                    ] ?>" class="btn btn-info">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="editcode.php" method="POST">
                                                    <button type="submit" name="course_delete" value="<?= $course[
                                                        "id"
                                                    ] ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                                </td>
                                                </tr>

                                                        <?php }
                                                } else {
                                                     ?>
                                                <tr>
                                                    <td colspan="6">No Record Found</td>
                                                </tr>

                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        include "includes/footer.php";
                        include "includes/scripts.php";


?>
