<style type="text/css">
    .clearfix {
        height: 15px;
    }
    .theme-active {
        border: 1px solid green !important;
    }
    .theme-item {
        border: 1px solid #ddd;
    }
    .theme-item:hover {
        border: 1px solid #999;
        cursor: pointer;
    }
    .theme-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }
    .theme-item .description {
        padding: 15px;
        overflow: hidden;
    }
    .theme-item .description h2 {
        width: 100%;
        height: 20px;
        font-size: 18px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .theme-item .description h6 {
        font-size: 13px;
    }
    .theme-item .description .btn-select {
        float: right;
        margin-top: -22px;
    }
</style>

<section id="theme">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
        <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>

        <?php include_once('detail.php') ?>

        <div class="clearfix"></div>
        <?php if (count($data) > 0): ?>
        <div class="row">
            <?php foreach ($data as $item): ?>
            <div class="col-md-3 col-xs-10">
                <div class="theme-item <?php echo ($item['path'] == $app->template_frontend) ? 'theme-active' : '' ?>" data-theme="<?php echo $item['path'] ?>" data-isactive="<?php echo ($item['path'] == $app->template_frontend) ? 'yes' : 'no' ?>">
                    <img src="<?php echo $item['screenshot'][0] ?>" />
                    <div class="description">
                        <h2><?php echo $item['name'] ?></h2>
                        <h6><?php echo ($item['path'] == $app->template_frontend) ? '<span style="color: green;">Active</span>' : '<span style="color: #999;">Not Active</span>' ?></h6>
                        <?php if ($item['path'] != $app->template_frontend): ?>
                        <a href="javascript:;" class="btn btn-success btn-sm btn-select theme-action-select" data-path="<?php echo $item['path'] ?>">
                            Select
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        No theme available.
        <?php endif; ?>

      </div>
    </div>
</section>
