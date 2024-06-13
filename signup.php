<?php

	require 'init.php';
	$title = "Signup";


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$errors = [];
		$email = addslashes($_POST['email']);
		$username = addslashes($_POST['username']);
		$first_name = addslashes($_POST['first_name']);
		$last_name = addslashes($_POST['last_name']);
		$password = addslashes($_POST['password']);

		//validate 
		$query = "select id from users where email = '$email' limit 1";
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$errors['email'] = "Invalid email";
		}else
		if(query($query)){
			$errors['email'] = "That email already exists";
		}

		if(!preg_match("/^[a-zA-Z ]+$/", trim($username)))
		{
			$errors['username'] = "User name can only have letters and spaces";
		}
		
		if(!preg_match("/^[a-zA-Z]+$/", trim($first_name)))
		{
			$errors['first_name'] = "First name can only have letters without spaces";
		}
		
		if(!preg_match("/^[a-zA-Z]+$/", trim($last_name)))
		{
			$errors['last_name'] = "Last name can only have letters without spaces";
		}

		if(strlen($password) < 8)
		{
			$errors['password'] = "Password must be atleast 8 characters long";
		}
		

		if(empty($errors))
		{
			//save
			$password = password_hash($password, PASSWORD_DEFAULT);
			$date = date("Y-m-d H:i:s");
			$role = 'user';

			$query = "insert into users (username,first_name,last_name,email,password,role,date) values ('$username','$first_name','$last_name','$email','$password','$role','$date')";
			query($query);

			message("Your profile was created! Please login to continue");
			redirect('login');
		}

	}
?>

	<?php require 'header.php';?>

		<div class="class_56" style="background-color: transparent;" >
			<div class="class_57" >
				<form method="post" style="height: auto;" enctype="multipart/form-data" class="class_58" >
					<h1 class="class_18"  >
						Signup
					</h1>
					<img src="assets/images/image4.jpg" class="class_59" >
					<div style="color: red;padding: 10px;">
						<?php
							if(!empty($errors)){
								echo implode("<br>",$errors);
							}
						?>
					</div>
					<div class="class_24" >
						<label class="class_55"  >
							Username
						</label>
						<input value="<?=old_value('username')?>" placeholder="" type="text" name="username" class="class_12" >
					</div>
					<div class="class_24" >
						<label class="class_55"  >
							First Name
						</label>
						<input value="<?=old_value('first_name')?>" placeholder="" type="text" name="first_name" class="class_12" >
					</div>
					<div class="class_24" >
						<label class="class_55"  >
							Last Name
						</label>
						<input value="<?=old_value('last_name')?>" placeholder="" type="text" name="last_name" class="class_12" >
					</div>
					<div class="class_24" >
						<label class="class_55"  >
							Email
						</label>
						<input value="<?=old_value('email')?>" placeholder="" type="text" name="email" class="class_12" >
					</div>
					<div class="class_24" >
						<label class="class_55"  >
							Password
						</label>
						<input value="<?=old_value('password')?>" placeholder="" type="text" name="password" class="class_12" >
					</div>

					<div style="padding:10px">Already have an account? <a href="login.php">Login here</a></div>
					<button class="class_60"  >
						Signup
					</button>
				</form>
			</div>
		</div>
 
<?php require 'footer.php';?>