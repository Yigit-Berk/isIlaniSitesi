<?php

include 'baglanti.php'; 

session_start();

if (isset($_POST['eposta']) && isset($_POST['sifre']) && isset($_POST['ad']) && isset($_POST['soyad'])) {
    $email = $_POST['eposta'];
    $password = $_POST['sifre'];
    $name = $_POST['ad'];
    $surname = $_POST['soyad'];

    $checkSql = "SELECT * FROM kullanicilar WHERE eposta = '$email'";
    $checkResult = mysqli_query($baglanti, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '<i class="fas fa-exclamation-circle"></i> Email kullanılıyor!';
    } else {
        $sql = "INSERT INTO kullanicilar (eposta, sifre, ad, soyad) VALUES('$email', '$password', '$name', '$surname')";
        mysqli_query($baglanti, $sql);
        echo "Kayıt yapıldı, lütfen tekrardan giriş yapınız";
    }
} elseif (isset($_POST['Login_email']) && isset($_POST['login_password'])) {
    $Login_email = $_POST['Login_email'];
    $login_password = $_POST['login_password'];

    $sql_user = "SELECT * FROM kullanicilar WHERE eposta ='$Login_email' AND sifre = '$login_password'";
    $res_user = mysqli_query($baglanti, $sql_user);

    if (mysqli_num_rows($res_user) > 0) {
        $row_user = mysqli_fetch_assoc($res_user);
        $_SESSION['id'] = $row_user['id'];
        $arr = array("status" => 'success', 'message' => 'Giriş Başarılı, Yönlendiriliyorsunuz.');
    } else {
       
        $sql_admin = "SELECT * FROM admin WHERE A_eposta ='$Login_email' AND A_sifre = '$login_password'";
        $res_admin = mysqli_query($baglanti, $sql_admin);

        if (mysqli_num_rows($res_admin) > 0) {
            
            $arr = array("status" => 'redirect', 'redirect_url' => 'admin.php');
        } else {
            
            $arr = array("status" => 'error', 'message' => 'Email veya Şifreyi kontrol edin.');
        }
    }
    echo json_encode($arr);
}