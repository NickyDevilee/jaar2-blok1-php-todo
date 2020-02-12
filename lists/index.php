<?php 
require '../functions.php';
$lists = getAllLists();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<?php include '../elements/header.php'; ?>

	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">All lists</h1>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Insert list</button>

					<div class="row">
						<?php foreach ($lists as $list) { ?>
							<div class="col-md-4">
								<div class="card mt-2 text-center">
									<div class="card-body">
										<h5 class="card-title"><?=$list['name']?></h5>
										<a href="edit_list.php?list_id=<?=$list['id']?>" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a href="delete_list.php?list_id=<?=$list['id']?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</div>
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
				<form method="post" action="insert_list.php?action=insert_list">
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
<?php include '../elements/footer.php'; ?>
</html>