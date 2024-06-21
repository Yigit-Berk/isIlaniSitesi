<?php
include("baglanti.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Oluştur</title>
    <link rel="stylesheet" href="Tasarım/IlanOlustur.css">

    <style>

    </style>
</head>

<body>
    <script>
        function msg() {
            alert("Bu ilanı oluşturarak aynı zamanda profilinizi de oluşturmuş olursunuz. Değişiklikleri onaylıyor musunuz?");
        }
    </script>

    <div class="arkaPlan">
        <div id="container-wrapper">

            <form action="B_ilanGonder.php" method="post" enctype="multipart/form-data"><!-- </form> -->
                <div class="flex-container">

                    <div>
                        <p>İlan oluşturabilmek ve firmaların sizler hakkında detaylı bilgiler edinebilmesi için
                            bilgilerinizi eksiksiz doldurmalısınız.
                        </p>
                        <br>
                        <p>Profilinizi daha etkili kılabilmek için <a class="a" href="anaSayfa.php?id=etkilihesap">Etkili hesap oluşturma</a> sayfamıza göz atabilirsiniz.</p>
                    </div>
                    <div>
                        <label for="İsim">İsim</label>
                        <input type="text" id="fisim" name="isim" placeholder="isminiz..." required>
                    </div>
                    <div>
                        <label for="Soyisim">Soyisim</label>
                        <input type="text" id="fsoyisim" name="soyisim" placeholder="Soyisminiz..." required>
                    </div>
                    <div>
                        <h4 for="">Ne şekilde çalışmak istiyorsunuz?</h4>
                        <br>
                        <input type="radio" name="calismaSekli" value="Evden Çalışma" required> Uzaktan çalışma
                        <input type="radio" name="calismaSekli" value="İş Yerinden Çalışma" required> İş Yerinden Çalışma
                        <input type="radio" name="calismaSekli" value="Hibrit" required> Hibrit
                    </div>
                    <div>
                        <h4>Eğitim durumunuzu belirtiniz</h4>
                        <select name="okul" required>
                            <option value="ilköğretim">İlköğretim</option>
                            <option value="Lise">Lise</option>
                            <option value="Önlisans">Önlisans</option>
                            <option value="Lisans">Lisans</option>
                            <option value="Yüksek Lisans">Yüksek Lisans</option>
                        </select>
                    </div>
                    <div>
                        <label for="İsim">İletişim mailinizi giriniz</label>
                        <input type="text" id="fmail" name="mail" placeholder="E-mail" required>
                    </div>
                    <div class="sidebar">
                        <h3>Çalışmak istediğiniz alanı seçiniz</h3>
                        <br>
                        <select name="meslek" required>
                            <option value="Web Developer">Web Developer</option>
                            <option value="Muhasebe Elemanı">Muhasebe Elemanı</option>
                            <option value="Proje Yöneticisi">Proje Yöneticisi</option>
                            <option value="Bilgi İşlem">Bilgi İşlem</option>
                            <option value="Hemşire">Hemşire</option>
                            <option value="Hasta Bakıcı">Hasta Bakıcı</option>
                            <option value="Matematik Öğretmeni">Matematik Öğretmeni</option>
                            <option value="Özel Şöför">Özel Şöför</option>
                            <option value="Mağaza Çalışanı">Mağaza Çalışanı</option>
                            <option value="Kasiyer">Kasiyer</option>
                            <option value="Müşteri Temsilcisi">Müşteri Temsilcisi</option>
                            <option value="Barista">Barista</option>
                            <option value="Fabrika Yöneticisi">Fabrika Yöneticisi</option>
                            <option value="Aşçı">Aşçı</option>
                            <option value="Garson">Garson</option>
                            <option value="Terzi">Terzi</option>
                            <option value="Kuaför">Kuaför</option>
                            <option value="Veteriner">Veteriner</option>
                            <option value="Bebek Bakıcısı">Bebek Bakıcısı</option>
                        </select>
                    </div>
                    <div>
                        <h4>Profil resminizi ekleyiniz</h4>
                        <input type="file" name="dosya" id="d" required>
                    </div>
                    <div>
                        <h4>Şehir seçiniz</h4>
                        <select name="sehir" required>
                            <option value="İstanbul">İstanbul</option>
                            <option value="Ankara">Ankara</option>
                            <option value="İzmir">İzmir</option>
                            <option value="Aydın">Aydın</option>
                            <option value="Bursa">Bursa</option>
                            <option value="Adana">Adana</option>
                            <option value="Antalya">Antalya</option>
                            <option value="Konya">Konya</option>
                            <option value="Gaziantep">Gaziantep</option>
                            <option value="Şanlıurfa">Şanlıurfa</option>
                            <option value="Mersin">Mersin</option>
                            <option value="Diyarbakır">Diyarbakır</option>
                            <option value="Kayseri">Kayseri</option>
                            <option value="Eskişehir">Eskişehir</option>
                            <option value="Samsun">Samsun</option>
                            <option value="Denizli">Denizli</option>
                            <option value="Adapazarı">Adapazarı</option>
                            <option value="Malatya">Malatya</option>
                            <option value="Kahramanmaraş">Kahramanmaraş</option>
                            <option value="Erzurum">Erzurum</option>
                            <option value="Van">Van</option>
                            <option value="Elazığ">Elazığ</option>
                            <option value="Şırnak">Şırnak</option>
                            <option value="Mardin">Mardin</option>
                            <option value="Isparta">Isparta</option>
                            <option value="Bolu">Bolu</option>
                            <option value="Trabzon">Trabzon</option>
                            <option value="Kocaeli">Kocaeli</option>
                            <option value="Muğla">Muğla</option>
                            <option value="Erzurum">Erzurum</option>
                        </select>
                    </div>
                    <div>
                        <h4>Bu mesleği isteme sebebinizi detaylıca belirtin.</h4><br>
                        <textarea style="resize: vertical; width: 100%;" name="ilanYazisi" placeholder="Bu mesleği neden istiyorsunuz?" rows="8" required></textarea>
                    </div>
                    <div>
                        <h4>İletişim için telefon numaranız</h4><br>
                        <textarea style="resize: none; width: 100%;" name="telefon" placeholder="İletişim numaranız..." rows="3"></textarea>
                    </div>
                    <div>
                        <input type="submit" value="İlan Oluştur" id="fbuton" name="buton">
                    </div>

                </div>
            </form>
        </div>

    </div>
</body>

<footer class="footer">

</footer>

</html>