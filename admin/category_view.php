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
                                    <h4>View Category
                                    <a href="category_add" class="btn btn-primary float-end">Add Category</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myDataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                                <?php if($_SESSION['auth_role']=='super'):?>
                                            <th>Delete</th>
                                            <?php endif;?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $category = $db->query("SELECT * FROM categories WHERE status !='2'");

                                    if($category->num_rows >0){
                                        foreach($category as $item){
                                            ?>
                                        <tr>
                                            <td><?= $item['id']?> </td>
                                            <td><?= $item['name']?> </td>
                                            <td><?php
                                            if($item['status'] == '1') {
                                                echo 'Hidden';
                                            }
                                            else{
                                                echo 'Visible';
                                            }
                                            ?> 
                                            
                                            </td>
                                            
                                            <td><a href="category_edit?id=<?= $item['id']?>" class="btn btn-info">Edit</a></td>
                                            <?php if($_SESSION['auth_role']=='super'):?>

                                            <td>
                                                <form action="superadmincode.php" method="POST">
                                                <button type="submit" name="category_delete" value="<?= $item['id']?>" class="btn btn-danger">Delete</a>
                                                </form>
                                            </td>
                                            <?php endif;?>
                                        </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <tr>
                                                <td colspan="5">No Record Found</td>
                                            </tr>

                                        <?php
                                    }
                                    ?>

                                        </tbody>
                                </table>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                            include 'includes/footer.php';
                            include 'includes/scripts.php';
                            ?>