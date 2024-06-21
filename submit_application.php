<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $ilanYazisi = $_POST['ilanYazisi'];
    $cv = $_FILES['cv'];
    $ilan_id = $_GET['id'];

    
    include 'baglanti.php';
    $sql = "SELECT mail FROM k_isilaniformu WHERE k_id = ?";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("i", $ilan_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ilan = $result->fetch_assoc();
    $ilan_mail = $ilan['mail'];

    $upload_dir = "resimler/";
    $upload_file = $upload_dir . basename($cv["name"]);
    move_uploaded_file($cv["tmp_name"], $upload_file);

   
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gelisim.tolgakaratas@gmail.com'; 
        $mail->Password = 'gmgbpfnrijfktqrr'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('gelisim.tolgakaratas@gmail.com', 'Başvuru Formu');
        $mail->addAddress($ilan_mail); 

        $mail->addAttachment($upload_file);

        $mail->CharSet = 'UTF-8';  
        $mail->isHTML(true);
        $mail->Subject = 'Yeni İş Başvurusu';
        $mail->Body = "<h2>Yeni İş Başvurusu</h2>
        <p><strong>E-posta:</strong> $email</p>
        <p><strong>Telefon Numarası:</strong> $telefon</p>
        <p><strong>Kişi Bilgileri:</strong> $ilanYazisi</p>";

        $mail->send();
        
       
        echo <<<HTML
            <!DOCTYPE html>
            <html lang="tr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Başvuru Sonucu</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f2f2f2;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }

                    .container {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        text-align: center;
                    }

                    h1 {
                        color: #4CAF50;
                    }

                    p {
                        margin-bottom: 20px;
                    }

                    .redirect-msg {
                        color: #666;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Başvurunuz Başarıyla Gönderildi!</h1>
                    <p class="redirect-msg">Ana sayfaya yönlendiriliyorsunuz...</p>
                </div>
                <script>
                    setTimeout(function() {
                        window.location.href = "anasayfa.php"; 
                    }, 2000); 
                </script>
            </body>
            </html>
HTML;

    } catch (Exception $e) {
        echo "E-posta gönderimi başarısız oldu. Hata: {$mail->ErrorInfo}";
    }
}
?>