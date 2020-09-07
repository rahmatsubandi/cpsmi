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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('themes/rapid/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('themes/rapid/lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/rapid/lib/animate/animate.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/rapid/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/rapid/lib/material-design-iconic-font/css/material-design-iconic-font.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/rapid/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/rapid/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('themes/rapid/css/style.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('themes/_public/css/public.main.css') ?>">

  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    Modified By: sanimalikibrahim@gmail.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <?php if (!empty($app->contact->twitter)): ?>
          <a href="http://twitter.com/<?php echo (isset($app->contact->twitter) ? $app->contact->twitter : '') ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
          <?php endif; ?>
          <?php if (!empty($app->contact->facebook)): ?>
          <a href="http://facebook.com/<?php echo (isset($app->contact->facebook) ? $app->contact->facebook : '') ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
          <?php endif; ?>
          <?php if (!empty($app->contact->instagram)): ?>
          <a href="http://instagram.com/<?php echo (isset($app->contact->instagram) ? $app->contact->instagram : '') ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
          <?php endif; ?>
          <?php if (!empty($app->contact->linkedin)): ?>
          <a href="http://linkedin.com/in/<?php echo (isset($app->contact->linkedin) ? $app->contact->linkedin : '') ?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light">
          <a href="<?php echo base_url() ?>" class="scrollto"><span><?php echo $app->app_name ?></span></a>
        </h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
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
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
