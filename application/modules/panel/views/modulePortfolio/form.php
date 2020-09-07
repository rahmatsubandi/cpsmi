<div class="modal fade" id="modal-form-modulePortfolio" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Portfolio</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-modulePortfolio">

          <div class="form-group">
            <label required>Tag</label>
            <div class="select">
              <select name="portfolio_tag_id" class="form-control portfolio-portfolio_tag_id">
                <option value="">(Empty)</option>
                <?php
                  if (count($data_portfolio_tag) > 0) {
                    $portfolio = '';
                    foreach ($data_portfolio_tag as $index => $item) {
                      $portfolio .= '<option value="'.$item->id.'">'.$item->name.'</option>';
                    };
                    echo $portfolio;
                  };
                ?>
              </select>
              <i class="form-group__bar"></i>
            </div>
          </div>

          <div class="form-group">
            <label required>Name</label>
            <input type="text" name="name" class="form-control portfolio-name" placeholder="Name" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label>External Link</label>
            <input type="text" name="external_link" class="form-control portfolio-external_link" placeholder="http://">
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Image</label>
            <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="File size recommended: under 300KB">
              <span class="zmdi zmdi-help"></span>
            </a>
            <div class="upload-inline">
              <div class="upload-button">
                <input type="file" name="image" class="upload-pure-button portfolio-image"/>
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
        <button type="button" class="btn btn-success btn--icon-text portfolio-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text portfolio-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
