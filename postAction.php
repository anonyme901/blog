<?php 
     session_start();
   $conn = mysqli_connect("localhost","root","","blog",);
   //Bouton Ajouter
   if(isset($_POST['submit']))
   {
        //variable
        $title = htmlspecialchars($_POST['title']);
        $description = nl2br(htmlspecialchars($_POST['description']));

        //ajout image
        $image = $_FILES['file']['name'];

        $allowed_exttension = array('gif','png','jpg','jpeg');
        $filename =$_FILES['file']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($file_extension,$allowed_exttension))
        {
          $_SESSION['status'] = "You are allowed with only jpg, png, jpeg and gif ";
          header('Location: Administrateur.php');
        }
        else
        {


        if(file_exists("images/thumbs/" . $_FILES['file']['name']))
        {
          $filename = $_FILES['file']['name'];
          $_SESSION['status'] = "Image already Exists".$filename;
          header('Location: Administrateur.php');
        }
        else
        {

          $query = "INSERT INTO posts(titre, description, image) VALUES('$title', '$description', '$image')";
          $query_run = mysqli_query($conn, $query);
  
          //requette ajout query execute
          if($query_run)
          {
              //echo "Image Ajouter avec success"
              move_uploaded_file($_FILES['file']['tmp_name'],"images/thumbs/".$_FILES['file']['name']);
              $_SESSION['status']= "Image Stored Successfully";
              header('Location: Administrateur.php');
          }else
          {
            $_SESSION['status']= "Image Not Inserted.!";
            header('Location:  Administrateur.php');
          }
         

        }
     }   
       
   }


   if(isset($_POST['update_submit']))
   {
     $id = $_POST['id'];
     $title = htmlspecialchars($_POST['title']);
     $description = nl2br(htmlspecialchars($_POST['description']));

     $new_image = $_FILES['file']['name'];
     $old_image = $_POST['file_old'];

     if($new_image !='')
     {
          $update_filename = $_FILES['file']['name'];
     }
     else
     {
          $update_filename = $old_image;
     }

     if($_FILES['file']['name'] !='')
        {
          if(file_exists("images/thumbs/" . $_FILES['file']['name']))
          {
               $filename = $_FILES['file']['name'];
               $_SESSION['status'] = "Image already Exists".$filename;
               header('Location: Administrateur.php');
          }
        else
        {
          //updating
          $query = "UPDATE posts SET titre='$title', description='$description', image='$update_filename' WHERE id='$id'";
          $query_run = mysqli_query($conn, $query);

          if($query_run)
          {
               if($_FILES['file']['name'] !='')
               {
                    move_uploaded_file($_FILES['file']['tmp_name'],"images/thumbs/".$_FILES['file']['name']);
                    unlink("images/thumbs/".$old_image);
               }
              $_SESSION['status'] = "Image Updated Successfully";
              header("Location: MesPublications.php");
          }
          else
          {
               $_SESSION['status'] = " Image NOT Updated!";
              header("Location: MesPublications.php");
          }
        }
     
   }
}
   









   if(isset($_POST['delete_image']))
   {
        $id = $_POST['delete_id'];
        $image = $_POST['del_image'];
        
        $query = "DELETE FROM posts WHERE id= '$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            unlink("images/thumbs/".$image);
            $_SESSION['status'] = "Data or Deleted successfully.";
            header("Location: MesPublications.php");
        }
        else
        {
          $_SESSION['status'] = " Data not Deleted!";
          header("Location: MesPublications.php");
        }
   }
   ?>