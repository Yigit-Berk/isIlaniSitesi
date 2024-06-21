<?php


include 'baglanti.php';


    $sql = "SELECT * FROM admin";
    $res = mysqli_query($baglanti, $sql);
    $row = mysqli_fetch_assoc($res);
    $adminadi = "Hoşgeldiniz, " . $row['A_ad'] . " " . $row['A_soyad'] . "!";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Tasarım/admin.css">
    <title>Hoşgeldiniz</title>
    <style>
        table {
            border-collapse: collapse;
            /* border-color: #003973; */
            border-color: blue;
        }

        th {
            background: #ccc;
        }

        th,
        td {
            border: 0px solid #ccc;
            padding: 15px;
        }

        tr:nth-child(even) {
            background: #eee;
        }

        tr:nth-child(odd) {/* tek satırlı renk değiştirme */
            background: #eee1;
            /* color: white; */
        }
        td>a{
            background: white;
            color: black;
        }
        tr:hover{
            background: #003973;
            color: white;
            transition: all ease 0.6s;
            box-shadow: 0px 5px 10px 5px rgb(0,0,0);
            
        }

    </style>
</head>

<body>
    <div style="display: flex;"><!-- flex içeriğindeki nesneleri otomatik dizer -->

        <!-- admin paneli -->
        <div class="flex-container">
            <div style="background-color:  rgba(0, 42, 84, 0.0); box-shadow: none;"></div>
            <div style="background-color:  rgba(0, 42, 84, 0.0); box-shadow: none;"></div>
            <div><a href="admin.php?id=ilangoruntule">İlanları Görüntüle</a></div>
            <div><a href="admin.php?id=siksorulanlar">Sık Sorulanlar</a></div>
            <div><a href="admin.php?id=ayarlar">Ayarlar</a></div>
        </div>


        <div style="display: flex; flex-direction: column;  width: 100%;"><!-- alt alta listelensin -->
            <!-- admin kullanıcı bilgisi -->
            <div class="flex-container2">
            <?php echo $adminadi;  ?>
                <?php echo '<img src="' . $row['foto'] . '" class="avatar">'; ?>
            </div>

            <!-- tıklanınca listelenecek içerikler -->
            <div class="flex-container3">
                <?php
                include("adminFonksiyonlar.php");
                $ilangoruntule= '<div align="center"><h2>
                <a href="admin.php?id=Bireysel">Bireysel</a> - 
                <a href="admin.php?id=Kurumsal">Kurumsal</a></h2> </div>
                <br><br>
              ';

                $gid = isset($_GET["id"]) ? $_GET["id"] : '';

                if (isset($_GET["id"])) {
                    switch ($gid) {
                        case "ilangoruntule": {
                                echo $ilangoruntule;
                                break;
                            }
                        case "ayarlar": {
                                include("ayarlar.php");
                                break;
                            }
                        case "siksorulanlar": {
                                include("siksorulanlar.php");
                                break;
                            }
                        
                        case "Kurumsal": {
                            echo $ilangoruntule;
                                kurumsalListele();
                                break;
                            }
                        case "kurumsalduzenle": {
                                kurumsalDuzenleme();
                                break;
                            }
                        case "kurumsalguncelle": {
                                kurumsalguncelle();
                                break;
                            }
                        case "kurumsalsil": {
                                kurumsalSil();
                                break;
                            }
                            case "Bireysel": {
                                echo $ilangoruntule;
                                bireyselListele();
                                break;
                            }
                            case "bireyselduzenle": {
                                bireyselDuzenleme();
                                break;
                            }
                            case "bireyselguncelle": {
                                bireyselguncelle();
                                break;
                            }
                            case "bireyselsil": {
                                bireyselSil();
                                break;
                            }
                        default: {
                                echo "Hoşgeldiniz admin";
                                /* include("hosgeldiniz.php"); */
                                break;
                            }
                    }
                } else {
                    echo "Hoşgeldiniz " ."admin";
                    /* include("hosgeldiniz.php"); */
                }
                ?>
                <!-- <br><br>
            <h1>içerik</h1>
            <h1>deneme</h1> -->
            </div>
        </div>

    </div>
</body>

</html>