<?php
include 'includes/header.php';
include 'includes/navbar.php';

?>
<div class="page">
        <img src="assets/email-v1.gif" alt="" class="emailimg">
        <p class="verify">Registration Successful!<br>
    Please verify your email to login</p>
<br>
<p class="resend">Did not receive your verification email? <a href='resend_email_verification'>Resend</a></p>
    </div>
    <?php
include 'includes/footer.php';
?>      
      <script>
          setTimeout(function () {
            $("#loading").hide();
          }, 3100);
          setTimeout(function () {
            $(".content").show();
          }, 3000);
        </script>

<style>
    .page{
        margin-top: 7rem;
        width: 100%;
        height: 100%;
        background-color: #fff;
    }
    .emailimg{
        display: flex;
        align-content: center;
        align-self: center;
        margin: auto;
        justify-self: center;
    }
    .verify{
        text-align: center;
        display: block;
        align-content: center;
        align-self: center;
        margin-top: 5rem;
        justify-self: center;
        color: orange;
        font-size: 15px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .resend{
        text-align: center;
        display: block;
        align-content: center;
        align-self: center;
        justify-self: center;
        color: black;
        font-size: 15px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .resend a{
        color: blue;
    }
</style>