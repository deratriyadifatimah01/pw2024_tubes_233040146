<?php 

	defined("ADMIN") or die("Access denied");

	$limit = 30;
	$offset = ($page_number - 1) * $limit;

	$query = "select * from users order by id desc limit $limit offset $offset ";
	$users = query($query);

?>

<table class="item_class_0"  >
	
	<thead >
		<tr >
			<th scope="col" >
				#
			</th>
			<th scope="col" >
				Username
			</th>
			<th scope="col" >
				First
			</th>
			<th scope="col" >
				Last
			</th>
			<th scope="col" >
				Role
			</th>
			<th scope="col" >
				Email
			</th>
			<th  class="class_19">
				Image
			</th>
			<th >
				Action
			</th>
		</tr>
		
	</thead>
	
	<tbody >
		<?php if(!empty($users)):?>
			<?php foreach($users as $user):?>
				<tr >
					<th >
						<?=$user['id']?>
					</th>
					<td >
						<?=esc($user['username'])?>
					</td>
					<td >
						<?=esc($user['first_name'])?>
					</td>
					<td >
						<?=esc($user['last_name'])?>
					</td>
					<td >
						<?=esc($user['role'])?>
					</td>
					<td >
						<?=esc($user['email'])?>
					</td>
					<td >
						<img src="<?=get_image($user['image'])?>" class="class_20" >
					</td>
					<td >
						<a href="settings.php?id=<?=$user['id']?>">
							<button class="class_21"  >
								Edit
							</button>
						</a>
						<a href="settings.php?id=<?=$user['id']?>&delete=true">
							<button class="class_22"  >
								Delete
							</button>
						</a>
					</td>
				</tr>
			<?php endforeach?>
		<?php endif?>
	</tbody>
</table>
<div class="class_23" >
	<div class="class_24" >
	</div>
	<a href="admin.php?section=users&page=<?=($page_number-1)?>">
		<button class="class_25"  >
			Prev page
		</button>
	</a>
	<a href="admin.php?section=users&page=<?=($page_number+1)?>">
		<button class="class_26"  >
			Next page
		</button>
	</a>
</div>
