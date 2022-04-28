<?php
include '../includes/authentication.php';

$page_title ="Spectra Blog";
$meta_description ="Blog - Spectra Web-X";
$meta_keyword = "Spectra Blog, Academy";

include 'header.php';
include 'navbar.php';
?>

<div class="py-5 bg-light">
    <div class="container">
        <?php include '../includes/message.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Category</h3>
                <div class="underline"></div>
            </div>
            <?php
            $blog_category = $db->query("SELECT * FROM categories WHERE navbar_status ='0' and status = '0' LIMIT 12");
            if ($blog_category->num_rows > 0) {
                foreach ($blog_category as $blogitems) {

            ?>
                    <div class="col-md-3 mb-4">

                        <a class="text-decoration-none" href="category.php?title=<?= $blogitems['slug'] ?>">
                            <div class="card card-body">
                                <?= $blogitems['name'] ?>
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
                <h3>Latest Posts</h3>
                <div class="underline"></div>

                <?php
            $blog_posts = $db->query("SELECT * FROM posts WHERE status = '0' ORDER BY id DESC LIMIT 12");
            if ($blog_posts->num_rows > 0) {
                foreach ($blog_posts as $blogpost_items) {

            ?>
                    <div class="mb-4">

                        <a class="text-decoration-none" href="post.php?title=<?= $blogpost_items['slug'] ?>">
                            <div class="card card-body bg-dark">
                                <?= $blogpost_items['name'] ?>
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

    .underline {
        height: 4px;
        width: 50px;
        background-color: orange;
        margin-bottom: 20px;
    }
</style>