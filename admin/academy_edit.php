<?php

include '../includes/authentication.php';
include '../includes/adminauthentication.php';
include 'includes/header.php';
include 'includes/sidebar.php';
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
                            <?php
    include 'includes/message.php';
    ?>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Academy Courses
                                    <a href="academy_view" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if(isset($_GET['id'])){

                                    $academy_id = $_GET['id'];
                                    $academyedit = $db->query("SELECT * FROM academy WHERE id='$academy_id' LIMIT 1");
                                    if($academyedit->num_rows>0){
                                        $row= $academyedit->fetch_array();
                                        ?>
                                <form action="editcode.php" method="POST">
                                    <input type="hidden" name="academy_id" value=" <?=$row['id']?>">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?=$row['name']?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug(URL)</label>
                                            <input type="text" name="slug" value="<?=$row['slug']?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" id="summernote"  required class="form-control"  rows="4" ><?= $row['description']?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" <?=$row['status']=='1'?'checked':'';?> width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="academy_update">Update academy</button>
                                        </div>
                                    </div>
                                </form>

                                        <?php
                                    }  
                                    else{
                                        ?>
                                        <h4>No Record Found</h4>
                                        <?php
                                    }                                 
                                
                                }

                                        ?>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                            include 'includes/footer.php';
                            include 'includes/scripts.php';

                        ?>