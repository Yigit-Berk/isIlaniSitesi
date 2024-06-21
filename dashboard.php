<?php
include 'baglanti.php';

session_start();
if(isset($_SESSION['id'])) header("location: anasayfa.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM kullanicilar WHERE id = '$id'";
$res = mysqli_query($baglanti, $sql);
$row = mysqli_fetch_assoc($res);

echo "Hoşgeldiniz, " . $row['ad'] . " " . $row['soyad'] . "!";
?>

<a href="logout.php">Çıkış Yap!</a>