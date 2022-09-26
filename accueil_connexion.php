
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
    <style>
      #infoNom{
        position: absolute;
        left:10%;
        right:10%;
        z-index: 2;
      }
    </style>
  </head>
  <body style="background-image:url('img/MasterMomo.png');background-repeat:no-repeat;background-size:cover;">
    <div id="block1" style="background-color:rgb(37,96,153);"></br></br>
      <center>
        <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
      </center></br>
        <div id="infoNom" class="container" style="border:1px solid black;width:80%;background-color:white;border-radius:30px;border:none;box-shadow: 1px 1px grey;">
          </br>
          <center>
            <?php echo "<h4>".$nom."</h4>"; ?>
            <hr style="background-color:grey;width:70%">
            <?php echo "<h6>TEL : ".$phone."</h6>"; ?>
          </center>
        </div>
    </br>
    </div>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div id="block2">
    <br></br></br></br>
    <?php
      /*$heure=date("h:i:s");
      if($heure>'18:00:00' && $heure<'23:59:59'){
        echo '<h4>&nbsp;&nbsp;Bonsoir '. $nom .' </h4>';
      }else if($heure>'00:00:00' && $heure='18:00:00'){
        echo '<h4>&nbsp;&nbsp;Bonsoir '. $nom .' </h4>';
      }*/
    ?>
    </div>
    <!--center-->
      <div style="border:1px solid black;border:none; width:90%;height:170px;background-image:url('img/credit-card - Copie.png');background-repeat:no-repeat;background-size:cover;margin: auto;">
        <br><br><br><span style="color:white;margin-top:20%;margin-left:20%;"><?php echo$code;?></span><br>
        <span style="color:white;margin-left:50%;"><?php echo"MASTER MOMO";?></span><br>
        <span style="color:white;margin-left:15%;"><?php echo strToUpper($nom);?></span>
      </div>
    <!--/center-->
    <br><br>


        <div class='container' style="border:1px solid black;border: none;padding: auto;height: 150px;">
              <center>
                <button class="btn" name="master" value="master" style="width:70%;background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;"  onclick=setTimeout('location.href="<?php echo "listing.php";?>"',0)>Mon Compte</button>
                <br><br>
                <button class="btn" name="master" value="master" style="width:70%;background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;"  onclick=setTimeout('location.href="<?php echo "avantVirement.php";?>"',0)>Opérations</button>
                <br><br>
                <button class="btn" name="master" value="master" style="width:70%;background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;"  onclick=setTimeout('location.href="<?php echo "apropos.php";?>"',0)>A propos</button>
                <br><br>
                <button class="btn" name="master" value="master" style="width:70%;background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;"  onclick=setTimeout('location.href="<?php echo "serviceclient.php";?>"',0)>Service Client</button>
                <br><br>
                <button class="btn" name="master" value="master" style="width:70%;background-color:rgb(37,96,153);border-radius:7px;border:1px solid grey;color:yellow;font-weight:bold;"  onclick=setTimeout('location.href="<?php echo "autres.php";?>"',0)>Autres</button>
                <br><br><br><br><br><br>
          </center>
        </div>



      <nav class="navbar navbar-dark bg-warning navbar-expand d-md-none d-lg-none d-xl-none  fixed-bottom"  style="background-color:rgb(37,96,153);">
      <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
          <a href="accueil_connexion.php" class="nav-link">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a href="avantVirement.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
      <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
      <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
      <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
      </svg>
          </a>
        </li>

        <li class="nav-item">
          <a href="infoCompte.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>
          </a>
        </li>
        <li class="nav-item">
          <a href="deconnexion.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
          </a>
        </li>
      </ul>
      </nav>
  </body>
</html>
