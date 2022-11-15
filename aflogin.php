<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="accueil.css" />
    <script src="../js.js"></script>
  </head>

    <body>

      <div class="wrapper">
         <header>
            <nav>

              <div class="succes">
                    Hey <?php echo $_SESSION['username']; ?>
              </div>

               <div class="menu">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="apropos.php">About</a></li>
                     <li><a href="extras.php">Extras</a></li>
                     <li><a href="contact.php">Contact</a></li>
                     <li><a href="logout.php">Déconnexion</a></li>
                  </ul>
               </div>
            </nav>
         </header>
         
      </div>



    </body>

</html>