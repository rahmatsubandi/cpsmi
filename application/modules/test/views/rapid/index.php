<!--==========================
	About Us Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="about">
	<div class="container">

		<div class="row">
			
			<div class="col-lg-5 col-md-6">
				<div class="about-img">
					<img src="<?php echo base_url($data->image) ?>" alt="">
				</div>
			</div>

			<div class="col-lg-7 col-md-6">
				<div class="about-content">
					<h2><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h2>
					<?php echo $data->content ?>
				</div>
			</div>

		</div>

	</div>
</section><!-- #about -->
