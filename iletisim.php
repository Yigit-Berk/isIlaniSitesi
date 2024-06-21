<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <style>
        .iletisim {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .contact-info {
            margin-bottom: 20px;
        }
        .contact-info div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .contact-info div i {
            margin-right: 10px;
            color: #333;
        }
        .map-iletisim {
            margin-top: 20px;
        }
        .map-iletisim iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
        @media screen and (min-width: 800px) {
            .map-iletisim iframe {
                height: 600px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="iletisim">
        <h1>İletişim</h1>
        <div class="contact-info">
            <div style="color:#333"><i class="fas fa-phone-alt"></i><strong style="color:#333">Telefon:</strong> +90 555 555 5555</div>
            <div style="color:#333"><i class="fas fa-envelope"></i><strong style="color:#333">E-posta:</strong> admin@site.com</div>
            <div style="color:#333"><i class="fas fa-map-marker-alt"></i><strong style="color:#333">Adres:</strong> Gelişim Üniversitesi, G Blok, İstanbul, Türkiye</div>
        </div>

        <div class="map-iletisim">
            <h2>Konumumuz</h2>
            <iframe class="harita" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12045.509546974889!2d28.692828414501108!3d40.99511244163454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa05e7a6e9d29%3A0x617400f3f8628fde!2zxLBTVEFOQlVMIEdFTMSwxZ7EsE0gw5xOxLBWRVJTxLBURVPEsCAtIE1FU0xFSyBZw5xLU0tVTFU!5e0!3m2!1str!2str!4v1703631594466!5m2!1str!2str"
                loading="lazy" 
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>
</html>
