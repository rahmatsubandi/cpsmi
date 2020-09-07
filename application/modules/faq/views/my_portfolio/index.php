<div class="container" data-aos="fade-up" data-aos-delay="">

	<?php if (count($data) > 0): ?>
	<ul id="faq-list" style="padding-left: 15px;">
		<?php foreach ($data as $index => $item): ?>
		<li>
			<a data-toggle="collapse" class="collapsed" href="#faq-<?php echo $item->id ?>"><?php echo $item->question ?> <i class="ion-android-remove"></i></a>
			<div id="faq-<?php echo $item->id ?>" class="collapse mb-2" data-parent="#faq-list">
				<?php echo $item->answer ?>
			</div>
		</li>
		<?php endForeach; ?>
	</ul>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endIf; ?>

</div>
