<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Spectra Web-X - Admin Dashboard</title>
        
        <link href="css/styles.css" rel="stylesheet" />       
        <link href="../css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="../css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
        <script src="js/jquery-3.6.0.min.js"></script>
<link rel="icon" href="../assets/specweblogo.png" />

                <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Spectra Web-X</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <!-- <div class="collapse navbar-collapse" id="navbarSupported"></div> -->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <?php
                if(isset($_SESSION['auth_user'])):
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                <?=$_SESSION['auth_user']['username'];
                
                ?>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../user/profile">My Profile</a></li>
                    <li><a class="dropdown-item" href="view_registered.php">Registered Users</a></li>
                    <li><a class="dropdown-item" href="category_view">View Category</a></li>
                    <li><a class="dropdown-item" href="category_add">Add Category</a></li>
                    <li><a class="dropdown-item" href="post_view">View Posts</a></li>
                    <li><a class="dropdown-item" href="post_add">Add Posts</a></li>
                        <li><a class="dropdown-item" href="../user/logout.php">Log Out</a></li>
                        <li><a class="dropdown-item" href="../user/home">User Portal</a></li>
                        <!-- <li><hr class="dropdown-divider" /></li> -->
                        <?php else :?>
                            <li class="nav-item">
                            <a class="nav-link" href="login.php">Log In</a>
                            <a class="nav-link" href="login.php">Register</a>
                            </li>
                            <?php endif;?>
 
                    </ul>
                </li>
            </ul>
        </nav>
