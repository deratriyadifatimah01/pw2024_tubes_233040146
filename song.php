<?php

	require 'init.php';
	$title = "Song";
 
	$song_id = $_GET['id'] ?? 0;
	$song_id = (int)$song_id;

	$query = "select * from songs where id = '$song_id' limit 1";
 	$song = query($query);

 	if(!empty($song))
	{
		$song = $song[0];
		
		$id = $song['user_id'];
		$query = "select * from users where id = '$id' limit 1";
	 	$row = query($query);
	 	if(!empty($row))
		{
			$row = $row[0];
		}

		if(user('id') != $song['user_id'])
			add_page_view($song['id']);

		//add_song_download($song['id']);

	}
?>

	<?php require 'header.php';?>
 
	<div class="class_35" >
		<h1 class="class_14"  >
			Now Playing
		</h1>

		<?php if(!empty($row)):?>
		<div class="class_36" style="display: block;" >
			<div class="class_37" style="margin:auto;" >
				<img src="<?=get_image($song['image'])?>" class="class_38" style="min-width: 400px;height:auto" >
				<h1 class="class_18" style="margin-bottom:0px"  >
					<a href="profile.php?id=<?=$row['id']?>">
						<?=$row['username']?> <?=$row['last_name']?>
					</a> 
				</h1>
 
				<div class="class_39"  style="display:block">
					<?php if(!empty($song)):?>
						<div class="class_44"  style="width:100%" >
							<div class="class_45" >
								<img src="<?=get_image($row['image'])?>" class="class_46" >
							</div>
							<div class="class_47" >
								<h3 class="class_18"  >
									<?=esc($song['title'])?>
								</h3>
								<div class="class_29" >
									<audio controls="" class="class_30" >
										<source src="<?=$song['file']?>" type="audio/mpeg" >
									</audio>
								</div>
							</div>
			 
						</div>
						<div style="color:black;text-align:center;">Page views: <?=$song['views']?></div>
						<div style="color:black;text-align:center;">Downloads: <?=$song['downloads']?></div>
						<a href="download.php?id=<?=$song['id']?>">
							<button class="class_32"  >
								Download Song
							</button>
						</a>

					<?php else:?>
						<div style="color:black;padding:10px;text-align: center;">No song found!<br><a href="upload.php">Upload a song</a></div>
					<?php endif;?>

				</div>
 
			</div>
			<div class="class_43" >


				</div>
			</div>
			<?php endif;?>
		</div>
						 
<?php require 'footer.php';?>