<section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
			<h2>Latest Post</h2>
			<p class="lead">Find other interesting articles only here</p>
		</div>
	</div>
	<!-- END row -->
	<?php if (count($data_blog) > 0): ?>
	<div id="featured-news" class="tab-pane fade in active">
		<div class="row">
			<div class="col-md-12 probootstrap-animate">
				<div class="owl-carousel" id="owl1">
					<?php foreach ($data_blog as $item): ?>
					<div class="item">
						<a href="<?php echo base_url('blog/'.$item->link) ?>" class="probootstrap-featured-news-box">
							<figure class="probootstrap-media">
								<img src="<?php echo base_url($item->cover) ?>" alt="<?php echo $item->title ?>" class="img-responsive" style="width: 100%; height: 250px; object-fit: cover;">
							</figure>
							<div class="probootstrap-text">
								<div style="height: 50px; overflow: hidden;">
									<h3 style="text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" title="<?php echo $item->title ?>">
										<?php echo $item->title ?>
									</h3>
								</div>
								<div style="height: 90px; overflow: hidden;">
									<p style="text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;"><?php echo $item->snippet ?></p>
								</div>
								<div class="probootstrap-date" style="font-size: 13px;">
									<i class="icon-calendar"></i><?php echo date("d M Y", strtotime($item->created_at)) ?>
									<?php if ($item->is_comment == 1): ?>
									<div style="float: right;">
										<i class="zmdi zmdi-comments"></i> <?php echo number_format((int)$item->comment_count) ?>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<!-- END row -->
		<div class="row">
			<div class="col-md-12 text-center">
				<p><a href="<?php echo base_url('blog') ?>" class="btn btn-primary">View all posts</a></p>  
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endif; ?>
</section>

<section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial" style="background-image: url('<?php echo base_url('themes/enlight/') ?>img/testimonial.jpg'); margin-left: -180px; margin-right: -180px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
			<h2>Last Testimonial</h2>
			<p class="lead">The content below is original</p>
		</div>
	</div>
	<!-- END row -->
	<?php if (count($data_testimonial) > 0): ?>
	<div class="row">
		<div class="col-md-12 probootstrap-animate">
			<div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
				<?php foreach ($data_testimonial as $item): ?>
				<div class="item">
					<div class="probootstrap-testimony-wrap text-center">
						<figure>
							<img src="<?php echo base_url($item->creator_photo) ?>" alt="<?php echo $item->creator_name ?>" style="object-fit: cover;">
						</figure>
						<blockquote class="quote">&ldquo;<?php echo $item->content ?>&rdquo; <cite class="author"> &mdash; <span><?php echo $item->creator_name ?></span></cite></blockquote>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endif; ?>
	<!-- END row -->
</section>

<section class="probootstrap-section" style="padding-bottom: 0px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
			<h2>Our Services</h2>
			<p class="lead">The reason why you have to choose us</p>
		</div>
	</div>
	<?php if (count($data_service) > 0): ?>
	<div class="row">
		<?php foreach ($data_service as $item): ?>
		<div class="col-md-4">
			<div class="service left-icon probootstrap-animate">
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
