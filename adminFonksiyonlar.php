<?php
include("baglanti.php");

/* ----------------Kurumsal------------------- */


function kurumsalListele()
{
    global $baglanti;
    $query = "SELECT * FROM k_isilaniformu";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));
    echo '
     <table border="1" align="center" width="370">
     <tr>
     <td colspan="7" style="background: #003973">
     <h1 style="color: white">Kurumsal İlanlar</h1>
     </td></tr>';
    while ($row = mysqli_fetch_array($result)) {
        $kid = $row['k_id'];
        $firmaAdi = $row['firmaAdi'];
        $sehir = $row['sehir'];
        $onBilgi = $row['onBilgi'];
        $foto = $row['logo'];

        
        echo ' <tr>
         <td><img src="Resimler/' . $foto . '" width="50" height="50""></td>
         <td>' . $firmaAdi . '</td>
         <td>' . $sehir . '</td>
         <td>' . $onBilgi . '</td>
         <td>' . $kid . '</td>
         <td><a href="admin.php?id=kurumsalduzenle&kid=' . $kid . '">Düzenle</a></td>
         <td><a href="admin.php?id=kurumsalsil&kid=' . $kid . '">Sil</a></td>
        </tr>';
    }
    echo '</table>';
}

function kurumsalDuzenleme()
{
    global $baglanti;
    $kid = $_GET["kid"];
    $query = "SELECT * FROM k_isilaniformu WHERE k_id='" . $kid . "'";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error());
    $row = mysqli_fetch_array($result);

    $kid = $row['k_id'];
    $firmaAdi = $row['firmaAdi'];
    $sehir = $row['sehir'];
    $onBilgi = $row['onBilgi'];
    $foto = $row['logo'];

    echo ' <form action="admin.php?id=kurumsalguncelle&kid=' . $kid . '" method="post" enctype="multipart/form-data" onsubmit="return BosmuDegilmi()">
            <div align="center">
            <table>
                 <tr>
                     <td colspan="3"><h1 style="color: #000000;">Firma İlan Düzenleme</h1></td>
                 </tr>
                 <tr>
                     <td>Firma Adı</td>
                     <td>:</td>
                     <td><input type="text" name="firmaadi" id="firmaadi" placeholder="' . $firmaAdi . '"></td>
                 </tr>
                 <tr>
                     <td>Şehir Bilgisi</td>
                     <td>:</td>
                     <td><input type="text" name="sehir" id="sehir" placeholder="' . $sehir . '"></td>
                 </tr>
                 <tr>
                     <td>Firma Önbilgi Yazısı</td>
                     <td>:</td>
                     <td><input type="text" name="onbilgi" id="onbilgi" placeholder="' . $onBilgi . '"></td>
                 </tr>
                 <tr>
                     <td>Firma Logosu</td>
                     <td>:</td>
                     <td><input type="file" name="dosya" id="dosya" placeholder="' . $foto . '"> </td>
                 </tr>
                 <tr>
                     <td colspan="3"> <input type="submit" value="Güncelle"></td>
                 </tr>
             </table>
            </div> 
            <hr>
         </form>
         <script>
            function BosmuDegilmi() {
                var firmaadi = document.getElementById("firmaadi");
                if (!firmaadi.value) {
                    firmaadi.value = firmaadi.placeholder;
                }
                var sehir = document.getElementById("sehir");
                if (!sehir.value) {
                    sehir.value = sehir.placeholder;
                }
                var onbilgi = document.getElementById("onbilgi");
                if (!onbilgi.value) {
                    onbilgi.value = onbilgi.placeholder;
                }
                var logo = document.getElementById("dosya");
                if (!logo.value) {
                    onbilgi.value = onbilgi.placeholder;
                }
                return true;
            }
         </script>
         ';
}
/* BosmuDegilmi(): kutular boş ise placeholder bilgileri gönderilsin
(eski ilan bilgileri null ile değişmeyip korunur) 

*/

function kurumsalguncelle()
{
    global $baglanti;
    /* post metodu ile gelen değişiklikleri uygular: */
    $kid = $_GET["kid"];
    $firmaAdi = $_POST['firmaadi'];
    $sehir = $_POST['sehir'];
    $onBilgi = $_POST['onbilgi'];
    $foto = $_FILES['dosya']['name'];

    if (empty($foto)) {
        $foto_query = "SELECT logo FROM k_isilaniformu WHERE k_id='" . $kid . "'";
        $foto_result = mysqli_query($baglanti, $foto_query) or die(mysqli_error($baglanti));
        $foto_row = mysqli_fetch_array($foto_result);
        $foto = $foto_row['logo'];
    } else {
        move_uploaded_file($_FILES['dosya']['tmp_name'], "Resimler/" . $foto);
    }

    $query = "UPDATE k_isilaniformu SET firmaAdi='$firmaAdi',sehir='$sehir',onBilgi='$onBilgi',logo='$foto' WHERE k_id='" . $kid . "'";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));
    if ($result) {
        echo "<p align='center'>güncelleme başarılı </p> ";
        header("Refresh:3;url=admin.php?id=ilangoruntule");
    }
}

Function kurumsalSil()

         {
            global $baglanti;
            $kid=$_GET["kid"];
             $query = "DELETE FROM k_isilaniformu WHERE k_id='".$kid."'";
            $result = mysqli_query($baglanti, $query) or die(mysqli_error());
            if($result)
         {
            echo "<p align='center'>Silme işlemi gerçekleştirildi. </p> ";
            header("Refresh:3;url=admin.php?id=ilangoruntule");
         }
         else {
            echo "<p align='center'>Silme işleminde sorun oluştu. </p> ";
            header("Refresh:3;url=admin.php?id=ilangoruntule");
         }          
         }


/* ----------------Bireysel------------------- */

function bireyselListele()
{
    global $baglanti;
    $query = "SELECT * FROM b_isilaniformu";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));
    echo '
     <table border="1" align="center" width="600">
     <tr>
     <td colspan="6" style="background: #003973">
     <h1 style="color: white">Bireysel İlanlar</h1>
     </td></tr>';
    while ($row = mysqli_fetch_array($result)) {
        $bid = $row['B_id'];
        $ad = $row['ad'];
        $soyad = $row['soyad'];
        $ilanYazisi = $row['ilanYazisi'];
        $foto = $row['foto'];

        echo ' <tr>
         <td><img src="Resimler/' . $foto . '" width="50" height="50"></td>
         <td>' . $ad . ' ' . $soyad . '</td>
         <td>' . $ilanYazisi . '</td>
         <td>' . $bid . '</td>
         <td><a href="admin.php?id=bireyselduzenle&bid=' . $bid . '">Düzenle</a></td>
         <td><a href="admin.php?id=bireyselsil&bid=' . $bid . '">Sil</a></td>
        </tr>';
    }
    echo '</table>';
}

function bireyselDuzenleme()
{
    global $baglanti;
    $bid = $_GET["bid"];
    $query = "SELECT * FROM b_isilaniformu WHERE B_id='" .  $bid. "'";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));
    $row = mysqli_fetch_array($result);

    $bid = $row['B_id'];
    $ad = $row['ad'];
    $soyad = $row['soyad'];
    $ilanYazisi = $row['ilanYazisi'];
    $foto = $row['foto'];

    echo ' <form action="admin.php?id=bireyselguncelle&bid=' . $bid . '" method="post" enctype="multipart/form-data" onsubmit="return BosmuDegilmi()">
            <div align="center">
            <table>
                 <tr>
                     <td colspan="3"><h1 style="color: #000000;">Bireysel İlan Düzenleme</h1></td>
                 </tr>
                 <tr>
                     <td>Ad</td>
                     <td>:</td>
                     <td><input type="text" name="ad" id="ad" placeholder="' . $ad. '"></td>
                 </tr>
                 <tr>
                     <td>Soyad</td>
                     <td>:</td>
                     <td><input type="text" name="soyad" id="soyad" placeholder="' . $soyad. '"></td>
                 </tr>
                 <tr>
                     <td>İlan Yazısı</td>
                     <td>:</td>
                     <td><input type="text" name="ilanYazisi" id="ilanYazisi" placeholder="' . $ilanYazisi . '"></td>
                 </tr>
                 <tr>
                     <td>Fotoğraf</td>
                     <td>:</td>
                     <td><input type="file" name="dosya" id="dosya"></td>
                 </tr>
                 <tr>
                     <td colspan="3"> <input type="submit" value="Güncelle"></td>
                 </tr>
             </table>
            </div> 
            <hr>
         </form>
         <script>
            function BosmuDegilmi() {
                var ad = document.getElementById("ad");
                if (!ad.value) {
                    ad.value = ad.placeholder;
                }
                var soyad = document.getElementById("soyad");
                if (!soyad.value) {
                    soyad.value = soyad.placeholder;
                }
                var ilanYazisi = document.getElementById("ilanYazisi");
                if (!ilanYazisi.value) {
                    ilanYazisi.value = ilanYazisi.placeholder;
                }
                return true;
            }
         </script>
         ';
}

function bireyselguncelle()
{
    global $baglanti;
    $bid = $_GET["bid"];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $ilanYazisi = $_POST['ilanYazisi'];
    $foto = $_FILES['dosya']['name'];

    if (empty($foto)) {
        $foto_query = "SELECT foto FROM b_isilaniformu WHERE B_id='" . $bid . "'";
        $foto_result = mysqli_query($baglanti, $foto_query) or die(mysqli_error($baglanti));
        $foto_row = mysqli_fetch_array($foto_result);
        $foto = $foto_row['foto'];
    } else {
        move_uploaded_file($_FILES['dosya']['tmp_name'], "Resimler/" . $foto);
    }

    $query = "UPDATE b_isilaniformu SET ad='$ad', soyad='$soyad', ilanYazisi='$ilanYazisi', foto='$foto' WHERE B_id='" . $bid . "'";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));
    if ($result) {
        echo "<p align='center'>Güncelleme başarılı </p> ";
        header("Refresh:3;url=admin.php?id=ilangoruntule");
    }
}

function bireyselSil()
{
    global $baglanti;
    $bid = $_GET["bid"];
    $query = "DELETE FROM b_isilaniformu WHERE B_id='" . $bid . "'";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));
    if ($result) {
        echo "<p align='center'>Silme işlemi gerçekleştirildi. </p> ";
        header("Refresh:3;url=admin.php?id=ilangoruntule");
    } else {
        echo "<p align='center'>Silme işleminde sorun oluştu. </p> ";
        header("Refresh:3;url=admin.php?id=ilangoruntule");
    }
}



         
