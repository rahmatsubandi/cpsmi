<section id="moduleDashboard">
    <div class="card">
      <div class="card-body">

        <form id="form-moduleDashboard" enctype="multipart/form-data">

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
                    <textarea name="intro" class="tinymce-init dashboard-intro"><?php echo $data->intro ?></textarea>
                    <div class="clear-card d-block d-sm-none"></div>
                </div>
                <div class="col-xs-10 col-md-2">
                    <div class="upload">
                        <span>Background Image</span>
                        <div class="upload-button">
                            <input type="file" name="background_image" class="upload-pure-button dashboard-background_image" data-preview="background_image"/>
                        </div>
                        <div class="upload-preview preview-background_image">
                            <img src="<?php echo base_url($data->background_image) ?>"/>
                        </div>
                    </div>

                    <div class="clear-card"></div>

                    <div class="upload">
                        <span>Intro Image</span>
                        <div class="upload-button">
                            <input type="file" name="intro_image" class="upload-pure-button dashboard-intro_image" data-preview="intro_image"/>
                        </div>
                        <div class="upload-preview preview-intro_image">
                            <img src="<?php echo base_url($data->intro_image) ?>"/>
                        </div>
                    </div>
                </div>
            </div>

        </form>

      </div>
    </div>
</section>
