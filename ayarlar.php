<?php
include("baglanti.php");

// Bağlantıyı kontrol et
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $A_ad = $_POST['A_ad'];
    $A_soyad = $_POST['A_soyad'];
    $A_eposta = $_POST['A_eposta'];
    $A_sifre = $_POST['A_sifre'];
    $foto = $_FILES['foto']['name'];

    // Profil fotoğrafı yükleme işlemi
    $target_file = "";
    if ($foto) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($foto);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Dosyanın gerçek bir resim olup olmadığını kontrol et
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if($check === false) {
            $error_message = "Dosya bir resim değil.";
            $uploadOk = 0;
        }
        
        // Dosya boyutunu kontrol et
        if ($_FILES['foto']['size'] > 500000) {
            $error_message = "Dosya çok büyük.";
            $uploadOk = 0;
        }
        
        // Belirli dosya formatlarına izin ver
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $error_message = "Sadece JPG, JPEG, PNG ve GIF dosyalarına izin verilmektedir.";
            $uploadOk = 0;
        }
        
        // $uploadOk 0 ise dosya yüklenemedi
        if ($uploadOk == 0) {
            $error_message = "Dosyanız yüklenemedi.";
        } else {
            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $error_message = "Dosya yüklenirken bir hata oluştu.";
                $target_file = "";
            }
        }
    }

    // Mevcut profil fotoğrafını al
    if (!$target_file) {
        $result = mysqli_query($baglanti, "SELECT foto FROM admin LIMIT 1");
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $target_file = $row['foto'];
        } else {
            $error_message = "Profil fotoğrafı alınırken bir hata oluştu: " . mysqli_error($baglanti);
        }
    }

    // Şifreyi güncelleme
    if ($A_sifre) {
        $sql = "UPDATE admin SET A_ad='$A_ad', A_soyad='$A_soyad', A_eposta='$A_eposta', A_sifre='$A_sifre', foto='$target_file' LIMIT 1";
    } else {
        $sql = "UPDATE admin SET A_ad='$A_ad', A_soyad='$A_soyad', A_eposta='$A_eposta', foto='$target_file' LIMIT 1";
    }

    if (mysqli_query($baglanti, $sql)) {
        echo "Bilgiler başarıyla güncellendi!";
    } else {
        $error_message = "Hata: " . mysqli_error($baglanti);
    }
}

// Admin bilgilerini getir
$result = mysqli_query($baglanti, "SELECT * FROM admin LIMIT 1");
if (!$result) {
    die("Admin bilgileri alınırken bir hata oluştu: " . mysqli_error($baglanti));
}
$admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        img {
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 10px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Ayarları</h2>
        <form action="admin.php?id=ayarlar" method="post" enctype="multipart/form-data">
            <label for="A_ad">Ad:</label>
            <input type="text" name="A_ad" value="<?php echo ($admin['A_ad']); ?>" required>

            <label for="A_soyad">Soyad:</label>
            <input type="text" name="A_soyad" value="<?php echo ($admin['A_soyad']); ?>" required>

            <label for="A_eposta">E-posta:</label>
            <input type="email" name="A_eposta" value="<?php echo ($admin['A_eposta']); ?>" required>

            <label for="A_sifre">Şifre:</label>
            <input type="password" name="A_sifre">

            <label for="foto">Profil Fotoğrafı:</label>
            <input type="file" name="foto">
            <?php if ($admin['foto']) { ?>
                <img src="<?php echo htmlspecialchars($admin['foto']); ?>" alt="Mevcut Profil">
            <?php } ?>

            <input type="submit" value="Güncelle">
        </form>
        <?php if(isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>

<?php
// Veritabanı bağlantısını kapat
$baglanti->close();
?>
