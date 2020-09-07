<div class="container">

  <?php if (count($data) > 0): ?>
  <?php foreach ($data as $index => $item): ?>
  <div class="card mb-4" style="border: 0px; border-bottom: 1px solid #eee; padding-bottom: 15px;" data-aos="fade-up" data-aos-delay="">
    <div class="card-body" style="padding: 0px;">
      <div class="media">
        <div class="media-body">
          <a href="<?php echo base_url('blog/'.$item->link) ?>">
            <h5><?php echo $item->title ?></h5>
          </a>
          <span class="description"><?php echo date("d M Y", strtotime($item->created_at)) ?></span>
          <span class="description text-hint d-none d-sm-inline" style="color: #555;">
            • <?php echo $item->snippet ?>
            <a href="<?php echo base_url('blog/'.$item->link) ?>">
              <i>Read more...</i>
            </a>
          </span>
        </div>
        <a href="<?php echo base_url('blog/'.$item->link) ?>">
          <img class="ml-3 img" src="<?php echo base_url($item->cover) ?>" alt="" style="width: 200px; height: 105px; object-fit: cover;" />
        </a>
      </div>
    </div>
  </div>
  <?php endForeach; ?>
  <?php else: ?>
  <div class="nothing-found"><div>No data found</div></div>
  <?php endIf; ?>

  <div class="text-center" data-aos="fade-up" data-aos-delay="">
    <?php echo $pagination ?>
  </div>

</div>
