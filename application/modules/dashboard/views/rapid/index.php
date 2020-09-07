<!--==========================
  Intro Section
============================-->
<section
	id="intro"
	class="clearfix"
	style="background: #ebf1fa url('<?php echo $data->background_image ?>') center top no-repeat; background-size: cover;"
>
	<div class="intro-layer">
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-self-center">
				<div class="col intro-info order-md-first order-last">
					<?php echo $data->intro ?>
					<div>
						<a href="<?php echo base_url('about') ?>" class="btn-get-started scrollto">Get Started</a>
					</div>
				</div>
				<div class="col intro-img order-md-last order-first">
					<img src="<?php echo base_url($data->intro_image) ?>" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section><!-- #intro -->

<!--==========================
	Clients Section
============================-->
<section id="clients" class="wow fadeInUp">
	<div class="container">

		<header class="section-header">
			<h3>Our Clients</h3>
		</header>

		<?php if (count($data_client) > 0): ?>
		<div class="owl-carousel clients-carousel">
		<?php foreach ($data_client as $index => $item): ?>
			<a href="<?php echo $item->link ?>" target="_blank">
				<img src="<?php echo base_url($item->logo) ?>" alt="<?php echo $item->name ?>">
			</a>
			<?php endForeach; ?>
		</div>
		<?php else: ?>
		<div class="nothing-found"><div>No data found</div></div>
		<?php endIf; ?>

	</div>
</section><!-- #clients -->
