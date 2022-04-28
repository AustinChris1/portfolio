



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
          <img src="assets/specweblogo.png" class="logo">

          <a href="index">
            <span class="spec">SPECTRA WEB-X</span> <br />
            <p class="specd">Digitalizing The World</p>
          </a>
        </div>
        <div class="navbar">
          <nav>
            <a href="community.html" title="Community">Our Community</a>
            <a href="blog" title="blog">Blog</a>
            <a href="contact" title="Contact">Contact Us</a>
            <?php
                if(isset($_SESSION['auth_user'])):
                ?>

<a href="../courses/">Courses</a>
<a href="../user/logout" title="logout">Log Out</a>

            <?php else :?>
            <a href="login" title="login">Log In</a>
            <a href="register" title="New Account">Create Free Account</a>
                      <?php endif;?>
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
            <a href="#extra" title="Community">OUR COMMUNITY</a>
            <a href="../blog" title="blog">BLOG</a>
            <a href="contact" title="Contact">CONTACT US</a>
            <?php
                if(isset($_SESSION['auth_user'])):
                ?>

            <a href="logout" title="logout">LOG OUT</a>

            <?php else :?>

            <a href="login" title="login">LOG IN</a>
            <a href="register" title="New Account">CREATE NEW ACCOUNT</a>
            <?php endif;?>

          </ul>
        </div>
      </div>
