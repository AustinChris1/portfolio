<?php
session_start();
include '../databases/db_connect.php';

include 'header.php';
include 'navbar.php';


?>
<div class="py-5 bg-light">
    <div class="container">
        <?php include '../includes/message.php'; ?>
        <div class="row">
            <h2 class="latest text-align-center">Latest Post</h2>
            <div class="cover">
                <?php
                $blog_category = $db->query("SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 15");
                if ($blog_category->num_rows > 0) {
                    foreach ($blog_category as $blogitems) {

                ?>


                        <div class="post bg-dark">
                            <a class="postitems text-decoration-none" href="post.php?title=<?= $blogitems['slug'] ?>">

                                <?php
                                if ($blogitems['image'] != NULL) : ?>
                                    <img src="../uploads/posts/<?= $blogitems['image'] ?>" class="showimg" alt="<?= $blogitems['name']; ?>">
                                <?php endif; ?>
                                    <div class="showbody">
                                <p class="sub-desc ">
                                    <?= $blogitems['name'] ?> <br><?= $blogitems['meta_description'] ?>
                                </p> 
                                #<?= $blogitems['cname'] ?>
                                <br>
                                <button class="btn btn-primary w-100">Read More</button>
                           </div> 
                        </a>

                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>

        <div class="highlight">
            <h2>HighLights</h2> <br> <br>
            <section id="slider">
            <input type="radio" name="slider" id="s1">
            <input type="radio" name="slider" id="s1">
            <input type="radio" name="slider" id="s1">
            <input type="radio" name="slider" id="s1">
            <input type="radio" name="slider" id="s1">
            <label for="s1" id="slider1">
          <img src="../assets/ape.png" alt="slider image" width="100%" height="100%">
        </label>

        <label for="s2" id="slider2">
          <img src="../assets/ceo.jpg" alt="slider image" width="100%" height="100%">
        </label>

        <label for="s3" id="slider3">
          <img src="../assets/download-removebg-preview.png" alt="slider image" width="100%" height="100%">
        </label>

        <label for="s4" id="slider4">
          <img src="../assets/payscribe-woman (1).png" alt="slider image" width="100%" height="100%">
        </label>

        <label for="s5" id="slider5">
          <img src="../assets/emailattachment.jpg" alt="slider image" width="100%" height="100%">
        </label>

      </section>
    </div>    

</div>
</div>
    <?php
    include 'footer.php';
    ?>
    <!-- <script>
    setTimeout(function() {
        $("#loading").hide();
    }, 2100);
    setTimeout(function() {
        $(".content").show();
    }, 2000);
</script> -->

    <script src="js/nav.js"></script>

    </body>

    </html>
    <style>
        *{
  margin: 0;
  padding: 0;
}

body{
  padding: 20px;
  background: #eee;
  user-select: none;
}

        .latest{
            display: flex;
            justify-content: center;
            border-bottom: 4px solid orange;
            margin-bottom: 4rem;
        }
        .container {
            margin-top: 22vh !important;
            user-select: none;
        }

        .cover {
            display: grid !important;
            /* margin-right: 5rem !important; */
            grid-template-columns: repeat(auto-fit, minmax(23rem, 1fr));
        }

        .post {
            width: 25rem;
            height: 40rem !important;
            margin-bottom: 5rem;

        }
        .sub-desc{
            color: blueviolet;
            font-size: 22px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .showbody{
          margin: 2.5rem 2.5rem 0rem 2.5rem !important;  
          font-size: 18px;
        }
        .showimg {
            width: 25rem;
            padding: 2.5rem 2.5rem 0.5rem 2.5rem;
            height: 25rem;
        }



        h2{
  text-align: center;
  font-size: 5vw;
}

[type=radio] {
  display: none;
}

#slider{
  height: 35vw;
  position: relative;
  perspective: 1000px;
  transform-style: preserve-3d;
}

#slider label{
  margin: auto;
  width: 60%;
  height: 100%;
  border-radius: 4px;
  position: absolute;
  left: 0;
  right: 0;
  cursor: pointer;
  transition: all 0.4s ease-in;
}

#s1:checked ~ #slider4, #s2:checked ~ #slider5,
#s3:checked ~ #slider1, #s4:checked ~ #slider2,
#s5:checked ~ #slider3{
  box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.37);
  transform: translate3d(-30%, 0, -200px);
}

#s1:checked ~ #slider5, #s2:checked ~ #slider1,
#s3:checked ~ #slider2, #s4:checked ~ #slider3,
#s5:checked ~ #slider4{
  box-shadow: 0 10px 20px 0 rgba(255, 255, 255, 0.1), 0 10px 20px 0 rgba(0, 0, 0, .8);
  transform: translate3d(-15%, 0, -100px);
}

#s1:checked ~ #slider1, #s2:checked ~ #slider2,
#s3:checked ~ #slider3, #s4:checked ~ #slider4,
#s5:checked ~ #slider5{
  box-shadow:  0px 20px 20px 0px rgba(255, 255, 255, 0.1), 0px 20px 20px 0px rgba(0, 0, 0, .7);
  transform: translate3d(0, 0, 0);
}

#s1:checked ~ #slider2, #s2:checked ~ #slider3,
#s3:checked ~ #slider4, #s4:checked ~ #slider5,
#s5:checked ~ #slider1{
  box-shadow: 0 10px 20px 0 rgba(255, 255, 255, 0.1), 0 10px 20px 0 rgba(0, 0, 0, .8);
  transform: translate3d(15%, 0, -100px);
}

#s1:checked ~ #slider3, #s2:checked ~ #slider4,
#s3:checked ~ #slider5, #s4:checked ~ #slider1,
#s5:checked ~ #slider2{
  box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.37);
  transform: translate3d(30%, 0, -200px);
}
    </style>