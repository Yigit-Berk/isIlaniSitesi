<?php
include("baglanti.php");
session_start();

if(isset($_POST['buton'])){
    $firmaAdi = $_POST['firmaAdi'];
    $mail = $_POST['mail'];
    $meslek = $_POST['meslek'];
    $telefon = $_POST['telefon'];
    $calismaTuru = $_POST['calismaTuru'];
    $onBilgi = $_POST['onBilgi'];
    $isDetayi = $_POST['isDetayi'];
    $sehir = $_POST['sehir'];
    $tarih = date('Y-m-d');
    $kullanici_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0; 


    $logo = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name'];
    $upload_dir = "Resimler/";


    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $logo_path = $upload_dir . basename($logo);

    if (move_uploaded_file($logo_tmp, $logo_path)) {
        echo "Dosya başarıyla yüklendi.";
    } else {
        echo "Dosya yüklenirken hata oluştu.";
    }


    $sql = "INSERT INTO k_isilaniformu (firmaAdi, mail, meslek, telefon, calismaTuru, logo, onBilgi, isDetayi, tarih, sehir, kullanici_id) 
            VALUES ('$firmaAdi', '$mail', '$meslek', '$telefon', '$calismaTuru', '$logo', '$onBilgi', '$isDetayi', '$tarih', '$sehir', '$kullanici_id')";

    if (mysqli_query($baglanti, $sql)) {
        echo "İlan başarıyla oluşturuldu.";
        header("Location:anasayfa.php"); 
        exit();
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($baglanti);
    }

    mysqli_close($baglanti);
}
?>