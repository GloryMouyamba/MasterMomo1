<?php
//
class Compte{
    public $nom;
    public $prenom;
    public $passe;
    public $phone;
    public $mail;
    public $compte;
    public $ht;
    public $valid;
    public $solde;
    public $solde2;
    public $returnAapres_envoie_apres_verif;

    public function info_to_gnr($nom,$prenom,$passe,$phone,$mail){
      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->passe=$passe;
      $this->phone=$phone;
      $this->mail=$mail;
      //require_once'konect.php';
      define('HTCODE', '145768');
      define('VALIDATION','9');
      $this->ht=HTCODE;
      $this->valid=VALIDATION;

      $tab1= array(
                    'A' => '1','B' => '2','C' => '3','D' => '4','E' => '5','F' => '6','G' => '7',
                    'H' => '8','I' => '9','J' => '10','K' => '11','L' => '12','M' => '13','N' => '14',
                    'O' => '15','P' => '16','Q' => '17','R' => '18','S' => '19','T' => '20','U' => '21',
                    'V' => '22','W' => '23','X' => '24','Y' => '25','Z' => '26','@' => '27','+' => '28',
                    '_' => '29','0' => '30','1' => '31','2' => '32','3' => '33','4' => '34','5' => '35',
                    '6' => '36','7' => '37','8' => '38','9' => '39','-' => '40','*' => '41'
                  );
      $tab1=$nom.$prenom.$passe.$phone.$mail;
      //echo $this->nom;
      $sh1=str_shuffle($nom);$sh2=str_shuffle($prenom);$sh3=str_shuffle($passe);$sh4=str_shuffle($phone);$sh5=str_shuffle($mail);
      $count1=strlen($sh1);$count2=strlen($sh2);$count3=strlen($sh3);$count4=strlen($sh4);$count5=strlen($sh5);
      //echo $count1.$count2.$count3.$count4.$count5;echo "<br>";
      $op1=$count1*14/9;$op2=$count2*14/9;$op3=$count3*14/9;$op4=$count4*14/9;$op5=$count5*14/9;
      $var1=round($op1);$var2=round($op2);$var3=round($op3);$var4=round($op4);$var5=round($op5);
      //echo $op1.$op2.$op3.$op4.$op5;echo "<br>";
      $var_fin= $var1.$var2.$var3.$var4.$var5;
      $this->compte=$var_fin;
      //echo$var_fin;
      $length=strlen($var_fin);
      //for($itt=0;$itt<9;$itt++){
        if($length<9){
          $concat=str_shuffle($var_fin);
          $concat1=$var_fin.$concat;
          //echo$concat1;
        }else if ($length=9){
          //################################################################""
          function validcode($code,$ht){
              $aa = $code;
              $sortie = "comptes.txt";
              $outFile = fopen ($sortie, "r");
              while(!feof($outFile))
              {
              $lecture = fread($outFile, 116);
              //$pos = strpos($lecture, $aa);
              if(strpos($lecture,$aa)>(-1))
              {
                if(strpos($lecture,$ht)>(-1)){fclose ($outFile); return true;}else{fclose ($outFile); return false;}
                echo"Le code existe";
              }
              }
              fclose ($outFile); return false;
          }

          if(!validcode($var_fin,HTCODE)){
            $sortie = "comptes.txt";
            $outFile = fopen ($sortie, "a");
            $tab2=$nom.$prenom.$passe.$phone.$mail;

            if (strlen($nom)>20){$nom=substr($nom,0,20);}
            if (strlen($var_fin)>17){$var_fin=substr($var_fin,0,17);}
            if (strlen($mail)>30){$mail=substr($mail,0,30);}
            if (strlen($phone)>15){$phone=substr($phone,0,15);}
            //if (strlen(HTCODE)>15){HTCODE=substr(HTCODE,0,15);}


            $mail=str_replace("-","*",$mail);

            $aa=$nom.str_repeat ("-" ,20-strlen($nom));
            $zz=$phone.str_repeat ("-" ,15-strlen($phone));
            $bb=$mail.str_repeat ("-" ,30-strlen($mail));
            $cc=$var_fin.str_repeat ("-" ,17-strlen($var_fin));
            $ht=HTCODE.str_repeat ("-" ,10-strlen(HTCODE));

            //$bb=str_replace("*","-",$bb);
            $heure=date("H:i:s");
            $dt=$date=date("Y/m/d");

            $buffer=$aa.$zz.$bb.$cc.$ht."/".$dt.".".$heure.".on.";
            fwrite($outFile,$buffer);
            fclose ($outFile);
            require_once'konect.php';
            $tabb=$nom.$prenom.$passe.$phone.$mail;
            $name=$nom.' '.$prenom;
            $final_code=HTCODE.$cc.VALIDATION;
            mysqli_query($_SESSION['cnx'],"INSERT INTO `inf_kompt` (`ctr_komp`,`nkumbu`,`tsiombo`,`conta`,`solde`)
            VALUES(NULL,'$name','$phone','$final_code','0.00')");

          }else{
            $new=str_shuffle($var_fin);
            while(validcode($var_fin,HTCODE)){

              $sortie = "comptes.txt";
              $outFile = fopen ($sortie, "a");
              $tab2=$nom.$prenom.$passe.$phone.$mail;

              if (strlen($nom)>20){$nom=substr($nom,0,20);}
              if (strlen($new)>17){$var_fin=substr($new,0,17);}
              if (strlen($mail)>30){$mail=substr($mail,0,30);}
              if (strlen($phone)>15){$phone=substr($phone,0,15);}
              //if (strlen(HTCODE)>15){HTCODE=substr(HTCODE,0,15);}


              $mail=str_replace("-","*",$mail);

              $aa=$nom.str_repeat ("-" ,20-strlen($nom));
              $zz=$phone.str_repeat ("-" ,15-strlen($phone));
              $bb=$mail.str_repeat ("-" ,30-strlen($mail));
              $cc=$new.str_repeat ("-" ,17-strlen($new));
              $ht=HTCODE.str_repeat ("-" ,10-strlen(HTCODE));

              //$bb=str_replace("*","-",$bb);
              $heure=date("H:i:s");
              $dt=$date=date("Y/m/d");

              $buffer=$aa.$zz.$bb.$cc.$ht."/".$dt.".".$heure.".on.";
              fwrite($outFile,$buffer);
              fclose ($outFile);
              require_once'konect.php';
              $name=$nom.' '.$prenom;
              $final_code=HTCODE.$cc.VALIDATION;
              mysqli_query($_SESSION['cnx'],"INSERT INTO `inf_kompt` (`ctr_komp`,`nkumbu`,`tsiombo`,`conta`,`solde`)
              VALUES(NULL,'$name','$phone','$final_code','0.00')");
              break;
            }
          }
        }else if($length>9){
          $new_var_fin=substr($var_fin,0,9);
          if(validcode($new_var_fin,HTCODE)){
            $new=str_shuffle($var_fin);
            while(validcode($var_fin,HTCODE)){

              $sortie = "comptes.txt";
              $outFile = fopen ($sortie, "a");
              $tab2=$nom.$prenom.$passe.$phone.$mail;

              if (strlen($nom)>20){$nom=substr($nom,0,20);}
              if (strlen($new)>17){$var_fin=substr($new,0,17);}
              if (strlen($mail)>30){$mail=substr($mail,0,30);}
              if (strlen($phone)>15){$phone=substr($phone,0,15);}
              //if (strlen(HTCODE)>15){HTCODE=substr(HTCODE,0,15);}


              $mail=str_replace("-","*",$mail);

              $aa=$nom.str_repeat ("-" ,20-strlen($nom));
              $zz=$phone.str_repeat ("-" ,15-strlen($phone));
              $bb=$mail.str_repeat ("-" ,30-strlen($mail));
              $cc=$new.str_repeat ("-" ,17-strlen($new));
              $ht=HTCODE.str_repeat ("-" ,10-strlen(HTCODE));

              //$bb=str_replace("*","-",$bb);
              $heure=date("H:i:s");
              $dt=$date=date("Y/m/d");

              $buffer=$aa.$zz.$bb.$cc.$ht."/".$dt.".".$heure.".on.";
              fwrite($outFile,$buffer);
              fclose ($outFile);
              require_once'konect.php';
              $name=$nom.' '.$prenom;
              $final_code=HTCODE.$cc.VALIDATION;
              mysqli_query($_SESSION['cnx'],"INSERT INTO `inf_kompt` (`ctr_komp`,`nkumbu`,`tsiombo`,`conta`,`solde`)
              VALUES(NULL,'$name','$phone','$final_code','0.00')");
              break;
            }
          }else{
            $sortie = "comptes.txt";
            $outFile = fopen ($sortie, "a");
            $tab2=$nom.$prenom.$passe.$phone.$mail;

            if (strlen($nom)>20){$nom=substr($nom,0,20);}
            if (strlen($new)>17){$var_fin=substr($new,0,17);}
            if (strlen($mail)>30){$mail=substr($mail,0,30);}
            if (strlen($phone)>15){$phone=substr($phone,0,15);}
            //if (strlen(HTCODE)>15){HTCODE=substr(HTCODE,0,15);}


            $mail=str_replace("-","*",$mail);

            $aa=$nom.str_repeat ("-" ,20-strlen($nom));
            $zz=$phone.str_repeat ("-" ,15-strlen($phone));
            $bb=$mail.str_repeat ("-" ,30-strlen($mail));
            $cc=$new.str_repeat ("-" ,17-strlen($new));
            $ht=HTCODE.str_repeat ("-" ,10-strlen(HTCODE));

            //$bb=str_replace("*","-",$bb);
            $heure=date("H:i:s");
            $dt=$date=date("Y/m/d");

            $buffer=$aa.$zz.$bb.$cc.$ht."/".$dt.".".$heure.".on.";
            fwrite($outFile,$buffer);
            fclose ($outFile);
            require_once'konect.php';
            $name=$nom.' '.$prenom;
            $final_code=HTCODE.$cc.VALIDATION;
            mysqli_query($_SESSION['cnx'],"INSERT INTO `inf_kompt` (`ctr_komp`,`nkumbu`,`tsiombo`,`conta`,`solde`)
            VALUES(NULL,'$name','$phone','$final_code','0.00')");
          }
        }


    }



    public function verification_solde_compte_user($compteUser,$soldeClient){

      require_once'konect.php';
      //solde user
      $verif=mysqli_query($_SESSION['cnx'],"SELECT * FROM `inf_kompt` WHERE conta='$compteUser'");

      while($rep=mysqli_fetch_array($verif)){
        $sold = $rep['solde'];
        $this->solde=$sold;
      }
      //soldeclient solde2 soldeClient
      $verif2=mysqli_query($_SESSION['cnx'],"SELECT * FROM `inf_kompt` WHERE conta='$soldeClient'");

      while($rep2=mysqli_fetch_array($verif2)){
        $sold2 = $rep2['solde'];
        $this->solde2=$sold2;
      }

    }

    public function envoie_apres_verif($compteUse,$compteClient,$soldeAvecPourCent){
      //save dans kompt
      require_once'konect.php';
      $date=date("Y/m/d");
      $operation='envoie';
      $send=mysqli_query($_SESSION['cnx'],"INSERT INTO `kompt`(`crt_komp`, `solde`, `operation`, `destination`, `source`, `lumbu`)
      VALUES(NULL,'$soldeAvecPourCent','$operation','$compteClient','$compteUse','$date')");

      if($send){
        $this->returnAapres_envoie_apres_verif="OK";
      }
      //recup solde client
      $recupclient=mysqli_query($_SESSION['cnx'],"SELECT * FROM `inf_kompt` WHERE conta='$compteClient'");
      while($repcl=mysqli_fetch_array($recupclient)){
        $soldcl = $repcl['solde'];
      }
      $soldeclientFinal=$soldcl+$soldeAvecPourCent;
      //update compte client
      mysqli_query($_SESSION['cnx'],"UPDATE `inf_kompt` SET `solde`='$soldeclientFinal' WHERE conta='$compteClient'");

      ///////////////+++++++++++++++++++++++++++++++++++++++++++++\\\\\\\\\\\\\\\\\\\\\\
      //recup solde user
      $recupUser=mysqli_query($_SESSION['cnx'],"SELECT * FROM `inf_kompt` WHERE conta='$compteUse'");
      while($repUs=mysqli_fetch_array($recupUser)){
        $soldUs = $repUs['solde'];
      }
      $soldeUserFinal=$soldUs-$soldeAvecPourCent;
      //update compte user
      mysqli_query($_SESSION['cnx'],"UPDATE `inf_kompt` SET `solde`='$soldeUserFinal' WHERE conta='$compteUse'");
    }

}








//###########tant que existe, $concat=str_shuffle($var_fin.$var_fin) substr($concat,0,9)
//#######Etape 1 Vérif dans la bd si le code existe
//#########S'il n'existe pas, ok enregistrer.
  //#########S'il existe //###########tant que existe, $concat=str_shuffle($var_fin.$var_fin) substr($concat,0,9)


?>
