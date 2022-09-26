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
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body style="background-image:url('img/MasterMomo.png');background-repeat:no-repeat;background-size:cover;">
    <div id="block1" style="background-color:rgb(37,96,153);"></br></br>
      <center>
        <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
      </center></br>
    </br>
    </div>
    </br></br></br></br></br></br></br>
    <!--h3>&nbsp;&nbsp;Opération en cours</h3></br-->
    <?php
      ###
      //By momo
      /*if(){

      }*/
      //by Master
      if(isset($_POST['by_master']) && $_POST['by_master']=='by_master'){
        $userCompt=$_POST['user'];
        $montant=$_POST['montant'];
        $client=$_POST['client'];
        //echo$userCompt;
        //début de l'opération
        #1 Vérification montant user
        require_once'compte.class.php';
        $soldeUsers= new Compte();
        $soldeUsers->verification_solde_compte_user($userCompt,$client);
        $soldeVerifie=$soldeUsers->solde;
        //echo$soldeVerifie; %=montant*3,5/100
        $montantAvecPourcentage=$montant+$montant*3.5/100;
        $soldeclient=$soldeUsers->solde2;
        if($montantAvecPourcentage>$soldeVerifie){
          echo"Désolé Votre solde est inférieur au montant à envoyer!</br>Veuillez recharger s'il vous plaît!";
        }else if ($montantAvecPourcentage<100){
          echo"Désolé seuls les montants supérieurs à 100 fcfa sont autorisés!";
        }else if($montantAvecPourcentage<$soldeVerifie){
          $soldeUsers->envoie_apres_verif($userCompt,$client,$montantAvecPourcentage);

          if($soldeUsers->returnAapres_envoie_apres_verif=="OK"){
            echo'<center><h3>Opération effectuée avec succès &#128513;</h3></center>';
          }else{
            return 'Reprenez l\'opération';
          }

        }
        //echo$soldeclient;

        #2 Vérification Compte
      }


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
    <?php
    require_once'bas_de_page.php';
    ?>
  </body>
</html>
