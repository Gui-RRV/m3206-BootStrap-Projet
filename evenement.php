<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Les Sables Du Temps - évènement</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/favicon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

  <div class="container-fluid login">

    <div class="row imagefond">
      <div class="col-12">

        <div class="row">
          <div class="col-2"> 
            <nav>
              <div class="decovs">
                <a class="nav-item" href="index.php"> <b> Évènements </b> </a> 
              </div>
            </div>

            <div class="col-2 offset-6 offset-md-8">
              <div class="deco">
                <a class="nav-item" href="logout.php"> <b> Déconnexion </b> </a>
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col">
              <div class="nav navigation justify-content-center" >

               |<a class="active nav-item mr-2 ml-2" href="evenement.php">Calculer le temps</a> |

             </div>
           </div>
         </div>
       </nav>


       <div class="row justify-content-center"> 
        <div class=" col-8 col-md-7 col-lg-4 form">
          <div class="row justify-content-center">
            <div class="col-6 connexion"><p> Créer un nouvel évènement </p></div> 
          </div>
          

          <form class="row justify-content-center" method="post" action="insert.php">

            <div class="col-12 col-md-6 text-center">

              <label for="username">Titre de l'évènement* :</label>

              <div class="rentrer2">
                <input class ="InputStyle" id="evenement"type="text" name="title" maxlength="50" required>
              </div>
            </div>




            <div class="col-12 col-md-6  text-center">

              <label for="password">Date*</label>

              <div class="rentrer2">
                <input class ="InputStyle"id="date" type="date" name="date" required>  
              </div>    
            </div>

            <div class="col-12 col-md-6  text-center">

              <label for="username">Description:</label>

              <div class="rentrer2">
                <input class ="InputStyle"id="username" type="text" maxlength="280" name="description">
              </div>    
            </div>





            <div class="col-12 col-md-6 mr-md-3">
              <div class="row justify-content-center">
                <div class="col-6 mr-md-4 mr-0 mr-lg-0 col-md-12 ml-2 ml-lg-4 mt-3">
                  <div class="conexbouton">
                    <input class="InputStyleSub"id="submit" type="submit" value="Valider">
                  </div>
                </div>
              </div>
            </div>
          </form>
          
        </div>
      </div>


    </div>
  </div>


  <div class="row">
    <div class="col-12 site-footer">



    </div>
  </div>


</div> <!-- container -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>