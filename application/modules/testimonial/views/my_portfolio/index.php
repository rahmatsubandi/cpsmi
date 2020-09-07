<section id="testimonials">
	<div class="container">

		<?php if (count($data) > 0): ?>
		<div class="row">
			<?php foreach ($data as $index => $item): ?>
			<div class="col-sm-10 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
				<div class="testimonial">
						<div class="pic mb-2">
							<img src="<?php echo base_url($item->creator_photo) ?>" alt="<?php echo $item->creator_name ?>" style="width: 60px; height: 60px; border-radius: 100%; object-fit: cover;">
						</div>
						<div class="description">
							<div class="content">
								<?php echo $item->content ?>
							</div>
						</div>
						<div class="testimonial-content">
								<?php
									$creator_link = (!is_null($item->creator_link) && !empty($item->creator_link)) ? $item->creator_link : 'javascript:;';
									$creator_link_target = (!is_null($item->creator_link) && !empty($item->creator_link)) ? 'target="_blank"' : '';
								?>
								<a href="<?php echo $creator_link ?>" class="name" <?php echo $creator_link_target ?> title="<?php echo $item->creator_link ?>">
									&mdash; <?php echo $item->creator_name ?>
								</a>
								<span class="post">
									<?php echo (!is_null($item->job) && !empty($item->job)) ? '<small style="color: #666;">('.$item->job.')</small>' : ''; ?>
									<?php if (!empty($item->screenshot)): ?>
									<a href="<?php echo (!empty($item->screenshot)) ? base_url($item->screenshot) : '#' ?>" data-lightbox="portfolio" title="Screenshot">
										<i class="fa fa-external-link-square" style="font-size: 12px;"></i>
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

		<div class="text-center" data-aos="fade-up" data-aos-delay="">
			<?php echo $pagination ?>
		</div>

	</div>
</section>
