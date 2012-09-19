<div class="car-container">
	<h3><?php echo $car['make']; ?> - <?php echo $car['model']; ?></h3>
	<div class="car-details">
		<span class="price">&pound;<?php echo formatMoney($car['price']); ?></span>
		<ul>
			<li>
				<span class="label">Year</span> <span class="value"><?php echo $car['year']; ?></span>
			</li>
			<li>
				<span class="label">CC</span> <span class="value"><?php echo $car['cc']; ?></span>
			</li>
			<li>
				<span class="label">Color</span> <span class="value"><?php echo $car['color']; ?></span>
			</li>
		</ul>
	</div>
	<div id="car-image">
		<img src="<?php echo WEB_ROOT ?>app/public/photos/<?php echo $car['id'] ?>.jpg">
	</div>
</div>