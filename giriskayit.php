<?php
include 'baglanti.php';


session_start();
if(isset($_SESSION['id'])) header("location: anasayfa.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>ilan</title>
    <link rel="stylesheet" href="Tasarım/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CDN -->
</head>
   <body>
      <div class="giris_sayfasi"></div>
      <div class="kyt_grs_menu">
        <div class="title-text">
           <div class="title login">Giriş Menüsü</div>
           <div class="title signup">Kayıt Menüsü</div>
        </div>
        <div class="form-container">
           <div class="slide-controls">
              <input type="radio" name="slide" id="login" checked>
              <input type="radio" name="slide" id="signup">
              <label for="login" class="slide login">Giriş Yap</label>
              <label for="signup" class="slide signup">Kayıt Ol</label>
              <div class="slider-tab"></div>
           </div>
           <div class="menu-ici">
              <form action="#" class="login" id="LoginForm">
                 <div class="message" id="loginMessage"></div> 
                 <div class="field">
                    <input type="text" name="Login_email" placeholder="Mail Adresi" required>
                 </div>
                 <div class="field">
                    <input type="password" name="login_password" placeholder="Şifre" required>
                 </div>
                 <div class="pass-link"></div>
                 <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Giriş Yap">
                 </div>
                 <div class="signup-link">
                    Üye Değil Misiniz? <a href="" style="color: DodgerBlue;">Şimdi Kayıt Olun!</a>
                 </div>
                 <div class="forgot-pass-link" style="text-align: center;"> 
                    Şifremi <a href="forgot-password.php" style="color: DodgerBlue;">Unuttum!</a>
                 </div>
              </form>
              <form action="#" class="signup" id="KAYITFORM">
                 <div class="message" id="signupMessage"></div>
                 <div class="field">
                    <input type="email" name="eposta" placeholder="Mail Adresi" required>
                 </div>
                 <div class="field">
                    <input type="password" name="sifre" placeholder="Şifre" required>
                 </div>
                 <div class="field">
                    <input type="text" name="ad" placeholder="Adınızı Girin" required>
                 </div>
                 <div class="field">
                    <input type="text" name="soyad" placeholder="Soyadınızı Girin" required>
                 </div>
                 <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Kayıt Ol">
                 </div>
                 <div class="login-link">
                    Zaten Hesabınız Var Mı? <a href="" style="color: DodgerBlue;">Giriş Yapın!</a>
                 </div>
              </form>
           </div>
        </div>
     </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         const loginLink = document.querySelector("form .login-link a");

         signupBtn.onclick = () => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
         };

         loginBtn.onclick = () => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
         };

         signupLink.onclick = () => {
            signupBtn.click();
            return false;
         };

         loginLink.onclick = () => {
            loginBtn.click();
            return false;
         };

         $("#KAYITFORM").submit((e) => {
            e.preventDefault();
            var form = $("#KAYITFORM").serialize();
            $.ajax({
               url: "ajax.php",
               method: 'post',
               data: form,
               success: function(res) {
                  $("#signupMessage").html(res);
                  $("#KAYITFORM")[0].reset();
               }
            })
         })

         $("#LoginForm").submit((e) => {
            e.preventDefault();
            var form_login = $("#LoginForm").serialize();
            $.ajax({
               url: "ajax.php",
               method: 'post',
               data: form_login,
               success: function(res) {
                  var data = $.parseJSON(res);
                  $("#loginMessage").html(data.message);
                  if (data.status == 'success') {
                     window.location = 'anasayfa.php';
                  }
               }
            })
         })


         $("#LoginForm").submit((e) => {
    e.preventDefault();
    var form_login = $("#LoginForm").serialize();
    $.ajax({
        url: "ajax.php",
        method: 'post',
        data: form_login,
        success: function(res) {
            var data = $.parseJSON(res);
            $("#loginMessage").html(data.message);
            if (data.status == 'success') {
                window.location = 'anasayfa.php';
            } else if (data.status == 'redirect') {
               
                window.location = data.redirect_url;
            }
        }
    })
})





      </script>
   </body>
</html>
