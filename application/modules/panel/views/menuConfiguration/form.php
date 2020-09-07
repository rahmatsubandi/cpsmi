<div class="modal fade" id="modal-form-menuConfiguration" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Menu</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-menuConfiguration">

          <div class="form-group">
            <label required>Parent</label>
            <div class="select">
              <select name="parent_id" class="form-control menu-parent_id">
                <option value="0">(Empty)</option>
              </select>
              <i class="form-group__bar"></i>
            </div>
          </div>

          <div class="form-group">
            <label required>Name</label>
            <input type="text" name="name" class="form-control menu-name" placeholder="Name" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Link</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <input type="checkbox" name="link_tobase" value="1" class="menu-link_tobase" style="margin-right: 5px;" checked>
                  <span class="menu-data-link_tobase"><?php echo base_url() ?></span>
                </span>
              </div>
              <input type="text" name="link" class="form-control mask-link menu-link" placeholder="Link">
              <i class="form-group__bar"></i>
            </div>
          </div>

          <div class="form-group">
            <label required>Open In New Tab?</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn option-is_newtab">
                <input type="radio" name="is_newtab" value="1" class="menu-is_newtab" autocomplete="off"> Yes
              </label>
              <label class="btn option-is_newtab active">
                <input type="radio" name="is_newtab" value="0" class="menu-is_newtab" autocomplete="off" checked> No
              </label>
            </div>
          </div>

          <div class="form-group">
            <label required>Order</label>
            <input type="number" name="order_pos" value="1" class="form-control menu-order_pos" placeholder="Order" required>
            <i class="form-group__bar"></i>
          </div>

          <small class="form-text text-muted">
            Fields with red stars (<label required></label>) are required.
          </small>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text menu-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text menu-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
