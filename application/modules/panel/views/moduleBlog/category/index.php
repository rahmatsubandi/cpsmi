<section id="blogCategory">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">
            <a href="<?php echo base_url('panel/moduleblog/') ?>" title="Back" style="color: #333;">
                <i class="zmdi zmdi-arrow-left"></i>
            </a>
            <?php echo (isset($card_title)) ? $card_title : '' ?>
        </h4>
        <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
    
        <div class="table-action">
            <div class="buttons">
                <button class="btn btn--raised btn-primary btn--icon-text category-action-add" data-toggle="modal" data-target="#modal-form-blogCategory">
                    <i class="zmdi zmdi-plus"></i> Add New
                </button>
            </div>
        </div>
    
        <?php include_once('form.php') ?>
    
        <div class="table-responsive">
            <table id="table-blogCategory" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th width="100">No</th>
                        <th>Name</th>
                        <th width="100"></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
    </div>
</section>
