<section id="moduleFaq">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
        <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
    
        <div class="table-action">
            <div class="buttons">
                <button class="btn btn--raised btn-primary btn--icon-text faq-action-add" data-toggle="modal" data-target="#modal-form-moduleFaq">
                    <i class="zmdi zmdi-plus"></i> Add New
                </button>
            </div>
        </div>
    
        <?php include_once('form.php') ?>
    
        <div class="table-responsive">
            <table id="table-moduleFaq" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th width="100">No</th>
                        <th width="30%">Question</th>
                        <th>Answer</th>
                        <th width="100">Is Active</th>
                        <th width="200">Created</th>
                        <th width="100"></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
    </div>
</section>
