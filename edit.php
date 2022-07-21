<!DOCTYPE HTML>
<html>
<?php include('includes/head.php') ?>
	<body class="is-preload">

		<!-- Header -->
		<header id="header">
		<?php require('./config/database.php'); ?>
				<div class="inner">
					<?php $query = mysqli_query($conn,"SELECT*FROM user ORDER BY id DESC");
					($row = mysqli_fetch_array($query, MYSQLI_ASSOC ))
					?>

					<a href="images/<?php echo $row["image"] ?>" class="image avatar"><img src="images/<?php echo $row["image"] ?>" alt="" /></a>
					<a href="profile.php" class=""><i class="fa fa-pencil" style="font-size: 30px;"></i></a>
					<h1><strong><?php echo $row["nom_prenom"] ?></strong><br />
					<?php echo $row["description"] ?> .<br />
					<a href="index.php">HOME</a></h1>
					.</h1>
				</div>
		</header>

		<!-- Main -->
			<div id="main">
				<!-- One -->
				<!-- Two -->
                <?php 
					session_start();
				?>
	<section id="three">
		<h2>Editez votre Image&nbsp;&nbsp;<a href="MesPublications.php"><button class="btn btn-info">Afficher</button></a></h2>
		<?php
            $conn = mysqli_connect("localhost","root","","blog");

            $id = $_GET['id'];
            $query = "SELECT * FROM posts WHERE id='$id'";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {
    
                    ?>

                        
		<div class="row">
		<div class="col-8 col-12-small">
	    <form action="postAction.php" method="post" enctype="multipart/form-data">
			<div class="row gtr-uniform gtr-50">
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
				<div class="col-6 col-12-xsmall"><input type="text" name="title" value="<?php echo $row['titre'];?>" id="name" required  /></div>
				<div class="col-12"><textarea name="description"  id="message" required placeholder="" rows="4"><?php echo $row['description'];?></textarea></div>
				<div class="col-6 col-12-xsmall">
                    <input type="file" name="file"  />
                    <input type="hidden" name="file_old" value="<?php echo $row['image'];?>">
                </div>
                <img src="<?php echo "images/thumbs/".$row['image']; ?>" width="1000px">
			</div>
		</div>	
        <br>
        
        <br>
            
			<ul class="actions">
				<li><input type="submit" name="update_submit" value="UPDATE Data" /></li>
			</ul>	
	    </form>	

                    <?php
                }
            }
            else
            {
                echo "No record Available";
            }
        ?>
		
	</section>
				<!-- Three -->
				<!-- Four -->
			</div>
		<!-- Footer -->
		<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Chaoussi chérif</li><li>Space: <a href="deconnexion.php">Se déconnecter</a></li>
					</ul>
				</div>
			</footer>
		<!-- Scripts -->
		<?php include('includes/script.php') ?>
		
	</body>
</html>