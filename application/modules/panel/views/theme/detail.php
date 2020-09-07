<style type="text/css">
  #modal-detail-theme .screenshot {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border: 1px solid #eee;
  }
  #modal-detail-theme .screenshot img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    object-position: 100% 0%;
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px;
  }
  #modal-detail-theme .screenshot-list img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    object-position: center top;
    border: 1px solid #ddd;
    margin-right: 10px;
  }
  #modal-detail-theme .screenshot-list img:hover {
    border: 1px solid #999;
  }
  #modal-detail-theme .description {
    padding-top: 10px;
  }
  #modal-detail-theme .description .name {
    width: 100%;
    height: 30px;
    font-size: 18px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  #modal-detail-theme .description .publisher {
    font-size: 13px;
  }
  #modal-detail-theme .description .status {
    font-size: 13px;
  }
</style>

<div class="modal fade" id="modal-detail-theme" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Detail</h5>
      </div>
      <div class="spinner">
        <div class="lds-hourglass"></div>
      </div>
      <div class="modal-body">
        <div class="screenshot">
          <div class="screenshot-active"></div>
          <div class="screenshot-list"></div>
        </div>
        <div class="description">
          <div class="name">-</div>
          <div class="publisher">-</div>
          <div class="status">-</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn--icon-text theme-action-active">
          <i class="zmdi zmdi-save"></i> Set Active
        </button>
        <button type="button" class="btn btn-light btn--icon-text theme-action-cancel" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
