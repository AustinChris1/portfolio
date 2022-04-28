<?php
include '../includes/authentication.php';
include 'includes/header.php';
include 'includes/sidebar.php';
// include 'navbar.php';
?>
<div class="py-5">
    <div class="container">
    <?php include '../includes/message.php';?>

        <div class="row">
            <div class="col-md-9"> 
              <?php
              if(isset($_GET['title'])){
                $slug = $_GET['title'];

                $slug = $db->real_escape_string($slug);

                $academyshow = $db->query("SELECT id,slug FROM academy WHERE slug ='$slug' AND status = '0' LIMIT 1");

                if($academyshow->num_rows >0)
                {
                  $academyitem = $academyshow->fetch_array();
                  $academy_id = $academyitem['id'];

                  $courses = $db->query("SELECT academy_id,name,image,slug,created FROM courses WHERE academy_id = '$academy_id' AND status = '0' ");

                  if($courses->num_rows >0){
                    foreach($courses as $course_items){
                      ?>
                    <a href="course?title=<?= $course_items['slug'];?>" class="text-decoration-none">
                <div class="card card-body shadow-sm mb-4">
                  <h5><?= $course_items['name'];?></h5>
                  <img src="../uploads/courses/<?=$course_items['image']?>" width="50rem" height="60rem" padding= "2.5rem 2.5rem 0.5rem 2.5rem" alt="">
                  <div>
                    <label for="" class="text-dark me-2">Created On: <?= date('d-M-Y', strtotime($course_items['created']));?></label>
                  </div>
                </div>
              </a>

                      <?php
                    }
                  }
                  else{
                  ?>
                  <h4>No Course Available</h4>
                  <?php
   
                }

                  
                }
                else{
                  ?>
                  <h4>No Such Academy Course Found</h4>
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
</div>
<?php
include 'includes/footer.php';
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
  .container{
    margin-top: 22vh !important;
  }
</style>