<div class="row">
<?php if (isset($data) && !empty($data)): ?>
	<div class="col-lg-5 col-md-6 probootstrap-animate">
		<div class="about-img">
			<img src="<?php echo base_url($data->image) ?>" style="width: 100%;">
		</div>
	</div>

	<div class="col-lg-7 col-md-6 probootstrap-animate">
		<div class="about-content">
			<?php echo $data->content ?>
		</div>
	</div>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
<?php endif; ?>

</div>
