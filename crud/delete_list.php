<?php 
require '../functions.php';
$id = $_GET['list_id'];
$data = getListsFromID($id);

$items_in_list = getItemsFromListID($id);

if (isset($_GET['action'])) {
	$function = $_GET['action'];

	if (function_exists($function)) {
		$function($_POST['id']);
	}
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
						<div class="row">
							<div class="col-md-12">
								<h5>Items in list <u><?=$data['name']?></u>:</h5>
								<?php if (!empty($items_in_list)) { ?>
									<ul class="list-group">
										<?php foreach ($items_in_list as $item) { ?>
											<li class="list-group-item"><?=$item['title']?></li>
										<?php } ?>
									</ul>
									<br>
								<?php } else { ?>
									<u><h5 class="text-center">No items in this list</h5></u>
									<br>
								<?php } ?>
							</div>
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