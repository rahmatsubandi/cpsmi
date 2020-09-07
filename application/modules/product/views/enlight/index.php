<style type="text/css">
	.product-title {
		-webkit-box-orient: vertical;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: normal;
		height: 45px;
	}
</style>

<section class="probootstrap-section" style="padding-top: 0px; padding-bottom: 0px;">
  <?php if (count($data) > 0): ?>
  <div class="row">
    <?php foreach ($data as $item): ?>
    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
      <a href="<?php echo base_url('product/'.$item->link) ?>" class="probootstrap-featured-news-box">
        <figure class="probootstrap-media">
          <img src="<?php echo base_url($item->image1) ?>" alt="<?php echo $item->name ?>" class="img-responsive" style="width: 100%; height: 250px; object-fit: cover;">
        </figure>
        <div class="probootstrap-text">
					<div style="height: 80px; overflow: hidden;">
						<h3 class="product-title"><?php echo $item->name ?></h3>
						<span style="color: #ff6b68;">Rp <?php echo number_format($item->price) ?></span>
						<span style="float: right; font-size: 12px;"><?php echo ($item->sold_out <= $item->stock) ? 'Tersedia' : 'Kosong' ?></span>
          </div>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
  <div class="nothing-found"><div>No data found</div></div>
  <?php endIf; ?>

  <div class="text-center probootstrap-animate">
    <?php echo $pagination ?>
  </div>
</section>
