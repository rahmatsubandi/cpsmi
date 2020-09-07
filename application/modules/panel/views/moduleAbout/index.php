<section id="moduleAbout">
    <div class="card">
      <div class="card-body">

        <form id="form-moduleAbout" enctype="multipart/form-data">

            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
                    <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
                    <div class="clear-card"></div>
                </div>
                <div class="col-xs-10 col-sm-2">
                    <button class="btn btn--raised btn-primary btn--icon-text btn-block page-action-save spinner-action-button">
                        Save Changes
                        <div class="spinner-action"></div>
                    </button>
                    <div class="clear-card"></div>
                </div>
            </div>
            <div class="clear-card"></div>
            
            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <textarea name="content" class="tinymce-init about-content"><?php echo $data->content ?></textarea>
                    <div class="clear-card d-block d-sm-none"></div>
                </div>
                <div class="col-xs-10 col-md-2">
                    <div class="upload">
                        <div class="upload-button">
                            <input type="file" name="image" class="upload-pure-button about-image"/>
                        </div>
                        <div class="upload-preview">
                            <img src="<?php echo base_url($data->image) ?>"/>
                        </div>
                    </div>

                    <div class="clear-card"></div>

                    <div class="tags">
                        <a href="<?php echo base_url('about/') ?>" target="_blank"><?php echo base_url('about/') ?></a>
                    </div>
                </div>
            </div>

        </form>

      </div>
    </div>
</section>
