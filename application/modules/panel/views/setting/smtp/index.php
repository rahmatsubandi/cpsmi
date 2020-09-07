<section id="setting">
    <div class="card">
      <div class="card-body">

        <form id="form-setting-smtp" enctype="multipart/form-data">

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
                        <label required>User</label>
                        <input
                            type="text"
                            name="smtp_user"
                            class="form-control setting-smtp_user"
                            placeholder="User"
                            value="<?php echo (isset($app->smtp_user)) ? $app->smtp_user : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Password</label>
                        <input
                            type="password"
                            name="smtp_pass"
                            class="form-control setting-smtp_pass"
                            placeholder=Password"
                            value="<?php echo (isset($app->smtp_pass)) ? $app->smtp_pass : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Protocol</label>
                        <input
                            type="text"
                            name="smtp_protocol"
                            class="form-control setting-smtp_protocol"
                            placeholder="Protocol"
                            value="<?php echo (isset($app->smtp_protocol)) ? $app->smtp_protocol : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Host</label>
                        <input
                            type="text"
                            name="smtp_host"
                            class="form-control setting-smtp_host"
                            placeholder="Host"
                            value="<?php echo (isset($app->smtp_host)) ? $app->smtp_host : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Port</label>
                        <input
                            type="text"
                            name="smtp_port"
                            class="form-control setting-smtp_port"
                            placeholder="Port"
                            value="<?php echo (isset($app->smtp_port)) ? $app->smtp_port : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Crypto</label>
                        <input
                            type="text"
                            name="smtp_crypto"
                            class="form-control setting-smtp_crypto"
                            placeholder="Crypto"
                            value="<?php echo (isset($app->smtp_crypto)) ? $app->smtp_crypto : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Mailtype</label>
                        <input
                            type="text"
                            name="smtp_mailtype"
                            class="form-control setting-smtp_mailtype"
                            placeholder="Mailtype"
                            value="<?php echo (isset($app->smtp_mailtype)) ? $app->smtp_mailtype : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Charset</label>
                        <input
                            type="text"
                            name="smtp_charset"
                            class="form-control setting-smtp_charset"
                            placeholder="Charset"
                            value="<?php echo (isset($app->smtp_charset)) ? $app->smtp_charset : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <small class="form-text text-muted">
                Fields with red stars (<label required></label>) are required.
            </small>
            
            <div class="row" style="margin-top: 2rem;">
                <div class="col-xs-10 col-md-2">
                    <button class="btn btn--raised btn-primary btn--icon-text btn-block page-action-save-smtp spinner-action-button">
                        Save Changes
                        <div class="spinner-action"></div>
                    </button>
                </div>
            </div>

        </form>

      </div>
    </div>
</section>
