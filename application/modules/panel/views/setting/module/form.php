<div class="modal fade" id="modal-form-settingModule" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Module</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-settingModule">

          <div class="form-group">
            <label required>Name</label>
            <input type="text" name="name" class="form-control settingModule-name" placeholder="Name" maxlength="100" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Path</label>
            <input type="text" name="path" class="form-control settingModule-path" placeholder="Path" maxlength="255" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control textarea-autosize settingModule-description" placeholder="Description"></textarea>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Is Active?</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn option-is_active settingModule-option-is_active-yes active">
                <input
                  type="radio"
                  name="is_active"
                  value="1"
                  class="settingModule-is_active settingModule-is_active-yes"
                  autocomplete="off"
                  checked
                /> Yes
              </label>
              <label class="btn option-is_active settingModule-option-is_active-no">
                <input
                  type="radio"
                  name="is_active"
                  value="0"
                  class="settingModule-is_active settingModule-is_active-no"
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
        <button type="button" class="btn btn-success btn--icon-text settingModule-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text settingModule-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
