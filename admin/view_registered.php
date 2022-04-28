<?php

include_once '../includes/authentication.php';
include_once '../includes/adminauthentication.php';
// include 'middleware/superadminauth.php';

include 'includes/header.php';
include 'includes/sidebar.php';



?>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Users</h4>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                            
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                        <?php
                        include 'includes/message.php';
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Registered Users
                                        <a href="register_add.php" class="btn btn-primary float-end">Add New User</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">

                                    <table id="myDataTable" class="table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>User Image</th>
                                            <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Roles</th>
                                                <th>Date created</th>
                                                 <?php if($_SESSION['auth_role']=='super'):?>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <?php endif;?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $regquery = $db->query("SELECT * FROM spectradb");
                                            
                                            if ($regquery->num_rows > 0) 
                                                {

                                                foreach($regquery as $row)
                                                {
                                                    ?>
                                            <tr>
                                                <td><?= $row['id'];?></td>
                                                <td>
                                                    <?php
                                                    $uimg = $row['user_image'];
                                                    if($uimg != NULL){
                                                    ?>
                                                    <img src="../uploads/user_images/<?=$row['user_image']?>" style="border-radius:50%;" width="85px" height="100px"  alt="">
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        No Image Available
                                                        <?php
                                                        }
                                                        ?>
                                            </td>

                                                <td><?= $row['name'];?></td>
                                                <td><?= $row['username'];?></td>
                                                <td><?= $row['email'];?></td>
                                                <td><?= $row['phone'];?></td>
                                                <td>
                                                    <?php
                                                    if($row['usertype'] == 'admin'){
                                                        echo 'Admin';
                                                    }
                                                    elseif($row['usertype'] == ''){
                                                        echo 'User';
                                                    }
                                                    elseif($row['usertype'] == 'super'){
                                                        echo 'Super Admin';
                                                    }
                                                    ?>
                                            </td>
                                            <td><?= $row['created'];?></td>

                                                <td><a href="edit_register.php?id=<?= $row['id'];?>" class="btn btn-secondary">Edit</a></td>
                                                
                                                    <?php if($_SESSION['auth_role']=='super'):?>
                                                        <td>
                                                    <form action="editcode.php" method="POST">   
                                                        <button type="submit" name="deleteuser" value="<?=$row['id'];?>" class="btn btn-danger">Delete</a>
                                                    
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
                                                    <td colspan="7">No record found</td>
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