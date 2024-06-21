<?php
session_start();
include 'baglanti.php';

$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (!$userId) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM k_isilaniformu WHERE kullanici_id = $userId";
$result = $baglanti->query($sql);
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

        .ads {
            list-style-type: none;
            padding: 0;
        }

        .ads li {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .ads li button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .ads li button:hover {
            background-color: #0056b3;
        }
        .btn-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        }   

        .btn-container button {
        width: auto; 
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }

        .btn-container button:hover {
        background-color: #0056b3;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlanlarım</title>
</head>
<body>
    <div class="container">
    <div class="btn-container">
            <form action="anasayfa.php" method="GET">
                <button type="submit">Ana Sayfa</button>
            </form>
            <form action="Uyeprofilguncelle.php" method="GET">
                <button type="submit">Profil Ekranı</button>
            </form>
        </div>
        <h1>İlanlarım</h1>
        <?php if ($result->num_rows > 0): ?>
            <ul class="ads">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <h3><?php echo $row['firmaAdi']; ?></h3>
                        <p><?php echo $row['onBilgi']; ?></p>
                        <p><strong>Tarih:</strong> <?php echo $row['tarih']; ?></p>
                        <p><strong>Şehir:</strong> <?php echo $row['sehir']; ?></p>
                        <form action="k_ilansil.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['k_id']; ?>">
                            <button type="submit" onclick="return confirm('İlanı silmek istediğinizden emin misiniz?')">İlanı Sil !</button>
                        </form>
                        <br>
                        <form action="ilanguncelle.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $row['k_id']; ?>">
                            <button type="submit">Güncelle</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Henüz ilanınız yok.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$baglanti->close();
?>