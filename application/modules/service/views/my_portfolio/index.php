<div class="container">

	<?php if (count($data) > 0): ?>
	<div class="row">
		<?php foreach ($data as $index => $item): ?>
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
			<span class="zmdi <?php echo $item->icon ?> zmdi-hc-3x pb-3" style="color: <?php echo '#'.$item->icon_color ?>"></span>
			<h4 class="h4 mb-2"><?php echo $item->name ?></h4>
			<p><?php echo $item->description ?></p>
		</div>
		<?php endforeach; ?>
	</div>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endIf; ?>

</div>
