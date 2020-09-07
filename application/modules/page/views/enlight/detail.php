<section class="probootstrap-animate">

  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="card" style="border: 0px;">
        <div class="card-body" style="padding: 0px;">
          <div class="media">
            <div class="media-body">
              <h4 style="margin-bottom: 0px;"><?php echo $data->title ?></h4>
              <div style="margin-bottom: 20px;"><?php echo date("d M Y • H:i:s", strtotime($data->created_at)) ?></div>
              <hr/>
              <?php if (!empty($data->cover)): ?>
              <img class="img-cover" src="<?php echo base_url($data->cover) ?>" />
              <?php endif; ?>
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
  </div>

</section>
