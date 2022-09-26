<?php
if (isset($_POST['montant']) && !empty($_POST['montant'])
and isset($_POST['client']) && !empty($_POST['client'])){

$montant=$_POST['montant'];
$client=$_POST['client'];
//Je récupères d'abord l'id
function get_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
$uuid=get_uuid();
//put your API Key and Secret in these two variables.
define('USER_ID', $uuid); // Disbursement User ID
define('API_KEY', '908dcd6a62a74e3e9698b92de2a0c2c9'); // Disbursement API Key
define('DISBURSEMENT_SUBSCRIPTION_KEY', 'bbff925ccd8245e7aac71a4ab7f4d90e');
define('ACCESS_TOKEN','eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjczZTVmNTllLTcyYjAtNDY3NC05ZGRjLTk0MjAyZTkyZWVjNSIsImV4cGlyZXMiOiIyMDIyLTA5LTI1VDAzOjM4OjQzLjQ2MCIsInNlc3Npb25JZCI6ImNmODQ3MjBmLTk1YzgtNGZhNi05MjBjLThlM2QyZjc2ZjNmNiJ9.elJqy_m60eCgC1sDjavUKNZtl0y5h6H7AOiG5JuxR1gU7mRldGNQbyHvJruKljprGiaKXaOXFkGZZkPkksyEAvXEIXeq-UVkKpx4sK1PFllYdK3AzysI-OB7vEtmKJVg7JXMK0anwt17VQYUCrCSXmCYtyQrFNMpVjqH2BUvitTV86Hzn21Yr90F-uQuh-xLep-Ain5S3gPssywSkvk2ZuXSHNWsJUW5IX0rrkKu0UfyxaomJQal2V23g9BII4UuZhDHHWk10ee2K7pCT2iHtWacIRYvFiipXYVZV-PU1O4E4LmsNyRIhppudMH4rpv9CrOr0mNJO86jjrUZaFI0tw'); // Disbursement Subscription KeyKey


//echo USER_ID;

//Test here
//disburse();

//When called this function will request an Access Token
function get_accesstoken(){

    $credentials = base64_encode(USER_ID.':'.API_KEY);

    $ch = curl_init("https://sandbox.momodeveloper.mtn.com/disbursement/token/");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Authorization: Basic '.$credentials,
            'Ocp-Apim-Subscription-Key: '.DISBURSEMENT_SUBSCRIPTION_KEY
        )
    );

    $response = curl_exec($ch);
    $response = json_decode($response);

    //$access_token = $response->access_token;
    $access_token= ACCESS_TOKEN;
    // The above $access_token expires after an hour, find a way to cache it to minimize requests to the server
    if(!ACCESS_TOKEN){
        throw new Exception("Invalid access token generated");
        return FALSE;
    }
    return $access_token;

  }

  get_accesstoken();
























  // request paiement pour clients
  function disbursement(){

    $access_token = ACCESS_TOKEN;
    $endpoint_url = 'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/transfer';

    # Parameters
    $data = array(
          "amount" => ".$montant.",
          "currency" => "EUR", //comme on est en sandbox je le garde
          "externalId" => "1456", //id de paiement

          "payee" => array(

              "partyIdType" => "MSISDN",
              "partyId"     => ".$client."  //le num client
          ),

          "payerMessage"=> "Fonds Transférés",
          "payeeNote"=> "Nous avons transféré les fonds"


        );

    $data_string = json_encode($data);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    //curl_setopt($curl, CURLOPT_TIMEOUT, 50);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',  //optional
            'Authorization: Bearer '.$access_token, //optional
            'X-Callback-Url: https://mastermomo.cg ',
            'X-Reference-Id: '.USER_ID,
            'X-Target-Environment: sandbox',
            'Ocp-Apim-Subscription-Key: '.DISBURSEMENT_SUBSCRIPTION_KEY,

        )
    );

    if(curl_setopt($curl, CURLOPT_RETURNTRANSFER, true)){
      echo"Bien";
    }else{
      echo"non";
    }

    $curl_response = curl_exec($curl);
    if($curl_response){
      echo"cool";
    }else{
      echo"not";
    }
    //$curl_response
     //will respond with HTTP 202 Accepted
    // close curl resource to free up system resources
    curl_close($curl);
}
disbursement();

}