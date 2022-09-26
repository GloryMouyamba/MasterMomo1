<?php
/*##############*/
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!Doctype html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color:rgb(37,96,153);"></br></br>
  <center>
    <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
  </center>

<?php
//echo'hey';


  if(isset($_POST['inscription'])){

			$xnom=$_POST['nom'];
			$kprenom=$_POST['prenom'];
			$kphone=$_POST['phone'];
			$xmail=$_POST['email'];
			$mdp=$_POST['pass'];
			/*echo $xnom;
			echo $kprenom;
			echo $kphone;
			echo $xmail;
			echo $mdp;*/

			/*$kn=strval(mt_rand());
			$km=strval(mt_rand());
			$dd=$kn.$km;
			$dd=substr($dd,0,10);*/
			##nettoyage

			$xnom=str_replace("_", "", $xnom);
			$xnom=str_replace("@", "", $xnom);
			$xnom=str_replace("/", "", $xnom);
			$xnom=str_replace("<", "", $xnom);
			$xnom=str_replace(">", "", $xnom);
			$xnom=str_replace("-", "", $xnom);
			########################################################
			$kprenom=str_replace("_", "", $kprenom);
			$kprenom=str_replace("-", "", $kprenom);
			$kprenom=str_replace("@", "", $kprenom);
			$kprenom=str_replace("<", "", $kprenom);
			$kprenom=str_replace(">", "", $kprenom);
			$kprenom=str_replace("/", "", $kprenom);
			########################################################
			$kphone=str_replace("-", "", $kphone);
			$kphone=str_replace(" ", "", $kphone);
			$kphone=str_replace("_", "", $kphone);
			########################################################
			$xmail=str_replace(" ", "", $xmail);
			$xmail=str_replace("_", "", $xmail);
			$xmail=str_replace("-", "", $xmail);
			$xmail=str_replace("^", "", $xmail);
			$xmail=str_replace("<", "", $xmail);
			$xmail=str_replace(">", "", $xmail);
			$xmail=str_replace("/", "", $xmail);
			$xmail=str_replace("*", "", $xmail);
			$xmail=str_replace("[", "", $xmail);
			$xmail=str_replace("]", "", $xmail);
			$xmail=str_replace("{", "", $xmail);
			$xmail=str_replace("}", "", $xmail);
			########################################################






			require_once'konect.php';
			$yyy="SELECT * FROM `taa_sarila` WHERE `tia_tambila`=$kphone";
			$search = mysqli_query($_SESSION['cnx'],$yyy);

			if(mysqli_num_rows($search)==1){
				echo"<br><br><br><br><br><br><center><h2>Désolé, ce numéro de téléphone existe déjà!</h2></center>";
			}else{
			$heure=date("h:i:s");
			$date=date("Y/m/d");
			$date_time=$date.$heure; //echo $date_time;


				$addin = mysqli_query($_SESSION['cnx'],"INSERT INTO `taa_sarila` (`ctr`, `nkumbu_ya_ntete`, `nkumbu_ya_nzole`, `mansueki`, `tia_tambila`, `xkma`, `lumbu_tia_tsonama`) VALUES
        (NULL, '$xnom', '$kprenom', '$mdp', '$kphone', '$xmail', '$date')");

        //
        require_once'compte.class.php';
        $compte= new Compte();
        $compte->info_to_gnr($xnom,$kprenom,$mdp,$kphone,$xmail);
        $code_compte= $compte->compte;
        $code_ht=$compte->ht;
        $code_valid=$compte->valid;
        //compteBd

        require_once'konect.php';
        $name=$xnom.' '.$kprenom;
        $final_code=$code_ht.$code_compte.$code_valid;
        mysqli_query($_SESSION['cnx'],"INSERT INTO `inf_kompt` (`ctr_komp`,`nkumbu`,`tsiombo`,`conta`,`solde`)
        VALUES(NULL,'$name','$kphone','$final_code','0.00')");

				if($addin){
					require('file_to_pgm.php');
					//fftsonama
						$sortie = "tsonama_bin.txt";
						$outFile = fopen ($sortie, "a");
						$aa=$xnom;
						$bb=$kprenom;
						$cc=$kphone;
						$ff=$xmail;
						$dt=$date;
						//$buffer=$aa."---".$bb."---".$dd."---".$ee."---".$ff."---".$dt."---".$gg."---".$hh."---".$ii."---"."/".".on.";
						if (strlen($_POST["nom"])>20){$_POST["nom"]=substr($_POST["nom"],0,20);}
						if (strlen($_POST["prenom"])>17){$_POST["prenom"]=substr($_POST["prenom"],0,17);}
						if (strlen($_POST["email"])>30){$_POST["email"]=substr($_POST["email"],0,30);}
						if (strlen($_POST["phone"])>15){$_POST["phone"]=substr($_POST["phone"],0,15);}

						$bbsav=$_POST["email"];
						$_POST["email"]=str_replace("-","*",$_POST["email"]);

						$aa=$_POST["nom"].str_repeat ("-" ,20-strlen($_POST["nom"]));
						$bb=$_POST["email"].str_repeat ("-" ,30-strlen($_POST["email"]));
						$zz=$_POST["prenom"].str_repeat ("-" ,17-strlen($_POST["prenom"]));

						//$bb=str_replace("*","-",$bb);
						$heure=date("H:i:s");
						$cc=$_POST["phone"].str_repeat ("-" ,15-strlen($_POST["phone"]));
						$buffer=$aa.$zz.$bb.$cc.$mdp."/".$dt.".".$heure.".on.";
						fwrite($outFile,$buffer);
						fclose ($outFile);

						//file_to_pgm('index.phone','success');
					//$_SESSION['pass']=$dd;

				}/*else{
					echo"<script>window.location=\"blob_to_file.php?frominscriptio=inscription\";</script>";
				}*/
			//}



	}
}

	if(isset($_POST['connexion'])){
          //echo"hhhh";
					$phone=$_POST['phone'];
					$wdp=$_POST['pass'];
					require_once'konect.php';
          $q=mysqli_query($_SESSION['cnx'],"SELECT * FROM `taa_sarila` WHERE tia_tambila='$phone' and mansueki='$wdp'");

          if(mysqli_num_rows($q)==1){


					/*function validcode($motdepass,$phone){
							//die("$motdepass,$phone");
							//$phone=str_replace("+","",$phone);
							$aa = $motdepass;
							$sortie = "tsonama_bin.txt";
							$outFile = fopen ($sortie, "r");
							while(!feof($outFile)) //tant que ce n'est pas la fin du fichier (End Of File)
							{
							$lecture = fread($outFile, 116); //lecture d'une ligne
							//$pos = strpos($lecture, $aa);
							if(strpos($lecture,$aa)>(-1))
							{
								if(strpos($lecture,$phone)>(-1)){fclose ($outFile); return true;}else{fclose ($outFile); return false;}
							}
							}
							fclose ($outFile); return false;
					}
					$xcode=$wdp;
					$phone=$phone;
					if(!validcode($xcode,$phone)){die("/*sendit Code invalide recommencez.,$phone");}else if(validcode($xcode,$phone)){
						//echo$xcode." ".$phone;
							echo"<br>";
							echo"<br>";
							echo"<br>";
							echo"<br>";
							echo"<br>";
							echo"<center>";
							$mtk='img/loading-9.gif';
							echo"<img src=\"$mtk\" style=\"#\">";
							echo"<br>";
							echo"<br>";
							echo"<h3>Veuillez patienter s'il vous plaît!!!</h3>";
							echo"<br>";
							echo"<br>";
							echo"<h3>Vous êtes connecté!</h3>";
							echo"</center>";}*/

              echo"<center>";
              $mtk='img/loading-9.gif';
							echo"<img src=\"$mtk\" style=\"width:70%\">";
              echo"</center>";
							require_once('file_to_pgm.php');
              require_once'konect.php';
              $requette=mysqli_query($_SESSION['cnx'],"SELECT * FROM `inf_kompt` WHERE `tsiombo` Like '$phone'");

              //echo'Bonjour';
              while($req=mysqli_fetch_array($requette)){
                $compte=$req['conta'];
                $phonenew=$req['tsiombo'];
                $nomnew=$req['nkumbu'];

              }
              //echo$compte;
              $_SESSION['nom']=$nomnew;
              $_SESSION['phone']=$phonenew;
              $_SESSION['compte']=$compte;



              $url="accueil_connexion.php";
							echo"<meta http-equiv=\"refresh\" content=\"3;URL='$url'\" />";
					}else{
            echo'non';
          }




							exit();
					}

          <?php
          require_once'bas_de_page.php';
          ?>

?>
