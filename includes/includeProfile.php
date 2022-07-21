<?php 
require('./actions/poste/profileAction.php');
require('./actions/poste/postFonction.php') ?>
<section id="three">
		<h2>Edite profil...</h2>
		<h5><?php echo $valid;?></h5>
		<div class="row">
		<div class="col-8 col-12-small">
			<form  method="post" enctype="multipart/form-data">

		<div class="row gtr-uniform gtr-50">
            <?php inputFields("Nom-Prenom","title","","text") ?> 
            <?php textarea("Actu...","description","") ?>
            <?php inputFields("","File","","file") ?> 
		</div>	
        <br>
				<ul class="actions">
					<li><input type="submit" name="submit" value="Ajouter profil" /></li>
				</ul>	
	</section>
            </form>