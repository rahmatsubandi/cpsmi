<!--==========================
	Frequently Asked Questions Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="contact">
  <div class="container">

    <header class="section-header">
      <h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
    </header>

    <?php if (count(array($data)) === 1) : ?>
      <div class="card">
        <div class="card-body">
          <h4 class="title">Visi</h4>
          <div class="description">
            <?php echo (isset($data->visi)) ? $data->visi : '-' ?>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h4 class="title">Misi</h4>
          <div class="description">
            <?php echo (isset($data->misi)) ? $data->misi : '-' ?>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    <?php else : ?>
      <div class="nothing-found">
        <div>No data found</div>
      </div>
      <div class="clearfix"></div>
    <?php endif; ?>


  </div>
</section><!-- #faq -->