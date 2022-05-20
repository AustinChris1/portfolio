<?php
session_start();
include "../databases/db_connect.php";
if (isset($_GET["title"])) {
    $slug = $_GET["title"];

    $slug = $db->real_escape_string($slug);

    $categoryshow = $db->query(
        "SELECT slug,meta_title,meta_description,meta_keyword FROM categories WHERE slug ='$slug' AND status = '0'  LIMIT 1"
    );

    if ($categoryshow->num_rows > 0) {
        $categoryshow = $categoryshow->fetch_array();

        $page_title = $categoryshow["meta_title"];
        $meta_description = $categoryshow["meta_description"];
        $meta_keyword = $categoryshow["meta_keyword"];
    } else {
        $page_title = "Category Page";
        $meta_description = "Category - Spectra Web-X";
        $meta_keyword = "Spectra Blog, Academy";
    }
} else {
    $page_title = "Category Page";
    $meta_description = "Category - Spectra Web-X";
    $meta_keyword = "Spectra Blog, Academy";
}

$page_title = "Category Page";
$meta_description = "Category - Spectra Web-X";
$meta_keyword = "Spectra Blog, Academy";

include "header.php";
include "navbar.php";
?>
<div class="py-5">
    <div class="container">
    <?php include "../includes/message.php"; ?>

        <div class="row">
            <div class="col-md-9"> 
              <?php if (isset($_GET["title"])) {
                  $slug = $_GET["title"];

                  $slug = $db->real_escape_string($slug);

                  $categoryshow = $db->query(
                      "SELECT id,slug FROM categories WHERE slug ='$slug' AND status = '0' LIMIT 1"
                  );

                  if ($categoryshow->num_rows > 0) {
                      $categoryitem = $categoryshow->fetch_array();
                      $category_id = $categoryitem["id"];

                      $posts = $db->query(
                          "SELECT category_id,name,image,slug,meta_description,created_at FROM posts WHERE category_id = '$category_id' AND status = '0' "
                      );

                      if ($posts->num_rows > 0) {
                          foreach ($posts as $post_items) { ?>
                    <a href="post.php?title=<?= $post_items[
                        "slug"
                    ] ?>" class="text-decoration-none">
                <div class="card card-body shadow-sm mb-4">
                  <h5><?= $post_items["name"] ?></h5>
                  <img src="../uploads/posts/<?= $post_items[
                      "image"
                  ] ?>" width="50rem" height="60rem" padding= "2.5rem 2.5rem 0.5rem 2.5rem" alt="">
                  <div>
                  <?= $post_items["meta_description"] ?> 
                  </div>
                  <div>
                    <label for="" class="text-dark me-2">Posted On: <?= date(
                        "d-M-Y",
                        strtotime($post_items["created_at"])
                    ) ?></label>
                  </div>
                </div>
              </a>

                      <?php }
                      } else {
                           ?>
                  <h4>No Post Available</h4>
                  <?php
                      }
                  } else {
                       ?>
                  <h4>No Such Category Found</h4>
                  <?php
                  }
              } else {
                   ?>
                <h4>No Such URL Found</h4>
                <?php
              } ?>
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
</div>
<?php include "footer.php"; ?>
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
  .container{
    margin-top: 22vh !important;
  }
</style>