<div id="layoutSidenav">
    <?php $page = substr(
        $_SERVER["SCRIPT_NAME"],
        strrpos($_SERVER["SCRIPT_NAME"], "/") + 1
    ); ?>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link <?= $page == "index.php"
                                            ? "active"
                                            : "" ?>" href="index">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <?php if ($_SESSION["auth_role"] == "super") : ?>

                        <a class="nav-link <?= $page ==
                                                "view_registered.php"
                                                ? "active"
                                                : "" ?>" href="view_registered">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Registered Users
                        </a>
                    <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "category_add.php" ||
                                                        $page == "category_view.php" ||
                                                        $page == "category_edit.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page ==
                                                "category_add.php" ||
                                                $page == "category_view.php" ||
                                                $page == "category_edit.php"
                                                ? "show"
                                                : "" ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "category_add.php"
                                                    ? "active"
                                                    : "" ?>" href="category_add">Add Category</a>
                            <a class="nav-link <?= $page ==
                                                    "category_view.php" ||
                                                    $page == "category_edit.php"
                                                    ? "active"
                                                    : "" ?>" href="category_view">View Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "post_add.php" ||
                                                        $page == "post_view.php" ||
                                                        $page == "post_edit.php" ||
                                                        $page == "post_history.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Posts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page == "post_add.php" ||
                                                $page == "post_view.php" ||
                                                $page == "post_edit.php" ||
                                                $page == "post_history.php"
                                                ? "show"
                                                : "" ?>" id="collapsePosts" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "post_add.php"
                                                    ? "active"
                                                    : "" ?>" href="post_add">Add Posts</a>
                            <a class="nav-link <?= $page ==
                                                    "post_view.php" ||
                                                    $page == "post_edit.php" ||
                                                    $page == "post_history.php"
                                                    ? "active"
                                                    : "" ?>" href="post_view">View Posts</a>
                        </nav>
                    </div>


                    <a class="nav-link collapsed <?= $page ==
                                                        "academy_add.php" ||
                                                        $page == "academy_view.php" ||
                                                        $page == "academy_edit.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAcademy" aria-expanded="false" aria-controls="collapseAcademy">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Academy
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page ==
                                                "academy_add.php" ||
                                                $page == "academy_view.php" ||
                                                $page == "academy_edit.php"
                                                ? "show"
                                                : "" ?>" id="collapseAcademy" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "academy_add.php"
                                                    ? "active"
                                                    : "" ?>" href="academy_add">Add New Academy Course</a>
                            <a class="nav-link <?= $page ==
                                                    "academy_view.php" ||
                                                    $page == "academy_edit.php"
                                                    ? "active"
                                                    : "" ?>" href="academy_view">View Academy Courses</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "course_add.php" ||
                                                        $page == "course_view.php" ||
                                                        $page == "course_edit.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCourses" aria-expanded="false" aria-controls="collapsecourses">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Courses
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page ==
                                                "course_add.php" ||
                                                $page == "course_view.php" ||
                                                $page == "courses_edit.php"
                                                ? "show"
                                                : "" ?>" id="collapseCourses" aria-labelledby="courses" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "course_add.php"
                                                    ? "active"
                                                    : "" ?>" href="course_add">Add courses</a>
                            <a class="nav-link <?= $page ==
                                                    "course_view.php" ||
                                                    $page == "course_edit.php"
                                                    ? "active"
                                                    : "" ?>" href="course_view">View courses</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <?php if (isset($_SESSION["auth_user"])); ?>

                <div class="small">Logged in as:
                    <?= $_SESSION["auth_user"]["username"] ?> <br>
                    Spectra Blog
                </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
    <main>
