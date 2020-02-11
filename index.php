<?php 
require 'functions.php';
$result = getAllItems();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<?php include 'elements/header.php'; ?>
</head>
<body>
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>PHP-ToDo</h1>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Insert task</button>
					<div class="row">
						<?php 
						$counter = 0;
						foreach ($result as $row) {
							$badge = '';
							if ($counter%4==0 && $counter!=0) {
							 	echo '</div><div class="row">';
							}
							if ($row['status'] == 0) {
							 	$badge = '<span class="badge badge-secondary">Bezig</span>';
							} elseif ($row['status'] == 1) {
							 	$badge = '<span class="badge badge-success">Voltooid</span>';
							} ?>
							<div class="card col-6 col-md-3 mt-2">
								<div class="card-body">
									<h5 class="card-title"><?=$row['title']?> - <?=$badge?></h5>
									<p class="card-text"><?=$row['description']?></p>
									<p class="small">Geplaatst door: <a href="user.php?user=<?=$row['user']?>"><?=$row['user']?></a></p>
								</div>
								<hr>
								<div class="card-body">
									<ul class="list-inline text-center">
										<li class="list-inline-item">
											<a href="edit.php?user_id=<?=$row['id']?>" class="btn btn-warning">Edit</a>
										</li>
										<li class="list-inline-item">
											<a href="delete.php?user_id=<?=$row['id']?>" class="btn btn-danger">Remove</a>
										</li>
									</ul>
								</div>
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
							<input type="text" name="status" hidden="true" value="0">
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