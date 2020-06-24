<?php 
require 'functions.php';
$lists = getAllLists();
$allItems = getAllItems();
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
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#listModal"><i class="fa fa-list" aria-hidden="true"></i> - Insert list</button>
					<?php if (!empty($lists)) { ?>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#taskModal"><i class="fa fa-plus" aria-hidden="true"></i> - Insert task</button>
					<?php } ?>

					<div class="row">
						<?php 
						$counter = 0;
						foreach ($lists as $list) {
							if ($counter%3 == 0 && $counter != 0) {
								echo "</div><div class='row'>";
							} ?>
							<div class="col-md-4">
								<div class="text-center">
									<h3 class="d-inline"><?=$list['name']?></h3> - <a href="crud/edit_list.php?list_id=<?=$list['id']?>" class="btn btn-success d-inline"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="crud/delete_list.php?list_id=<?=$list['id']?>" class="btn btn-danger d-inline"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<br><br>
								</div>
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
																<a href="crud/edit.php?user_id=<?=$item['id']?>" class="btn btn-warning">Edit</a>
															</li>
															<li class="list-inline-item">
																<a href="crud/delete.php?user_id=<?=$item['id']?>" class="btn btn-danger">Remove</a>
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

	<section class="mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table id="table_id" class="display">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Description</th>
								<th>User</th>
								<th>Time</th>
								<th>List ID</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if (!empty($allItems)) {
									foreach ($allItems as $item) { ?>
										<tr id="<?=$item['id']?>">
											<td><?=$item['id']?></td>
											<td><?=$item['title']?></td>
											<td><?=$item['description']?></td>
											<td><?=$item['user']?></td>
											<td><?=$item['duur']?> min.</td>
											<td><?=$item['list']?></td>
										</tr>
									<?php }
								}
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new ToDo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="action.php?action=insertTask">
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


	<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new list</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="action.php?action=insertList">
					<div class="modal-body">
						<div class="container">
							<div class="form-group">
								<label for="exampleFormControlInput1">Naam:</label>
								<input type="text" class="form-control" placeholder="Naam van de lijst..." name="name">
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