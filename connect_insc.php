<?php
/*##############*/
session_start();

$kot=$_SESSION['virtual'];
$tsm=$_SESSION['virtualtsm'];
$etat='off';
$ss=$_SESSION['top']='on';
?>
<!Doctype html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body style="background-color:rgb(37,96,153);">
    </br></br>
    <center>
      <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
    </center>
    </br>
    </br></br>
    <?php
      if(isset($_SESSION['success']) AND $_SESSION['success']=='ok'){
        echo'<script>alert("Votre compte a été créé avec succès!")</script>';
      }
    ?>
    <div class="container" style="border:1px solid black;width:80%;background-color:white;border-radius:30px;border:none;">
      </br></br>
      <center>
        <a href="<?php echo $_SESSION['virtual']; ?>" style=""><button class="btn" style="width:70%;Border-radius:30px;background-color:rgb(187,210,96);color:white;">CONNEXION</button></a>
        </br></br>
        <a href="<?php echo $_SESSION['virtualtsm']; ?>"><button  class="btn" style="width:70%;Border-radius:30px;background-color:rgb(187,210,96);color:white;">INSCRIPTION</button></a>
        </br></br></br>
      </center>
    </div>
    <?php
    require_once'bas_de_page.php';
    ?>
  </body>
</html>
