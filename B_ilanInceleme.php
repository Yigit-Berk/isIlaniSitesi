<?php
session_start();
include 'baglanti.php';

$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if($id !== null) {
    $sql = "SELECT * FROM kullanicilar WHERE id = '$id'";
    $res = mysqli_query($baglanti, $sql);
    $row = mysqli_fetch_assoc($res);
    $hosgeldiniz_mesaji = "" . $row['ad'] . " " . $row['soyad'] . "!";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İş İlanları</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        
        .sidebar {
            flex: 0 0 250px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .job-listing {
            background-color: #fff;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            position: relative; 
        }
        .a {
            text-decoration: none;
            color:black;
        }
        .job-listing img {
            width: 80px;
            height: 80px;
            background-color: #ccc; 
            margin-left: 10px;
            float: left; /* Resmi sola yasla */
            margin-right: 20px; /* Resmin sağında boşluk bırak */
            border-radius: 50%; /* Resmi daire şeklinde yap */
        }
        .job-listing .ilan-tarihi {
            font-size: 12px;
            color: #666;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .job-listing .calisma-sekli {
            font-size: 12px;
            color: #666;
            position: absolute;
            top: 30px;
            right: 10px;
        }
        
        .submit-button {/*Ara butonunun stilleri.*/ 
            background-color: #ccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            float: right; 
        }
        .submit-button:hover {
            background-color: #999; 
        }
        /* scrollbar */
        .scrollable-list {
            max-height: 200px; /* scrollbarın yükseliğini belirliyoruz. */
            overflow-y: auto;
        }
        /* Checkbox listesi */
        .scrollable-list label {
            display: block;
            margin-bottom: 5px;
        }

        .icindeki{
    box-shadow: 0 15px 25px rgba(2, 10, 56, 0.6);
    position: sticky;
    top: 0;
    left: 0;
    width: 80%;

    padding: 20px 10%;
    /*background-color:  #0b4095*/;
    background-image: linear-gradient(to bottom, #052867, #3661b5);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
}


        .ustPanel a{/*panel içinde bulunan a nesneleri için*/
        font-size: 18px;
        color: #ededed;
        text-decoration: none;/*altının çizili olmasını engeller*/
        font-weight: 500;
        margin-left: 5px;
        transition: .3s;/*hover yapıldığında 3 saniye gecikme sağlar*/
}

.ustPanel a:hover{
    color: #799dd7;
}

.logo{
    font-size: 35px;
    color: #ededed;
    text-decoration: none;
    font-weight: 600;/*font yoğunluğu*/
}

    </style>
</head>
<body>
    
<header class="icindeki"><!--üst banner-->
      <a href="anaSayfa.php?id=anasayfa" class="logo">ilanSeç</a>

      <nav class="ustPanel">
        <a href="anaSayfa.php?id=anasayfa">Ana Sayfa &nbsp &nbsp &nbsp &nbsp</a>
        <a href="<?php echo isset($_SESSION['id']) ? 'UyeProfilGuncelle.php' : 'giriskayit.php'; ?>">
    <?php echo isset($_SESSION['id']) ? $hosgeldiniz_mesaji : 'Kayıt / Giriş Yapın'; ?></a>
      </nav>

      <!-- <img src="Resimler/img_avatar.png" style="width: 50px; height: 50px;"> -->
    </header>
    
    <div class="container">
        <div class="sidebar">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h3>Meslek Seçiniz</h3>
                <div class="scrollable-list">
                    <label class="checkbox">
                        <input type="checkbox" name="meslek[]" value="Web Developer"> Web Developer
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="meslek[]" value="Muhasebe Elemanı"> Muhasebe Elemanı
                    </label>
                    <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Proje Yöneticisi"> Proje Yöneticisi
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Bilgi İşlem"> Bilgi İşlem
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Hemşire"> Hemşire
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Hasta Bakıcı"> Hasta Bakıcı
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Matematik Öğretmeni"> Matematik Öğretmeni
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Özel Şöför"> Özel Şöför
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Mağza çalışanı"> Mağza Çalışanı
                </label> 
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Kasiyer"> Kasiyer
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="İnsan Kaynakları Uzmanı"> İnsan Kaynakları Uzmanı
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Müşteri Temsilcisi">Müşteri Temsilcisi
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Barista"> Barista
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Fabrika Yöneticisi"> Fabrika Yöneticisi 
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Aşçı"> Aşçı
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Garson"> Garson
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Terzi"> Terzi
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Kuaför"> Kuaför
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Veteriner"> Veteriner
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="meslek[]" value="Bebek Bakıcısı"> Bebek Bakıcısı
                </label>
                    <!-- Meslek Seçenekleri -->
                </div>
                <h3>Çalışma Şekli Seçiniz</h3>
                <div class="scrollable-list">
                    <label class="checkbox">
                        <input type="checkbox" name="calismaSekli[]" value="Tam Zamanlı"> Tam Zamanlı
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="calismaSekli[]" value="Yarı Zamanlı"> Yarı Zamanlı
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="calismaSekli[]" value="Hibrit">Hibrit
                    </label>
                    <!-- çalışma şekilleri -->
                </div>
                <h3>Şehir Seçiniz</h3>
                <div class="scrollable-list">
                    <label class="checkbox">
                        <input type="checkbox" name="sehir[]" value="İstanbul"> İstanbul
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="sehir[]" value="Ankara"> Ankara
                    </label>
                    <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="İzmir"> İzmir
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="İzmir"> İzmir
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Bursa"> Bursa
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Adana"> Adana
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Antalya"> Antalya
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Konya"> Konya
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Gaziantep"> Gaziantep
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Şanlıurfa"> Şanlıurfa
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Mersin"> Mersin
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Diyarbakır"> Diyarbakır
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Kayseri"> Kayseri
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Eskişehir"> Eskişehir
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Samsun"> Samsun
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Denizli"> Denizli
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Adapazarı"> Adapazarı
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Malatya"> Malatya
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Kahramanmaraş"> Kahramanmaraş
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Erzurum"> Erzurum
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Van"> Van
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Elazığ"> Elazığ
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Şırnak"> Şırnak
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Mardin"> Mardin
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Isparta"> Isparta
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Bolu"> Bolu
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Trabzon"> Trabzon
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Kocaeli"> Kocaeli
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Muğla"> Muğla
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="sehir[]" value="Aydın"> Aydın
                </label>
                <!--şehir ekleme-->
                </div>
                <!--ara butonu -->
                <button type="submit" class="submit-button">Ara</button>
            </form>
        </div>
        <div class="job-listing">
        <?php

$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "isilanlari"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}


$secilensehir = isset($_POST['sehir']) ? $_POST['sehir'] : array();
$secilenis = isset($_POST['meslek']) ? $_POST['meslek'] : array();
$secilenistipi = isset($_POST['calismaSekli']) ? $_POST['calismaSekli'] : array();


$sql = "SELECT b_id, meslek, ad, soyad, sehir, tarih, calismaTuru, foto, ilanYazisi FROM b_isilaniformu";


if (!empty($secilensehir) || !empty($secilenis) || !empty($secilenistipi)) {
    $sql .= " WHERE ";
    $kosul = array();


    if (!empty($secilensehir)) {
        $sehirkosul = array();
        foreach ($secilensehir as $sehir) {
            $sehirkosul[] = "sehir = '" . $conn->real_escape_string($sehir) . "'";
        }
        $kosul[] = "(" . implode(" OR ", $sehirkosul) . ")";
    }


    if (!empty($secilenis)) {
        $iskosul = array();
        foreach ($secilenis as $job) {
            $iskosul[] = "meslek = '" . $conn->real_escape_string($job) . "'";
        }
        $kosul[] = "(" . implode(" OR ", $iskosul) . ")";
    }

    if (!empty($secilenistipi)) {
        $istipikosulu = array();
        foreach ($secilenistipi as $istipi) {
            $istipikosulu[] = "calismaTuru = '" . $conn->real_escape_string($istipi) . "'";
        }
        $kosul[] = "(" . implode(" OR ", $istipikosulu) . ")";
    }

    $sql .= implode(" AND ", $kosul);
}


$result = $conn->query($sql);


if ($result === false) {
    
    echo "Sorgu hatası: " . $conn->error;
} else {
   
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="job-listing">';
            echo '<img src="Resimler/' . $row['foto'] . '" >';
            echo '<h2><a class="a" href="ilanDetay.php?id=' . $row['b_id'] . '">' . $row['meslek'] . '</a></h2>';
            echo '<p>' ."Ad :". $row['ad'] . '</p>';
            echo '<p>' ."Soyad :". $row['soyad'] . '</p>';
            echo '<p>' ."Şehir :". $row['sehir'] . '</p>';
            echo '<p class="ilan-tarihi">' . $row['tarih'] . '</p>';
            echo '<p class="calisma-sekli">' . $row['calismaTuru'] . '</p>';
            echo '</div>';
        }
    } else {
     
        echo '<div class="job-listing">';
        echo '<p>Seçilen kriterlere uygun ilan bulunamadı.</p>';
        echo '</div>';
    }
}


$conn->close();
?>


            
        </div>
    </div>
</body>
</html>
