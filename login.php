<?php 
session_start();
if(isset($_POST['validate'])){
    //vérifier si l'utilisateur a bien complété tous les champs
    if(!empty($_POST['pseudo'])  && !empty($_POST['password'])){
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin1234";

    //vérifier si le champ saisi correspond bien a ceux de par defaut
        $pseudo_saisi =  htmlspecialchars($_POST["pseudo"]); 
        $mdp_saisi = htmlspecialchars($_POST["password"]);

        if($pseudo_saisi == $pseudo_par_defaut && $mdp_saisi == $mdp_par_defaut){
            $_SESSION['auth'] = true;
            $_SESSION["password"] = $mdp_saisi;
            header("Location:Administrateur.php");
        }else{
            echo"Votre mot de passe ou pseudo est incorrect...";
        }
    }else{
        echo "Veuillez compléter tous les champs...";
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <title>Espace de connexion admin</title>
</head>
<body>
    <form class="container" method="POST" action="" align="center">
    <h1>Se connecter en tant qu'administrateur</h1>
    <div class="social-media">
      <p><i class="fab fa-google"></i></p>
      <p><i class="fab fa-youtube"></i></p>
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
    </div>
    <p class="choose-email">ou utiliser mon pseudo:</p>
    <div class="inputs">
        <input type="text" name="pseudo" placeholder="pseudo" />
        <input type="password" name="password" placeholder="Mot de passe">
    </div>
    <div align="center">
        <button type="submit" name="validate">Se connecter</button>
    </div>
    </form>

</body>
</html>
