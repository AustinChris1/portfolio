<?php

include_once '../includes/authentication.php';
include 'header.php';
include 'navbar.php';



?>
<div class="container-fluid px-4">
    </ol>
    <div class="row mt-4">
        <div class="col-md-12">
    <?php
    include '../includes/message.php';
    ?>

            <div class="card">
                <div class="card-header">
                    <h4>Edit Profile
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_SESSION['auth_user']['id'])) {
                            $user_id = $_SESSION['auth_user']['id'];

                            $profilequery = $db->query("SELECT * FROM spectradb WHERE id='$user_id'");
                            if ($profilequery->num_rows > 0) {

                                foreach ($profilequery as $user) {
                                    $image = $user['user_image'];

                                    if ($image != NULL) {

                        ?>

                                        <form action="usercode.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <input type="hidden" value="<?= $user['id']; ?>" name="id">

                                                <div class="col-md-12 mb-3">
                                                <div class="imageuser">
                                                <input type="hidden" name="old_image" value="<?=$user['user_image']?>" class="form-control">
                                                        <input type="file" name="user_image" class="my_file">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name"  value="<?= $user['name']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Username</label>
                                                    <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" readonly value="<?= $user['email']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" value="<?= $user['phone']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Registration Date</label>
                                                    <input type="text" readonly value="<?= date('d-M-Y', strtotime($user['created']));?>"" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <button type="submit" class="btn btn-primary" name="update_user_profile">Update
                                                        Profile</button>
                                                </div>

                                            </div>
                                        </form>


                                    <?php
                                    } else {
                                    ?>
                                        <form action="usercode.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <input type="hidden" value="<?= $user['id']; ?>" name="id">
                                                <div class="col-md-12 mb-3">

                                                    <div class="imageu">
                                                    <input type="hidden" name="old_image" value="<?=$user['user_image']?>" class="form-control">
                                                        <input type="file" name="user_image" class="my_file">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Name</label>
                                                    <input type="text" name="name"  value="<?= $user['name']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Username</label>
                                                    <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Email</label>
                                                    <input type="text" name="email" readonly value="<?= $user['email']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" value="<?= $user['phone']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Registration Date</label>
                                                    <input type="text" readonly value="<?= date('d-M-Y', strtotime($user['created']));?>" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <button type="submit" class="btn btn-primary" name="update_user_profile">Update
                                                        Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                <?php
                                    }
                                }
                            } else {
                                ?>
                                <h4>User Record Not Found</h4>
                    <?php
                            }
                        } else {
                            ?>
                            <h4>User Record Not Found</h4>
                        <?php
                        }
    
                        ?>
    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';

?>
<script>
    setTimeout(function() {
        $("#loading").hide();
    }, 2100);
    setTimeout(function() {
        $(".content").show();
    }, 2000);
</script>
<style>
    .card {
        margin-top: 22vh !important;
    }

    .userimage {
        border-radius: 50%;
        position: relative;
        background-position: center;
        background-repeat: no-repeat;
        border: 3px solid orange;
        background-size: 100% 100%;
        margin-left: 35vw;
        overflow: hidden;
        height: 200px;
        width: 200px;
    }
</style>
< <style>
    .imageu{
    border-radius: 50%;
    background: url('avatar1.png');
    position: relative;
    background-position: center;
    background-repeat: no-repeat;
    border: 3px solid orange;
    background-size: 100% 100%;
    margin: auto;
    overflow: hidden;
    height: 200px;
    width: 200px;
    }
    .imageuser{
    border-radius: 50%;
    background: url("../uploads/user_images/<?= $user['user_image'] ?>");
    position: relative;
    background-position: center;
    background-repeat: no-repeat;
    border: 3px solid orange;
    background-size: 100% 100%;
    margin: auto;
    overflow: hidden;
    height: 200px;
    width: 200px;
    }
    .my_file {
    border-radius: 50%;
    position: absolute !important;
    bottom: 0;
    outline: none;
    width: 100%;
    box-sizing: border-box;
    color: transparent;
    padding: 15px 80px;
    cursor: pointer;
    transition: 0.5s;
    background: rgba(0,0,0,0.5);
    opacity: 0;
    }
    .my_file::-webkit-file-upload-button{
    visibility: hidden;
    }
    .my_file::before{
    content: '\f030';
    font-family: fontAwesome;
    font-size: 30px;
    color: #fff;
    display: inline-block;
    -webkit-user-select:none;
    padding-top: -10px;
    }
    .my_file:hover{
    opacity: 1;
    }

    </style>