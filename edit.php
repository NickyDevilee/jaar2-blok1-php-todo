<?php 
require 'functions.php';
$id = $_GET['user_id'];
$data = getItemsFromID($id);

$function = $_GET['action'];
$form_data = $_POST;

if (function_exists($function)) {
	$function($form_data);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<?php include 'elements/header.php'; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="edit.php?action=update_task">
					<div class="container">
						<div class="form-group">
							<label for="exampleFormControlInput1">Titel:</label>
							<input type="text" class="form-control" placeholder="Titel van het item..." name="title" value="<?=$data['title']?>">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Beschrijving:</label>
							<textarea class="form-control" rows="3" placeholder="Beschrijving van het item..." name="description"><?=$data['description']?></textarea>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Toegevoegd door:</label>
							<input type="text" class="form-control" name="user" value="<?=$data['user']?>" readonly="true">
						</div>
						<div class="form-group">
							<label for="inputStatus">Status</label>
							<select id="inputStatus" class="form-control" name="status">
								<option value="0" <?=($data['status'] == 0 ? 'selected' : '')?>>Bezig</option>
								<option value="1" <?=($data['status'] == 1 ? 'selected' : '')?>>Voltooid</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">ID:</label>
							<input type="text" class="form-control" name="id" readonly="true" value="<?=$data['id']?>">
						</div>
					</div>
					<button type="submit" class="btn btn-success">Bewerken</button>
				</form>
			</div>
		</div>
	</div>
</body>
<?php include 'elements/footer.php'; ?>
</html>