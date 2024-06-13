<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?> | <?=APP_NAME?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?v1">
</head>
<body>

	<header class="class_1" >
		<div class="class_2" >
			<img src="assets/images/musik.jpg" class="class_3" >
		</div>
		<div  class="item_class_0 class_4">
			<div  class="item_class_1 class_5">
				<svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
					<path d="m22 16.75c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75z" fill-rule="nonzero" >
					</path>
				</svg>
			</div>
			<div  class="item_class_2 class_6">
				<a href="index.php" class="class_7"  >
					Home
				</a>
				<a href="latest.php" class="class_7"  >
					Latest
				</a>
				<a href="popular.php" class="class_7"  >
					Popular
				</a>
				<a href="top-20.php" class="class_7"  >
					Top 
				</a>
				<a href="artists.php" class="class_7"  >
					Artists
				</a>
				<?php if(is_admin()):?>
					<a href="admin.php" class="class_7"  >
						Admin
					</a>
				<?php endif;?>
				<?php if(is_logged_in()):?>
					<a href="upload.php" class="class_7"  >
						Upload
					</a>
					<a href="profile.php" class="class_7"  >
						Profile
					</a>
				<?php endif;?>
				
			</div>
		</div>
		<div class="class_8"  >
			<?php if(is_logged_in()):?>
				<img src="<?=get_image(user('image'))?>" class="class_9" >
				<div>Hi, <?=user('username')?><a style="width:100%;display: block;" href="logout.php">[Logout]</a></div>
			<?php else:?>
				<a href="login.php">Login</a>
			<?php endif;?>
		</div>
	</header>
	<form method="get" action="search.php" class="class_10" >
		<label class="class_11"  >
			Search
		</label>
		<input value="<?=$_GET['q'] ?? ''?>" placeholder="" type="text" name="q" class="class_12" >
	</form>