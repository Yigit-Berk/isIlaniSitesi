<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Şifremi Unuttum</title>
    <style>

:root{
    
    --border: 0.1rem solid rgba(255, 255, 255, 1);
}

        body {
    font-family: Arial, sans-serif;
    background-image: url('Resimler/sifreyenileme.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-color: rgba(255, 255, 255, 0.7); 
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.7); 
    padding: 40px;
    border-radius: 14px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
}

form {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #555;
}

input[type="email"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 14px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: calc(50% - 10px);
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container a {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    padding: 12px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button-container a:hover {
    background-color: #0056b3;
}

.ana-sayfa-don {
    text-align: center;
    margin-top: 20px;
    background-color: #007bff;
    border-radius: 5px;
    padding: 10px;
    opacity: 0.8; 
}

.ana-sayfa-don a {
    color: #fff;
    text-decoration: none;
}

.ana-sayfa-don a:hover {
    text-decoration: underline;
}




.destek{
    

    text-align: center;
}

.destek {
    padding: 2rem 0;
    position: fixed;
    bottom: 20px;
    right: 20px;


}
.destek a {
    background-color: rgba(80, 125, 255, 0.4);
    width: 5rem;
    height: 5rem;
    line-height: 5rem;
    color: #fff;
    font-size: 3rem;
    border: var(--border);
    border-radius: 50%;
    margin: 0.3rem;
    
}

.destek a:hover{
    border: var(--border);
    border-radius: 50%;
    background-color: rgba(80, 125, 255, 0.7);

}






    </style>
</head>
<body>
    <div class="container">
        <h2>Şifremi Unuttum</h2>
        <form action="reset-password.php" method="post">
            <label for="email">E-posta Adresi:</label>
            <input type="email" id="email" name="email" required><br><br>
            <div class="button-container">
                <input type="submit" value="Şifreyi Sıfırla">
            </div>
            <div class="button-container">
    <a href="giriskayit.php" class="ana-sayfa-don">Ana Sayfaya Dön</a>
</div>
        </form>
    </div>

    
    <div class="destek">
        <a href="https://api.whatsapp.com/send?phone=905076533195" target="_blank" class="fa-brands fa-square-whatsapp"></a>    
    </div>
  
</body>
</html>