<?php require('./config/database.php'); ?>
<!DOCTYPE HTML>
<html>
<?php include('includes/head.php') ?>
	<body class="is-preload">


		<!-- Header -->
		<header id="header">
				<div class="inner">
					<?php $query = mysqli_query($conn,"SELECT*FROM user ORDER BY id DESC");
					($row =mysqli_fetch_array($query, MYSQLI_ASSOC ))
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
                <?php include('includes/includeProfile.php') ?>
				<!-- Three -->
				<!-- Four -->
				<ul class="actions">
					<li><a href="Administrateur.php" class="button">Revenir à la page précédente...</a></li>
				</ul>
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