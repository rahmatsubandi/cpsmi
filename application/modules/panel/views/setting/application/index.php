<style type="text/css">
    .upload-preview img {
        width: auto !important;
        min-width: 80px;
        max-width: 100%;
    }
</style>

<section id="setting" class="content__inner">
    <div class="card">
      <div class="card-body">

        <form id="form-setting-application" enctype="multipart/form-data">

            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
                    <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
                    <div class="clear-card"></div>
                </div>
            </div>
            <div class="clear-card"></div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>App Name</label>
                        <input
                            type="text"
                            name="app_name"
                            class="form-control setting-app_name"
                            placeholder="App Name"
                            value="<?php echo (isset($app->app_name)) ? $app->app_name : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Favicon</label>
                        <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="Size recommended: 16 x 16 (px)">
                        <span class="zmdi zmdi-help"></span>
                        </a>
                        <div class="upload-inline">
                            <div class="upload-button">
                                <input type="file" name="app_favicon" class="upload-pure-button setting-app_favicon"/>
                            </div>
                            <div class="upload-preview">
                                <?php if (!empty($app->app_favicon)): ?>
                                <img src="<?php echo base_url($app->app_favicon) ?>"/>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>App Version</label>
                        <input
                            type="text"
                            name="app_version"
                            class="form-control setting-app_version"
                            placeholder="App Version"
                            value="<?php echo (isset($app->app_version)) ? $app->app_version : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>App Description</label>
                        <input
                            type="text"
                            name="app_description"
                            class="form-control setting-app_description"
                            placeholder="App Name"
                            maxlength="255"
                            value="<?php echo (isset($app->app_description)) ? $app->app_description : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>App Slogan</label>
                        <input
                            type="text"
                            name="app_slogan"
                            class="form-control setting-app_slogan"
                            placeholder="App Name"
                            maxlength="150"
                            value="<?php echo (isset($app->app_slogan)) ? html_escape($app->app_slogan) : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Template Backend</label>
                        <div class="position-relative">
                            <input
                                type="text"
                                name="template_backend"
                                class="form-control setting-template_backend"
                                placeholder="App Version"
                                value="<?php echo (isset($app->template_backend)) ? $app->template_backend : '' ?>"
                                readonly
                            />
                            <i class="form-group__bar"></i>
                        </div>
                        <small class="form-text text-muted">
                            Available: material_admin
                        </small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Theme Color</label>
                        <div class="select">
                            <select name="theme_color" class="form-control setting-theme_color" data-placeholder="Select a color">
                                <?php
                                    $colors = array(
                                        'green' => 'Green',
                                        'blue' => 'Blue',
                                        'red' => 'Red',
                                        'orange' => 'Orange',
                                        'teal' => 'Teal',
                                        'cyan' => 'Cyan',
                                        'blue-grey' => 'Blue Grey',
                                        'purple' => 'Purple',
                                        'indigo' => 'Indigo',
                                        'brown' => 'Brown'
                                    );
                                    foreach ($colors as $key => $item) {
                                        $isSelected = ($key == $app->theme_color) ? 'selected' : '';
                                        echo '<option value="'.$key.'" '.$isSelected.'>'.$item.'</option>';
                                    };
                                ?>
                            </select>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>
            </div>

            <small class="form-text text-muted">
                Fields with red stars (<label required></label>) are required.
            </small>
            
            <div class="row" style="margin-top: 2rem;">
                <div class="col-xs-10 col-md-2">
                    <button class="btn btn--raised btn-primary btn--icon-text btn-block page-action-save-application spinner-action-button">
                        Save Changes
                        <div class="spinner-action"></div>
                    </button>
                </div>
            </div>

        </form>

      </div>
    </div>
</section>
