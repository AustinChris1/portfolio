<?php
session_start();

include '../databases/db_connect.php';

              if(isset($_GET['title'])){
                $slug = $_GET['title'];

                $slug = $db->real_escape_string($slug);

                $metaposts = $db->query("SELECT * FROM posts WHERE slug = '$slug' LIMIT 1");

                if($metaposts->num_rows >0)
                {
                    $metapostitems = $metaposts->fetch_array();

                    $page_title = $metapostitems['meta_title'];
  $meta_description =$metapostitems['meta_description'];
  $meta_keyword = $metapostitems['meta_keyword'];
  
                  }
                  else{
                    $page_title ="Post Page";
                    $meta_description ="Post - Spectra Web-X";
                    $meta_keyword = "Spectra Blog, Academy";
                    
                  }
              }
                else{
                    $page_title ="Post Page";
                    $meta_description ="Post - Spectra Web-X";
                    $meta_keyword = "Spectra Blog, Academy";
     
                }

include 'header.php';
include 'navbar.php';
?>
<title><?=$navitems['name']?></title>
<div class="py-5">
    <div class="container">
        <?php include '../includes/message.php';?>

        <div class="row">
            <div class="col-md-9">
                <?php
              if(isset($_GET['title'])){
                $slug = $_GET['title'];

                $slug = $db->real_escape_string($slug);

                $posts = $db->query("SELECT * FROM posts WHERE slug = '$slug'");

                if($posts->num_rows >0)
                {
                    foreach($posts as $post_items){
                      ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5><?= $post_items['name'];?></h5>
                    </div>
                    <div class="card-body">
                        <label for="" class="text-dark me-2">Posted On:
                            <?= date('d-M-Y', strtotime($post_items['created_at']));?></label>
                        <hr />
                        <?php
                        if($post_items['image'] != NULL):?>
                        <img src="../uploads/posts/<?=$post_items['image']?>" class="w-75 h-50" alt="<?= $post_items['name'];?>">
                      <?php endif;?> 
                        <div>
                        <?= $post_items['description'];?>
                       </div>
                    </div>

                </div>
            </div>

            <?php
                    }
                  
                }
                else{
                  ?>
            <h4>No Such Post Found</h4>
            <?php
   
                }
              }
              else{
                ?>
            <h4>No Such URL Found</h4>
            <?php
              }
              ?>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Advertising Area</h4>
                </div>
                <div class="card-body">
                    Your adverts here
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<script>
setTimeout(function() {
    $("#loading").hide();
}, 3100);
setTimeout(function() {
    $(".content").show();
}, 3000);
</script>
<script src="js/nav.js"></script>

</body>

</html>
<style>
.container {
    margin-top: 22vh !important;
}
</style>