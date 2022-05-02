<?php
include_once 'databases/db_connect.php';

//get current page url
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];

//get server related info
$user_ip_address = $_SERVER['REMOTE_ADDR'];
$referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/';
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$visitlog = $db->prepare("INSERT INTO visitor_logs (page_url, referrer_url, user_ip_address, user_agent, created) VALUES (?,?,?,?,NOW())");

$visitlog -> bind_param("ssss", $currenturl, $referrer_url, $user_ip_address, $user_agent);

$insert = $visitlog->execute();



?>