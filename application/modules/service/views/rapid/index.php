<!--==========================
	Services Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="services">
	<div class="container">

		<header class="section-header">
			<h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
			<p><?php echo (!empty($app->active_module->description) ? $app->active_module->description : '-') ?></p>
		</header>

		<?php if (count($data) > 0): ?>
		<div class="row">
			<?php foreach ($data as $index => $item): ?>
			<div class="col-md-6 col-lg-4">
				<div class="box">
					<div class="icon" style="background: <?php echo '#'.$item->background_color ?>">
						<i class="zmdi <?php echo $item->icon ?>" style="color: <?php echo '#'.$item->icon_color ?>"></i>
					</div>
					<h4 class="title"><?php echo $item->name ?></h4>
					<p class="description"><?php echo $item->description ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
		<div class="nothing-found"><div>No data found</div></div>
		<?php endIf; ?>

	</div>
</section><!-- #services -->
