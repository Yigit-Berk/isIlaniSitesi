<?php
session_start();
include 'baglanti.php';

$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (!$userId) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ilanId = $_POST['id'];
    
    $silSql = "DELETE FROM b_isilaniformu WHERE B_id = $ilanId AND kullanici_id = $userId";
    
    if ($baglanti->query($silSql) === TRUE) {
        echo "İlan başarıyla silindi.";
        
        header("Location: Uyeprofilguncelle.php");
        exit();
    } else {
        echo "Hata oluştu: " . $baglanti->error;
    }
}

$baglanti->close();
?>
