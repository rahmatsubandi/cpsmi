<section id="moduleProduct">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
        <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
    
        <div class="table-action">
            <div class="buttons">
                <a href="<?php echo base_url('panel/moduleproduct/create/') ?>" class="btn btn--raised btn-primary btn--icon-text menu-action-add">
                    <i class="zmdi zmdi-plus"></i> Add New
                </a>
                <a href="<?php echo base_url('panel/moduleproduct/category/') ?>" class="btn btn--raised btn-success btn--icon-text">
                    Manage Category
                </a>
            </div>
        </div>
    
        <div class="table-responsive">
            <table id="table-moduleProduct" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th width="100">No</th>
                        <th>Name</th>
                        <th width="150">Price (IDR)</th>
                        <th width="150">Stock</th>
                        <th width="150">Sold Out</th>
                        <th width="120">Visit Count</th>
                        <th width="200">Created</th>
                        <th width="100"></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
    </div>
</section>
