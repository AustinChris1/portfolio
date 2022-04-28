<?php
include '../includes/authentication.php';
include '../includes/adminauthentication.php';
include 'middleware/superadminauth.php';
if(isset($_POST['category_delete'])){
    $category_id = $_POST['category_delete'];
    //2 = deleted
    $categorydelete = $db->query("DELETE FROM categories WHERE id = '$category_id' LIMIT 1");

    if ($categorydelete) 
    {
        $_SESSION['message'] = "Category Deleted successfully";
        header('Location: category_view');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: category_view');
        exit();
    }

}
if(isset($_POST['academy_delete'])){
    $academy_id = $_POST['academy_delete'];
    $name = $_POST['name'];
    //2 = deleted
    $academydelete = $db->query("DELETE FROM academy WHERE id = '$academy_id' LIMIT 1");
    $academydelete= $db->query("ALTER TABLE spectradb DROP COLUMN `$name`");

    if ($academydelete) 
    {
        $_SESSION['message'] = "Academy Course Deleted Successfully";
        header('Location: academy_view');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: academy_view');
        exit();
    }

}

?>