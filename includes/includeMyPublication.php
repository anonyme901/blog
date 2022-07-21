<h2>Recent Work</h2>
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
<?php
$conn = mysqli_connect("localhost","root","","blog");

$query = "SELECT * FROM posts ORDER BY id DESC";
$query_run = mysqli_query($conn,$query);

 ?>

	<?php 
	if(mysqli_num_rows($query_run) > 0) //record is there or not
	{
		foreach($query_run as $row)
		{
			?>
			<tr>
			<article class="col-6 col-12-xsmall work-item">
				<a href="images/thumbs/<?php echo $row["image"] ?>" class="image fit thumb"><img src="images/thumbs/<?php echo $row["image"] ?>" alt="" /></a>
				<h3><?php echo $row["titre"] ?></h3>
				<p><?php echo $row["description"] ?></p>
				<br>
				<td>
		 		<a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-info">EDIT</a>
				 </td>
				 <td>
		 		<!--<a href="" class="btn btn-danger">DELETE</a>-->
				 <br><br>
				<form action="postAction.php" method="POST">
					<input type="hidden" name="delete_id" value="<?php echo $row["id"] ?>" >
					<input type="hidden" name="del_image" value="<?php echo $row["image"] ?>" >
					<button type="submit" name="delete_image" class="btn btn-danger">Delete</button>
				</form>
				</td>
				
			</article>
			</tr>
			<?php
		}
	
	}
	else
	{
		?>
			<tr>
				<td>No record Available</td>
			</tr>
		<?php
	}
	
	?>
	
</div>
