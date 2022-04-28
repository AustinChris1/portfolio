<?php
session_start();
include 'databases/db_connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token){

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";  
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->Username   = "spectrawebx@gmail.com";                   
    $mail->Password   = "Spectra321";     

    $mail->setFrom("spectrawebx@gmail.com","Spectra Web-X");
    $mail->addAddress($get_email);

    //Content
    $mail->isHTML(true);                              
    $mail->Subject = "Reset Password Notification";

    $email_template ="
    <h2>Hello $get_name</h2>
     <h3>You are receiving this email because we received a password reset request for your account</h3>
  <br/><br/>
    <a href='http://localhost/portfolio/password_change?token=$token&email=$get_email'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();

}
if(isset($_POST['reset_password'])){
    $email = $db->real_escape_string($email);
    $email = $_POST['email'];
    $token = md5(rand());
    $check_email = $db->query("SELECT email,name FROM spectradb WHERE email = '$email' LIMIT 1");
    if($check_email->num_rows>0)
{
    $row = $check_email->fetch_array();
    $get_name = $row['name'];
    $get_email = $row['email'];

    $update_token = $db->query("UPDATE spectradb SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1");

    if($update_token){
        send_password_reset("$get_name","$get_email","$token");
        $_SESSION['message'] = "A password reset link has been sent to your email";
        header('location: password_reset');
        exit();
     

    }
    else{
        $_SESSION['message'] = "Something went wrong!";
        header('location: password_reset');
        exit();
     
    }
}
else{
    $_SESSION['message'] = "No email found";
    header('location: password_reset');
    exit();
}
}
else{

}

?>




<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <?php
                    include 'includes/message.php';
                    ?>
                    <div class="card-header">
                        <h5>Reset Password</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="password_reset.php" method="post">
                        <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control" required placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="reset_password" class="btn btn-primary">Send Password Reset Link</button>
                            </div>
                        </form>
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
          setTimeout(function () {
            $("#loading").hide();
          }, 1100);
          setTimeout(function () {
            $(".content").show();
          }, 1000);
        </script>
        <style>
  .container{
    margin-top: 22vh !important;
  }
</style>
