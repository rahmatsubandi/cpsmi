<div class="modal fade" id="modal-form-settingUser" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">User</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-settingUser">

          <div class="form-group">
            <label required>Full Name</label>
            <input type="text" name="full_name" class="form-control settingUser-full_name" placeholder="Full Name" maxlength="100" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Username</label>
            <input type="text" name="username" class="form-control settingUser-username" placeholder="Username" maxlength="100" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label class="settingUser-password-label" required>New Password</label>
            <input type="password" name="password" class="form-control settingUser-password" placeholder="New Password" maxlength="150">
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label>Profile Photo</label>
            <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="Size recommended: 300 x 300 (px)">
              <span class="zmdi zmdi-help"></span>
            </a>
            <div class="upload-inline">
              <div class="upload-button">
                <input type="file" name="profile_photo" class="upload-pure-button settingUser-profile_photo"/>
              </div>
              <div class="upload-preview"></div>
            </div>
          </div>

          <div class="form-group">
            <label required>Is Active?</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn option-is_active settingUser-option-is_active-yes active">
                <input
                  type="radio"
                  name="is_active"
                  value="1"
                  class="settingUser-is_active settingUser-is_active-yes"
                  autocomplete="off"
                  checked
                /> Yes
              </label>
              <label class="btn option-is_active settingUser-option-is_active-no">
                <input
                  type="radio"
                  name="is_active"
                  value="0"
                  class="settingUser-is_active settingUser-is_active-no"
                  autocomplete="off"
                /> No
              </label>
            </div>
          </div>

          <small class="form-text text-muted">
            Fields with red stars (<label required></label>) are required.
          </small>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text settingUser-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text settingUser-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
