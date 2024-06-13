
	<div class="class_61">
		<div class="class_62" >
			<a href="index.php" class="class_63"  >
				Home
			</a>
			<?php if(!is_logged_in()):?>
				<a href="login.php" class="class_63"  >
					Login
				</a>
				<a href="signup.php" class="class_63"  >
					Signup
				</a>
			<?php else:?>
				<a href="settings.php" class="class_63"  >
					Settings
				</a>
				<a href="profile.php" class="class_63"  >
					Profile
				</a>
			<?php endif;?>
			
		</div>
		<div class="class_62" >
			<a href="top-20.php" class="class_63"  >
				Top
			</a>
			<a href="popular.php" class="class_63"  >
				Popular
			</a>
			<a href="latest.php" class="class_63"  >
				Latest
			</a>
		</div>
	</div>


</body>
</html>