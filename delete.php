<?php 
require 'functions.php';
$id = $_GET['user_id'];
$data = getItemsFromID($id);
$lists = getAllLists();

$function = $_GET['action'];

if (function_exists($function)) {
	$function($_POST['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<?php include 'elements/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="delete.php?action=delete_task">
					<div class="container">
						<div class="form-group">
							<label for="exampleFormControlInput1">Titel:</label>
							<input type="text" class="form-control" placeholder="Titel van het item..." name="title" value="<?=$data['title']?>" readonly="true">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Beschrijving:</label>
							<textarea class="form-control" rows="3" placeholder="Beschrijving van het item..." name="description" readonly="true"><?=$data['description']?></textarea>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Toegevoegd door:</label>
							<input type="text" class="form-control" name="user" value="<?=$data['user']?>" readonly="true">
						</div>
<div class="form-group">
	<label for="inputStatus">List</label>
	<select id="inputStatus" class="form-control" name="list" disabled="true">
		<?php foreach ($lists as $list) {
			$selected = '';
			if ($data['list'] == $list['id']) {
			 	$selected = 'selected';
			} ?>
			<option value="<?=$list['id']?>" <?=$selected?>><?=$list['name']?></option>
		<?php } ?>
	</select>
</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Tijd nodig (in minuten):</label>
							<input type="text" class="form-control" name="duration" value="<?=$data['duur']?>" readonly="true">
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
<?php include 'elements/footer.php'; ?>
</html>