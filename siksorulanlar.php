<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Sık Sorulan Sorular</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Genel stiller */
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        } */

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .faq-list {
            margin-top: 20px;
        }

        .faq-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            position: relative; /* Relatif pozisyon ekledik */
        }

        .faq-question {
            font-weight: bold;
        }

        .faq-answer {
            margin-top: 5px;
            width: 100%;
            height: 100px;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
            text-align: right;
            
        }

        /* Popup stilleri */
        .popup {
            display: none; /* Varsayılan olarak gizli */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .popup-content {
            text-align: center;
        }

        .popup-input {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .popup-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sık Sorulan Sorular</h1>
        <div class="faq-list">
            <div class="faq-item">
            <?php
    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "isilanlari";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Veritabanından soruları al
    $sql = "SELECT ss_id, soru, cevap FROM sorucevap";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Veritabanından her bir satırı al ve ekrana yazdır
        while($row = $result->fetch_assoc()) {
            echo "<div class='faq-item'>";
            echo "<div class='faq-question'>" . $row["soru"] . "</div>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='soru_id' value='" . $row["ss_id"] . "'>";
            echo "<textarea style='resize: vertical;' class='faq-answer' name='edited_cevap' rows='4'>" . $row["cevap"] . "</textarea>";
            echo "<button type='submit' class='save-btn' name='save_soru'>Kaydet</button>";
            echo "<button type='submit' class='delete-btn' name='delete_soru'>Sil</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    if(isset($_POST['save_soru'])) {
        $soru_id = $_POST['soru_id'];
        $edited_cevap = $_POST['edited_cevap'];
        $update_sql = "UPDATE sorucevap SET cevap='$edited_cevap' WHERE ss_id=$soru_id";

        if ($conn->query($update_sql) === TRUE) {
            echo "<script>alert('Cevap başarıyla güncellendi.');</script>";
            echo "<script>window.location.href = 'admin.php?id=siksorulanlar';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    if(isset($_POST['delete_soru'])) {
        $soru_id = $_POST['soru_id'];
        $delete_sql = "DELETE FROM sorucevap WHERE ss_id=$soru_id";

        if ($conn->query($delete_sql) === TRUE) {
            echo "<script>alert('Soru başarıyla silindi.');</script>";
            echo "<script>window.location.href = 'admin.php?id=siksorulanlar';</script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    if(isset($_POST['save_new_soru'])) {
        $yeni_soru = $_POST['yeni_soru'];
        $yeni_cevap = $_POST['yeni_cevap'];
        $insert_sql = "INSERT INTO sorucevap (soru, cevap) VALUES ('$yeni_soru', '$yeni_cevap')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "<script>alert('Yeni soru başarıyla eklendi.');</script>";
            echo "<script>window.location.href = 'admin.php?id=siksorulanlar';</script>";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }

    $conn->close();
?>
                <button type="button" class="edit-btn" onclick="document.getElementById('popup').style.display='block'">Soru Ekle</button>
            </div>
            <!-- Diğer sorular -->
        </div>
    </div>

    <!-- Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <form action="" method="post">
                <input type="text" class="popup-input" name="yeni_soru" placeholder="Yeni Soru...">
                <textarea class="popup-input" name="yeni_cevap" placeholder="Yeni Cevap..." rows="4"></textarea>
                <button type="submit" class="popup-btn" name="save_new_soru">Kaydet</button>
                <button type="button" class="popup-btn" onclick="document.getElementById('popup').style.display='none'">İptal</button>
            </form>
        </div>
    </div>
</body>
</html>
