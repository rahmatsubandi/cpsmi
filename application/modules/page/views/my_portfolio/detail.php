<section id="blogs" class="blogs-detail mt-5">
	<div class="container">
    <div class="body">

      <div class="row">
        <div class="col-sm-12 col-xs-10">
          <div class="card" style="border: 0px;">
            <div class="card-body" style="padding: 0px;">
              <div class="media">
                <div class="media-body">
                  <h4><?php echo $data->title ?></h4>
                  <span class="description text-hint"><?php echo date("d M Y • H:i:s", strtotime($data->created_at)) ?></span>
                  <hr/>
                  <?php if (!empty($data->cover)): ?>
                  <img class="img-cover" src="<?php echo base_url($data->cover) ?>" />
                  <?php endif; ?>
                  <?php echo $data->content ?>
                </div>
              </div>
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
