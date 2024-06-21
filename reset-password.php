
<!DOCTYPE html>
<html>
<head>
    <title>Şifremi Unuttum</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-image: url('Resimler/yenisifre.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-color: rgba(255, 255, 255, 0.4); 
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.6); 
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.result-container {
    background-color: rgba(255, 255, 255, 0.6); 
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
}

.result-container p {
    color: #333;
    margin-bottom: 10px;
}

.result-container a {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.result-container a:hover {
    background-color: #0056b3;
}
    </style>
</head>
<?php
require_once('baglanti.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    
    $check_email_query = "SELECT * FROM kullanicilar WHERE eposta = '$email'";
    $result = mysqli_query($baglanti, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
       
        $new_password = generateRandomString(10); 

        
        $update_password_query = "UPDATE kullanicilar SET sifre = '$new_password' WHERE eposta = '$email'";
        $update_result = mysqli_query($baglanti, $update_password_query);

        if ($update_result) {
            
            require 'PHPMailer/PHPMailer/src/Exception.php';
            require 'PHPMailer/PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/PHPMailer/src/SMTP.php';

            $mail = new PHPMailer(true);

            try {
                $mail->IsSMTP();
                $mail->SMTPAuth=true;
                $mail->SMTPSecure="tls";
                $mail->Port=587;
                $mail->Host="smtp.gmail.com";
                $mail->Username="gelisim.tolgakaratas@gmail.com";
                $mail->Password="gmgbpfnrijfktqrr";
                $mail->setFrom('gelisim.tolgakaratas@gmail.com', 'IS DESTEK EKIBI');
                $mail->addAddress($email);
                $mail->Subject="Yeni Sifreniz";
                $mail->Body="Şifreniz güncellenmiştir, giriş sayfasından yeni şifrenizi kullanarak giriş yapabilirsiniz. Yeni şifreniz: " . $new_password;

                $mail->send();

                echo "<div class='container'>";
                echo "<div class='result-container'>";
                echo "<p>Yeni şifreniz e-posta ile gönderildi.</p>";
                echo "<a href='giriskayit.php'>Ana sayfaya dön</a>";
                echo "</div>";
                echo "</div>";
            } catch (Exception $e) {
                echo "E-posta gönderimi başarısız oldu. Hata: {$mail->ErrorInfo}";
            }
        } else {
            echo "Şifre değiştirme işlemi başarısız oldu.";
        }
    } else {
        echo "<div class='container'>";
        echo "<div class='result-container'>";
        echo "<p>Bu e-posta adresi ile kayıtlı bir kullanıcı bulunamadı.</p>";
        echo "<p>Şifremi unuttum sayfasına <a href='forgot-password.php'>dön</a></p>";
        echo "</div>";
        echo "</div>";
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
