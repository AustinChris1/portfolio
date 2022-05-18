<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
session_start();
include 'databases/db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
require_once '.env.php';


function sendemail_verify($name, $email, $verify_token)
{
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth   = true;
  $mail->SMTPSecure = "ssl";
  $mail->Port = 465;

  $mail->Username   = $env_pass;
  $mail->Password   = $env_mail;

  $mail->setFrom("spectrawebx@gmail.com", "Spectra Web-X");
  $mail->addAddress($email);

  //Content
  $mail->isHTML(true);
  $mail->Subject = "Spectra Web-X Email Verification";

  $email_template = "
    <h2>Hello $name, Welcome to Spectra Web-X</h2>
    <img src='https://ibb.co/rb0f5tc' width='200px' height='200px'>
    <h5>Thanks for your registration.<br> Please verify your email address by clicking the button below</h5><br/><br/>
    <a style='background-color:orange; color:white; padding: 2px 2px 2px 2px ' href='http:/192.168.43.46/portfolio/verify-email.php?token=$verify_token'>Verify my account</a>

    ";
  // 'https://unsplash.it/801'
  $mail->Body = $email_template;
  $mail->send();
}
function updateRefferal($db, $refer)
{
  $updateref = $db->query("SELECT * FROM spectradb WHERE username = '$refer'");
  // $uresult = mysqli_query($GLOBALS['con'], $updateref);
  if ($updateref) {
    if ($updateref->num_rows > 0) {
      $result_fetch = $updateref->fetch_assoc();
      $bal = $result_fetch['ref_bal'] + 1000;
      $bal_email = $result_fetch['email'];
      $update_bal = $db->query("UPDATE spectradb SET ref_bal = '$bal' WHERE email='$bal_email'");
      if (!$update_bal){
        $_SESSION['message'] = "Something went wrong!";
        header("Location: register");
        exit();
      }
    } else {
      $_SESSION['message'] = "Invalid User";
      header("Location: register");
      exit();
    }
  }
  else{
    $_SESSION['message'] = "Something went wrong!";
    header("Location: register");
    exit();

  }
}


if (isset($_POST['register'])) {





  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $phone = $_POST['phone'];
  $refer = $_POST['refer'];


  $name = htmlentities($name);
  $name = strip_tags($name);
  $name = $db->real_escape_string($name);

  $email = htmlentities($email);
  $email = strip_tags($email);
  $email = $db->real_escape_string($email);

  $username = htmlentities($username);
  $username = strip_tags($username);
  $username = strtolower($username);
  $username = $db->real_escape_string($username);

  $password = htmlentities($password);
  $password = strip_tags($password);
  $password = $db->real_escape_string($password);
  $password = md5($password);
  // Validate password strength
  // $uppercase = preg_match('@[A-Z]@', $password);
  // $lowercase = preg_match('@[a-z]@', $password);
  // $number    = preg_match('@[0-9]@', $password);
  // $specialChars = preg_match('@[^\w]@', $password);

  // if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
  // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
  // }else{
  // echo 'Strong password.';
  // }

  $confirm_password = htmlentities($confirm_password);
  $confirm_password = strip_tags($confirm_password);
  $confirm_password = $db->real_escape_string($confirm_password);
  $confirm_password = md5($confirm_password);


  $phone = htmlentities($phone);
  $phone = strip_tags($phone);
  $phone = $db->real_escape_string($phone);

  $refer = htmlentities($refer);
  $refer = strip_tags($refer);
  $refer = $db->real_escape_string($refer);

  $verify_token = md5(rand());

  $created = date("Y-m-d H:i:s");






  if ($password == $confirm_password) {

    $query = $db->query("SELECT * FROM spectradb WHERE email='$email' or username='$username' #or phone='$phone'");
    //refferal user must be an existing user or empty
    //check if querry equal to one
    if ($query->num_rows > 0) {
      $_SESSION['message'] = "Username or Email exists";
      header("Location: register");
      exit();
    } else {
      if ($refer != '') {
        updateRefferal($db, $refer);
      }


      //inserting data
      $createquery = $db->query("INSERT INTO spectradb (name, email, username, password, phone, verify_token, referrer, created) VALUES('$name', '$email','$username', '$password','$phone', '$verify_token', '$refer', '$created')");

      if ($createquery) {
        sendemail_verify("$name", "$email", "$verify_token");
        header("Location: email_verify");
        exit();
      } else {
        $_SESSION['message'] = "Something went wrong!";
        header("Location: register");
        exit();
      }
    }
  } else {
    $_SESSION['message'] = "Password does not match";
    header("Location: register");
    exit();
  }

  $db->close();
}
// $query = $db->query("SELECT * FROM spectradb");
// if($query->num_rows>0){
//   foreach ($query as $ruser) {
//       $referraluser = $ruser['username'];
//   echo $referraluser;
// }
// }
// $refquery = $db->query("SELECT * FROM spectradb WHERE username = '$username'");
// if ($refquery->num_rows > 0) {
//   $ruser = $refquery->fetch_assoc();
//   $referraluser = $ruser['username'];
//   if ($refer == $referraluser || empty($refer)) {
?>

<script src="../js/bootstrap5.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>