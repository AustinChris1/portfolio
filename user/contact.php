
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/spinner.css" />
    <link rel="stylesheet" href="../css/phoneview.css" />
    <link rel="stylesheet" href="../css/tabview.css" />
    <link rel="stylesheet" href="../css/mobdesktop.css" />
    <!-- <link rel="stylesheet" href="parallax.css" /> -->
    <link rel="icon" href="../assets/image-removebg-preview.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Contact Us</title>
</head>
<body>
    <div id="loading">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>

    <div class="content">
          <div id="head">
            <div class="Top">
              <a href="home.php">
                <span class="spec">SPECTRA WEB-X</span> <br />
                <br />
                <p class="specd">Digitalizing The World</p></a>
              </div>
            <div class="navbar">
              <nav>
                <a href="#about" title="Community">Our Community</a>
                <a href="contact.php" title="Contact">Contact Us</a>
                <?php if (isset($_SESSION["auth_user"])): ?>

<a href="../courses/">Courses</a>
<a href="../user/logout" title="logout">Log Out</a>

            <?php else: ?>
            <a href="login" title="login">Log In</a>
            <a href="register" title="New Account">Create Free Account</a>
                      <?php endif; ?>
              </nav>
            </div>
            <span class="menu">
              <i class="fas fa-bars"></i>
            </span>
            <span class="close">
            <i class="fa fa-window-close" aria-hidden="true"></i>
                      </span>
          </div>
        <div class="mobile">
          <div class="mobnav">
            <span> <i class="fa fa-user-circle"></i></span>
            <ul>
              <a href="#Community" title="Community">OUR COMMUNITY</a>
              <a href="contact.php" title="Contact">CONTACT US</a>
              <a href="#products" title="Products">PRODUCTS & SERVICES</a>
              <?php if (isset($_SESSION["auth_user"])): ?>

            <a href="logout" title="logout">LOG OUT</a>

            <?php else: ?>

            <a href="login" title="login">LOG IN</a>
            <a href="register" title="New Account">CREATE NEW ACCOUNT</a>
            <?php endif; ?>

            </ul>
          </div>
        </div>
<section id="touch">
    <div class="cont">Get In Touch With Us
    <p class="get"> And experience the globe in your hands</p>
    </div>
    <img src="../assets/contact.png">
</section>
<section id="contform">
  <div class="hello"><b>Say Hello</b> <br>
    <p class="tag">    <i class="fas fa-phone"></i><a href="tel:+2348184065307"> +234 818 406 5307</a>  <br>
      <i class="fas fa-envelope"></i> <a href="mailto:austinchrisiwu@gmail.com">austinchrisiwu@gmail.com</a> <br>

</p>
    </div>
    <form action="https://getform.io/f/9a82c230-633d-46aa-8e07-6ecc64153e23" method="post" class="contactform">
        <input class="continputs" type="text" name="username" placeholder="Username" autofocus="true" required/><br /><br />
        <input class="continputs" type="email" name="email" placeholder="Email" autofocus="true" required/><br /><br />
        <input name="phone" type="tel" id="phone" class="continput" placeholder="Phone Number" required/>
        <textarea name="text" rows="4" cols="50" maxlength="200" name="message" placeholder="Your Message">  </textarea>
        <button class="button" type="submit" name="submit" value="submit">
          <div class="icon">
            <svg viewBox="0 0 16 16" class="bi bi-telegram" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
            </svg>
          </div>
          <p>Submit</p>
        </button>    </form>
</section>






    </div>
    <section id="beforefoot">
<div class="quicklinks"><h2>Quick Links</h2>
<br>
<a href="#">Our Community</a>
<a href="about.php">About Us</a>
<a href="contact.php">Contact Us</a>
<a href="register.php">Join Us</a>
</div>
<div class="quick">
  <h2>Services</h2> <br>
<a href="#" title="Exchange">Spectra Exchange</a>
                <a href="#" title="Web Development">Web Development</a>
                <a href="#" title="Artificial Intelligence">Artificial Intelligence</a>
                <a href="#products" title="Airdrops">Airdrop Updates</a>
                <a href="login.php" title="Game Development">Game Development</a>
                <a href="register.php" title="Graphics Design">Graphics Design</a>

</div>
<div class="bfr">
  <div class="fia">
    <div class="fi">
      <a href="https://twitter.com/IwuAustinChris1" target="_blank"><i class="fa fa-twitter" id="twitter"></i></a>
  </div>
<div class="fi">        
<a href="https://wa.me/+2348184065307/" target="_blank"> <i class="fa fa-whatsapp" id="whatsapp"></i></a>
</div>
<div class="fi">        
<a href="https://facebook/spectrawebx/" target="_blank"><i class="fa fa-facebook" id="fb"></i></a>
</div>
<div class="fi">        
<a href="https://linkedin.com/" target="_blank"><i class="fa fa-linkedin" id="linkedin"></i></a>
</div>
<div class="fi">        
<a href="https://instagram.com/iwuaustinchris/" target="_blank"><i class="fa fa-instagram" id="linkedin"></i></a>
</div>
<div class="fi">        
<a href="https://t.me/AustinChris1/" target="_blank"><i class="fa fa-telegram" id="telegram"></i></a>
</div>
</div>
<div class="subscribe">
  <form action="index.php" method="post">
  <label for="email">Subscribe To Our Newsletter</label> <br>
  <input type="email" name="email" placeholder="Email" class="subemail">
  <button type="submit" class="subb">
  <span>Subscribe</span>
</button>
</form>
</div>
</div>
</section>
<footer>
© 2022 | All Rights Reserved | Spectra Web-X
</footer>


    <script>
        setTimeout(function () {
          $("#loading").hide();
        }, 2100);
        setTimeout(function () {
          $(".content").show();
        }, 2000);
      </script>
    </div>

  <script src="../js/nav.js"></script>
<script src="../js/ball.js"></script>

</body>
</html>
<style>
    body{
        overflow: hidden;
        width: 100%;
        height: 100%;
    }
</style>
<style>    
/* From cssbuttons.io by @fanishah */
.button {
 font-family: inherit;
 background: black;
 color: white;
 padding: 0.35em 0;
 font-size: 20px;
 border: none;
 border-radius: 0.7em;
 letter-spacing: 0.08em;
 position: relative;
 display: flex;
 align-content: center;
 align-items: center;
 overflow: hidden;
 height: 2.5em;
 padding-left: 2.8em;
 padding-right: 0.9em;
 margin:10px 20px auto;
 cursor: pointer;
}

.button .icon {
 background: black;
 height: 2em;
 width: 2em;
 border-radius: 2em;
 position: absolute;
 display: flex;
 align-items: center;
 justify-content: center;
 left: 0.4em;
 transition: all 0.5s;
}

.icon svg {
 margin-left: 0.4em;
 transition: all 0.5s;
 color: orange;
 width: 1.2rem;
 height: 1.5rem;
}

.button:hover .icon svg {
 transform: rotate(360deg);
}

.button:hover .icon {
 width: calc(100% - 0.85rem);
 border-radius: 0.5em;
}</style>