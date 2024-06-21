<?php


function Bireysel()
{
  echo '
  <head>
    <meta charset="UTF-8">
    <title>Alert Box | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins",sans-serif;
}

.alert_box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);
  }

  .show_button{
      padding-left: 30px;
      padding-right: 30px;
      line-height: 65px;
      position: absolute; /* .nesne2 içerisindeki butonu konumlandırmak için */
        bottom: 6%; /* En alta yerleştirir */
        right: 4%; /*  En sağa yerleştirir */
        max-width: 20%;
        max-height: 15%;
        border-radius: 60px;
        border-style: none;/*kenarlıksız olsun*/
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        /*varsayılan boyutlar:*/
        font-weight: 500;
        font-size: 20px;
        width: 15%;
        height: 65px;
        background-color: #023466;
        color: #cccccc;
        transition: all ease 0.9s;
    }
    .show_button:hover{
      background-color: #0b47b1;
        color: #ffffff;
        cursor: pointer;/*imleç biçimi*/
    }
.background{
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
}
.alert_box{
  padding: 30px;
  display: flex;
  background: white;
  flex-direction: column;
  align-items: center;
  text-align: center;
  max-width: 450px;
  width: 100%;
  border-radius: 5px;
  z-index: 5;
  opacity: 0;
  pointer-events: none;
  transform: translate(-50% , -50%) scale(0.97);
  transition: all 0.3s ease;
}
#check:checked ~ .alert_box{
  opacity: 1;
  pointer-events: auto;
  transform: translate(-50% , -50%) scale(1);
}
#check:checked ~ .background{
  opacity: 1;
  pointer-events: auto;
}
#check{
  display: none;
}
.alert_box .icon{
  height: 100px;
  width: 100px;
  color: #0b0061;
  background-color: Black;
  border: 3px solid #0b0061;
  border-radius: 50%;
  line-height: 97px;
  font-size: 50px;
}
.alert_box header{
  font-size: 35px;
  font-weight: 500;
  margin: 10px 0;
  color: black;
}
.alert_box p{
  font-size: 20px;
  color: black;
}
.alert_box .btns{
  margin-top: 20px;
}
.btns a{
    text-decoration: none;
  display: inline-flex;
  height: 55px;
  padding: 0 30px;
  font-size: 20px;
  font-weight: 400;
  cursor: pointer;
  line-height: 55px;
  outline: none;
  margin: 0 10px;
  border: none;
  color: #fff;
  border-radius: 5px;
  transition: all 0.3s ease;
  
}
.btns a:first-child{
  background: #2980b9;
}
.btns a:first-child:hover{
  background: #2573a7;
}
.btns a:last-child{
    background: #2c88c5;
}
.btns a:last-child:hover{
    background: #2573a7;
}
</style>
<!-- https://www.codingnepalweb.com/animated-alert-box-using-html-css-only/ -->
<body>
    <div class="mavihap">
      <input type="checkbox" id="check">
      <label class="show_button"  for="check">Bireysel</label>
      <div class="background"></div>
      <div class="alert_box">
        <div class="icon">
            <i class="fas fa-pen"></i>
        </div>
        <header>Bireysel</header>
        <p>Seçim yapınız</p>
        <div class="btns">
          <a for="check" href="anaSayfa.html">İş ilanı oluştur</a>
          <br><br>
          <a for="check" href="anaSayfa.html">İş ilanlarını incele</a>
        </div>
      </div>
    </div>
</body>
';
}


function Kurumsal()
{
  echo '
<head>
  <meta charset="UTF-8">
  <title>Alert Box | CodingLab </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
 </head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins",sans-serif;
}

.alert_box{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50% , -50%);
}

.show_button{
    padding-left: 30px;
    padding-right: 30px;
    line-height: 65px;
    position: absolute; /* .nesne2 içerisindeki butonu konumlandırmak için */
      bottom: 6%; /* En alta yerleştirir */
       left: 4%;  /*En sağa yerleştirir */
      max-width: 20%;
      max-height: 15%;
      border-radius: 60px;
      border-style: none;/*kenarlıksız olsun*/
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
      /*varsayılan boyutlar:*/
      font-weight: 500;
      font-size: 20px;
      width: 15%;
      height: 65px;
      background-color: #023466;
      color: #cccccc;
      transition: all ease 0.9s;
  }
  .show_button:hover{
    background-color: #0b47b1;
      color: #ffffff;
      cursor: pointer;/*imleç biçimi*/
  }
.background{
position: absolute;
height: 100%;
width: 100%;
top: 0;
left: 0;
background: rgba(0, 0, 0, 0.5);
opacity: 0;
pointer-events: none;
transition: all 0.3s ease;
}
.alert_box{
padding: 30px;
display: flex;
background: white;
flex-direction: column;
align-items: center;
text-align: center;
max-width: 450px;
width: 100%;
border-radius: 5px;
z-index: 5;
opacity: 0;
pointer-events: none;
transform: translate(-50% , -50%) scale(0.97);
transition: all 0.3s ease;
}
#check:checked ~ .alert_box{
opacity: 1;
pointer-events: auto;
transform: translate(-50% , -50%) scale(1);
}
#check:checked ~ .background{
opacity: 1;
pointer-events: auto;
}
#check{
display: none;
}
.alert_box .icon{
height: 100px;
width: 100px;
color: #0b0061;
background-color: Black;
border: 3px solid #0b0061;
border-radius: 50%;
line-height: 97px;
font-size: 50px;
}
.alert_box header{
font-size: 35px;
font-weight: 500;
margin: 10px 0;
color: black;
}
.alert_box p{
font-size: 20px;
color: black;
}
.alert_box .btns{
margin-top: 20px;
}
.btns a{
  text-decoration: none;
display: inline-flex;
height: 55px;
padding: 0 30px;
font-size: 20px;
font-weight: 400;
cursor: pointer;
line-height: 55px;
outline: none;
margin: 0 10px;
border: none;
color: #fff;
border-radius: 5px;
transition: all 0.3s ease;

}
.btns a:first-child{
background: #2980b9;
}
.btns a:first-child:hover{
background: #2573a7;
}
.btns a:last-child{
  background: #2c88c5;
}
.btns a:last-child:hover{
  background: #2573a7;
}
</style>
<!-- https://www.codingnepalweb.com/animated-alert-box-using-html-css-only/ -->
<body>
  <div class="mavihap">
    <input type="checkbox" id="check">
    <label class="show_button" for="check">Kurumsal</label>
    <div class="background"></div>
    <div class="alert_box">
      <div class="icon">
          <i class="fas fa-pen"></i>
      </div>
      <header>Kurumsal</header>
      <p>Seçim yapınız</p>
      <div class="btns">
        <a for="check" href="anaSayfa.html">İş ilanı Yayımla</a>
        <br><br>
        <a for="check" href="anaSayfa.html">İş ilanlarını incele</a>
      </div>
    </div>
  </div>
</body>
  ';
}




function KurumsalK1()
{
  echo '
  <div class="mavihap">
    <input type="checkbox" id="check_kurumsal">
    <label class="show_button show_button_kurumsal" for="check_kurumsal">Kurumsal</label>
    <div class="background"></div>
    <div class="alert_box">
      <div class="icon">
          <i class="fas fa-pen"></i>
      </div>
      <header>Kurumsal</header>
      <p>Seçim yapınız</p>
      <div class="btns">
        <a href="anaSayfa.html">İş ilanı Yayımla</a>
        <br><br>
        <a href="K_ilanInceleme.php">İş ilanlarını incele</a>
      </div>
    </div>
  </div>
  ';
}

function BireyselB1()
{
  echo '
  <div class="mavihap">
    <input type="checkbox" id="check_bireysel">
    <label class="show_button show_button_bireysel" for="check_bireysel">Bireysel</label>
    <div class="background"></div>
    <div class="alert_box">
      <div class="icon">
          <i class="fas fa-pen"></i>
      </div>
      <header>Bireysel</header>
      <p>Seçim yapınız</p>
      <div class="btns">
        <a href="B_ilanOlustur.php">İş ilanı oluştur</a>
        <br><br>
        <a href="B_ilanInceleme.php">İş ilanlarını incele</a>
      </div>
    </div>
  </div>
  ';
}
?>


