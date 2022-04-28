<?php
include '../databases/db_connect.php';
if (isset($_POST['upload_image'])) {
    $user_id = $_POST['id'];
    $name = $_POST['name'];


    $image = $_FILES['user_image']['name'];
    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_extension;
    $adduserimage = $db->query("UPDATE spectradb SET user_image = '$filename' WHERE id = '$user_id' ");

    if ($adduserimage) {
        move_uploaded_file($_FILES['user_image']['tmp_name'], '../uploads/user_images/' . $filename);
        $_SESSION['message'] = "Image Uploaded Successfully";
        header('Location:profile');
        exit();
    } else {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:profile');
        exit();
    }
}

if (isset($_POST['update_user_profile'])) {
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];

    $phone = strip_tags($phone);
    $name = strip_tags($name);
    $username = strip_tags($username);

    $old_filename = $_POST['old_image'];
    $image = $_FILES['user_image']['name'];
    $update_filename = '';


    if ($image != NULL) {

        //rename the image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;

        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }
    $checkquery = $db->query("SELECT * FROM spectradb WHERE phone='$phone' or username='$username'");
    //check if query is greater than 0
    if ($checkquery->num_rows > 1) {
        $_SESSION['message'] = "Username or Phone number already exists";
        header('Location:edit_profile');
        exit();
    } else {
        $update_profile = $db->query("UPDATE spectradb SET user_image = '$update_filename', name = '$name', phone = '$phone', username = '$username' WHERE id = '$user_id' ");

        if ($update_profile) {
            if ($image != NULL) {
                if (file_exists('../uploads/user_images/' . $old_filename)) {
                    unlink("../uploads/user_images/" . $old_filename);
                }
                move_uploaded_file($_FILES['user_image']['tmp_name'], '../uploads/user_images/' . $update_filename);
            }

            $_SESSION['message'] = "Profile Updated Successfully";
            header('Location:profile');
            exit();
        } else {
            $_SESSION['message'] = "Something Went Wrong!";
            header('Location:profile');
            exit();
        }
    }
}
