<?php

	require 'init.php';
	$title = "Artists";

	$limit = 30;
	$offset = ($page_number - 1) * $limit;

	$query = "select * from users where role = 'user' order by id desc limit $limit offset $offset";
 	$users = query($query);

?>

	<?php require 'header.php';?>

	<h1 class="class_14"  >
		Artist Profiles
	</h1>
	<div class="class_15" >
		<?php if(!empty($users)):?>
			<?php foreach($users as $user):?>
				<a href="profile.php?id=<?=$user['id']?>" class="class_16" >
					<img src="<?=get_image($user['image'])?>"  backup="" class="class_17 item_class_3">
					<h3 class="class_18"  >
						<?=$user['first_name']?> 
						<?=$user['last_name']?>
					</h3>

				</a>
		 	<?php endforeach;?>
		<?php else:?>
			<div style="text-align: center;padding: 10px;">No artists found</div>
		<?php endif;?>

		<div class="class_31" style="" >
			<a href="artists.php?page=<?=($page_number-1)?>">
				<button class="class_32" style="float:left" >
					Prev page
				</button>
			</a>
			<a href="artists.php?page=<?=($page_number+1)?>">
				<button type="button" class="class_33"  >
					Next page
				</button>
			</a>
			<div class="class_34" >
			</div>
		</div>

	</div>

<?php require 'footer.php';?>