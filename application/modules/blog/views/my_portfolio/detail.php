<div class="container">
  <div class="body">

    <div class="row">
      <div class="col-sm-8 col-xs-10" data-aos="fade-up" data-aos-delay="">
        <div class="card">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <h4><?php echo $data->title ?></h4>
                <span class="description text-hint"><?php echo date("d M Y • H:i:s", strtotime($data->created_at)) ?></span>
                <hr/>
                <img class="img-cover mb-4" src="<?php echo base_url($data->cover) ?>" style="width: 100%; object-fit: cover;" />
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
      <div class="col-sm-4 col-xs-10 right-panel" data-aos="fade-up" data-aos-delay="">
        <h5 class="mb-3">Terbaru</h5>

        <?php if (count($data_latest) > 0): ?>
        <?php foreach ($data_latest as $index => $item): ?>
        <div class="card mb-3" style="border: 0px;">
          <div class="card-body" style="padding: 0px;">
            <div class="media">
              <div class="media-body">
                <a href="<?php echo base_url('blog/'.$item->link) ?>"><?php echo $item->title ?></a>
              </div>
              <a href="<?php echo base_url('blog/'.$item->link) ?>">
                <img class="ml-3 img-panel" src="<?php echo base_url($item->cover) ?>" style="width: 80px; height: 55px; object-fit: cover;" />
              </a>
            </div>
          </div>
        </div>
        <?php endForeach; ?>
        <?php else: ?>
        <div class="nothing-found"><div>Nothing found</div></div>
        <?php endIf ?>
        
      </div>
    </div>
    
  </div>
</div>
