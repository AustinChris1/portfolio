<?php
session_start();
include "databases/db_connect.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require "vendor/autoload.php";
require_once ".env.php";

function resend_email_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->Username = $env["gmail_username"];
    $mail->Password = $env["gmail_password"];

    $mail->setFrom("spectrawebx@gmail.com", "Spectra Web-X");
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Resend - Spectra Web-X Email Verification";

    $email_template = "
    <h2>Hello $name, You have registered with Spectra Web-X</h2>
    <h5>Verify your email address with the link given below</h5><br/><br/>
    <a href='http://localhost/portfolio/verify-email.php?token=$verify_token'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST["resend_email_verify_btn"])) {
    $email = $db->real_escape_string($email);
    $email = $_POST["email"];

    $email_query = $db->query(
        "SELECT * FROM spectradb WHERE email = '$email' LIMIT 1"
    );

    if ($email_query->num_rows > 0) {
        $row = $email_query->fetch_array();
        if ($row["verify_status"] == "0") {
            $row = $row["name"];
            $row = $row["email"];
            $row = $row["verify_token"];
            resend_email_verify("$name", "$email", "$verify_token");
            $_SESSION["message"] =
                "Email link verification link has been sent to your email address";
            header("location: login");
            exit();
        } else {
            $_SESSION["message"] = "Email is already verified. Please login.";
            header("location: resend_email_verification");
            exit();
        }
    } else {
        $_SESSION["message"] = "Email is not registered. Please register now!";
        header("location: register");
        exit();
    }
}
?>




<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <?php include "includes/message.php"; ?>
                    <div class="card-header">
                        <h5>Resend Email Verification</h5>
                    </div>
                    <div class="card-body">
                        <form action="resend_email_verification.php" method="post">
                        <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control" required placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="resend_email_verify_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
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
