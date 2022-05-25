<?php
session_start();
include "../databases/db_connect.php";

function base_url($slug){
    echo 'http://localhost/portfolio/blog/'.$slug;
}

?>