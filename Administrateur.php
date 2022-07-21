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
		<h2>Publier vos articles&nbsp;&nbsp;<a href="MesPublications.php"><button class="btn btn-info">Afficher</button></a></h2>
		<?php
		if(isset($_SESSION['status']) && $_SESSION != '')
		{
			?>
			
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
  				<strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
				</button>
			</div>

			<?php
			unset($_SESSION['status']);
		}
		?>
		

		<div class="row">
		<div class="col-8 col-12-small">
	<form action="postAction.php" method="post" enctype="multipart/form-data">
			<div class="row gtr-uniform gtr-50">
				<div class="col-6 col-12-xsmall"><input type="text" name="title" id="name" required placeholder="Titre" /></div>
				<div class="col-12"><textarea name="description" required id="message" placeholder="Description" rows="4"></textarea></div>
				<div class="col-6 col-12-xsmall"><input type="file" name="file"  required placeholder="Image" /></div>
			</div>
		</div>	
        <br>
			<ul class="actions">
				<li><input type="submit" name="submit" value="Send" /></li>
			</ul>	
	</form>		
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