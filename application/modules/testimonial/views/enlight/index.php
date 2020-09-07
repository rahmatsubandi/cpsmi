<section class="probootstrap-section" style="padding-top: 0px; padding-bottom: 0px;">
	<?php if (count($data) > 0): ?>
	<?php $rowCount = 1; ?>
	<?php foreach ($data as $item): ?>
	<?php
		$creator_link = (!is_null($item->creator_link) && !empty($item->creator_link)) ? $item->creator_link : 'javascript:;';
		$creator_link_target = (!is_null($item->creator_link) && !empty($item->creator_link)) ? 'target="_blank"' : '';
	?>
	<?php if ($rowCount == 1): ?>
	<div class="row">
	<?php endif; ?>
	<div class="col-sm-4 probootstrap-animate">
		<div class="service left-icon">
			<div class="icon">
				<img src="<?php echo base_url($item->creator_photo) ?>" alt="<?php echo $item->creator_name ?>" style="width: 60px; height: 60px; border-radius: 100%; object-fit: cover;">
			</div>
			<div class="text">
				<a href="<?php echo $creator_link ?>" class="name" <?php echo $creator_link_target ?> title="<?php echo $item->creator_link ?>">
					<h3 class="h3-ellipsis" style="font-size: 18px;">
						<?php echo $item->creator_name ?>
					</h3>
				</a>
				<p>
					<?php echo $item->content ?> <br/>
					<?php echo (!is_null($item->job) && !empty($item->job)) ? '<small style="color: #666;">&mdash; '.$item->job.'</small>' : ''; ?>
					<?php if (!empty($item->screenshot)): ?>
					<a href="<?php echo (!empty($item->screenshot)) ? base_url($item->screenshot) : '#' ?>" data-lightbox="portfolio" title="Screenshot">
						<i class="fa fa-external-link-square" style="font-size: 12px;"></i>
					</a>
					<?php endif; ?>
				</p>
			</div>  
		</div>
	</div>
	<?php if ($rowCount == 3): ?>
	</div>
	<?php endif; ?>
	<?php
		if ($rowCount === 3) {
			$rowCount = 1;
		} else {
			$rowCount++;
		};
	?>
	<?php endforeach; ?>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endif; ?>
</section>

<div class="text-center probootstrap-animate">
	<?php echo $pagination ?>
</div>
