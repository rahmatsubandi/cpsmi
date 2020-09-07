<section id="contact">

  <?php if (count(array($data)) === 1) : ?>
    <div class="card probootstrap-animate" style="border: 0px;">
      <div class="card-body" style="padding: 0px;">
        <h4 class="title">Visi</h4>
        <div class="description">
          <?php echo (array($data->visi)) ? $data->visi : '-' ?>
        </div>
      </div>
    </div>

    <div class="card probootstrap-animate" style="border: 0px;">
      <div class="card-body" style="padding: 0px;">
        <h4 class="title">Misi</h4>
        <div class="description">
          <?php echo (array($data->misi)) ? $data->misi : '-' ?>
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

</section>