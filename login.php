


<?php
require_once "databases/db_connect.php";
session_start();
// include 'includes/config.php';
include "includes/header.php";
include "databases/captcha.php";
include "includes/timer.php";
?>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <?php if (isset($_SESSION["auth"])) {
     $_SESSION["message"] = "You are already logged in";
     header("Location:user/home");
     exit();

     // setcookie('logincookie', $_SESSION['auth_user'], time()+30);
 } ?>
<title>Login</title>

    <?php include "includes/navbar.php"; ?>

      <div class="container-contact100">
        <div class="wrap-contact100">

          <h1 class="contact100-form-title mt-4 mb-4">
            Log In
          </h1>

          <?php include "includes/message.php"; ?>

          <form action="logincode.php" method="post" class="contact100-form reglogform">

            <div class="wrap-input100">
              <span class="label-input100" for="username">Username</span>
              <input class="input100" type="text" id="username" name="username">
            </div>

            <div class="wrap-input100">
              <span class="label-input100" for="password">Password</span>
              <input class="input100" type="password" name="password" id="password">
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="terms" id="terms">
              <label class="form-check-label" for="terms">
                Remember me?
              </label>
            </div>

            <!-- recaptcha -->
            <div class="d-flex justify-content-center position-relative pt-3 pb-3">
              <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
            </div>

            <?php if (isset($_SESSION["login_attempts"]) && $_SESSION["login_attempts"] > 2): ?>
              <?php if (!isset($_SESSION["locked"]) || $_SESSION["locked"] === 0): ?>
                <?php $_SESSION["locked"] = time() + 30 ?>
                <p class="text-center">
                  Please wait for 30 seconds
                </p>
                <script>
                  setTimeout(() => window.location = window.location, 1000 * 30)
                </script>
              <?php elseif (time() >= $_SESSION["locked"]): ?>
                <?php
                  $_SESSION["login_attempts"] = 0;
                  $_SESSION["locked"] = 0;
                ?>
                <button type="submit" id="submit" class="contact100-form-btn" name="login">Login</button>
              <?php else: ?>
                <p class="text-center">
                  Please wait for 30 seconds
                </p>
                <script>
                  setTimeout(() => window.location = window.location, 1000 * 30)
                </script>
              <?php endif; ?>
            <?php else: ?>
              <button type="submit" id="submit" class="contact100-form-btn" name="login">Login</button>
            <?php endif; ?>
          </form>

          <!-- registration link -->
          <div class="mt-3 mb-3 text-center">
            <span class="d-block">
              Don't have an account?
            </span>
            <a class="d-block" style="color: orange" href="register.php">
              Register here
            </a>
          </div>

          <!-- forgot password link -->
          <div class="mt-3 text-center">
            <a href="password_reset.php" style="color: orange;">Forgot Password?</a>
          </div>

        </div>
      </div>

      <script src="js/nav.js"></script>
      <script src="js/text.js"></script>
      <script src="js/bootstrap5.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
      <script src="js/login.js"></script>
      <script>
      //toggle password
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
      });


      setTimeout(function () {
        $("#loading").hide();
      }, 3100);
      setTimeout(function () {
        $(".content").show();
      }, 3000);

      function onFormSubmit() {
        event.preventDefault();

        console.log("Mined");
      }
      </script>
      </div>
    </main>

    <script src="../js/nav.js"></script>
    <script src="../js/text.js"></script>
    <script src="../js/bootstrap5.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
  @import url("css/fonts.css");
  @import url("css/util.css");
  @import url("css/login.css");

  #head {
    position: sticky;
  }

  /*
  input:invalid{
    animation: shake 300ms;
    border:1px solid red;
  }
  input:valid{
    border:1px solid green;
  }
  @keyframes shake{
    25% {transform: translateX(4px);}
    50% {transform: translateX(-4px);}
    75% {transform: translateX(4px);}
  }
  */
</style>
