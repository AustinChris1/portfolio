<?php
include_once '../databases/db_connect.php';
?>
    <!-- <div id="loading">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <div class="content"> -->
        <!-- if(isset($_SESSION['auth'])){
            $user_id = $_GET['id'];

        
                        $profileidquery = $db->query("SELECT * FROM spectradb WHERE id='$user_id'");

    } -->
<!-- 


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <div class="Top">
                    <img src="../assets/specweblogo.png" class="logo">

                    <span class="spec">SPECTRA WEB-X</span> <br />
                    <p class="specd">Digitalizing The World</p>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mt-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                            <a class="nav-link fs-6 ms-4" href="home">Home</a>
                        </li>              
                          <?php
                if(isset($_SESSION['auth_user'])):
                ?>

                        <li class="nav-item">                        
                            <a class="nav-link fs-6 ms-4" href='profile'>Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fs-6 ms-4" href="../blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 ms-4" href="contact">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 ms-4" href="contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 ms-4" href="../courses/">Courses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fs-6 ms-4" href="logout">Log Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 ms-4">Notifications<i class="fas fa-bell" id="bell"></i></a>
                        </li>
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown bg-dark">
                            <a class="nav-link fs-6 ms-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" >
                                            <?=$_SESSION['auth_user']['username'];
                
                ?>
</a>                            
                            <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">

                </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile">My Profile</a></li>
                        <li><a class="dropdown-item" href="logout">Log Out</a></li>
                        <!-- <li><hr class="dropdown-divider" /></li> -->
                            <?php endif;?>
<!--  
                    </ul>


                    </ul>
                </div>
            </div>
        </nav>  -->


        



</head>
<body>
      <!-- <div id="loading">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>

    <div class="content"> -->

      <div id="head">
        <div class="Top">
        <img src="../assets/specweblogo.png" class="logo">

          <a href="index">
            <span class="spec">SPECTRA WEB-X</span> <br />
            <p class="specd">Digitalizing The World</p>
          </a>
        </div>
        <div class="navbar">
        <?php
                if(isset($_SESSION['auth_user']['id'])){
                  $user_id = $_SESSION['auth_user']['id'];

                  $profilequery = $db->query("SELECT * FROM spectradb WHERE id='$user_id'");
                  if ($profilequery->num_rows > 0) {

                      foreach ($profilequery as $user) {

                ?>

          <nav>
          <a href="home" >Home</a>
            <a href="../blog">Blog</a>
            <a href="community">Community</a>
            <a href="contact">Contact Us</a>
            <a href="../courses/" >Courses</a>
            <a href="logout">Log Out</a>
                            <a href="profile" id="navbarDropdown" >
                                            <?=$_SESSION['auth_user']['username'];?> <i class="fas fa-bell" id="bell"></i>

                </a>


          </nav>
        </div>

        <span class="menu">
          <i class="fas fa-bars"></i>
        </span>
        <span class="close">
        <i class="fa fa-window-close" aria-hidden="true"></i>        
      </span>
      </div>
      </section>
      <div class="mobile">
        <div class="mobnav">
<span class="profimg">                   
  <a href="profile"> <img src="../uploads/user_images/<?= $user['user_image']?>" alt="" style="width: 3rem; height: 3.5rem; border-radius: 50%; border-color: #fff;  ">
                <?=$_SESSION['auth_user']['username'];?>
              </a>
                </span>
          <ul>                           
          <a href="home" >Home</a>
            <a href="../blog">Blog</a>
            <a href="community">Community</a>
            <a href="contact">Contact Us</a>
            <a href="../courses/" >Courses</a>
            <a href="logout">Log Out</a>
            <a href="">Notifications<i class="fas fa-bell" id="bell"></i></a>
            <?php
            if($_SESSION['auth_role'] == 'admin' or 'super'):
            ?>
            <a href="../admin/">Admin Portal</a>
            <?php
            endif;
            ?>



          </ul>
        </div>
      </div>

      <?php
}
}
}?>
