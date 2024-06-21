<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    </style>
        
</head>
<body>
    <!-- 
        VT adı: b_islilanForm
        •telefon(veritabanı)
        •mail(VT)
        •cv yükleme alanı
        •kendini tanıt(veritabanı) bu mesleği neden istiyorsun kısmı?
        
        
     -->

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