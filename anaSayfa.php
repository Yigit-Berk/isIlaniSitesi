<?php
include("fonksiyonlar.php");
?>
<?php

session_start();

include 'baglanti.php';

$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if($id !== null) {
    $sql = "SELECT * FROM kullanicilar WHERE id = '$id'";
    $res = mysqli_query($baglanti, $sql);
    $row = mysqli_fetch_assoc($res);
    $hosgeldiniz_mesaji = "Hoşgeldiniz, " . $row['ad'] . " " . $row['soyad'] . "!";
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>İlanSeç</title>
  <link rel="stylesheet" href="Tasarım/anaSayfaTasarım.css">
  <!--Sosyal medya text ikonları için bağlantı:-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    .alert_box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .show_button {
      padding-left: 30px;
      padding-right: 30px;
      line-height: 65px;
      position: absolute;
      bottom: 6%;
      max-width: 20%;
      max-height: 15%;
      border-radius: 60px;
      border-style: none;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
      font-weight: 500;
      font-size: 20px;
      width: 15%;
      height: 65px;
      background-color: #023466;
      color: #cccccc;
      transition: all ease 0.9s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .show_button:hover {
      background-color: #0b47b1;
      color: #ffffff;
      cursor: pointer;
    }

    .show_button_bireysel {
      right: 4%;
    }

    .show_button_kurumsal {
      left: 4%;
    }

    .background {
      position: absolute;
      height: 100%;
      width: 100%;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.5);
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s ease;
    }

    .alert_box {
      padding: 30px;
      display: flex;
      background: white;
      flex-direction: column;
      align-items: center;
      text-align: center;
      max-width: 450px;
      width: 100%;
      border-radius: 5px;
      z-index: 5;
      opacity: 0;
      pointer-events: none;
      transform: translate(-50%, -50%) scale(0.97);
      transition: all 0.3s ease;
    }

    #check_bireysel:checked~.alert_box,
    #check_kurumsal:checked~.alert_box {
      opacity: 1;
      pointer-events: auto;
      transform: translate(-50%, -50%) scale(1);
    }

    #check_bireysel:checked~.background,
    #check_kurumsal:checked~.background {
      opacity: 1;
      pointer-events: auto;
    }

    #check_bireysel,
    #check_kurumsal {
      display: none;
    }

    .alert_box .icon {
      height: 100px;
      width: 100px;
      color: #0b0061;
      background-color: black;
      border: 3px solid #0b0061;
      border-radius: 50%;
      line-height: 97px;
      font-size: 50px;
    }

    .alert_box header {
      font-size: 35px;
      font-weight: 500;
      margin: 10px 0;
      color: black;
    }

    .alert_box p {
      font-size: 20px;
      color: black;
    }

    .alert_box .btns {
      margin-top: 20px;
    }

    .btns a {
      text-decoration: none;
      display: inline-flex;
      height: 55px;
      padding: 0 30px;
      font-size: 20px;
      font-weight: 400;
      cursor: pointer;
      line-height: 55px;
      outline: none;
      margin: 0 10px;
      border: none;
      color: #fff;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .btns a:first-child {
      background: #2980b9;
    }

    .btns a:first-child:hover {
      background: #2573a7;
    }

    .btns a:last-child {
      background: #2c88c5;
    }

    .btns a:last-child:hover {
      background: #2573a7;
    }
  </style>

</head>

<body>
  <div>

    <header class="header"><!--üst banner-->
      <a href="anaSayfa.php?id=anasayfa" class="logo">ilanSeç</a>

      <nav class="ustPanel">
        <a href="anaSayfa.php?id=anasayfa">Ana Sayfa</a>
        <a href="B_ilanOlustur.php">İş İlanı Ver</a>
        <a href="K_ilanInceleme.php">İş İlanlarını İncele</a>
        <a href="#hakkimizda">Hakkımızda</a>
        <a href="<?php echo isset($_SESSION['id']) ? 'UyeProfilGuncelle.php' : 'giriskayit.php'; ?>">
    <?php echo isset($_SESSION['id']) ? $hosgeldiniz_mesaji : 'Kayıt / Giriş Yapın'; ?></a>
      </nav>
      <!-- <img src="Resimler/img_avatar.png" style="width: 50px; height: 50px;"> -->
    </header>

    

    <!--orta içerik:-->
    <div class="icerik1">

    <?php
    $gid = isset($_GET["id"]) ? $_GET["id"] : '';
    switch ($gid) {
      case "anasayfa": {
        include("anaSayfaIcerik.php");
          break;
        }
      case "hizmetimiz": {
          include("hizmetimiz.php");
          break;
        }
        case "etkilihesap":{
          include("etkilihesap.html");
          
          break;
        }
        case "gizlilik":{
          include("gizlilik.php");
          break;
        }
        case "iletisim":{
          include("iletisim.php");
          break;
        }
        case "sorular":{
          include("anasayfasiksorulanlar.php");
          break;
        }
      default: {
        include("anaSayfaIcerik.php");
          break;
        }
    }
    ?> 
      
    </div>


    <div class="destek">
        <a href="https://api.whatsapp.com/send?phone=905076533195" target="_blank" class="fa-brands fa-square-whatsapp"></a>
    </div>

      </div>
    <!--alt banner-->
    <footer class="footer">
      <div class="container">

        <div class="satır">
          <div class="footer-sütun">
            <h4>Hakkımızda</h4>
            <ul>
              <li><a href="anaSayfa.php?id=iletisim" name="hakkimizda">İletişim</a></li> <!--bu satıra sayfa içi yönlendirme yapıldı-->
              <li><a href="anaSayfa.php?id=gizlilik">Gizlilik</a></li>
              <li><a href="anaSayfa.php?id=hizmetimiz">Hizmetimiz</a></li>
            </ul>
          </div>
          <div class="footer-sütun">
            <h4>Yardım Alın</h4>
            <ul>
              <li><a href="anaSayfa.php?id=etkilihesap">Etkili Hesap Oluşturma</a></li>
              <li><a href="anaSayfa.php?id=sorular">Sık Sorulan Sorular</a></li>
            </ul>
          </div>
          <div class="footer-sütun">
            
          </div>
          <div class="footer-sütun">
            <h4>Bizleri Takip Edin</h4>
            <div class="SosyalMedya-Baglantilar">
              <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a><!--Sosyal medya text'i import edildi-->
              <a href="https://twitter.com/" target="_blank"><i class="fab fa-x"></i></a>
              <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
              <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>

      </div>
    </footer>


  </div>
  <script>
    
    function kontrolEt() {
      var saat = 2; 
      setTimeout(function() {
      
        window.location.href = 'logout.php';
      }, saat * 60 * 60 * 1000); 
    }

   
    window.onload = kontrolEt;
  </script>
</body>

</html>