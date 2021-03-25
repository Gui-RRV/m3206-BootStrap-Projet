<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Les Sables Du Temps - se connecter</title>
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
                <div class="col">
                    <nav class="nav navigation justify-content-center" >
                         <a class="nav-item mr-2" href="index.php">Accueil</a> | 
                         <a class="nav-item active mr-2 ml-2" href="login.php">se connecter</a> |
                         <a class="nav-item ml-2" href="signup.php">s'inscrire</a>
                    </nav>
                </div>
          </div>

      <div class="row justify-content-center"> 
        <div class=" col-8 col-md-7 col-lg-4 form">
            <div class="row justify-content-center">
                <div class="col-6 connexion"><p> Connexion </p></div> 
            </div>
          
        
              <form class="row justify-content-center" method="post" action="login-validation.php"  >
                
                  <div class="col-12 col-md-6 text-center">

                    <label for="username">Pseudo :</label>

                        <div class="rentrer2">
                    <input class ="InputStyle" id="username"type="text" name="login" maxlength="10" required>
                        </div>
                  </div>
                


                
                  <div class="col-12 col-md-6  text-center">

                    <label for="password">Mot de passe :</label>

                         <div class="rentrer2">
                    <input class ="InputStyle"id="password" type="password" name="password" maxlength="10" required>  
                         </div>    
                  </div>
               <div class="col-12 col-md-6 mr-md-3">
                <div class="row justify-content-center">
                  <div class="col-6 col-md-12 ml-2 ml-lg-0 mt-3">
                          <div class="conexbouton">
                    <input class="InputStyleSub"id="submit" type="submit" value="Connexion">
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