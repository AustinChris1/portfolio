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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">    
    <a href="../user/home">Log In As User</a>
</li>
                            
                        </ol>
                        <div class="row">
                        <?php
    include 'includes/message.php';
    ?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Categories
                                        <?php
                                        $dash_category_query = $db->query("SELECT * FROM categories");
                                        if($category_total= mysqli_num_rows($dash_category_query))
                                        {
                                           echo ' <h4 class="mb-0">'.$category_total.' </h4>';
                                        }
                                        else{
                                            echo '<h4 class="mb-0">No Data</h4>';
                                        }
                                        ?>
                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="category_view">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Posts
                                    <?php
                                        $dash_posts_query = $db->query("SELECT * FROM posts");
                                        if($posts_total= mysqli_num_rows($dash_posts_query))
                                        {
                                           echo ' <h4 class="mb-0">'.$posts_total.' </h4>';
                                        }
                                        else{
                                            echo '<h4 class="mb-0">No Data</h4>';
                                        }
                                        ?>
                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="post_view">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Users
                                    <?php
                                        $dash_registered_query = $db->query("SELECT * FROM spectradb");
                                        if($registered_total= mysqli_num_rows($dash_registered_query))
                                        {
                                           echo ' <h4 class="mb-0">'.$registered_total.' </h4>';
                                        }
                                        else{
                                            echo '<h4 class="mb-0">No Data</h4>';
                                        }
                                        ?>
                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view_registered">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Blocked Users
                                    <?php
                                        $dash_blocked_query = $db->query("SELECT * FROM spectradb WHERE status = '1'");
                                        if($blocked_total= mysqli_num_rows($dash_blocked_query))
                                        {
                                           echo ' <h4 class="mb-0">'.$blocked_total.' </h4>';
                                        }
                                        else{
                                            echo '<h4 class="mb-0">No Data</h4>';
                                        }
                                        ?>
                                    
                                    </div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Academy Course
                                        <?php
                                        $dash_academy_query = $db->query("SELECT * FROM academy");
                                        if($academy_total= mysqli_num_rows($dash_academy_query))
                                        {
                                           echo ' <h4 class="mb-0">'.$academy_total.' </h4>';
                                        }
                                        else{
                                            echo '<h4 class="mb-0">No Data</h4>';
                                        }
                                        ?>
                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="academy_view">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Course Details
                                    <?php
                                        $dash_course_query = $db->query("SELECT * FROM courses");
                                        if($course_total= mysqli_num_rows($dash_course_query))
                                        {
                                           echo ' <h4 class="mb-0">'.$course_total.' </h4>';
                                        }
                                        else{
                                            echo '<h4 class="mb-0">No Data</h4>';
                                        }
                                        ?>
                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="course_view">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                </main>
<?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>