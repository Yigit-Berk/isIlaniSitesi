<?php
session_start();
include 'baglanti.php';

$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (!$userId) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $k_id = $_POST['k_id'];
    $firmaAdi = $_POST['firmaAdi'];
    $mail = $_POST['mail'];
    $telefon = $_POST['telefon'];
    $onBilgi = $_POST['onBilgi'];
    $isDetayi = $_POST['isDetayi'];
    $sehir = $_POST['sehir'];
   

    
    $uploads_dir = 'Resimler/';
    $logo = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name'];

    
    if (!empty($logo)) {
        $logo_path = $uploads_dir . $logo;
        if (move_uploaded_file($logo_tmp, $logo_path)) {
            
            $sql = "UPDATE k_isilaniformu SET firmaAdi = ?, mail = ?, telefon = ?, logo = ?, onBilgi = ?, isDetayi = ?, sehir = ? WHERE k_id = ? AND kullanici_id = ?";
            $stmt = $baglanti->prepare($sql);
            $stmt->bind_param("ssisssssi", $firmaAdi, $mail, $telefon, $logo, $onBilgi, $isDetayi, $sehir, $k_id, $userId);

            if ($stmt->execute()) {
                header("Location: ilanlarim.php");
                exit();
            } else {
                echo "Güncelleme sırasında bir hata oluştu.";
            }
            $stmt->close();
        } else {
            echo "Dosya yüklenirken bir hata oluştu.";
        }
    } else {
        
        $sql = "UPDATE k_isilaniformu SET firmaAdi = ?, mail = ?, telefon = ?, onBilgi = ?, isDetayi = ?, sehir = ? WHERE k_id = ? AND kullanici_id = ?";
$stmt = $baglanti->prepare($sql);
$stmt->bind_param("sssssssi", $firmaAdi, $mail, $telefon, $onBilgi, $isDetayi, $sehir, $k_id, $userId);


        if ($stmt->execute()) {
            header("Location: ilanlarim.php");
            exit();
        } else {
            echo "Güncelleme sırasında bir hata oluştu.";
        }
        $stmt->close();
    }
}

$baglanti->close();
?>