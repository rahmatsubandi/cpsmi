<!--==========================
	Portfolio Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="portfolio">
	<div class="container">

		<header class="section-header">
			<h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
		</header>

		<div class="row">
			<div class="col-lg-12">
				<ul id="portfolio-flters">
					<li data-filter="*" class="filter-active">All</li>
					<?php if (count($data_portfolio_tag) > 0): ?>
					<?php foreach ($data_portfolio_tag as $index => $item): ?>
					<li data-filter=".filter-tag-<?php echo $item->id ?>"><?php echo $item->name ?></li>
					<?php endforeach; ?>
					<?php endIf; ?>
				</ul>
			</div>
		</div>

		<?php if (count($data) > 0): ?>
		<div class="row portfolio-container">
			<?php foreach ($data as $index => $item): ?>
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
			?>
			<div class="col-lg-4 col-md-6 portfolio-item filter-tag-<?php echo $item->portfolio_tag_id ?>">
				<div class="portfolio-wrap">
					<img src="<?php echo base_url($item->image) ?>" class="img-fluid" alt="<?php echo $item->name ?>" style="width:100%">
					<div class="portfolio-info">
						<h4><a><?php echo $item->name ?></a></h4>
						<p><?php echo $item->portfolio_tag_name ?></p>
						<div>
							<a href="<?php echo base_url($item->image) ?>" data-lightbox="portfolio" data-title="<?php echo $item->name ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
							<?php if (!empty($external_link)): ?>
							<a href="<?php echo $external_link ?>" class="link-details" title="More Details" target="_blank"><i class="ion ion-android-open"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
		<div class="nothing-found"><div>No data found</div></div>
		<?php endIf; ?>

		<div class="text-center" style="margin-top: 20px;">
      <?php echo $pagination ?>
    </div>

	</div>
</section><!-- #portfolio -->
