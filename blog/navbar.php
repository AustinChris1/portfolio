


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
          <a href="index" >HOME</a>

          <?php
                            $navbar_category = $db->query("SELECT * FROM categories WHERE navbar_status ='0' and status = '0'");
                            if($navbar_category->num_rows>0){
                              foreach($navbar_category as $navitems){
                                
                                ?>

            <a href="category?title=<?=$navitems['slug']?>" ><?=$navitems['name']?></a>
                <?php             
          }
                            
                              ?>
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
          <a href="index">HOME</a>
        <?php
                foreach ($navbar_category as $navitems) {
        ?>
          <a href="category?title=<?= $navitems['slug'] ?>"><?= $navitems['name'] ?></a>
        <?php
                }
                            }
        ?>
            <?php
                if(isset($_SESSION['auth_user'])):
                ?>

            <a href="../user/logout">LOG OUT</a>

            <?php else :?>

            <a href="../login" >LOG IN</a>
            <a href="../register" >CREATE NEW ACCOUNT</a>
            <?php endif;?>

          </ul>
        </div>
      </div>
