<?php inc('user/_menu'); ?>

<h2>Your Details</h2>

<form action="" method="post" accept-charset="utf-8" id="user-details-form">
	<?php if(!empty($errors)): ?>
	<ul id="errors">
		<?php foreach($errors as $error): ?>
			<li><?php echo $error ?></li>
		<?php endforeach; ?>	
	</ul>
	<?php endif; ?>
	<ul>
		<li>
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" value="<?php echo formValuePost('first_name', $user['forename']); ?>" id="first_name">
		</li>
		<li>
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" value="<?php echo formValuePost('last_name', $user['surname']); ?>" id="last_name">
		</li>
		<li id="dob">
			<label for="dob">Date of Birth</label>
			<?php echo createDaySelect('dob_day', formValuePost('dob_day', date('j', strtotime($user['dob'])))); ?>
			<?php echo createMonthSelect('dob_month', formValuePost('dob_month', date('m', strtotime($user['dob'])))); ?>
			<?php echo createYearSelect('dob_year', formValuePost('dob_year', date('Y', strtotime($user['dob'])))); ?>			
		</li>
		<li>
			<label for="telephone">Telephone</label>
			<input type="text" name="telephone" value="<?php echo formValuePost('telephone', $user['telephone']); ?>" id="telephone">
		</li>
		<li>
			<label for="address">Address</label>
			<input type="text" name="address" value="<?php echo formValuePost('address', $user['address1']); ?>" id="address">
		</li>
		<li>
			<label for="address2">Address 2</label>
			<input type="text" name="address2" value="<?php echo formValuePost('address2', $user['address2']); ?>" id="address2">
		</li>
		<li>
			<label for="city">City</label>
			<input type="text" name="city" value="<?php echo formValuePost('city', $user['city']); ?>" id="city">
		</li>
		<li>
			<label for="postcode">Post code</label>
			<input type="text" name="postcode" value="<?php echo formValuePost('postcode', $user['postcode']); ?>" id="postcode">
		</li>
		<li>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo formValuePost('email', $user['email']); ?>" id="email">
		</li>

	</ul>
	<p><input type="submit" value="Update Details &rarr;" id="btn_register" class="awesome" /></p>
</form>