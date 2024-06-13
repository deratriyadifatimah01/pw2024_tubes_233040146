<?php

	require 'init.php';
	$title = "Upload";

	if(!is_logged_in())
	{
		redirect('login');
	}

	$mode = $_GET['mode'] ?? 'new';
	$id = $_GET['id'] ?? 0;
	$id = (int)$id;

	$button_title = "Save";
	$display = true;

	if($mode == 'edit' || $mode == 'delete')
	{
		if($mode == 'delete')
			$button_title = "Delete";

		$user_id = user('id');
		$query = "select * from songs where id = '$id' && user_id = '$user_id' limit 1";
		
		if(is_admin())
		$query = "select * from songs where id = '$id' limit 1";

		$song = query($query);
		if(!empty($song))
		{
			$song = $song[0];

		}else{
			$display = false;
		}
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$errors = [];
		$title = addslashes($_POST['title']);

		//validate data
		if(empty($title))
		{
			$errors['title'] = "Title is required";
		}else
		if(!preg_match("/^[a-zA-Z 0-9 \-\_\[\]\(\)\$]+$/", trim($title)))
		{
			$errors['title'] = "Title cant have special characters";
		}

		$folder = "uploads/";
		if(!file_exists($folder))
		{
			mkdir($folder,0777,true);
		}

		$image_string = $file_string = "";

		if(!empty($_FILES['image']['name']))
		{
			$allowed = ['image/jpeg','image/png','image/webp'];

			if(in_array($_FILES['image']['type'], $allowed)){

				$image = $folder . $_FILES['image']['name'];
				$image_string = ", image = '$image' ";
			}else{
				$errors['image'] = "Image type not supported";
			}
		}else{
			if($mode == 'new')
				$errors['image'] = "An image is required";
		}
 
		if(!empty($_FILES['file']['name']))
		{
			$allowed = ['audio/mpeg'];

			if(in_array($_FILES['file']['type'], $allowed)){

				$file = $folder . $_FILES['file']['name'];
				$file_string = ", file = '$file' ";
			}else{
				$errors['file'] = "Audio file type not supported";
			}
		}else{
			if($mode == 'new')
				$errors['file'] = "An audio file is required";
		}
 
		if(empty($errors))
		{
			//save
			$date = date("Y-m-d H:i:s");
			$user_id = user('id');

			if(!empty($image)){
				move_uploaded_file($_FILES['image']['tmp_name'], $image);

				if($mode == 'edit' && file_exists($song['image']))
					unlink($song['image']);
			}
			
			if(!empty($file)){
				move_uploaded_file($_FILES['file']['tmp_name'], $file);

				if($mode == 'edit' && file_exists($song['file']))
					unlink($song['file']);
			}

			$query = "insert into songs (user_id,file,image,title,date) values ('$user_id','$file','$image','$title','$date')";
			message("Your song was successfully created!");
			
			if($mode == 'edit'){
				$query = "update songs set title = '$title' $image_string $file_string where id = '$id' && user_id = '$user_id' limit 1";
				message("Your song was successfully edited!");
			}

			if($mode == 'delete'){
				$query = "delete from songs where id = '$id' && user_id = '$user_id' limit 1";
				message("Your song was successfully deleted!");
				
				if(file_exists($song['image']))
					unlink($song['image']);

				if(file_exists($song['song']))
					unlink($song['song']);
			}
			
			query($query);

			redirect('profile');
		}

	}

?>

	<?php require 'header.php';?>
 
	<div class="class_22" >
		<form method="post" enctype="multipart/form-data" class="class_23" >
			<h1 class="class_18"  >
				<?php if($mode == 'edit'):?>
					Edit Song
				<?php elseif($mode == 'delete'):?>
					<span>Delete Song</span>
					<div style="color:red;font-size: 18px;">Are you sure you want to delete this song?!</div>
				<?php else:?>
					Upload Song
				<?php endif;?>
			</h1>
			<div style="color: red;padding: 10px;">
				<?php
					if(!empty($errors)){
						echo implode("<br>",$errors);
					}
				?>
			</div>
			<?php if($display):?>
			<div class="class_24" >
				<label class="class_25"  >
					Title
				</label>
				<input value="<?=old_value('title',$song['title'] ?? '')?>" placeholder="" type="text" name="title" class="class_12" >
			</div>
			<div class="class_26" >
				<img src="<?=get_image($song['image'] ?? '')?>" class="js-image class_27" >
				<input onchange="display_image(this.files[0])" type="file" name="image"  class="class_28">
			</div>
			<div class="class_26" >
				<div class="class_29" >
					<audio controls="" class="js-file class_30" >
						<source src="<?=$song['file'] ?? ''?>" type="audio/mpeg" >
					</audio>
				</div>
				<input onchange="load_file(this.files[0])" type="file" name="file" >
			</div>
			<div class="class_31" >
				<button class="class_32"  >
					<?=$button_title?>
				</button>
				<a href="profile.php">
					<button type="button" class="class_33"  >
						Cancel
					</button>
				</a>
				<div class="class_34" >
				</div>
			</div>
			<?php else:?>
				<div style="color:red;text-align:center;">That song was not found!</div>
			<?php endif;?>

		</form>
	</div>
 
		<?php require 'footer.php';?>
<script>
	

	function display_image(file)
	{
		document.querySelector(".js-image").src = URL.createObjectURL(file);
	}

	function load_file(file)
	{
		document.querySelector(".js-file").src = URL.createObjectURL(file);
	}
	
</script>