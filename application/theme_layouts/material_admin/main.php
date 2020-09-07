<?php include_once('header.php') ?>

<section class="content">
    <?php if (isset($page_title) && !empty($page_title) && !is_null($page_title)): ?>
    <header class="content__title">
        <h1><?php echo $page_title ?></h1>
        
        <?php if (isset($page_subTitle) && !empty($page_subTitle) && !is_null($page_subTitle)): ?>
        <small><?php echo $page_subTitle ?></small>
        <?php endIf; ?>
    </header>
    <?php endIf; ?>

    {content}

    <?php include_once('footerCredit.php') ?>
</section>

<?php include_once('footer.php') ?>
