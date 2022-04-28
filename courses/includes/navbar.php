


</head>
<body>
      <!-- <div id="loading">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div> -->

    <!-- <div class="content"> -->
            <?php
                if(isset($_SESSION['auth_user']['id'])){
                  $user_id = $_SESSION['auth_user']['id'];

                  $profilequery = $db->query("SELECT * FROM spectradb WHERE id='$user_id'");
                  if ($profilequery->num_rows > 0) {

                      foreach ($profilequery as $user) {

                ?>

      <div id="head">
        <div class="Top">
          <img src="assets/specweblogo.png" class="logo">

          <a href="../index">
            <span class="spec">SPECTRA WEB-X</span> <br />
            <p class="specd">Digitalizing The World</p>
          </a>
        </div>
        <div class="navbar">
        <nav>

            <a href="../community.html" title="Community">Our Community</a>
            <a href="../blog" title="blog">Blog</a>
            <a href="../contact" title="Contact">Contact Us</a>
            <a href="../user/logout">Log Out</a></nav>
            <nav>
            <a href="" style="border-bottom:none; margin-left:-150px; margin:0;"><img src="../uploads/user_images/<?= $user['user_image']?>" alt="" style="width: 8%; height: 10%; border-radius: 50%; border-color: #fff;  "></a>
            <a href=""> <?=$_SESSION['auth_user']['username']?></a>
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
          <span> <i class="fa fa-user-circle"></i></span>
          <ul>
            <a href="category?title=<?=$navitems['slug']?>" ><?=$navitems['name']?></a>

            <a href="../user/logout">LOG OUT</a>
          </ul>
        </div>
      </div>
<?php
                      }
                    }
                }
                ?>