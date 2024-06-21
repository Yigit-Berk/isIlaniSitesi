<?php
include("baglanti.php");
session_start();

$ad = $_POST["isim"];
$soyad = $_POST["soyisim"];
$calismaSekli = $_POST["calismaSekli"];
$okul = $_POST["okul"];
$mail = $_POST["mail"];
$meslek = $_POST["meslek"];
$sehir = $_POST["sehir"];
$ilanYazisi = $_POST["ilanYazisi"];
$telefon = $_POST["telefon"];
$tarih = date('Y-m-d');
$kullanici_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0; 

$kaynak = $_FILES['dosya']['name']; 
$logo_tmp = $_FILES['dosya']['tmp_name']; 
$upload_dir = "Resimler/";

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true); 
}

$logo_path = $upload_dir . basename($kaynak); 

if (move_uploaded_file($logo_tmp, $logo_path)) { 
    echo "Dosya başarıyla yüklendi.";
} else {
    echo "Dosya yüklenirken hata oluştu.";
}


echo "Ad: " . $ad . "<br>";
echo "Soyad: " . $soyad . "<br>";
echo "Çalışma Şekli: " . $calismaSekli . "<br>";
echo "Okul: " . $okul . "<br>";
echo "E-mail: " . $mail . "<br>";
echo "Meslek: " . $meslek . "<br>";
echo "Şehir: " . $sehir . "<br>";
echo "İlan Yazısı: " . $ilanYazisi . "<br>";
echo "Telefon: " . $telefon . "<br>";


$insert_row = $baglanti->query("
    INSERT INTO b_isilaniformu 
    (ad, soyad, email, mezuniyet, meslek, telefon, calismaTuru, ilanYazisi, foto, tarih, sehir, kullanici_id) 
    VALUES 
    ('".$ad."', '".$soyad."', '".$mail."', '".$okul."', '".$meslek."', '".$telefon."', '".$calismaSekli."', '".$ilanYazisi."', '".$kaynak."', '".$tarih."', '".$sehir."', '".$kullanici_id."')
");


if ($insert_row) {
    echo "Form başarıyla eklendi.";
    header("Location: anasayfa.php"); 
} else {
    echo "B_Form ekleme sırasında bir hata oluştu: " . $baglanti->error;
}
?>
