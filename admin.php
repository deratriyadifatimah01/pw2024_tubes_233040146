<?php

	require 'init.php';
	$title = "Admin";

	if(!is_admin())
	{
		redirect('login');
	}

	$section = $_GET['section'] ?? "dashboard";
	$page_to_load = 'includes/'.strtolower($section).'.php';

	define("ADMIN", true);
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Music website Admin page</title>
	<link rel="stylesheet" type="text/css" href="assets_admin/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets_admin/css/styles.css">
</head>
<body>

	
	<div class="class_1" >
		<div class="class_2" >
			<div class="class_3" >
				<img src="<?=get_image(user('image'))?>" class="class_4" >
				<h1 class="class_5"  >
					<?=user('first_name')?> <?=user('last_name')?> 
				</h1>
			</div>
			<a href="admin.php" class="class_6"  >
				<div class="class_7" >
					<div class="class_8" >
						Dashboard
					</div>
					<div class="class_9" >
						<i  class="bi bi-list class_10">
						</i>
					</div>
				</div>
			</a>
			<a href="admin.php?section=users" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Users
					</div>
					<div class="class_9" >
						<i  class="bi bi-people class_10">
						</i>
					</div>
				</div>
			</a>
			<a href="admin.php?section=songs" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Songs
					</div>
					<div class="class_9" >
						<i  class="bi bi-vinyl-fill class_10">
						</i>
					</div>
				</div>
			</a>
			<a href="index.php" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Front End
					</div>
					<div class="class_9" >
						<i  class="bi bi-globe-europe-africa class_10">
						</i>
					</div>
				</div>
			</a>
			<a href="logout.php" class="class_6"  >
				<div class="class_7" >
					<div class="class_11" >
						Logout
					</div>
					<div class="class_9" >
						<i  class="bi bi-box-arrow-right class_10">
						</i>
					</div>
				</div>
			</a>
		</div>
		<div class="class_12" >
			<h2 class="class_13"  >
				<?=ucwords($section)?>
			</h2>

			<!-- begin page content-->
			<?php
				if(file_exists($page_to_load))
				{
					require $page_to_load;
				}else{
					echo "Page not found";
				}

			?>
			<!-- end page content-->
		</div>
	</div>
	
</body>
</html>