<!--==========================
	Blogs Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="blogs" class="blogs-detail">
	<div class="container">
    <div class="body">

      <div class="row">
        <div class="col-sm-8 col-xs-10">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h4><?php echo $data->title ?></h4>
                  <span class="description text-hint"><?php echo date("d M Y • H:i:s", strtotime($data->created_at)) ?></span>
                  <hr/>
                  <img class="img-cover" src="<?php echo base_url($data->cover) ?>" />
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
        <div class="col-sm-4 col-xs-10 right-panel">
          <h5>Terbaru</h5>

          <?php if (count($data_latest) > 0): ?>
          <?php foreach ($data_latest as $index => $item): ?>
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <a href="<?php echo base_url('blog/'.$item->link) ?>"><?php echo $item->title ?></a>
                </div>
                <a href="<?php echo base_url('blog/'.$item->link) ?>">
                  <img class="ml-3 img-panel" src="<?php echo base_url($item->cover) ?>" />
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
</section><!-- #blogs -->
