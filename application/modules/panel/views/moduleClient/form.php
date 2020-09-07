<div class="modal fade" id="modal-form-moduleClient" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Client</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-moduleClient">

          <div class="form-group">
            <label required>Name</label>
            <input type="text" name="name" class="form-control client-name" placeholder="Name" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Link</label>
            <input type="text" name="link" class="form-control client-link" placeholder="Link">
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Logo</label>
            <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="Size recommended: 150 x 50 (px)">
              <span class="zmdi zmdi-help"></span>
            </a>
            <div class="upload-inline">
              <div class="upload-button">
                <input type="file" name="logo" class="upload-pure-button client-logo"/>
              </div>
              <div class="upload-preview"></div>
            </div>
          </div>

          <small class="form-text text-muted">
            Fields with red stars (<label required></label>) are required.
          </small>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text client-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text client-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
