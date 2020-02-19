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

	

</body>
<?php include '../elements/footer.php'; ?>
</html>