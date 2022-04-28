    <title>Contact Us</title>
    <?php
      include 'includes/header.php';
      include 'includes/navbar.php';
      ?>
<section id="touch">
    <div class="cont">Get In Touch With Us
    <p class="get"> And experience the globe in your hands</p>
    </div>
    <img src="assets/contact.png">
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
        </button> 
      </form>

</section>

<?php
include 'includes/footer.php';
?>      
<script src="js/ball.js"></script>
<script>
          setTimeout(function () {
            $("#loading").hide();
          }, 3100);
          setTimeout(function () {
            $(".content").show();
          }, 3000);
        </script>
      </div>
    </main>

    <script src="../js/nav.js"></script>
    <script src="../js/text.js"></script>
    <script src="../js/bootstrap5.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


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
}
</style>