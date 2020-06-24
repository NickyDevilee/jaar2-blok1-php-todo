<?php 
require '../functions.php';
$id = $_GET['list_id'];
$data = getListsFromID($id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<?php include '../elements/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="../action.php?action=updateList">
					<div class="container">
						<div class="form-group">
							<label for="exampleFormControlInput1">Titel:</label>
							<input type="text" class="form-control" name="name" value="<?=$data['name']?>">
							<input type="text" class="form-control" name="id" value="<?=$data['id']?>" hidden="true">
						</div>
					</div>
					<button type="submit" class="btn btn-success">Bewerken</button>
				</form>
			</div>
		</div>
	</div>
</body>
<?php include '../elements/footer.php'; ?>
</html>