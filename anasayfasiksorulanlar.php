
<head>
    <style>

        .banner2 {

            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-start;
            flex-direction: column ;/*aşağı yönde eklensin*/
            align-items: center;
            
            background-color: #ffffff;

        }

        .heading-20{
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }
        .text-block-12{
            max-width: 2000px;
            margin: 10px;
            padding: 20px;
            background-color: #fff;
            border-radius: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center ;
            margin-bottom: 28px;
        }
        .search-1{
            max-width: 1500px;
            margin: 10px;
            padding: 5px;
            background-color: #fff;
            margin-bottom: 28px;
            


        }
        .search-input-2{
            max-width: 1500px;
            margin: 100 auto;
            padding: 25px;
            background-color: #fff;
            height: 10px;


        }
        .search-button-2{
            max-width: 150px;
            margin: 1px;
            padding: 20px;
            background-color: #fff;
            margin-bottom: 1px;
            height: 10px;

        }

        .sorucevap {
            max-width: 1000px;
            height: 2000px;
            margin: 0 auto;
            padding: 70px;
            background-color: #fff;
            border-radius: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: flex-start;
            flex-direction: column ;
            align-items: center;
            
        }
        
        .faq-sorucevap {
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px;
            background-color: #f9f9f9;
            border-radius: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
        }
        .faq-item {
            margin-bottom: 50px;
        }
        .faq-question {
            font-weight: bold;
            cursor: pointer;
            color: black;
        }
        .faq-answer {
            display: none;
            padding-top: 10px;
            color: black;
        }





    </style>
</head>
<body>

    
<div class="sorucevap">

    <h1>Sık Sorulan Sorular</h1>


    <div class="faq-sorucevap">
        <div class="faq-item" class="answer">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "isilanlari";

            // Veritabanına bağlanma
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantıyı kontrol etme
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // FAQ verilerini çekme
            $sql = "SELECT ss_id, soru, cevap FROM sorucevap";
            $result = $conn->query($sql);
            

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="faq-item">';
                    echo '<div class="faq-question" onclick="toggleAnswer(this)">' . $row["soru"] . '</div>';
                    echo '<div class="faq-answer">' . $row["cevap"] . '</div>';
                    echo '</div>';
                }
            } else {
                echo "No sorucevap found.";
            }
            $conn->close();
            ?>
    
</div>

<script>


    function toggleAnswer(element) {
        var answer = element.nextElementSibling;
        if (answer.style.display === "none" || answer.style.display === "") {
            answer.style.display = "block";
        } else {
            answer.style.display = "none";
        }
    }

    // Sayfa yüklendiğinde tüm cevapları gizle
    document.addEventListener("DOMContentLoaded", function() {
        var answers = document.getElementsByClassName("faq-answer");
        for (var i = 0; i < answers.length; i++) {
            answers[i].style.display = "none";
        }
    });
</script>

</body>