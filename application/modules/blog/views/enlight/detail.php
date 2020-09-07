<div class="row">
  <div class="col-sm-8 col-xs-12 probootstrap-animate" style="margin-bottom: 30px;">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <h4 style="margin-bottom: 0px;"><?php echo $data->title ?></h4>
            <div style="margin-bottom: 20px;"><?php echo date("d M Y • H:i:s", strtotime($data->created_at)) ?></div>
            <img class="img-cover mb-4" src="<?php echo base_url($data->cover) ?>" style="width: 100%; object-fit: cover; padding-bottom: 20px;" />
            <?php echo $data->content ?>
          </div>
        </div>
      </div>
    </div>
    <?php
      if ($data->is_comment == 1) {
        include_once('comment.php');
      };
    ?>
  </div>
  <div class="col-sm-4 col-xs-12 right-panel probootstrap-animate">
    <div style="font-size: 20px; border-bottom: 4px solid #32c787; color: #32c787; margin-bottom: 30px;">
      Latest Posts
    </div>

    <?php if (count($data_latest) > 0): ?>
    <?php foreach ($data_latest as $item): ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12 probootstrap-animate">
        <a href="<?php echo base_url('blog/'.$item->link) ?>" class="probootstrap-featured-news-box">
          <figure class="probootstrap-media">
            <img src="<?php echo base_url($item->cover) ?>" alt="<?php echo $item->title ?>" class="img-responsive" style="width: 100%; height: 200px; object-fit: cover;">
          </figure>
          <div class="probootstrap-text">
            <h3><?php echo $item->title ?></h3>
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
    </div>
    <?php endForeach; ?>
    <?php else: ?>
    <div class="nothing-found"><div>Nothing found</div></div>
    <?php endIf ?>
    
  </div>
</div>
