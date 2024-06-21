<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Formu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('Resimler/ana.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #popupToggle {
            display: none;
        }
        .popup {
            display: flex; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .popup-content h2 {
            margin-top: 0;
        }
        .popup-content label {
            display: block;
            margin-bottom: 5px;
        }
        .popup-content input,
        .popup-content textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .popup-content button {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        .popup-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
        .return-button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php 
    include 'baglanti.php';

    if (isset($_GET['id'])) {
        $ilan_id = $_GET['id'];
        
        $sql = "SELECT * FROM B_isilaniformu WHERE B_id = ?";
        $stmt = $baglanti->prepare($sql);
        $stmt->bind_param("i", $ilan_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ilan = $result->fetch_assoc();

        if ($ilan) {
            $ilan_mail = $ilan['email'];
            $telefon = $ilan['telefon'];
            $ilanYazisi = $ilan['ilanYazisi'];
        } else {
            echo "<p>İlan bulunamadı.</p>";
            exit;
        }
    } else {
        echo "<p>Geçersiz ilan ID.</p>";
        exit;
    }

    $stmt->close();
    $baglanti->close();
    ?>

    <div class="popup">
        <div class="popup-content">
        <label for="popupToggle" class="close">&times;</label>
        <h2>Başvuru Formu</h2>
        <form action="b_submit_application.php?id=<?php echo $ilan_id; ?>" method="post" enctype="multipart/form-data">
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefon">Telefon Numarası:</label>
            <input type="text" id="telefon" name="telefon" required value="">

            <label for="cv">İş yerinizden bir görsel ekleyin:</label>
            <input type="file" id="cv" name="cv" required>

            <label for="ilanYazisi">İşyeriniz hakkında bilgi veriniz:</label>
            <textarea type="text" style='resize: vertical;' id="ilanYazisi" name="ilanYazisi" rows="4" required></textarea>

            <button type="submit">Gönder</button>
            <button onclick="window.location.href='b_ilaninceleme.php?id=<?php echo $ilan_id; ?>'" class="return-button">Geri Dön</button>
        </form>
        </div>
    </div>
</body>
</html>
