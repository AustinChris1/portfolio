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
                        Home
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Academy Courses
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <?php
                            $course_category = $db->query(
                                "SELECT * FROM academy WHERE status = '0'"
                            );
                            if ($course_category->num_rows > 0) {
                                foreach ($course_category as $courseitems) { ?>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?= $courseitems[
                                        "name"
                                    ] ?>" aria-expanded="false" aria-controls="collapse<?= $courseitems[
    "name"
] ?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        <?= $courseitems["name"] ?>
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapse<?= $courseitems[
                                        "name"
                                    ] ?>" aria-labelledby="<?= $courseitems[
    "name"
] ?>" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            
                                            <?php
                                            $scourse = $db->query(
                                                "SELECT * FROM courses WHERE status = '0'"
                                            );
                                            if ($scourse->num_rows > 0) {
                                                foreach (
                                                    $scourse
                                                    as $scourseitems
                                                ) { ?>
                                            
                                                    <a class="nav-link" href="course?title=<?= $scourseitems[
                                                        "slug"
                                                    ] ?>"><?= $scourseitems[
    "name"
] ?></a>
                                            <?php }
                                            }
                                            ?>

                                        </nav>
                                    </div>
                            <?php }
                            }
                            ?>

                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Student Courses
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePosts" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <?php
                            $scourse = $db->query(
                                "SELECT * FROM courses WHERE status = '0'"
                            );
                            if ($scourse->num_rows > 0) {
                                foreach ($scourse as $scourseitems) { ?>
                                    <a class="nav-link" href="course?title=<?= $scourseitems[
                                        "slug"
                                    ] ?>"><?= $scourseitems["name"] ?></a>
                            <?php }
                            }
                            ?>

                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCourses" aria-expanded="false" aria-controls="collapsecourses">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Extra Courses
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCourses" aria-labelledby="courses" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="course_add">Add courses</a>
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