<section id="setting" class="content__inner">
    <div class="card">
      <div class="card-body">

        <form id="form-setting-account" enctype="multipart/form-data">

            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
                    <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
                    <div class="clear-card"></div>
                </div>
            </div>
            <div class="clear-card"></div>

            <input type="hidden" name="username" value="<?php echo $this->session->userdata('user')['username'] ?>" readonly/>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Old Password</label>
                        <input
                            type="password"
                            name="old_password"
                            class="form-control setting-old_password"
                            placeholder="Old Password"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>New Password</label>
                        <input
                            type="password"
                            name="new_password"
                            class="form-control setting-new_password"
                            placeholder="New Password"
                        />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-md-4">
                    <div class="form-group">
                        <label required>Confirm Password</label>
                        <input
                            type="password"
                            name="confirm_password"
                            class="form-control setting-confirm_password"
                            placeholder="Confirm Password"
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
                    <button class="btn btn--raised btn-primary btn--icon-text btn-block page-action-save-account spinner-action-button">
                        Save Changes
                        <div class="spinner-action"></div>
                    </button>
                </div>
            </div>

        </form>

      </div>
    </div>
</section>
