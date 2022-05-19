<?php
// include 'includes/config.php';
session_start();
include "includes/header.php";
if (isset($_SESSION["auth"]) || isset($_COOKIE["logincookie"])) {
    $_SESSION["message"] = "You are already logged in";
    header("Location:user/home");
    exit();
}
require_once "databases/db_connect.php";

$refer = $db->real_escape_string($_GET["refer"]);
?>

    <title>Register</title>
    <?php include "includes/navbar.php"; ?>


    <section id="register">
      <div class="reg">
        <h1 class="hreglog">REGISTER</h1>
        <?php include "includes/message.php"; ?>
        <form action="registercode.php" method="post" class="reglogform">
          <label for="">Full Name</label>
        <input class="reginput" type="text" name="name" placeholder="Fullname" autofocus="true" required/><br /><br />
        
        <label for="">Username</label>
        <input class="reginput" type="text" pattern="[A-Za-z0-9_]{5,15}" maxlength="15" title="Must not contain any symbol, not less than 5 and not more than 15 characters"
 name="username" placeholder="Username" autofocus="true" required/><br /><br />
        
        <label for="">Email</label>
<input class="reginput" type="email" name="email" placeholder="Email" autofocus="true" required/><br /><br />
<label for="">Phone Number</label>
<input name="phone" type="tel" id="phone" class="reginput" pattern="[0-9]{11}" title="Not more or less than 11 digits" required/> <br /><br />
<label for="passoword">Password</label>
<input class="reginput js--password" type="password" name="password" placeholder="Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/><i class="bi bi-eye-slash" id="togglePassword"></i><br /><br />
<div class="password-meter" style="display:flex; justify-content:center;">
            <div class="password-meter__bar">
              <div class="password-meter__bar__inner js--password-bar"></div>
            </div> <br>
            <p class="password-meter__label" style="display:flex; justify-content:center;">
              Password Strength: <span class="js--password-text"></span>
            </p>
          </div>
<label for="">Confirm Password</label>
<input class="reginput" type="password" name="confirm_password" placeholder="Confirm Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/><i class="bi bi-eye-slash" id="togglePassword"></i> <br /><br />
<label for="">Refferer</label>
<input class="reginput" type="text" name="refer" placeholder="Refferer" value="<?php echo $refer; ?>" id="refer" readonly/>
          <br /><br />
          <input  type="checkbox"  id="terms"  class="terms"  name="terms"  value="terms"  required/>
          <label for="terms" class="terms"
            >I have read and agreed to the
            <a href="#"> terms and conditions</a> </label
          ><br /><br />
          <button type="submit" id="regs" name="register" value="submit">Register</button>
        </form>
        <p class="reglog">
          Already registered? Login <a href="login">here</a>
        </p>

      </div>
    </section>
    </div>
    <script src="js/nav.js"></script>
<script src="js/text.js"></script>
<script src="js/bootstrap5.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include "includes/footer.php"; ?>      
      <script>
          setTimeout(function () {
            $("#loading").hide();
          }, 3100);
          setTimeout(function () {
            $(".content").show();
          }, 3000);
        </script>
        <script>
                // intl phone number
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {
          separateDialCode: true,
          customPlaceholder: function (
              selectedCountryPlaceholder,
              selectedCountryData
          ) {
              return "e.g. " + selectedCountryPlaceholder;
          },
      });

        </script>
      </div>
    </main>
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
  *,  
 *::before,  
 *::after {  
  box-sizing: border-box;  
  transition: all 0.1s;  
  margin: 0;  
 }  
  .password-meter {  
  width: 100%;  
 }  
 .password-meter__bar {  
  width: 33.333%;  
  height: 1rem;  
  background: #eee;  
  margin-bottom: 1rem;  
  position: relative;  
 }  
 .password-meter__bar__inner {  
  width: 0;  
  height: 100%;  
  display: block;  
  position: absolute;  
  top: 0;  
  left: 0;  
 }  
 .password-meter__label {  
  color: #666;  
  font-size: 1.2rem;  
 }  
 .password-meter__label span {  
  font-weight: bold;  
 } 
</style>

<script>
  ( () => {  
  /**  
   * Parse a password string into a numeric value.  
   *  
   * @param {string} password  
   * @return {number}  
   */  
  let evaluatePassword = ( password ) => {  
   let score = 0;  
   score = password.length;  
   score = ( password.match( /[!]/gmi ) ) ? score + ( password.match( /[!]/gmi ).length * 3 ) : score;  
   score = ( password.match( /[A-Z]/gm ) ) ? score + 3 : score;  
   score = ( password.match( /[0-9]/gmi ) ) ? score + 3 : score;  
   return score;  
  };  
  /**  
   * Convert a numeric score into an object of 'DOM update' data.  
   *  
   * @param {number} score  
   * @return {Object}  
   */  
  let scoreToData = ( score ) => {    
   if ( score >= 30 ) {  
    return {  
     width: '100%',  
     color: '#26de81',  
     label: 'Strong',  
    };  
   } else if ( score >= 20 ) {  
    return {  
     width: '66%',  
     color: '#fd9644',  
     label: 'Medium',  
    };  
   } else {  
    return {  
     width: '33%',  
     color: '#fc5c65',  
     label: 'Weak',  
    };  
   }  
  };  
  window.addEventListener( 'DOMContentLoaded', () => {  
   // Get element refs.  
   let p = document.querySelector( '.js--password' );  
   let b = document.querySelector( '.js--password-bar' );  
   let t = document.querySelector( '.js--password-text' );  
   // Listen for updates to password field.  
   p.addEventListener( 'input', () => {  
    // Convert current value to data.  
    let data = scoreToData( evaluatePassword( p.value ) );  
    // Update DOM.  
    b.style.width = data.width;  
    b.style.background = data.color;  
    t.innerText = data.label;  
   } );  
  } );  
 } )();  
</script>