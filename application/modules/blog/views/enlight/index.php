<section class="probootstrap-section" style="padding-top: 0px; padding-bottom: 0px;">
  <?php if (count($data) > 0): ?>
  <div class="row">
    <?php foreach ($data as $item): ?>
    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
      <a href="<?php echo base_url('blog/'.$item->link) ?>" class="probootstrap-featured-news-box">
        <figure class="probootstrap-media">
          <img src="<?php echo base_url($item->cover) ?>" alt="<?php echo $item->title ?>" class="img-responsive" style="width: 100%; height: 250px; object-fit: cover;">
        </figure>
        <div class="probootstrap-text">
          <div style="height: 50px; overflow: hidden;">
            <h3 style="text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" title="<?php echo $item->title ?>">
              <?php echo $item->title ?>
            </h3>
          </div>
          <div style="height: 90px; overflow: hidden;">
            <p style="text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;"><?php echo $item->snippet ?></p>
          </div>
          <div class="probootstrap-date" style="font-size: 13px;">
            <i class="icon-calendar"></i><?php echo date("d M Y", strtotime($item->created_at)) ?>
            <?php if ($item->is_comment == 1): ?>
            <div style="float: right;">
              <i class="zmdi zmdi-comments"></i> <?php echo number_format((int)$item->comment_count) ?>
            </div>
            <?php endif; ?>
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
