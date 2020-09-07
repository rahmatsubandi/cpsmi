<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{title}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="<?php echo $app->app_keyword ?>" name="keywords">
  <meta content="<?php echo $app->app_description ?>" name="description">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo base_url($app->app_favicon) ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url($app->app_favicon) ?>" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700%7CRaleway:400,700&amp;display=swap" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('themes/my_portfolio/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('themes/my_portfolio/vendor/icofont/icofont.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/my_portfolio/vendor/line-awesome/css/line-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/my_portfolio/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/my_portfolio/vendor/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/my_portfolio/vendor/material-design-iconic-font/css/material-design-iconic-font.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/my_portfolio/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/my_portfolio/vendor/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('themes/my_portfolio/css/style.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('themes/_public/css/public.main.css') ?>">

  <!-- =======================================================
    Template Name: MyPortfolio
    Template URL: https://bootstrapmade.com/myportfolio-bootstrap-portfolio-website-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com/
  ======================================================= -->
</head>

<body>

<div class="collapse navbar-collapse custom-navmenu" id="main-navbar">
  <div class="container py-2 py-md-5">
    <div class="row align-items-start">
      <div class="col-md-2">
        <ul class="custom-menu">

          <?php
            // Generate menu: 2 level
            $menu = '';

            foreach ($menus as $item) {
              $class1 = (count($item->childs) > 0) ? 'drop-down' : '';
              $class2 = ($this->router->fetch_class() == $item->link) ? 'active' : '';
              $link = ($item->link_tobase == 1) ? base_url($item->link) : $item->link;
              $newTab = ($item->is_newtab == 1) ? 'target="_blank"' : '';

              $menu .= '<li class="'.$class1.' '.$class2.'">';
                $menu .= '<a href="'.$link.'" '.$newTab.'>';
                  $menu .= $item->name;
                $menu .= '</a>';
                if (count($item->childs) > 0) {
                  $menu .= '<ul>';
                  foreach ($item->childs as $child) {
                    $class1 = (count($child->childs) > 0) ? 'drop-down' : '';
                    $class2 = ($this->router->fetch_class() == $child->link) ? 'active' : '';
                    $link = ($child->link_tobase == 1) ? base_url($child->link) : $item->link;
                    $newTab = ($item->is_newtab == 1) ? 'target="_blank"' : '';

                    $menu .= '<li class="'.$class1.' '.$class2.'">';
                      $menu .= '<a href="'.$link.'" '.$newTab.'>';
                        $menu .= $child->name;
                      $menu .= '</a>';
                    $menu .= '</li>';
                  };
                  $menu .= '</ul>';
                };
              $menu .= '</li>';
            };

            echo $menu;
          ?>
        </ul>
      </div>
      <div class="col-md-6 d-none d-md-block  mr-auto">
        <div class="tweet d-flex">
          <span class="icofont-comment text-white mt-2 mr-3"></span>
          <div style="padding-right: 3rem;">
            <p><em><?php echo (isset($app->app_description) && !empty($app->app_description)) ? $app->app_description : $app->app_slogan ?></em></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-none d-md-block">
        <h3><?php echo $app->app_name ?></h3>
        <p><?php echo $app->app_slogan ?></p>
      </div>
    </div>

  </div>
</div>

<nav class="navbar navbar-light custom-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>">
      <?php echo (isset($app->app_name) && !empty($app->app_name)) ? $app->app_name : 'Undefined' ?>.
    </a>

    <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
      <span></span>
    </a>

  </div>
</nav>
