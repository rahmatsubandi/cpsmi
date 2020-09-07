<div id="products" class="container" data-aos="fade-up" data-aos-delay="">

	<?php if (count($data) > 0): ?>
	<div class="row">
		<?php foreach ($data as $index => $item): ?>
		<div class="col-md-3 col-lg-3">
			<div class="box box-item">
				<img src="<?php echo base_url($item->image1) ?>"/>
				<div class="detail">
					<div class="title">
						<a href="<?php echo base_url('product/'.$item->link) ?>">
							<?php echo $item->name ?>
						</a>
					</div>
					<div class="footer">
						<div class="left">Rp <?php echo number_format($item->price) ?></div>
						<div class="right"><?php echo ($item->sold_out <= $item->stock) ? 'Tersedia' : 'Kosong' ?></div>
					</div>
				</div>
			</div>
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
