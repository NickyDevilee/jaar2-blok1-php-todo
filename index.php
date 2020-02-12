<?php 
require 'functions.php';
$lists = getAllLists();
//$items = getAllItems();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<?php include 'elements/header.php'; ?>

	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">All items sorted by list</h1>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Insert task</button>

					<div class="row">
						<?php foreach ($lists as $list) {
							if ($counter%3 == 0 && $counter != 0) {
							 	echo "</div><div class='row'>";
							 } ?>
							<div class="col-md-4">
								<h3 class="text-center"><?=$list['name']?></h3><br>
								<ul class="list-group">
									<?php 
									$items = getItemsFromListID($list['id']);
									if (!empty($items)) {
										foreach ($items as $item) { ?>
											<li class="list-group-item">
												<div class="card">
													<div class="card-body">
														<h5 class="card-title"><?=$item['title']?> - <span class="badge badge-secondary"><?=$list['name']?></span></h5>
														<p class="card-text"><?=$item['description']?></p>
														<p class="small">Geplaatst door: <a href="user.php?user=<?=$item['user']?>"><?=$item['user']?></a></p>
														<p>Tijd nodig: <?=$item['duur']?> minuten.</p>
													</div>
													<hr>
													<div class="card-body">
														<ul class="list-inline text-center">
															<li class="list-inline-item">
																<a href="edit.php?user_id=<?=$item['id']?>" class="btn btn-warning">Edit</a>
															</li>
															<li class="list-inline-item">
																<a href="delete.php?user_id=<?=$item['id']?>" class="btn btn-danger">Remove</a>
															</li>
														</ul>
													</div>
												</div>
											</li>
										<?php } ?>
									<?php } else {
										echo "<h5 class='text-center'>No items found</h5>";
									} ?>
								</ul>
							</div>
						<?php $counter++; } ?>		
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new ToDo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="insert.php?action=insert_task">
					<div class="modal-body">
						<div class="container">
							<div class="form-group">
								<label for="exampleFormControlInput1">Titel:</label>
								<input type="text" class="form-control" placeholder="Titel van het item..." name="title">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Beschrijving:</label>
								<textarea class="form-control" rows="3" placeholder="Beschrijving van het item..." name="description"></textarea>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Toegevoegd door:</label>
								<input type="text" class="form-control" name="user">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Tijd nodig (in minuten):</label>
								<input type="text" class="form-control" name="duration">
							</div>
							<div class="form-group">
								<label for="inputStatus">List</label>
								<select id="inputStatus" class="form-control" name="list">
									<?php foreach ($lists as $list) { ?>
										<option value="<?=$list['id']?>"><?=$list['name']?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
						<button type="submit" class="btn btn-success">Opslaan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
<?php include 'elements/footer.php'; ?>
</html>