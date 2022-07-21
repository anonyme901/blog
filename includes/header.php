<?php require('./config/database.php'); ?>
<header id="header">
				<div class="inner">
					<?php $query = mysqli_query($conn,"SELECT*FROM user ORDER BY id DESC");
					($row = mysqli_fetch_array($query, MYSQLI_ASSOC ))
					?>

					<a href="images/<?php echo $row["image"] ?>" class="image avatar"><img src="images/<?php echo $row["image"] ?>" alt="" /></a>
					<h1><strong><?php echo $row["nom_prenom"] ?></strong><br />
					<?php echo $row["description"] ?> .<br />
					<a href="index.php">HOME</a></h1>
					.</h1>
				</div>
		</header>