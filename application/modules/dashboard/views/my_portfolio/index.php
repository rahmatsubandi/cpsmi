<style type="text/css">
	.portfolio-img-wrap {
		width: 100%;
		height: 350px;
		border: 1px solid #ddd;
		-moz-box-shadow: inset 0 0 10px #fff;
		-webkit-box-shadow: inset 0 0 10px #fff;
		box-shadow: inset 0 0 10px #fff;
	}
	.portfolio-img {
		width: 100%;
		height: 350px;
		object-fit: cover;
		object-position: left top;
		position: relative;
  	z-index: -2;
	}
</style>

<div class="site-section pt-5 pb-0">
	<div class="container">
		<div class="row mb-4 align-items-center">
			<div class="col-md-6" data-aos="fade-up">
				<h2><?php echo $data->intro ?></h2>
			</div>
		</div>
	</div>
</div>

<div class="container pt-4" data-aos="fade-up" data-aos-delay="">
	<?php if (count($data_portfolio) > 0): ?>
	<div id="portfolio-grid" class="row no-gutter">
		<?php foreach ($data_portfolio as $index => $item): ?>
		<?php
			$external_link = '';
			if (!empty($item->external_link) && !is_null($item->external_link)) {
				$external_link = $item->external_link;
				if (strpos($external_link, 'http') !== false) {
					$external_link = str_replace('http://', '', $external_link);
					$external_link = str_replace('https://', '', $external_link);
				};
				$external_link = 'http://'.$external_link;
			};
			if (!empty($external_link)) {
				$external_link = ' • '.$external_link;
			};
		?>
		<div class="item col-sm-6 col-md-4 col-lg-4 mb-4 filter-tag-<?php echo $item->portfolio_tag_id ?>">
			<a href="<?php echo base_url($item->image) ?>" class="item-wrap" data-lightbox="portfolio" data-title="<?php echo $item->name . $external_link ?>">
				<div class="work-info">
					<h3><?php echo $item->name ?></h3>
					<span><?php echo $item->portfolio_tag_name ?></span>
				</div>
				<div class="portfolio-img-wrap">
					<img src="<?php echo base_url($item->image) ?>" class="img-fluid portfolio-img" alt="<?php echo $item->name ?>">
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
	<center class="mt-4">
		<a href="<?php echo base_url('portfolio') ?>" class="btn btn-dark">View More</a>
	</center>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endIf; ?>
</div>

<!--==========================
	Clients Section
============================-->
<div class="site-section">
	<div class="container" data-aos="fade-up" data-aos-delay="">
		<div class="row justify-content-center text-center mb-4">
			<div class="col-5">
				<h3 class="h3 heading">Our Clients</h3>
			</div>
		</div>
		<div class="text-center">
		<?php if (count($data_client) > 0): ?>
		<?php foreach ($data_client as $index => $item): ?>
			<a href="<?php echo $item->link ?>" target="_blank" class="client-logo">
				<img src="<?php echo base_url($item->logo) ?>" alt="<?php echo $item->name ?>" class="img-fluid" style="margin-bottom: 30px; padding-left: 20px; padding-right: 20px;">
			</a>
			<?php endForeach; ?>
		<?php else: ?>
		<div class="nothing-found"><div>No data found</div></div>
		<?php endIf; ?>
		</div>
	</div>
</div><!-- #clients -->

<!--==========================
	Testimonial Section
============================-->
<?php if (count($data_testimonial) > 0): ?>
<div class="site-section pt-0 pb-5">
	<div class="container" data-aos="fade-up" data-aos-delay="">
		<div class="owl-carousel testimonial-carousel">

			<?php foreach ($data_testimonial as $item): ?>
			<div class="testimonial-wrap">
				<div class="testimonial">
					<img src="<?php echo base_url($item->creator_photo) ?>" alt="<?php echo $item->creator_name ?>" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
					<blockquote>
						<p><?php echo $item->content ?></p>
					</blockquote>
					<p>&mdash; <?php echo $item->creator_name ?></p>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
	</div>
</div><!-- #testimonial -->
<?php endif; ?>
