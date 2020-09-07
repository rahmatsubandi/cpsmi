<section class="probootstrap-section" style="padding-top: 0px; padding-bottom: 0px;">
	<?php if (count($data) > 0): ?>
	<div class="row">
		<?php foreach ($data as $item): ?>
		<div class="col-md-4 probootstrap-animate">
			<div class="service left-icon">
				<div class="icon"><i class="zmdi <?php echo $item->icon ?>"></i></div>
				<div class="text">
					<h3><?php echo $item->name ?></h3>
					<p><?php echo $item->description ?></p>
				</div>  
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endif; ?>
</section>
