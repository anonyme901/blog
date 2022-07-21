
<?php 
   require("./config/database.php");
    $image ="";
    $valid="";
   //Bouton Ajouter
   if(isset($_POST['submit']))
   {
        //variable
        $title = htmlspecialchars($_POST['title']);
        $description = nl2br(htmlspecialchars($_POST['description']));

        //ajout image
        $image = $_FILES['File']['name'];
        $upload = "images/".$image;
        
       

        move_uploaded_file($_FILES['File']['tmp_name'],$upload);
       

        //requette ajout query execute
        $sql = "INSERT INTO user(nom_prenom, description, image) VALUES('$title', '$description', '$image')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Image Ajouter avec success"
            $valid= "<div class='alert alert-success'>
                <a href='#' class='close'data-dismiss='alert'
                 aria-label='close'>&times;</a><b>Profil 
                 Ajouter avec success.</b>
                 </div>";
        }else{
            $valid= "<div class='alert alert-danger'>
            <a href='#' class='close'data-dismiss='alert'
             aria-label='close'> &times;</a><b>Une erreur est survenu dans 
             l'ajout du profile !</b>
             </div>";
        }

   }
