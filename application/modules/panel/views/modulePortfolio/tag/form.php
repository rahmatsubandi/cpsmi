<div class="modal fade" id="modal-form-portfolioTag" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Tag</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-portfolioTag">

          <div class="form-group">
            <label required>Name</label>
            <input type="text" name="name" class="form-control tag-name" maxlength="100" style="text-transform: capitalize;" placeholder="Name" required>
            <i class="form-group__bar"></i>
          </div>

          <small class="form-text text-muted">
            Fields with red stars (<label required></label>) are required.
          </small>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text tag-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text tag-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
