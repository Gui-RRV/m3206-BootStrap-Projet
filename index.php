<?php
$txt_tab= array('"Très peu de gens vivent dans le présent. Ils habitent le passé, le futur, ou les deux. Les coups, ils les reçoivent deux fois; Les joies, ils les émoussent à l\'avance. ils vivent dans la crainte de malheurs que cette prévoyance démesure, dans l\'attente de bonheurs que la distance épuise."','"L\'ambition, l\'avarice, la tyrannie, la fausse prévoyance des pères, leur négligence, leur dure insensibilité, sont cent fois plus funestes aux enfants que l\'aveugle tendresse des mères."','"La vraie question, c\'est celle-ci : le travail ne peut être une loi sans être un droit. Nous n\'insistons pas, ce n\'est point ici le lieu. Si la nature s\'appelle providence, la société doit s\'appeler prévoyance."','"Sans la clairvoyance du sage, impossible de rien connaître du monde. Sans l\'obscurcissement du fou, impossible de tout connaître du monde."','"La haine est d\'ordinaire plus clairvoyante que l\'amitié; et l\'envie, toujours plus constante que l\'amour."','"Si tu téléphones à une voyante et qu\'elle ne décroche pas avant que ça sonne, raccroche."','- Allô, je suis bien chez madame Dupond la voyante ?
<br>- Oui, qui êtes-vous ?
<br>- Oh, ça commence très mal','Un jour une voyante a dit " si tu es triste chante, tu verras, ta voix est pire que ton problème"','"Si on regarde attentivement votre ascendant à la lumière de saturne, on ne voit rien parce que Saturne n\'est pas une lampe"','"Votre avenir me semble incertain... rien à voir avec les cartes, je suis sur votre profil parcoursup."
');

$rand_img=random_int(0,9);
$rand_txt=random_int(0,9);
session_start();

require 'App/Autoloader.php';
App\Autoloader::register();
$count=0;

$BadgeCount=0;
$fill=NULL;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Les sables du temps</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="container-fluid accueil">
<?php if (isset($_SESSION['login'])) { //connecté
  $dbh = new App\Database('projetm3206');
  $sth = $dbh->prepare('SELECT * FROM events WHERE user = :user',array('user' => $_SESSION['login']),'App/database');
  ?>
  
  <div class="row imagefond">
    <div class="col-12 ">
      <nav>
      <div class="row">
        <div class="col-2"> 
          <div class="decovs">
            <a class="nav-item active" href="index.php"> <b> Évènements </b> </a> 
          </div>
        </div>

        <div class="col-2 offset-6 offset-md-8">
          <div class="deco">
            <a class="nav-item" href="logout.php"> <b> Déconnexion </b> </a>
          </div>
        </div>

      </div>

      <div class="nav navigation justify-content-center" >
        | 
        <a  class="mr-2 ml-2 nav-item"href="evenement.php">Calculer le temps</a> |
        
      </div>
    </nav>
      <div class="row justify-content-center">
        <div class="col-12 col-lg-8 event_list wrap">
          <div class="row">
            <div class="col-12 mb-n3">
              <h2 class="centre">Mes événements</h2>
            </div>
          </div>
          <div class="row justify-content-center mb-4">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary card" data-toggle="modal" data-target="#exampleModal">
  Avenir à venir...
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Découvrez votre avenir (ou autre chose...)</h5>

      </div>
      <div class="modal-body">
       <div class="container-fluid">
         <div class="row">
           <div class="col-12 col-md-5">
             <img class="img-fluid" src="img/<?=$rand_txt?>.jpg" alt="Logo de Google">

           </div>
           <div class="col-12 col-md-5 offset-md-1">
             <?= $txt_tab[$rand_txt] ?>
           </div>
         </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">S'en aller (car c'était un peu nul)</button>

      </div>
    </div>
  </div>
</div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
              <div class="accordion" id="accordionExample">
                <?php foreach($sth as $data){

                  if (isset($_COOKIE['timer']) && $_COOKIE['timer'] == $data['slug']) {
                    $fill=' &nbsp;  &nbsp;  &nbsp;<h5 class="badge badge-secondary">Nouveau !</h5>';
                  }
                  echo '<div class="card">';

                  echo '<div class="card-header" id="heading'.$count.'">';
                  echo '<h2 class="mb-0">';
                  echo '<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#'.$data['slug'].'" aria-expanded="true" aria-controls="'.$data['slug'].'">'.$data['title'].$fill.'
                  </button>';
                  echo '</h2>';
                  echo '</div>';

                  echo '<div id="'.$data['slug'].'" class="collapse" aria-labelledby="heading'.$count.'" data-parent="#accordionExample">';
                  echo '<div class="row">';
                  echo '<div class="col-12 order-2 order-lg-1 col-lg-6">';
                  echo '<div class="card-body "><h4>Description</h4><br>'.$data['description'].' <div class="delete-buffer"><a id="delete" href="remove.php?id='.$data['id'].'">Me supprimer ? 😥</a></div></div>';
                  echo '</div>';
                  echo '<div class="col-12 order-1 order-lg-2 col-lg-6">';
                  echo'<div class="row">' ;
                  echo '<div class="col-lg-12 bordure">';
                  echo '<div class="card-body">Votre évenement date du '.$data['date'].'</div>';
                  echo '</div>';
                  echo '<div class="col-lg-12 bordure">';
                  echo '<div class="card-body">Il s\'est écoulé '.App\Time::elapsed_years($data['date']).' années depuis la création de cet évenement !</div>';
                  echo '</div>';
                  echo '<div class="col-12 col-md-6 col-lg-12 bordure">';
                  echo '<div class="card-body">Il s\'est écoulé '.App\Time::elapsed_months($data['date']).' mois depuis la création de cet évenement !</div>';
                  echo '</div>';
                  echo '<div class="col-12 col-md-6 col-lg-12 bordure">';
                  echo '<div class="card-body">Il s\'est écoulé '.App\Time::elapsed_days($data['date']).' jours depuis la création de cet évenement !</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  $count++;
                  $BadgeCount++;
                  $fill=NULL;
                } ?>
              </div>

            </div>
          </div>
        </div>
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
        <nav class="nav navigation justify-content-center" >
          <a class="nav-item mr-2 active" href="">Accueil</a> | 
          <a  class="nav-item mr-2 ml-2" href="login.php">se connecter</a> |
          <a  class="nav-item ml-2" href="signup.php">s'inscrire</a>
        </nav>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-7 col-md-10 col-lg-8  titre top-buffer">  
        <p class="Para_Titre" >Les sables du temps</p>
      </div>
    </div>
    <div class="row justify-content-start">
      <div class="col-8 texte">
        <div>Prenez conscience du temps passé</div>
      </div>
    </div>

    <div class="row justify-content-start">
      <div class="col-4 barre">
        <div></div>
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