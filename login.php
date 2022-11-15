<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="login.css" />
      <link rel="stylesheet" href="header.css" />

    </head>
<body>

<div class="wrapper">
         <header>
            <nav>
               <div class="menu">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="apropos.php">About</a></li>
                     <li><a href="extras.php">Extras</a></li>
                     <li><a href="contact.php">Contact</a></li>
                     <li><a href="login.php">Connexion</a></li>
                  </ul>
               </div>
            </nav>
         </header>
         
      </div>


<?php
require('config.php');
session_start();

if (isset($_POST['username']))
{
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: aflogin.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password']))
{
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>

  <div class="main">    
    <input type="checkbox" id="chk" aria-hidden="true">

      <div class="signup">
        <form action="" method="post" name="login">
          <label for="chk" aria-hidden="true">Connexion</label>
          <input type="text" name="username" placeholder="Nom d'utilisateur" required>
          <input type="password" name="password" placeholder="Mot de passe" required>
          <input class="conn" type="submit" name="Créer" value="Connexion" class="box-button">
        </form>
      </div>

      <div class="login">
        <form >
          <label for="chk" id="conn" aria-hidden="true">S'inscrire</label>
          <input type="text" name="username" placeholder="Nom d'utilisateur">
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Mot de passe">
          <input class="conn" type="submit" value="S'inscrire " name="submit">
          <!-- <?php if (! empty($message)) { ?>
          <p class="errorMessage"><?php echo $message; ?></p>
          <?php } ?> -->
        </form>
<?php } ?>
      </div>
  </div>
</body>
</html>




</body>
</html>