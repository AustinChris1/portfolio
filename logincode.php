<?php
session_start();
require_once 'databases/db_connect.php';
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

    //query the database

    $query = $db->query("SELECT * from spectradb WHERE username='$username' and password='$password' LIMIT 1");

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
        $query = $db->query("UPDATE spectradb SET last_activity = NOW() WHERE id = '$user_id'");
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
}

// else{
//   $_SESSION['message'] = "You are not allowed to access here";
//   header('Location: login.php');
//   exit();
// }
// $recaptcha = $_POST['g-recaptcha-response'];
// $res = reCaptcha($recaptcha);
// if($res['success']){
//   // Send email
// }else{
//   // Error
// }
// function reCaptcha($recaptcha){
//   $secret = "6LdYB6ceAAAAAHeagLJGAdDa87rHEQq1j2TjsjF1";
//   $ip = $_SERVER['REMOTE_ADDR'];

//   $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
//   $url = "https://www.google.com/recaptcha/api/siteverify";
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_URL, $url);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//   curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
//   $data = curl_exec($ch);
//   curl_close($ch);

//   return json_decode($data, true);
// }


?>

