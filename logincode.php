<?php
session_start();
require_once 'databases/db_connect.php';
include 'databases/captcha.php';
include_once 'includes/timer.php';
?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = htmlentities($username);
    $username = strip_tags($username);
    $username = $db->real_escape_string($username);

    $password = htmlentities($password);
    $password = strip_tags($password);
    $password = $db->real_escape_string($password);
    $password = md5($password);

$user_ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];


    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretkey}&response={$recaptchaResponse}&{$user_ip_address}";
    $content = file_get_contents($request);
    $json = json_decode($content);
    // if($json -> success == "true"){
//get server related info
$loginact = $db->prepare("UPDATE spectradb SET user_ip_address='$user_ip_address', user_agent='$user_agent', last_activity= NOW() WHERE username='$username'");

$loginact -> bind_param("ssss", $user_ip_address, $user_agent);

$insert = $loginact->execute();

$browser = get_browser(null, true);
    $browser_info = $browser["browser"] . " " . $browser["device_type"] . " " . $browser["platform"];
 
    $user_ip = getenv('REMOTE_ADDR');
    $user_ip = "197.210.227.38";
 
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];
    $last_login_location = $country . ", " . $city;
    //query the database

    $query = $db->query("SELECT * from spectradb WHERE username='$username' and password='$password' LIMIT 1");
   

if($loginact){
    if ($query->num_rows > 0) {

      $loginrow = $query->fetch_array();
      if ($loginrow['verify_status'] == '1') {

        foreach ($query as $data) {
          $user_id = $data['id'];
          $username = $data['username'];
          $email = $data['email'];
          $usertype = $data['usertype'];
          $referrer = $data['referrer'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$usertype";
        $_SESSION['auth_user'] = [
          'id' => $user_id,
          'username' => $username,
          'email' => $email,
          'referrer' => $referrer
          // 'user_image' => $user_image,
        ];
                 setcookie('logincookie', $_SESSION['auth_user']['id'], time()+60*60*24*30, "/");
          setcookie('logincookie_name', $_SESSION['auth_user']['username'], time()+60*60*24*30, "/");
          
 $trust = $db->query("INSERT INTO devices (user_id, browser_info, last_login, last_login_location) VALUES ('" . $_SESSION['auth_user']['id'] . "', '" . $browser_info . "', NOW(), '" . $last_login_location . "')");
        if($trust){
          if(isset($_COOKIE['logincookie'])){

        if ($_SESSION['auth_role'] == 'admin') {
          $_SESSION['message'] = "Hello Admin, Welcome To Dashboard";
          header("Location: admin/");
          exit(0);
        } elseif ($_SESSION['auth_role'] == '') {
          $_SESSION['message'] = "Login Successful";
          header('Location: user/home');
          exit(0);
        } elseif ($_SESSION['auth_role'] == 'super') {
          $_SESSION['message'] = "Hello Admin, Welcome To Dashboard";
          header('Location: admin/');
          exit(0);
        }
        }
      }
      else{
        $_SESSION['message'] = "Trust Failed";
        header('Location: login');
        exit(0);
      }
      
      } else {
        // $_SESSION['login_attempts'] += 1;
        $_SESSION['message'] = "Please verify your email address to login";
        header('Location: login');
        exit();
      }
    } else {
      $_SESSION['login_attempts'] += 1;
      $_SESSION['message'] = "Incorrect Username or Password";
      header('Location: login');
      exit(0);
    }
  }
  else{
    $_SESSION['message'] = "Failed";
    header('Location: login');
    exit(0);

  }
// }
// else{
//   $_SESSION['message'] = "Captcha Failed";
//   header('Location: login');
//   exit(0);

// }
  }
}

$browser = get_browser(null, true);
//     $browser_info = $browser["browser"] . " " . $browser["device_type"] . " " . $browser["platform"];
// echo $browser_info;

print_r($browser);
?>

