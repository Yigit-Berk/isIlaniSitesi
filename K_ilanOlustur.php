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
    
</head>

<body>
    <script>
        function msg() {
            alert("Bu ilanı oluşturarak aynı zamanda profilinizi de oluşturmuş olursunuz. Değişiklikleri onaylıyor musunuz?");
        }
    </script>

    <div class="arkaPlan">
        <div id="container-wrapper">
            <form action="K_ilanGonder.php" method="post" enctype="multipart/form-data" onsubmit="return msg();">
                <div class="flex-container">

                    <div>
                        <p>
                        İş ilanlarınızı daha hızlı ve etkili bir şekilde duyurun! 
                        En yetenekli adaylara ulaşmanın en kolay yolu burada. 
                        Hemen kaydolun ve doğru yetenekleri keşfetmenin avantajını yaşayın
                        </p>
                        <br><br>
                        <p>İlan yayımlayabilmek ve aday ekip üyelerinizin sizler hakkında detaylı bilgiler edinebilmesi için
                            bilgilerinizi eksiksiz doldurmalısınız.
                        </p>
                        <br>
                    </div>
                    <div>
                        <label for="firmaAdi">Firma Adınızı Girin</label>
                        <input required type="text" id="firmaAdi" name="firmaAdi" placeholder="Firma adı...">
                    </div>
                    <div>
                        <label for="mail">İletişim Maili</label>
                        <input required type="text" id="mail" name="mail" placeholder="E-mail">
                    </div>
                    <div>
                        <h4>Hangi çalışma türünde işçi arıyorsunuz?</h4>
                        <br>
                        <input required type="radio" name="calismaTuru" value="Evden Çalışma"> Uzaktan çalışma
                        <input required type="radio" name="calismaTuru" value="İş Yerinden Çalışma"> İş Yerinden Çalışma
                        <input required type="radio" name="calismaTuru" value="Hibrit"> Hibrit
                    </div>
                    <div>
                        <h4>İlan için alan seçiniz</h4>
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
                        <label for="logo">Şirket Logosunu Ekleyiniz</label>
                        <input required type="file" name="logo" id="logo">
                    </div>
                    <div>
                        <label for="onBilgi">Şirketinizin Kısa Tanıtımı</label>
                        <textarea required id="onBilgi" name="onBilgi" style="resize: vertical; width: 100%;" placeholder="Şirketinizi kısaca tanıtınız..." rows="3"></textarea>
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
                            <!-- Diğer şehirler buraya eklenebilir -->
                        </select>
                    </div>
                    <div>
                        <h4>Şirketiniz ve Aradığınız çalışan hakkında detaylı bilgi veriniz.</h4>
                        <textarea required style="resize: vertical; width: 100%;" name="isDetayi" placeholder="Şirketiniz ve aradığınız çalışan hakkında bilgi yazınız.?" rows="8"></textarea>
                    </div>
                    <div>
                        <h4>İletişim için telefon numarası giriniz</h4>
                        <textarea required style="resize: none; width: 100%;" name="telefon" placeholder="İletişim numaranız..." rows="3"></textarea>
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