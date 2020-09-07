<?php include_once('header.php') ?>

<main id="main">

  <?php if (!in_array($this->router->fetch_class(), ['dashboard', 'page'])): ?>
  <div class="site-section pt-5 pb-0">
    <div class="container">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6" data-aos="fade-up">
          <h2><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h2>
          <?php if (!empty($app->active_module->description)): ?>
          <p><?php echo $app->active_module->description ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="site-section pt-0 pb-5">
    {content}
  </div>
</main>

<?php include_once('footer.php') ?>
