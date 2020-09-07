<div class="content__inner">
    <header class="content__title">
        <h1>Search Results</h1>
        <small><?php echo ((int) count($blogs)) + (int) count($pages) ?> results found for '<?php echo $keyword ?>'</small>
    </header>

    <div class="card results">

        <div class="tab-container">
            <div class="results__header" style="margin-bottom: .50rem;">
                <div class="results__search">
                    <form class="search" method="post" action="<?php echo base_url('panel/search/q/') ?>">
                        <input name="app_search" type="text" placeholder="Search again...">
                    </form>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#sr-blog" role="tab">Blog (<?php echo count($blogs) ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#sr-page" role="tab">Page (<?php echo count($pages) ?>)</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" style="padding: 0px;">
                <div class="tab-pane active fade show" id="sr-blog" role="tabpanel">
                    <?php if (count($blogs) > 0): ?>
                    <div class="listview listview--bordered listview--hover">
                        <?php foreach ($blogs as $item): ?>
                        <a class="listview__item" href="<?php echo base_url('blog/'.$item->link) ?>" target="_blank">
                            <div class="listview__content">
                                <div class="listview__heading"><?php echo $item->title ?></div>
                                <p>
                                    <i class="zmdi zmdi-time"></i> <?php echo $item->created_at ?>
                                    &nbsp;&nbsp;&nbsp;
                                    <i class="zmdi zmdi-eye"></i> <?php echo $item->visit_count ?>
                                </p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <div style="padding: 1.25rem 2.2rem; font-style: italic;">No data found</div>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="sr-page" role="tabpanel">
                    <?php if (count($pages) > 0): ?>
                    <div class="listview listview--bordered listview--hover">
                        <?php foreach ($pages as $item): ?>
                        <a class="listview__item" href="<?php echo base_url('page/'.$item->link) ?>" target="_blank">
                            <div class="listview__content">
                                <div class="listview__heading"><?php echo $item->title ?></div>
                                <p>
                                    <i class="zmdi zmdi-time"></i> <?php echo $item->created_at ?>
                                    &nbsp;&nbsp;&nbsp;
                                    <i class="zmdi zmdi-eye"></i> <?php echo $item->visit_count ?>
                                </p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <div style="padding: 1.25rem 2.2rem; font-style: italic;">No data found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
