<div id="search-box">
	<form action="<?php echo site_url('search') ?>" method="post" accept-charset="utf-8">
		<p id="search-searchbox">
			<label for="search">Search</label>
			<input type="text" name="search" value="<?php echo iss($search, 'search') ?>" id="search" />
		</p>
		<p id="search-color">
			<label for="color">Color</label>
			<?php echo createSelect('color', $colors, iss($search, 'color')); ?>
		</p>
		<p id="search-make">
			<label for="make">Make</label>
			<?php echo createSelect('make', $makes, iss($search, 'make')); ?>
		</p>
		<p id="search-minPrice">
			<label for="minPrice">Min Price</label>
			<input type="text" name="minPrice" value="<?php echo iss($search, 'minPrice') ?>" id="minPrice" />
		</p>
		<p id="search-maxPrice">
			<label for="maxPrice">Max Price</label>
			<input type="text" name="maxPrice" value="<?php echo iss($search, 'maxPrice') ?>" id="maxPrice" />
		</p>
		<p id="search-year">
			<label for="year">Year</label>
			<input type="text" name="year" value="<?php echo iss($search, 'year') ?>" id="year" />
		</p>
		<p id="search-submit">
			<input type="submit" value="Search" class="awesome">
		</p>
	</form>
		<br class="clear" />
</div>
	
<p id="result-number">
	<span><?php echo count($cars) ?> results found.</span>
	<a href="<?php echo site_url('/search/save/'.$save) ?>">Save Search</a>
	<br class="clear" />
</p>


<?php foreach($cars as $car): ?>
<?php include('_car.php'); ?>
<?php endforeach; ?>
