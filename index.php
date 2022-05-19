 
 <?php
 require_once "databases/db_connect.php";
 include_once "visitor_log.php";

 session_start();
 // include 'includes/config.php';
 include "includes/header.php";
 if (isset($_SESSION["auth"]) || isset($_COOKIE["logincookie"])) {
     // $_SESSION['message'] = "You are already logged in";
     header("Location:user/home");
     exit();
 }
 ?>
 <title>Spectra Web-X</title>

      <?php include "includes/navbar.php"; ?>
      <div id="Specweb">
        <div class="area">
          <h1>Welcome To Spectra Web-X</h1>
          <br />
          <p class="Intro">A Home Of Digital Learning And Entrepreneurship</p>
          <br />

          <a href="login.php" title="login">LOG IN</a>
          <a href="register.php" title="New Account">CREATE ACCOUNT</a>
        </div>
        <img src="assets/payscribe-woman (1).png" class="image" />
      </div>
      <div class="textanim">
        <div class="texts">
          <!-- <p class="textt">Spectra Web-X:</p> -->
          <div class="console-container">
            <span id="text"></span>
            <div class="console-underscore" id="console">|</div>
          </div>
        </div>
        <br />
        <div class="stuff">
          <img src="assets/photo_2022-01-21_00-23-05-removebg-preview.png" class="simg1" />
          <img src="assets/images__2_-removebg-preview.png" class="simg2 reveal" />
          <img src="assets/pexels-worldspectrum-844124-removebg-preview.png" class="simg3 reveal" />
          <img src="assets/pexels-alesia-kozik-6771900-removebg-preview.png" class="simg reveal" />
        </div>

      </div>
      <div class="oover">
        <p class="globes reveal">
          <b>Spectra Web-X</b> is an International multi-company that offers
          you all <b>Digital, Web, CryptoCurrency Trading, Airdrops.</b> All
          services around the globe.<br /><br />
        </p>

        <div class="overall">
          <div class="over reveal">
            <img src="assets/download-removebg-preview.png" /><br />

            <span>SPECTRA CRYPTO-EXCHANGE</span><br />
            <p class="out">
              You can trade your coins (BTC, ETH, LTC, BNB) <br />with us at a
              fast and reliable rate
              <br />
            </p>
          </div>
          <div class="over reveal">
            <img src="assets/airdrop-removebg-preview.png" /><br />

            <span>AIRDROPS</span><br />
            <p class="out">
              Most people earn alot of money by performing crypto airdrops<br />
              You can join our WhatsApp Airdrop group
              <a href="https://chat.whatsapp.com/LU8Qv7O2SAaA7BfdwZkMhB" target="_blank">AIRDROP UPDATES</a><br />
            </p>
          </div>

          <div class="over reveal">
            <img src="assets/globe-removebg-preview.png" /><br />

            <span>FULLSTACK WEB DEVELOPMENT</span><br />
            <p class="out">
              Learn to create your own website <br />Also be a master of the
              following (HTML, CSS, JS, PHP, REACTJS..)<br />
            </p>
          </div>
          <div class="over reveal">
            <img src="assets/ai-removebg-preview.png" /><br />

            <span>ARTIFICIAL INTELLIGENCE</span><br />
            <p class="out">
              Learn how to make your own AI such as SIRI and Google Assistant
              <br />(Python)<br />
            </p>
          </div>
          <div class="over reveal">
            <img src="assets/game-removebg-preview.png" /><br />

            <span>GAME DEVELOPMENT</span><br />
            <p class="out">
              Learn how to create your own games<br />Using (C++, #C, Python)
              <br />
            </p>
          </div>
          <div class="over reveal">
            <img src="assets/graphics1-removebg-preview.png" /><br />

            <span>GRAPHICS DESIGN</span><br />
            <p class="out">
              Learn how to be an expert in designing and editing graphics<br />
              (Corel Draw, Photoshop)
              <br />
            </p>
          </div>
        </div>
        <button id="scrolltotop">
          <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </button>
        <div id="about">
          <img src="assets/vc.png" />
        </div>
      </div>
      <div id="extra">

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
        labore quas vel quod voluptatum minus quaerat dolor voluptatibus, odio
        maxime fugit incidunt laborum placeat cum earum officia veniam et
        deserunt.
      </div>
<?php include "includes/footer.php"; ?>      
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
