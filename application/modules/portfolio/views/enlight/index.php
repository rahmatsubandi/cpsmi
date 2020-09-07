<?php if (count($data) > 0): ?>
<section class="probootstrap-section probootstrap-bg-white" style="padding-top: 0px; padding-bottom: 0px;">
	<div class="row">
		<div class="col-md-12">
			<div class="portfolio-feed three-cols">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<div class="probootstrap-gallery">
					<?php foreach ($data as $item): ?>
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
					<div class="grid-item probootstrap-animate">
						<a href="<?php echo base_url($item->image) ?>" data-lightbox="portfolio" data-title="<?php echo $item->name . $external_link ?>">
              <img src="<?php echo base_url($item->image) ?>" alt="<?php echo $item->name ?>" style="margin-bottom: 20px;" />
            </a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php else: ?>
<div class="nothing-found"><div>No data found</div></div>
<?php endIf; ?>

<div class="text-center probootstrap-animate">
	<?php echo $pagination ?>
</div>
