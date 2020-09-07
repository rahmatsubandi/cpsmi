<div class="row stats">
    <div class="col-sm-6 col-md-3">
        <div class="stats__item">
            <div class="stats__chart bg-teal">
                <div class="flot-chart flot-chart--xs stats-chart-1"></div>
            </div>

            <div class="stats__info">
                <div>
                    <h2><?php echo number_format($statistic->website_impression) ?></h2>
                    <small>Total Pageviews</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="stats__item">
            <div class="stats__chart bg-amber">
                <div class="flot-chart flot-chart--xs stats-chart-2"></div>
            </div>

            <div class="stats__info">
                <div>
                    <h2><?php echo number_format($statistic->website_traffic) ?></h2>
                    <small>Total Website Impressions</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="stats__item">
            <div class="stats__chart bg-purple">
                <div class="flot-chart flot-chart--xs stats-chart-3"></div>
            </div>

            <div class="stats__info">
                <div>
                    <h2><?php echo number_format($statistic->traffic_today) ?></h2>
                    <small>Pageviews Today</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="stats__item">
            <div class="stats__chart bg-red">
                <div class="flot-chart flot-chart--xs stats-chart-4"></div>
            </div>

            <div class="stats__info">
                <div>
                    <h2><?php echo number_format($statistic->traffic_yesterday) ?></h2>
                    <small>Pageviews Yesterday</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div data-columns>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Page Views</h4>
            <h6 class="card-subtitle">The data shown is the last two years</h6>

            <div class="sp-chart-loader" style="display: none;">
                <div style="text-align: center;"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
            </div>
            <div class="flot-chart sp-chart"></div>
            <div class="flot-chart-legends sp-chart-legends--line"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Blog Rank</h4>
            <h6 class="card-subtitle">Showing data with the most views</h6>
        </div>

        <div class="listview listview--hover">
            <?php if (count($blog_rank) > 0): ?>
            <?php foreach ($blog_rank as $item): ?>
            <?php $blogCover = (!empty($item->cover)) ? base_url($item->cover) : base_url('directory/theme/no-image.png') ?>
            <a class="listview__item" href="<?php echo base_url('blog/'.$item->link) ?>" target="_blank">
                <img src="<?php echo $blogCover ?>" class="listview__img" style="width: 3rem; height: 3rem; object-fit: cover;">
                <div class="listview__content">
                    <div class="listview__heading"><?php echo $item->title ?></div>
                    <p style="font-size: 11px;"><i class="zmdi zmdi-time"></i> <?php echo $item->created_at ?></p>
                </div>
                <span style="font-size: 20px; padding-left: 10px;"><?php echo number_format($item->visit_count) ?></span>
            </a>
            <?php endforeach; ?>

            <a href="<?php echo base_url('panel/moduleblog/') ?>" class="view-more">View All Posts</a>
            <?php else: ?>
                <a class="listview__item">
                <div class="listview__content">
                    <i>No data found.</i>
                </div>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Page Rank</h4>
            <h6 class="card-subtitle">Showing data with the most views</h6>
        </div>

        <div class="listview listview--hover">
            <?php if (count($page_rank) > 0): ?>
            <?php foreach ($page_rank as $item): ?>
            <?php $pageCover = (!empty($item->cover)) ? base_url($item->cover) : base_url('directory/theme/no-image.png') ?>
            <a class="listview__item" href="<?php echo base_url('page/'.$item->link) ?>" target="_blank">
                <img src="<?php echo $pageCover ?>" class="listview__img" style="width: 3rem; height: 3rem; object-fit: cover;">
                <div class="listview__content">
                    <div class="listview__heading"><?php echo $item->title ?></div>
                    <p style="font-size: 11px;"><i class="zmdi zmdi-time"></i> <?php echo $item->created_at ?></p>
                </div>
                <span style="font-size: 20px; padding-left: 10px;"><?php echo number_format($item->visit_count) ?></span>
            </a>
            <?php endforeach; ?>

            <a href="<?php echo base_url('panel/page/') ?>" class="view-more">View All Posts</a>
            <?php else: ?>
                <a class="listview__item">
                <div class="listview__content">
                    <i>No data found.</i>
                </div>
                </a>
            <?php endif; ?>
        </div>
    </div>

</div>
