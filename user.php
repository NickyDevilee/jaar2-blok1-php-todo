<?php 
require 'functions.php';
$lists = getAllLists();
//$items = getAllItems();
$user = $_GET['user'];
//$result = getItemsFromUser($user);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Items per user</title>
	<?php include 'elements/header.php'; ?>

	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">All items per user sorted by list</h1>

					<div class="row">
						<?php foreach ($lists as $list) { ?>
							<div class="col-md-4">
								<h3 class="text-center"><?=$list['name']?></h3><br>
								<ul class="list-group">
									<?php 
									$items = getItemsFromUser($user, $list['id']);
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
						<?php } ?>		
					</div>
				</div>
				
			</div>
		</div>
	</section>

</body>
<?php include 'elements/footer.php'; ?>
</html>