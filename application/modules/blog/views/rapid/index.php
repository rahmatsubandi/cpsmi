<!--==========================
	Blogs Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="blogs">
	<div class="container">

    <header class="section-header">
			<h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
		</header>
    
    <div class="body">

      <?php if (count($data) > 0): ?>
      <?php foreach ($data as $index => $item): ?>
      <div class="card">
        <div class="card-body">
          <div class="media">
            <div class="media-body">
              <a href="<?php echo base_url('blog/'.$item->link) ?>">
                <h3><?php echo $item->title ?></h3>
              </a>
              <span class="description"><?php echo date("d M Y", strtotime($item->created_at)) ?></span>
              <?php if ($item->is_comment == 1): ?>
              <span class="description text-hint">
                • <i class="zmdi zmdi-comments"></i> <?php echo $item->comment_count ?>
              </span>
              <?php endif; ?>
              <span class="description text-hint d-none d-sm-inline">
                • <?php echo $item->snippet ?>
              </span>
            </div>
            <a href="<?php echo base_url('blog/'.$item->link) ?>">
              <img class="ml-3 img" src="<?php echo base_url($item->cover) ?>" alt="" />
            </a>
          </div>
        </div>
      </div>
      <?php endForeach; ?>
      <?php else: ?>
      <div class="nothing-found"><div>No data found</div></div>
      <?php endIf; ?>

    </div>

    <div class="text-center" style="margin-top: 20px;">
      <?php echo $pagination ?>
    </div>

	</div>
</section><!-- #blogs -->
