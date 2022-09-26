<?php
/*##############*/
session_start();
$_SESSION['virtual']='phone_virtual.php?xyz=connect';
$_SESSION['virtualtsm']='phone_virtual.php?xyz=insc';
$_SESSION['top']='on';
if(isset($_GET['varget']) AND $_GET['varget']=='success'){
  $_SESSION['success']='ok';
}

?>
<!Doctype html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <!--meta http-equiv="refresh" content="3;URL=connect_insc.php"-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body style="background-color:rgb(37,96,153);">

    </br>
    </br>
    </br></br></br></br></br></br></br>
    <center>
      <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2></br>
      <img src="img/50646.gif" class="img-fluid">
    </center>

    <!--/********Slide*********/-->

    <!--div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/mast.jpeg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img.png" alt="Third slide">
        </div>
      </div>
    </div-->
  </body>
</html>
