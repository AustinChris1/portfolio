<?php
include_once '../databases/db_connect.php';
?>
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
  <a href="profile"> <img src="../uploads/user_images/<?= $user['user_image']?>" alt="" style="width: 4.5rem; height: 5rem; border-radius: 50%; border-color: #fff;  ">
                <br><?=$_SESSION['auth_user']['username'];?>&#128526;
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
            <a href="refferal_stats">Settings<i class="fas fa-cog" id="settings"></i></a>

            <?php
            if($_SESSION['auth_role'] !== ''):
            ?>
            <a href="../admin/">Admin Portal</a>
            <?php
            endif;
            ?>

<a href=""><?= $user['user_agent']?></a>
<a href=""><?= $user['user_ip_address']?></a>
<a href=""><?= $user['last_activity']?></a>

          </ul>
        </div>
      </div>

      <?php
}
}
}?>
