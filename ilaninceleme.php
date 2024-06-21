<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan İnceleme</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }
    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .container-iki {
        position: relative;
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .company-info {
        margin-bottom: 20px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
    }
    .company-description {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }
    .company-description img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        max-width: 200px; 
        max-height: 200px; 
    }
    h1, h2, p {
        margin: 0;
    }
    h1 {
        font-size: 24px;
    }
    h2 {
        margin-left: 2rem;
        font-size: 18px;
        text-align: left;
    }
    .company-info p {
        font-size: 14px;
    }
    .details {
        margin-top: 10px;
    }
    .details table {
        width: 100%;
    }
    .details table td {
        padding: 5px;
    }
    .details ul {
        list-style-type: none;
        padding-left: 0;
        text-align: left;
    }
    .details ul li:before {
        content: "\2022";
        color: #FF7F50;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
    /* Popup stilleri */
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        width: 100%;
        height: 100%;
    }
    .popup-content {
        background: white;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        margin: auto;
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
        width: calc(100% - 16px);
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .popup-content button {
        width: calc(100% - 16px);
        padding: 10px 20px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .popup-content .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }
          .apply-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #1E90FF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .apply-button:hover {
            background-color: #0062b2;
        }
</style>
</head>
<body>
<?php
    include 'baglanti.php'; 

    if (isset($_GET['id'])) {
        $ilan_id = $_GET['id'];
        
       
        $sql = "SELECT * FROM k_isilaniformu WHERE k_id = ?";
        $stmt = $baglanti->prepare($sql);
        $stmt->bind_param("i", $ilan_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ilan = $result->fetch_assoc();
        
        if ($ilan) {
            $logo = $ilan['logo']; 
    ?>
    
    <div class="container">
        <div class="company-info">
            <h1><?php echo $ilan['firmaAdi']; ?></h1>
            <div class="details">
                <table>
                    <tr>
                        <td>Çalışma Şekli:</td>
                        <td><?php echo $ilan['calismaTuru']; ?></td>
                    </tr>
                    <tr>
                        <td>Departman:</td>
                        <td><?php echo $ilan['meslek']; ?></td>
                    </tr>
                    <tr>
                        <td>İletişim:</td>
                        <td><?php echo $ilan['telefon']; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $ilan['mail']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container-iki">
        <div class="company-description">
         <img src="<?php echo 'Resimler/'.$logo; ?>" alt="Şirket Logosu">
            <br><br>
            <p><b>Biz Kimiz?</b></p>
            <br>
            <p><?php echo $ilan['isDetayi']; ?></p>
            <br><br>
            
        </div>
        <a href="basvur.php?id=<?php echo $ilan_id; ?>" class="apply-button">Başvur</a>
        
    </div>
    <?php
        } else {
            echo "<p>İlan bulunamadı.</p>";
        }
        
        $stmt->close();
        $baglanti->close();
    } else {
        echo "<p>Geçersiz ilan ID.</p>";
    }
    ?>
</body>
</html>
