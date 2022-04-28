<?php

include '../includes/authentication.php';
include '../includes/adminauthentication.php';


if(isset($_POST['course_delete'])){
    $course_id = $_POST['course_delete'];    
    
    $check_img_query = $db->query("SELECT * FROM courses WHERE id ='$course_id' LIMIT 1");
    $imgresdata= $check_img_query->fetch_array();
    $image = $imgresdata['image'];

    $coursedelete = $db->query("DELETE FROM courses WHERE id = '$course_id' LIMIT 1");

    if ($coursedelete) 
    {
                if(file_exists('../uploads/courses/'.$image)){
                    unlink("../uploads/courses/".$image);
                }   
        $_SESSION['message'] = "Course Deleted successfully";
        header('Location: course_view');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: course_view');
        exit();
    }


}

if(isset($_POST['course_update'])){
    $course_id = $_POST['id'];
    $category_id = $_POST['academy_id'];
    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    $description = $_POST['description'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $update_filename = '';


    if($image!= NULL){

    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $update_filename = $filename;
    }
    else{
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1':'0'; 

    $courseupdate = $db->query("UPDATE courses SET academy_id = '$academy_id', name = '$name', slug = '$slug', description = '$description', image = '$update_filename', status = '$status' WHERE id = '$course_id'");

    if ($courseupdate) 
    {
        if($image!= NULL){    
            if(file_exists('../uploads/courses/'.$old_filename)){
                unlink("../uploads/courses/".$old_filename);
            }   
            move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/courses/'.$update_filename);

        }
        $_SESSION['message'] = "Course Updated Successfully";
        header('Location:course_edit?id='.$course_id);
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:course_edit?id='.$course_id);
        exit();
    }
}

if(isset($_POST['course_add'])){
    $academy_id = $_POST['academy_id'];
    $name = $_POST['name'];
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;
    $status = $_POST['status'] == true ? '1':'0';

    $addcoursequery = $db->query("INSERT INTO courses (academy_id, name, slug, description, image, status) 
    VALUES('$academy_id', '$name', '$slug', '$description', '$filename', '$status')");

if ($addcoursequery) 
{
    move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/courses/'.$filename);
    $_SESSION['message'] = "Course Created Successfully";
    header('Location:course_add');
    exit();
}
else{
    $_SESSION['message'] = "Something Went Wrong!";
    header('Location:course_add');
    exit();
}
}


if(isset($_POST['academy_update'])){
    $academy_id = $_POST['academy_id'];
    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    $description = $_POST['description'];
    $status = $_POST['status'] == true ? '1':'0';

    $academyupdate =$db->query("UPDATE academy SET name='$name', slug='$slug', description= '$description', status='$status' WHERE id = '$academy_id'");
    $academyupdate= $db->query("ALTER TABLE spectradb  CHANGE COLUMN `$name` VARCHAR(255) NOT NULL");

    if ($academyupdate) 
    {
        $_SESSION['message'] = "Academy Course Updated successfully";
        header('Location:academy_edit?id='.$academy_id);
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:academy_edit?id='.$academy_id);
        exit();
    }
}

if(isset($_POST['academy_add'])){
    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    $description = $_POST['description'];
    $status = $_POST['status'] == true ? '1':'0';

    $academyquery = $db->query("INSERT INTO academy (name, slug, description, status) VALUES('$name', '$slug', '$description','$status')");
    $academyquery= $db->query("ALTER TABLE spectradb ADD COLUMN `$name` VARCHAR(255) NOT NULL AFTER status");
    if ($academyquery) 
    {
        $_SESSION['message'] = "Academy Course added successfully";
        header('Location:academy_add');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:academy_add');
        exit();
    }


}

if(isset($_POST['post_delete'])){
    $post_id = $_POST['post_delete'];
    //2 = deleted
    $postdelete = $db->query("UPDATE posts SET status ='2' WHERE id='$post_id' LIMIT 1");

    if ($postdelete) 
    {
        $_SESSION['message'] = "Post Deleted successfully";
        header('Location: post_view');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: post_view');
        exit();
    }

}

if(isset($_POST['post_history_delete'])){
    $post_id = $_POST['post_history_delete'];    
    
    $check_img_query = $db->query("SELECT * FROM posts WHERE id ='$post_id' LIMIT 1");
    $imgresdata= $check_img_query->fetch_array();
    $image = $imgresdata['image'];

    $postdelete = $db->query("DELETE FROM posts WHERE id = '$post_id' LIMIT 1");

    if ($postdelete) 
    {
                if(file_exists('../uploads/posts/'.$image)){
                    unlink("../uploads/posts/".$image);
                }   
        $_SESSION['message'] = "Post Deleted successfully";
        header('Location: post_view');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: post_view');
        exit();
    }


}
if(isset($_POST['restore_post'])){
    $post_id = $_POST['post_id'];
    $status = $_POST['status'] =='0';

    $restore_post = $db->query("UPDATE posts SET status='$status'");
if($restore_post){
    $_SESSION['message'] ="Post restored";
    header("location:post_view");
    exit();
}
else{
    $_SESSION['message'] ="Something went wrong!";
    header("location:post_history");
    exit();

}
}


if(isset($_POST['post_update'])){
    $post_id = $_POST['post_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];    

          $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $update_filename = '';


    if($image!= NULL){

    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $update_filename = $filename;
    }
    else{
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1':'0'; 

    $postupdate = $db->query("UPDATE posts SET category_id = '$category_id', name = '$name', slug = '$slug', description = '$description', image = '$update_filename', meta_title = '$meta_title', meta_description = '$meta_description', meta_keyword = '$meta_keyword', status = '$status' WHERE id = '$post_id'");

    if ($postupdate) 
    {
        if($image!= NULL){    
            if(file_exists('../uploads/posts/'.$old_filename)){
                unlink("../uploads/posts/".$old_filename);
            }   
            move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/posts/'.$update_filename);

        }
        $_SESSION['message'] = "Post Updated Successfully";
        header('Location:post_edit?id='.$post_id);
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:post_edit?id='.$post_id);
        exit();
    }
}

if(isset($_POST['post_add'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $image = $_FILES['image']['name'];
    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;
    $status = $_POST['status'] == true ? '1':'0';

    $addpostquery = $db->query("INSERT INTO posts (category_id, name, slug, description, image, meta_title, meta_description, meta_keyword, status) 
    VALUES('$category_id', '$name', '$slug', '$description', '$filename', '$meta_title', '$meta_description', '$meta_keyword', '$status')");

if ($addpostquery) 
{
    move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/posts/'.$filename);
    $_SESSION['message'] = "Post Created Successfully";
    header('Location:post_add');
    exit();
}
else{
    $_SESSION['message'] = "Something Went Wrong!";
    header('Location:post_add');
    exit();
}




}

if(isset($_POST['category_update'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $categoryupdate =$db->query("UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status',status='$status' WHERE id = '$category_id'");

    if ($categoryupdate) 
    {
        $_SESSION['message'] = "Category Updated successfully";
        header('Location:category_edit?id='.$category_id);
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:category_edit?id='.$category_id);
        exit();
    }
}

if(isset($_POST['category_add'])){
    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['slug']); //remove all special chars
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $final_string;

    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $categoryquery = $db->query("INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keyword, navbar_status, status) VALUES('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keyword', '$navbar_status', '$status')");

    if ($categoryquery) 
    {
        $_SESSION['message'] = "Category added successfully";
        header('Location:category_add');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:category_add');
        exit();
    }


}

if(isset($_POST['adduser'])){

    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['usertype'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $status = $_POST['status'] == true ? '1': '0';

    $password = $db->real_escape_string($password);
    $password = md5($password);
    $created = date("Y-m-d H:i:s");
    
    $checkquery = $db->query("SELECT * FROM spectradb WHERE email='$email' or username='$username'");
    //check if query is greater than 0
  if($checkquery->num_rows > 0){
    $_SESSION['message'] = "Username or Email already exists";
    header("Location: register_add");
  exit();
  }
  else{
      //inserting data
$addquery = $db->query("INSERT INTO spectradb (name, username, email, usertype, password, phone, status, created) VALUES('$name', '$username', '$email', '$role', '$password', '$phone', '$status','$created')");

    if ($addquery) 
    {
        $_SESSION['message'] = "User added successfully";
        header('Location:view_registered');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:register_add');
        exit();
    }
}
}

if(isset($_POST['update_user']))
{


    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['usertype']== true ? 'admin': '';
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $status = $_POST['status'] == true ? '1': '0';

    $password = $db->real_escape_string($password);
    $password = md5($password);

    $editquery = $db->query("UPDATE spectradb SET name='$name', username='$username', email='$email', usertype='$role', password='$password', phone='$phone', status='$status' WHERE id='$user_id'");

    if ($editquery) 
    {
        $_SESSION['message'] = "Updated Successfully";
        header('Location:view_registered');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:edit_register');
        exit();
    }
}

if(isset($_POST['deleteuser'])){
    $user_id =$_POST['deleteuser'];

    $deletequery = $db->query("DELETE FROM spectradb WHERE id = '$user_id'");
    if ($deletequery) 
    {
        $_SESSION['message'] = "User deleted successfully";
        header('Location:view_registered');
        exit();
    }
    else{
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location:view_registered');
        exit();
    }

}
?>