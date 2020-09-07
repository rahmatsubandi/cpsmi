<!--==========================
	Testimonials Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="testimonials">
	<div class="container">

		<header class="section-header">
			<h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
			<p><?php echo (!empty($app->active_module->description) ? $app->active_module->description : '-') ?></p>
		</header>

		<?php if (count($data) > 0): ?>
		<div class="row">
			<?php foreach ($data as $index => $item): ?>
			<div class="col-sm-10 col-md-6">
				<div class="testimonial">
						<div class="pic">
							<img src="<?php echo base_url($item->creator_photo) ?>" alt="<?php echo $item->creator_name ?>" style="width: 60px; height: 60px; object-fit: cover;">
						</div>
						<div class="description">
							<div class="content">
								<?php echo $item->content ?>
							</div>
						</div>
						<div class="testimonial-content">
								<a href="<?php echo (!is_null($item->creator_link) && !empty($item->creator_link)) ? $item->creator_link : '#' ?>" class="name" target="_blank">
									<?php echo $item->creator_name ?>
								</a>
								<span class="post">
									<?php echo $item->job ?>
									<?php if (!empty($item->screenshot)): ?>
									<a href="<?php echo (!empty($item->screenshot)) ? base_url($item->screenshot) : '#' ?>" data-lightbox="portfolio" title="Screenshot">
										<i class="fa fa-external-link-square"></i>
									</a>
									<?php endif; ?>
								</span>
						</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
		<div class="nothing-found" style="margin-top: -50px; margin-bottom: 50px;"><div>No data found</div></div>
		<?php endIf; ?>

		<div class="text-center" style="margin-bottom: 50px;">
      <?php echo $pagination ?>
    </div>

	</div>
</section><!-- #testimonials -->
