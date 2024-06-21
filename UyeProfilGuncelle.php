
<!DOCTYPE html>
<html lang="tr">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label,
        input,
        button {
            display: block;
            width: 100%;
        }

        label {
            margin-top: 10px;
        }

        input {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #646464;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Profil Güncelleme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Üye Profil Güncelleme</h1>
        
        <?php
session_start();
$message = "";
$messageClass = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include 'baglanti.php';
    

    $userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    
    if (!$userId) {
        $message = "Kullanıcı oturumu bulunamadı.";
        $messageClass = "error";
    } else {
       
        $updateType = $_POST["updateType"];
        
        if ($updateType == "name") {
            $newName = $_POST["newName"];
            $sql = "UPDATE kullanicilar SET ad = '$newName' WHERE id = $userId";

        } 


        elseif ($updateType == "surname") {
            $newSurname = $_POST["newSurname"];
            $sql = "UPDATE kullanicilar SET soyad = '$newSurname' WHERE id = $userId";


        }  
        elseif ($updateType == "password") {
            $newSurname = $_POST["newPassword"];
            $sql = "UPDATE kullanicilar SET sifre = '$newSurname' WHERE id = $userId";


        }
         
         
         elseif ($updateType == "email") {
            $newEmail = $_POST["newEmail"];
            $sql = "UPDATE kullanicilar SET eposta = '$newEmail' WHERE id = $userId";
        } elseif ($updateType == "photo") {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["newPhoto"]["name"]);
            if (move_uploaded_file($_FILES["newPhoto"]["tmp_name"], $target_file)) {
                $sql = "UPDATE kullanicilar SET foto = '$target_file' WHERE id = $userId";
            } else {
                $message = "Fotoğraf yüklenirken bir hata oluştu.";
                $messageClass = "error";
            }
        }

        if (isset($sql) && $baglanti->query($sql) === TRUE) {
            $message = "Profil güncellendi!";
            $messageClass = "success";
        } else {
            $message = "Hata: " . $sql . "<br>" . $baglanti->error;
            $messageClass = "error";
        }
    }
    $baglanti->close();
}
?>

<?php if (!empty($message)): ?>
    <div class="message <?php echo $messageClass; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<div class="buttons">
    <br>
    <button onclick="showForm('name')">Ad Değiştirmek İçin Tıklayınız</button><br>
    <button onclick="showForm('surname')">Soyad Değiştirmek İçin Tıklayınız</button><br>
    <button onclick="showForm('password')">Şifre Değiştirmek İçin Tıklayınız</button><br>
    <button onclick="showForm('email')">E-posta Değiştirmek İçin Tıklayınız</button><br>
    
    <form action="ilanlarim.php" method="post">
        <button type="submit">Kurumsal İlanlarım</button>
    </form>
    <form action="bireysel_ilanlarim.php" method="post">
        <button type="submit">Bireysel İlanlarım</button>
    </form>
    <form action="logout.php" method="post">
        <button type="submit">Çıkış Yap</button>
    </form>
    <form action="anasayfa.php" method="post">
        <button type="submit">Anasayfaya Dön</button>
    </form>
</div>
<form id="updateForm" action="UyeProfilGuncelle.php" method="POST" enctype="multipart/form-data" style="display: none;">
    <input type="hidden" id="updateType" name="updateType">
    <div id="nameForm" style="display: none;">
        <label for="newName">Yeni Adınız:</label>
        <input type="text" id="newName" name="newName" placeholder="Yeni Adınız">
    </div>
    <div id="surnameForm" style="display: none;">
        <label for="newSurname">Yeni Soyadınız:</label>
        <input type="text" id="newSurname" name="newSurname" placeholder="Yeni Soyadınız">
    </div>
    <div id="passwordForm" style="display: none;">
        <label for="newPassword">Yeni Şifreniz:</label>
        <input type="password" id="newPassword" name="newPassword" placeholder="Yeni Şifreniz">
    </div>
    <div id="emailForm" style="display: none;">
        <label for="newEmail">Yeni E-posta Adresiniz:</label>
        <input type="email" id="newEmail" name="newEmail" placeholder="Yeni E-posta Adresiniz">
    </div>
   
    <button type="submit">Güncelle</button>
</form>

<script>
    function showForm(type) {
        document.getElementById('updateType').value = type;
        document.getElementById('updateForm').style.display = 'block';

        var forms = ['nameForm', 'surnameForm', 'passwordForm', 'emailForm', 'photoForm'];
        forms.forEach(form => {
            if (form === type + 'Form') {
                document.getElementById(form).style.display = 'block';
            } else {
                document.getElementById(form).style.display = 'none';
            }
        });
    }
</script>
</body>
</html>
