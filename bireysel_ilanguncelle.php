<?php
session_start();
include 'baglanti.php';

$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (!$userId) {
    header("Location: login.php");
    exit();
}

$ilanId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$ilanId) {
    header("Location: bireysel_ilanlarim.php");
    exit();
}

$sql = "SELECT * FROM b_isilaniformu WHERE B_id = $ilanId AND kullanici_id = $userId";
$result = $baglanti->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    header("Location: ilanlarim.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <style>
        body {
            width: 100%;
            height: 100vh;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0.3) 100%), url('Resimler/ana.jpg');
            background-size: cover;
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
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input[type="text"], input[type="email"], textarea, select {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Güncelle</title>
</head>
<body>
<div class="container">
        <h1>İlan Güncelle</h1>
        <form action="bireysel_ilanguncelle_islem.php?id=<?php echo $row['B_id']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="B_id" value="<?php echo $row['B_id']; ?>">
            <label for="firmaAdi">Adınız:</label>
            <input type="text" id="ad" name="ad" value="<?php echo htmlspecialchars($row['ad']); ?>" required>

            <label for="isDetayi">Soyad:</label>
            <textarea id="soyad" name="soyad" required><?php echo htmlspecialchars($row['soyad']); ?></textarea>

            <label for="mail">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <label for="telefon">Telefon:</label>
            <input type="text" id="telefon" name="telefon" value="<?php echo htmlspecialchars($row['telefon']); ?>" required>

            <label for="logo">Foto:</label>
            <input type="file" id="foto" name="foto">


            <label for="mezuniyet">Eğitim Durumu:</label>
            <select name="mezuniyet" required>
                <option value="ilköğretim" <?php echo $row['mezuniyet'] == 'ilköğretim' ? 'selected' : ''; ?>>İlköğretim</option>
                <option value="Lise" <?php echo $row['mezuniyet'] == 'Lise' ? 'selected' : ''; ?>>Lise</option>
                <option value="Önlisans" <?php echo $row['mezuniyet'] == 'Önlisans' ? 'selected' : ''; ?>>Önlisans</option>
                <option value="Lisans" <?php echo $row['mezuniyet'] == 'Lisans' ? 'selected' : ''; ?>>Lisans</option>
                <option value="Yüksek Lisans" <?php echo $row['mezuniyet'] == 'Yüksek Lisans' ? 'selected' : ''; ?>>Yüksek Lisans</option>
            </select>




            <label for="onBilgi">İlan Yazısı:</label>
            <textarea id="ilanYazisi" name="ilanYazisi" required><?php echo htmlspecialchars($row['ilanYazisi']); ?></textarea>



            <label for="sehir">Şehir:</label>
            <select id="sehir" name="sehir" required>
                <option value="İstanbul" <?php echo $row['sehir'] == 'İstanbul' ? 'selected' : ''; ?>>İstanbul</option>
                <option value="Ankara" <?php echo $row['sehir'] == 'Ankara' ? 'selected' : ''; ?>>Ankara</option>
                <option value="İzmir" <?php echo $row['sehir'] == 'İzmir' ? 'selected' : ''; ?>>İzmir</option>
                <option value="Aydın" <?php echo $row['sehir'] == 'Aydın' ? 'selected' : ''; ?>>Aydın</option>
                <option value="Bursa" <?php echo $row['sehir'] == 'Bursa' ? 'selected' : ''; ?>>Bursa</option>
                <option value="Adana" <?php echo $row['sehir'] == 'Adana' ? 'selected' : ''; ?>>Adana</option>
                <option value="Antalya" <?php echo $row['sehir'] == 'Antalya' ? 'selected' : ''; ?>>Antalya</option>
                <option value="Konya" <?php echo $row['sehir'] == 'Konya' ? 'selected' : ''; ?>>Konya</option>
                <option value="Gaziantep" <?php echo $row['sehir'] == 'Gaziantep' ? 'selected' : ''; ?>>Gaziantep</option>
                <option value="Şanlıurfa" <?php echo $row['sehir'] == 'Şanlıurfa' ? 'selected' : ''; ?>>Şanlıurfa</option>
                <option value="Mersin" <?php echo $row['sehir'] == 'Mersin' ? 'selected' : ''; ?>>Mersin</option>
                <option value="Diyarbakır" <?php echo $row['sehir'] == 'Diyarbakır' ? 'selected' : ''; ?>>Diyarbakır</option>
                <option value="Kayseri" <?php echo $row['sehir'] == 'Kayseri' ? 'selected' : ''; ?>>Kayseri</option>
                <option value="Eskişehir" <?php echo $row['sehir'] == 'Eskişehir' ? 'selected' : ''; ?>>Eskişehir</option>
                <option value="Samsun" <?php echo $row['sehir'] == 'Samsun' ? 'selected' : ''; ?>>Samsun</option>
                <option value="Denizli" <?php echo $row['sehir'] == 'Denizli' ? 'selected' : ''; ?>>Denizli</option>
                <option value="Adapazarı" <?php echo $row['sehir'] == 'Adapazarı' ? 'selected' : ''; ?>>Adapazarı</option>
                <option value="Malatya" <?php echo $row['sehir'] == 'Malatya' ? 'selected' : ''; ?>>Malatya</option>
                <option value="Kahramanmaraş" <?php echo $row['sehir'] == 'Kahramanmaraş' ? 'selected' : ''; ?>>Kahramanmaraş</option>
                <option value="Erzurum" <?php echo $row['sehir'] == 'Erzurum' ? 'selected' : ''; ?>>Erzurum</option>
                <option value="Van" <?php echo $row['sehir'] == 'Van' ? 'selected' : ''; ?>>Van</option>
                <option value="Elazığ" <?php echo $row['sehir'] == 'Elazığ' ? 'selected' : ''; ?>>Elazığ</option>
                <option value="Şırnak" <?php echo $row['sehir'] == 'Şırnak' ? 'selected' : ''; ?>>Şırnak</option>
                <option value="Mardin" <?php echo $row['sehir'] == 'Mardin' ? 'selected' : ''; ?>>Mardin</option>
                <option value="Isparta" <?php echo $row['sehir'] == 'Isparta' ? 'selected' : ''; ?>>Isparta</option>
                <option value="Bolu" <?php echo $row['sehir'] == 'Bolu' ? 'selected' : ''; ?>>Bolu</option>
                <option value="Trabzon" <?php echo $row['sehir'] == 'Trabzon' ? 'selected' : ''; ?>>Trabzon</option>
                <option value="Kocaeli" <?php echo $row['sehir'] == 'Kocaeli' ? 'selected' : ''; ?>>Kocaeli</option>
                <option value="Muğla" <?php echo $row['sehir'] == 'Muğla' ? 'selected' : ''; ?>>Muğla</option>
                <option value="Erzurum" <?php echo $row['sehir'] == 'Erzurum' ? 'selected' : ''; ?>>Erzurum</option>
                <!-- Diğer şehirler buraya eklenebilir -->
            </select>

            <button type="submit">Güncelle</button>
        </form>
    </div>
</body>
</html>

<?php
$baglanti->close();
?>
