<?php 
   //connexion au serveur localhost
   $conn = mysqli_connect("localhost","root","","blog",);
   mysqli_query( $conn, "SET NAMES UTF8" );

   //Erreur connexion au serveur
   if($conn===false)
   {
        die("Erreur: Non connecter au serveur .".
            mysqli_connect_error());
   }

   ?>

