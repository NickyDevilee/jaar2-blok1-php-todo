<?php 
require 'functions.php';
$user = $_GET['user'];
$result = getItemsFromUser($user);
var_dump($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<?php include 'elements/header.php'; ?>
</head>
<body>
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>User</h1>
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
</body>
<?php include 'elements/footer.php'; ?>
</html>