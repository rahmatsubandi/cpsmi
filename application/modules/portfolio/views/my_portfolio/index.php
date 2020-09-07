<div class="container">

	<div class="row mb-5 align-items-end">
		<div class="col-md-12 col-lg-12 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
			<div id="filters" class="filters">
				<a href="#" data-filter="*" class="active">All</a>
				<?php if (count($data_portfolio_tag) > 0): ?>
				<?php foreach ($data_portfolio_tag as $index => $item): ?>
				<a href="#" data-filter=".filter-tag-<?php echo $item->id ?>"><?php echo $item->name ?></a>
				<?php endforeach; ?>
				<?php endIf; ?>
			</div>
		</div>
	</div>

	<?php if (count($data) > 0): ?>
	<div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
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
				<img src="<?php echo base_url($item->image) ?>" class="img-fluid" alt="<?php echo $item->name ?>" style="width:100%">
			</a>
		</div>
		<?php endforeach; ?>
	</div>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endIf; ?>

	<div class="text-center" data-aos="fade-up" data-aos-delay="">
		<?php echo $pagination ?>
	</div>

</div>
