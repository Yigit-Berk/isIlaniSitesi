<?php
session_start();
include 'baglanti.php';

$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (!$userId) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $B_id = $_POST['B_id'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $ilanYazisi = $_POST['ilanYazisi'];
    $sehir = $_POST['sehir'];
    $mezuniyet = $_POST['mezuniyet'];

    $uploads_dir = 'resimler/';
    $logo = $_FILES['foto']['name'];
    $logo_tmp = $_FILES['foto']['tmp_name'];


    if (!empty($logo)) {
        $logo_path = $uploads_dir . $logo;
        if (move_uploaded_file($logo_tmp, $logo_path)) {

            $sql = "UPDATE B_isilaniformu SET ad = ?, soyad = ?, email = ?, mezuniyet = ?, telefon = ?, foto = ?, ilanYazisi = ?, sehir = ? WHERE B_id = ? AND kullanici_id = ?";
            $stmt = $baglanti->prepare($sql);
            $stmt->bind_param("sssssssssi", $ad, $soyad, $email, $mezuniyet, $telefon, $logo, $ilanYazisi, $sehir, $B_id, $userId);
        } else {
            echo "Dosya yüklenirken bir hata oluştu.";
            exit(); 
        }
    } else {

        $sql = "UPDATE B_isilaniformu SET ad = ?, soyad = ?, email = ?, mezuniyet = ?, telefon = ?, ilanYazisi = ?, sehir = ? WHERE B_id = ? AND kullanici_id = ?";
        $stmt = $baglanti->prepare($sql);
        $stmt->bind_param("ssssssssi", $ad, $soyad, $email, $mezuniyet, $telefon, $ilanYazisi, $sehir, $B_id, $userId);
    }

    if ($stmt->execute()) {
        header("Location: bireysel_ilanlarim.php");
        exit();
    } else {
        echo "Güncelleme sırasında bir hata oluştu.";
    }
    $stmt->close();
}

$baglanti->close();
?>