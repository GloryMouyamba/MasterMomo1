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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body style="background-image:url('img/MasterMomo.png');background-repeat:no-repeat;background-size:cover;">
    <div id="block1" style="background-color:rgb(37,96,153);"></br>
      <center>
        <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
      </center>
    </br>
    </div>
    </br>

    <?php
      ###
      if(isset($_POST['momo']) && $_POST['momo']=='momo'){
          echo"
          <h3>&nbsp;&nbsp;Momo to Master</h3></br>
            <center>
              <form action=\"virement_recup.php\" method=\"post\" class=\"\">
                <input type=\"text\" name=\"montant\" style=\"width:70%\" placeholder=\"Montant\" required>
                </br>
                </br>
                <input type=\"text\" name=\"client\" style=\"width:70%\" placeholder=\"Destinataire\" maxlength=\"16\" minlength=\"16\" required>
                </br>
                </br>
                <button class=\"btn\" style=\"background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;\">Scanner</button>
                </br>
                </br>
                <button class=\"btn\" style=\"width:70%;background-color:yellow;border-radius:7px;border:1px solid grey;color:rgb(37,96,153);font-weight:bold;\" type=\"submit\" name=\"envoyer\">Envoyer</button>
              </form>
            </center>";
      }else if(isset($_POST['master']) && $_POST['master']=='master'){
          echo"<h3>&nbsp;&nbsp;Master to Master</h3></br>
            <center>
              <form action=\"virement_recup.php\" method=\"post\" class=\"\">
                <input type=\"text\" name=\"user\" value=\"$code\" style=\"width:70%\" maxlength=\"16\" minlength=\"16\" readonly=\"readonly\" required>
                </br>
                </br>
                <input type=\"text\" name=\"montant\" value=\"\" style=\"width:70%\" placeholder=\"Montant\" required>
                </br>
                </br>
                <input type=\"text\" name=\"client\" style=\"width:70%\" value=\"\" placeholder=\"Destinataire\" maxlength=\"16\" minlength=\"16\" required>

                </br>
                </br>
                <button class=\"btn btn-primary\" name=\"by_master\" value=\"by_master\" style=\"width:70%;background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;font-weight:bold;\" type=\"submit\" >Envoyer</button>
              </form>
              <form action=\"scann.php\">
                </br>
                </br>
                <button class=\"btn btn-success\" style=\"\">Scanner</button>
              </form>
            </center>";
      }
      require_once'bas_de_page.php';
    ?>

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
