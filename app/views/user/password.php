<?php inc('user/_menu'); ?>

<h2>Change Your Password</h2>

<form action="" method="post" accept-charset="utf-8" id="user-password-form" class="default">
	<?php if(!empty($errors)): ?>
	<ul id="errors">
		<?php foreach($errors as $error): ?>
			<li><?php echo $error ?></li>
		<?php endforeach; ?>	
	</ul>
	<?php endif; ?>
	<ul>
		<li>
			<label for="o_password">Old Password</label>
			<input type="password" name="o_password" value="" id="o_password" />
		</li>
		<li>
			<label for="n_password">New Password</label>
			<input type="password" name="n_password" value="" id="n_password" />
		</li>
		<li>
			<label for="r_password">Retype New Password</label>
			<input type="password" name="r_password" value="" id="r_password" />
		</li>
	</ul>
	<p><input type="submit" value="Change Password &rarr;" id="btn_password" /></p>
</form>