<?php
include '../includes/authentication.php';

$page_title ="Spectra Academy";
$meta_description ="Academy - Spectra Web-X";
$meta_keyword = "Spectra Academy, Academy";

include 'includes/header.php';
// include 'includes/navbar.php';
include 'includes/sidebar.php';
?>

<div class="py-5 bg-light">
    <div class="container">
        <?php include '../includes/message.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Academy Courses</h3>
                <div class="underline"></div>
            </div>
            <?php
            $course_category = $db->query("SELECT * FROM academy WHERE status = '0'");
            if ($course_category->num_rows > 0) {
                foreach ($course_category as $courseitems) {

            ?>
                    <div class="col-md-3 mb-4">

                        <a class="text-decoration-none" href="academy_course?title=<?= $courseitems['slug'] ?>">
                            <div class="card card-body">
                                <?= $courseitems['name'] ?>
                            </div>
                        </a>
                    </div>
<?php
                }
            }
?>        
        </div>

    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-white">Spectra Web-X</h3>
                <div class="underline"></div>
                <p class="text-white">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus, nobis. Harum at omnis soluta fugiat veritatis quasi quae aspernatur quisquam? Quisquam asperiores, commodi aliquam itaque voluptas quidem laborum ullam corporis, illum sit rerum praesentium assumenda eligendi tenetur velit dolores tempore.
                </p>
            </div>

                    </div>

</div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>Our Courses</h3>
                <div class="underline"></div>

                <?php
            $courses = $db->query("SELECT * FROM courses WHERE status = '0'");
            if ($courses->num_rows > 0) {
                foreach ($courses as $courses_items) {

            ?>
                    <div class="mb-4">

                        <a class="text-decoration-none" href="course?title=<?= $courses_items['slug'] ?>">
                            <div class="card card-body bg-dark">
                                <?= $courses_items['name'] ?>
                            </div>
                        </a>
                    </div>
<?php
                }
            }
?>        

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="card-body">
                        austinchrisiwu@gmail.com
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
    .container {
        margin-top: 8vh !important;
    }

    .underline {
        height: 4px;
        width: 50px;
        background-color: orange;
        margin-bottom: 20px;
    }
</style>