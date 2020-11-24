<?php

session_start();

require 'App/Autoloader.php';
include 'App/form.php';
App\Autoloader::register();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Les sables du temps</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="container-fluid">
<?php if (isset($_SESSION['login'])) { //connecté
  $dbh = new App\Database('projetm3206');
  $sth = $dbh->prepare('SELECT * FROM events WHERE user = ?',$_SESSION['login'],'App/database');
  $count=0;
  ?>
  
  <div class="row">
    <div class="col-6 d-none d-lg-inline image">
      <img src="img/plage.jpg" class="img-fluid"> 
    </div>
    <div class="col-sm-12 col-lg-6 fond  ">
      <nav class="nav justify-content-center" >
        <a class="active" href="">Accueil</a> | 
        <a  href="signup.php">Ajouter un événement</a> |
        <a  href="logout.php">Se déconnecter</a>
      </nav>
      <div class="row">
        <div class="col-6">
          <h2>Quelques événements:</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <?php foreach ($sth as $data) {
            echo 'événement: ' .$data['title'];
            echo "<br>";
            if ($count ===2) {
              break;
              $count=0;
            }
          } ?>
        </div>
        <div class="col-6">
          <?php foreach ($sth as $data) {
            echo 'description : ' .substr($data['title'], 0,20);
            echo "<br>";
            if ($count ===2) {
              echo 'Si vous voulez voir tout vos autres événements, cliquez <a href"all.php">ici</a>';
              break;
              $count=0;
            }
          } ?>
        </div>
      </div>
    </div>
  </div>


  <?php }else{ ?> <!-- Pas connecté -->

  <div class="row">
    <div class="col-6 d-none d-lg-inline image">
      <img src="img/plage.jpg" class="img-fluid"> 
    </div>
    <div class="col-sm-12 col-lg-6 fond  ">
      <div class="row">
        <div class="col">
          <nav class="nav justify-content-center" >
            <a class="active" href="">Accueil</a> | 
            <a  href="login.php">se connecter</a> |
            <a  href="signup.php">s'inscrire</a>
          </nav>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8 titre top-buffer">
          <p style="line-height: 90%;">Les sables du temps</p>
        </div>
      </div>
    </div>

  </div>

<?php } ?>





</div> <!-- container -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>