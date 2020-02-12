<?php 
require '../functions.php';
$id = $_GET['list_id'];
$data = getListsFromID($id);

$function = $_GET['action'];

if (function_exists($function)) {
	$function($_POST['id']);
	//echo "joejoe";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<?php include '../elements/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="delete_list.php?action=delete_list">
					<div class="container">
						<div class="form-group">
							<label for="exampleFormControlInput1">Name:</label>
							<input type="text" class="form-control" name="title" value="<?=$data['name']?>" readonly="true">
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">ID:</label>
							<input type="text" class="form-control" name="id" readonly="true" value="<?=$data['id']?>">
						</div>
					</div>
					<button type="submit" class="btn btn-danger">Verwijderen</button>
				</form>
			</div>
		</div>
	</div>
</body>
<?php include '../elements/footer.php'; ?>
</html>