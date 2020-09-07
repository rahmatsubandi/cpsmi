<div class="modal fade" id="modal-form-moduleTestimonial" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Testimonial</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-moduleTestimonial">

          <div class="form-group">
            <label required>Creator Name</label>
            <input type="text" name="creator_name" class="form-control testimonial-creator_name" placeholder="Creator Name" maxlength="200" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Creator Job</label>
            <input type="text" name="job" class="form-control testimonial-job" placeholder="Creator Job" maxlength="200" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label>Creator Link</label>
            <input type="text" name="creator_link" class="form-control testimonial-creator_link" placeholder="http://" maxlength="200">
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Content</label>
            <textarea name="content" class="form-control textarea-autosize testimonial-content" placeholder="Content"></textarea>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Creator Poho</label>
            <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="Size recommended: 60 x 60 (px)">
              <span class="zmdi zmdi-help"></span>
            </a>
            <div class="upload-inline">
              <div class="upload-button">
                <input type="file" name="creator_photo" class="upload-pure-button testimonial-creator_photo" data-preview="creator_photo"/>
              </div>
              <div class="upload-preview preview-creator_photo"></div>
            </div>
          </div>

          <div class="form-group">
            <label>Screenshot</label>
            <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="Size recommended: 60 x 60 (px)">
              <span class="zmdi zmdi-help"></span>
            </a>
            <div class="upload-inline">
              <div class="upload-button">
                <input type="file" name="screenshot" class="upload-pure-button testimonial-screenshot" data-preview="screenshot"/>
              </div>
              <div class="upload-preview preview-screenshot"></div>
            </div>
          </div>

          <small class="form-text text-muted">
            Fields with red stars (<label required></label>) are required.
          </small>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text testimonial-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text testimonial-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
