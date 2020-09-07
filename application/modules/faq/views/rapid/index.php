<!--==========================
	Frequently Asked Questions Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="faq">
	<div class="container">
		
		<header class="section-header">
			<h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
			<p><?php echo (!empty($app->active_module->description) ? $app->active_module->description : '-') ?></p>
		</header>

		<?php if (count($data) > 0): ?>
		<ul id="faq-list">
			<?php foreach ($data as $index => $item): ?>
			<li>
				<a data-toggle="collapse" class="collapsed" href="#faq-<?php echo $item->id ?>"><?php echo $item->question ?> <i class="ion-android-remove"></i></a>
				<div id="faq-<?php echo $item->id ?>" class="collapse" data-parent="#faq-list">
					<?php echo $item->answer ?>
				</div>
			</li>
			<?php endForeach; ?>
		</ul>
		<?php else: ?>
		<div class="nothing-found"><div>No data found</div></div>
		<?php endIf; ?>

	</div>
</section><!-- #faq -->
