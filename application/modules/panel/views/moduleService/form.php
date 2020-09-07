<div class="modal fade" id="modal-form-moduleService" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Service</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-moduleService">

          <div class="form-group">
            <label required>Name</label>
            <input type="text" name="name" class="form-control service-name" maxlength="200" style="text-transform: capitalize;" placeholder="Name" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Icon</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">zmdi</span>
              </div>
              <input
                type="text"
                name="icon"
                class="form-control service-icon"
                placeholder="Ex. zmdi-stackoverflow"
              />
              <i class="form-group__bar"></i>
            </div>
            <small class="form-text text-muted">
              See more icon from
              <a href="https://zavoloklom.github.io/material-design-iconic-font/icons.html" target="_blank">
                Material Design Iconic Font
              </a>
            </small>
          </div>

          <div class="form-group">
            <label required>Icon Color</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">#</span>
              </div>
              <input
                type="text"
                name="icon_color"
                class="form-control service-icon_color"
                placeholder="Ex. fff0da"
              />
              <i class="form-group__bar"></i>
            </div>
            <small class="form-text text-muted">
              See more color from
              <a href="https://www.materialui.co/colors" target="_blank">
                Material UI
              </a>
            </small>
          </div>

          <div class="form-group">
            <label required>Background Color</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">#</span>
              </div>
              <input
                type="text"
                name="background_color"
                class="form-control service-background_color"
                placeholder="Ex. fff0da"
              />
              <i class="form-group__bar"></i>
            </div>
            <small class="form-text text-muted">
              See more color from
              <a href="https://www.materialui.co/colors" target="_blank">
                Material UI
              </a>
            </small>
          </div>

          <div class="form-group">
            <label required>Description</label>
            <textarea name="description" class="form-control textarea-autosize service-description" placeholder="Description"></textarea>
            <i class="form-group__bar"></i>
          </div>

          <small class="form-text text-muted">
            Fields with red stars (<label required></label>) are required.
          </small>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text service-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text service-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
