
<?php



$userLoggedIn = isset($_SESSION['id']);


$k_ilanOlustur_link = $userLoggedIn ? "K_ilanOlustur.php" : "giriskayit.php";
$k_ilanInceleme_link = $userLoggedIn ? "K_ilanInceleme.php" : "giriskayit.php";

$b_ilanOlustur_link = $userLoggedIn ? "B_ilanOlustur.php" : "giriskayit.php";
$b_ilanInceleme_link = $userLoggedIn ? "B_ilanInceleme.php" : "giriskayit.php";
?>



<div class="nesne1" style="background-image: url('Resimler/girlDrinkingCoffee.jpg'); background-repeat: no-repeat; background-position: top left;/*dikey ve yatay hizalansın*/ background-attachment: fixed; /*daha sonra değişebilir*/ background-size: cover;/*boyuta göre ölçeklendirme yapar*/ ">
<!-- Bireysel içerik -->
<div>
    <input type="checkbox" id="check_bireysel">
    <label class="show_button show_button_bireysel" for="check_bireysel">Bireysel</label>
    <div class="background"></div>
    <div class="alert_box">
      <div class="icon">
          <i class="fas fa-pen"></i>
      </div>
      <header>Bireysel</header>
      <p>Seçim yapınız</p>
      <div class="btns">
      <a href="<?php echo $b_ilanOlustur_link; ?>" onclick="return checkLogin()">İş ilanı oluştur</a>
            <br><br>
            <a href="<?php echo $b_ilanInceleme_link; ?>" onclick="return checkLogin()">İş ilanlarını incele</a>
      </div>
    </div>
  </div>


<h1 class="metin1">
    İŞ Mİ ARIYORSUNUZ?
</h1>

<h3 class="metin2" style="font-weight: bold;">
    <pre style="text-shadow: 2px 2px 4px #000000;">Birkaç tıklama ile kendi kriterlerinizi uygun iş ilanları oluşturabilir.</pre>
    <br>
    <pre style="text-shadow: 2px 2px 4px #000000;">Veya firmaların sizler için en uygun ilanlarına göz atabilirsiniz.</pre>
</h3>

</div>


<div class="nesne2" style="background-image: url(' Resimler/EmployeesMeeting.jpg'); background-repeat: no-repeat; background-position: top left;/*dikey ve yatay hizalansın*/ background-attachment: fixed; /*daha sonra değişebilir*/ background-size: cover;/*boyuta göre ölçeklendirme yapar*/ ">
            <!-- kurumsal içerik -->
<div>
    <input type="checkbox" id="check_kurumsal">
    <label class="show_button show_button_kurumsal" for="check_kurumsal">Kurumsal</label>
    <div class="background"></div>
    <div class="alert_box">
        <div class="icon">
            <i class="fas fa-pen"></i>
        </div>
        <header>Kurumsal</header>
        <p>Seçim yapınız</p>
        <div class="btns">
        <a href="<?php echo $k_ilanOlustur_link; ?>" onclick="return checkLogin()">İş ilanı oluştur</a>

            <br><br>
            <a href="<?php echo $k_ilanInceleme_link; ?>" onclick="return checkLogin()">İş ilanlarını incele</a>
        </div>
    </div>
</div>

<h1 class="metin1" style="text-align: right; right: 4%;">
    EKİP ARKADAŞLARI MI ARIYORSUNUZ?
</h1>

<h3 class="metin2" style="text-align: right; right: 4%; color: #366dbf">
    <pre style="color: white; font-weight: bold; text-shadow: 2px 2px 4px #000000;">İş arayan potansiyel ekip üyelerinizi seçebilir

                        Veya firmanız için gerekli kriterlerde iş ilanı yayımlayabilirsiniz.</pre>
</h3>
</div>
<script>
    
    function checkLogin() {
       
        var userLoggedIn = <?php echo $userLoggedIn ? 'true' : 'false'; ?>;
        
        
        if (!userLoggedIn) {
            alert("Öncelikle giriş yapmalısınız, yönlendiriliyorsunuz!");
            
            
            setTimeout(function() {
                window.location.href = "giriskayit.php";
            }, 1000);
            
            return false; 
        }
    }
</script>