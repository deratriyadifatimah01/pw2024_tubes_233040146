<?php

	require 'init.php';
	$title = "Latest";

	$limit = 30;
	$offset = ($page_number - 1) * $limit;

	$query = "select * from songs order by id desc limit $limit offset $offset";
 	$songs = query($query);

 	if(!empty($songs))
 	{
 		foreach ($songs as $key => $row) {

 			$id = $row['user_id'];
 			$query = "select * from users where id = '$id' limit 1";
 			$artist = query($query);
 			if(!empty($artist))
 			{
 				$songs[$key]['artist'] = $artist[0];
 			}
 		}
 	}

?>

	<?php require 'header.php';?>

	<h1 class="class_14"  >
		Latest
	</h1>
	<div class="class_15" >
		<?php if(!empty($songs)):?>
			<?php foreach($songs as $song):?>
				<a href="song.php?id=<?=$song['id']?>" class="class_16" >
					<img src="<?=get_image($song['image'])?>"  backup="" class="class_17 item_class_3">
					<h3 class="class_18"  >
						<?=esc($song['title'])?>
					</h3>
					<div class="class_19" >
						<i class="bi bi-person-fill class_20"></i>
						<div class="class_21"  >
							<?=$song['artist']['first_name'] ?? 'Unknown'?> 
							<?=$song['artist']['last_name'] ?? ''?>
						</div>
					</div>
				</a>
		 	<?php endforeach;?>
		<?php else:?>
			<div style="text-align: center;padding: 10px;">No songs found</div>
		<?php endif;?>

		<div class="class_31" style="" >
			<a href="latest.php?page=<?=($page_number-1)?>">
				<button class="class_32" style="float:left" >
					Prev page
				</button>
			</a>
			<a href="latest.php?page=<?=($page_number+1)?>">
				<button type="button" class="class_33"  >
					Next page
				</button>
			</a>
			<div class="class_34" >
			</div>
		</div>

	</div>

<?php require 'footer.php';?>