<?php
/*##############*/
session_start();
$nom=$_SESSION['nom'];
$phone=$_SESSION['phone'];
$code=$_SESSION['compte'];

?>
<!Doctype html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body style="background-image:url('img/MasterMomo.png');background-repeat:no-repeat;background-size:cover;">
    <div id="block1" style="background-color:rgb(37,96,153);"></br></br>
      <center>
        <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
      </center></br>
    </br>
    </div>
    <br>
    </br>


    <script>
      if(confirm("Voulez vous quitter l'application?")){
        alert("Bonjour");
        onclick=setTimeout('location.href="connexionphone.php"',0);
      }else{
        alert("Non");
      }
    </script>



    <?php
    require_once'bas_de_page.php';
    ?>
  </body>
</html>
