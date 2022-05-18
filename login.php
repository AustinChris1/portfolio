


<?php

require_once 'databases/db_connect.php';
session_start();
// include 'includes/config.php';
include 'includes/header.php';
include 'databases/captcha.php';
include "includes/timer.php";

?>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <?php
if(isset($_SESSION['auth']) || isset($_COOKIE['logincookie'])){
    $_SESSION['message'] = "You are already logged in";
  header('Location:user/home');
  exit();

// setcookie('logincookie', $_SESSION['auth_user'], time()+30);
}
?>
<title>Login</title>

    <?php
      include 'includes/navbar.php';
      ?>

      <section id="login">
        <div class="log">
          <h1 class="hreglog">LOG IN</h1>
          <?php 
          include 'includes/message.php';
 ?>

          <form action="logincode.php" method="post" class="reglogform">
          <i class="fas fa-user" id="logi"></i>
            <input
              class="logininput"
              type="text"
              name="username"
              placeholder="Username"
              autofocus="true"
              required
              pattern="[A-Za-z0-9_]{5,15}" maxlength="15"
                            title="Must not contain any symbol, not less than 5 and not more than 15 characters"
            /><br /><br /><i class="fas fa-lock" id="logi"></i>
            <input type="password" name="password" id="password" class="logininput" placeholder="Password" autofocus="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
            <i class="bi bi-eye-slash" id="togglePassword"></i>            <br />
            <input  type="checkbox"  id="terms"  class="terms"  name="terms"  required/>
          <label for="terms" class="terms"
            >Remeber Me </label
          ><br /><br />
            <a href="password_reset.php" class="forgot">Forgot Password?</a> <br>
            <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>" id="captcha"></div>
             <?php
  if($_SESSION['login_attempts'] > 2){
    $_SESSION['locked'] = time();
echo "<p> Please wait for 30 seconds</p>";
 }

else{
 ?>
    <button type="submit" id="submit" name="login">Login</button>
<?php
}
?>
          </form>
          <p class="reglog">
            Don't have an account? Register <a href="register.php">here</a>
          </p>
        </div>
      </section>
          <script src="js/nav.js"></script>
<script src="js/text.js"></script>
<script src="js/bootstrap5.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
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


      </script>
      <script>
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
</style>