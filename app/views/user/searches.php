<?php inc('user/_menu'); ?>

<h2>Your Saved Searches</h2>

<table border="0" cellspacing="5" cellpadding="5">
	<tr>
		<th>Search</th>
		<th>Make</th> 
		<th>Color</th>
		<th>Min. Price</th>
		<th>Max Price</th>
		<th>Year</th>
		<th></th>
		<th>Date Saved</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
<?php foreach($searches as $search): ?>
	<tr class="<?php echo $search['fave'] ? 'favorite' : '' ?>">
		<td><?php echo $search['search']; ?></td>
		<td><?php echo $search['make']; ?></td> 
		<td><?php echo $search['color']; ?></td>
		<td><?php echo $search['minPrice']; ?></td>
		<td><?php echo $search['maxPrice']; ?></td>
		<td><?php echo $search['year']; ?></td>
		<td><?php echo $search['fave'] ? '<span class="icon fave">*</span>' : '' ?></td>
		<td><?php echo formatDate('d-m-Y', $search['created_at']); ?></td>
		<td><a href="<?php echo site_url(URI::arrayToSearchLink($search)); ?>">Search</a></td>
		<td><a href="<?php echo site_url('/user/searches_fave/'. $search['id']); ?>">Set as Fave</a></td>
		<td><a href="<?php echo site_url('/user/searches_delete/'. $search['id']); ?>"><span class="icon del">X</span></a></td>
	</tr>
<?php endforeach; ?>
</table>


