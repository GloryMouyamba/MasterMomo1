<?php
session_start();
?>
<!Doctype html>
<html>
  <head>
    <title>Connexion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
  </head>
  <body style="background-color:rgb(37,96,153);"></br></br>
    <center>
      <h2 style="color:rgb(250,198,27);">Master<i style="color:white">Momo</i></h2>
    </center>

    <center>
    </br></br>
    <div class="container" style="border:1px solid black;width:80%;background-color:white;border-radius:30px;border:none;">
      <form action="../blob_insco.php" method="post">
      <h3 style="color:rgb(37,96,153);font-weight:bold;">SE CONNECTER</h3></br>
        <div>

          <input style="width:80%;Border-radius:30px;background-color:rgb(244,244,244);border:none;" type="text" class="form-control" name="phone" placeholder="Telephone" required>
          </br>
          <input style="width:80%;Border-radius:30px;background-color:rgb(244,244,244);border:none;" type="password" class="form-control" name="pass" placeholder="Mot de passe" id="exampleInputEmail1" required>
          </br>
          <p><i><a href="#">Mot de passe oublié?</a></i></p>
        </div>
        </br>
        <button type="submit" name="connexion" class="btn" style="border-radius:30px;background-color:rgb(187,210,96);color:white;width:80%;font-weight:bold;">CONNEXION</button>
        </br>
        </br>
      </form>
    </div>
  </center></br></br>


  </body>
</html>
