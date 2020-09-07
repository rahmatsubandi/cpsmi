<div class="modal fade" id="modal-form-moduleFaq" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">FAQ</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <form id="form-moduleFaq">

          <div class="form-group">
            <label required>Question</label>
            <input type="text" name="question" class="form-control faq-question" placeholder="Question" required>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Answer</label>
            <textarea name="answer" class="form-control textarea-autosize faq-answer" placeholder="Answer" style="resize: vertical;"></textarea>
            <i class="form-group__bar"></i>
          </div>

          <div class="form-group">
            <label required>Is Active?</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn option-is_active faq-option-is_active-yes active">
                <input
                  type="radio"
                  name="is_active"
                  value="1"
                  class="faq-is_active faq-is_active-yes"
                  autocomplete="off"
                  checked
                /> Yes
              </label>
              <label class="btn option-is_active faq-option-is_active-no">
                <input
                  type="radio"
                  name="is_active"
                  value="0"
                  class="faq-is_active faq-is_active-no"
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
        <button type="button" class="btn btn-success btn--icon-text faq-action-save">
          <i class="zmdi zmdi-save"></i> Save
        </button>
        <button type="button" class="btn btn-light btn--icon-text faq-action-cancel" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
