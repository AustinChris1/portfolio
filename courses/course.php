<?php
include '../includes/authentication.php';
include 'includes/header.php';
include 'includes/sidebar.php';

            //   if(isset($_GET['title'])){
            //     $slug = $_GET['title'];

            //     $slug = $db->real_escape_string($slug);

            //     $metacourses = $db->query("SELECT * FROM courses WHERE slug = '$slug' LIMIT 1");
            //     if($metacourses->num_rows >0)
            //     {
            //         $metacourseitems = $metacourses->fetch_array();

            //         $page_title = $metacourseitems['slug'];
            //       }
            //       else{
            //         $page_title ="Courses";
            //       }
            //   }
            //     else{
            //         $page_title ="Courses";
     
            //     }

// include 'navbar.php';
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

                $courses = $db->query("SELECT * FROM courses WHERE slug = '$slug'");

                if($courses->num_rows >0)
                {
                    foreach($courses as $course_items){
                      ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5><?= $course_items['name'];?></h5>
                    </div>
                    <div class="card-body">
                        <label for="" class="text-dark me-2">On:
                            <?= date('d-M-Y', strtotime($course_items['created']));?></label>
                        <hr />
                        <?php
                        if($course_items['image'] != NULL):?>
                        <img src="../uploads/courses/<?=$course_items['image']?>" class="w-75 h-50" alt="<?= $course_items['name'];?>">
                      <?php endif;?> 
                        <div>
                        <?= $course_items['description'];?>
                       </div>
                    </div>

                </div>
            </div>

            <?php
                    }
                  
                }
                else{
                  ?>
            <h4>No Such course Found</h4>
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
.container {
    margin-top: 8vh !important;
}
</style>