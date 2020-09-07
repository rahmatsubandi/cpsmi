<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{title}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo base_url($app->app_favicon) ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url($app->app_favicon) ?>" type="image/x-icon">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/animate.css/animate.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/jquery-scrollbar/jquery.scrollbar.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/fullcalendar/fullcalendar.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/sweetalert2/sweetalert2.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/flatpickr/flatpickr.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/select2/css/select2.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/nouislider/nouislider.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/lightgallery/css/lightgallery.min.css') ?>">

        <!-- App styles -->
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/css/app.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/_public/css/public.main.css') ?>">
    </head>

    <body data-ma-theme="<?php echo $app->theme_color ?>">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1><a href="<?php echo base_url('panel/') ?>">
                        <?php echo $app->app_name ?>
                    </a></h1>
                </div>

                <form class="search" method="post" action="<?php echo base_url('panel/search/q/') ?>">
                    <div class="search__inner">
                        <input type="text" name="app_search" id="app_search" class="search__text" placeholder="Search for blog and page...">
                        <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                    </div>
                </form>

                <ul class="top-nav">
                    <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-format-color-fill"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item theme-switch">
                                Theme Color

                                <div class="btn-group btn-group-toggle btn-group--colors" data-toggle="buttons">
                                    <label class="btn bg-green <?php echo ($app->theme_color == 'green') ? 'active' : '' ?>"><input type="radio" value="green" autocomplete="off" checked></label>
                                    <label class="btn bg-blue <?php echo ($app->theme_color == 'blue') ? 'active' : '' ?>"><input type="radio" value="blue" autocomplete="off"></label>
                                    <label class="btn bg-red <?php echo ($app->theme_color == 'red') ? 'active' : '' ?>"><input type="radio" value="red" autocomplete="off"></label>
                                    <label class="btn bg-orange <?php echo ($app->theme_color == 'orange') ? 'active' : '' ?>"><input type="radio" value="orange" autocomplete="off"></label>
                                    <label class="btn bg-teal <?php echo ($app->theme_color == 'teal') ? 'active' : '' ?>"><input type="radio" value="teal" autocomplete="off"></label>

                                    <div class="clearfix mt-2"></div>

                                    <label class="btn bg-cyan <?php echo ($app->theme_color == 'cyan') ? 'active' : '' ?>"><input type="radio" value="cyan" autocomplete="off"></label>
                                    <label class="btn bg-blue-grey <?php echo ($app->theme_color == 'blue-grey') ? 'active' : '' ?>"><input type="radio" value="blue-grey" autocomplete="off"></label>
                                    <label class="btn bg-purple <?php echo ($app->theme_color == 'purple') ? 'active' : '' ?>"><input type="radio" value="purple" autocomplete="off"></label>
                                    <label class="btn bg-indigo <?php echo ($app->theme_color == 'indigo') ? 'active' : '' ?>"><input type="radio" value="indigo" autocomplete="off"></label>
                                    <label class="btn bg-brown <?php echo ($app->theme_color == 'bworn') ? 'active' : '' ?>"><input type="radio" value="brown" autocomplete="off"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </header>

            <?php include_once('sidebar.php') ?>
