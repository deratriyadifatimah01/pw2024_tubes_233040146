<?php 

	defined("ADMIN") or die("Access denied");

	$query = "select count(*) as total from users where role = 'admin' ";
	$admins = query($query);
	$total_admins = $admins[0]['total'];

	$query = "select count(*) as total from users where role = 'user' ";
	$users = query($query);
	$total_users = $users[0]['total'];

	$query = "select count(*) as total from songs";
	$songs = query($query);
	$total_songs = $songs[0]['total'];

	$query = "select sum(views) as total from songs";
	$views = query($query);
	$total_views = $views[0]['total'];

	

?>

<div class="class_14" >
	<div class="class_15" >
		<i  class="bi bi-person-fill-gear class_16">
		</i>
		<h1 class="class_17"  >
			<?=$total_admins?>
		</h1>
		<h1 class="class_18"  >
			Admins
		</h1>
	</div>
	<div class="class_15" >
		<i  class="bi bi-people class_16">
		</i>
		<h1 class="class_17"  >
			<?=$total_users?>
		</h1>
		<h1 class="class_18"  >
			Artists
		</h1>
	</div>
	<div class="class_15" >
		<i  class="bi bi-vinyl-fill class_16">
		</i>
		<h1 class="class_17"  >
			<?=$total_songs?>
		</h1>
		<h1 class="class_18"  >
			Songs
		</h1>
	</div>
	<div class="class_15" >
		<i  class="bi bi-bar-chart-line-fill class_16">
		</i>
		<h1 class="class_17"  >
			<?=$total_views?>
		</h1>
		<h1 class="class_18"  >
			Plays
		</h1>
	</div>
</div>
