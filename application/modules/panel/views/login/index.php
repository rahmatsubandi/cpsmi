<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $page_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicons -->
        <link href="<?php echo base_url('themes/_public/img/favicon.png') ?>" rel="icon">
        <link href="<?php echo base_url('themes/_public/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/vendors/animate.css/animate.min.css') ?>">

        <!-- App styles -->
        <link rel="stylesheet" href="<?php echo base_url('themes/material_admin/css/app.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('themes/_public/css/public.main.css') ?>">
    </head>

    <body data-ma-theme="<?php echo $app->theme_color ?>">
      <form id="form-login">
        <div class="login">
          <div class="login__block active">
              <div class="login__block__header">
                  <i class="zmdi zmdi-account-circle"></i>
                  <div>
                    Login to <?php echo $app->app_name ?>
                  </div>
              </div>

              <div class="login__block__body">
                  <div class="form-group form-group--float form-group--centered">
                      <input type="text" name="username" class="form-control login-username" readonly onfocus="this.removeAttribute('readonly');" />
                      <label>Username</label>
                      <i class="form-group__bar"></i>
                  </div>

                  <div class="form-group form-group--float form-group--centered">
                      <input type="password" name="password" class="form-control login-password" readonly onfocus="this.removeAttribute('readonly');" />
                      <label>Password</label>
                      <i class="form-group__bar"></i>
                  </div>

                  <div class="login-spinner" style="display: none;">
                    <div style="text-align: center;"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
                  </div>
                  <div class="login-button">
                    <button class="btn btn--icon login__block__btn page-action-login"><i class="zmdi zmdi-long-arrow-right"></i></button>
                  </div>
              </div>
          </div>
        </div>
      </form>

        <!-- Javascript -->
        <script src="<?php echo base_url('themes/material_admin/vendors/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('themes/material_admin/vendors/popper.js/popper.min.js') ?>"></script>
        <script src="<?php echo base_url('themes/material_admin/vendors/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('themes/material_admin/vendors/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

        <!-- App functions and actions -->
        <script src="<?php echo base_url('themes/material_admin/js/app.min.js') ?>"></script>

        <script type="text/javascript">
          function notify(nMessage, nType) {
            $.notify({ message: nMessage },{
              type: nType,
              z_index: 9999,
              delay: 2500,
              timer: 500,
              placement: {
                from: "top",
                align: "center"
              },
              template:   '<div data-notify="container" class="alert alert-dismissible alert-{0} alert--notify" role="alert">' +
                            '<span data-notify="message">{2}</span>' +
                            '<button type="button" aria-hidden="true" data-notify="dismiss" class="alert--notify__close">Close</button>' +
                          '</div>'
            });
          };
        </script>

        <?php echo (isset($main_js)) ? $main_js : '' ?>
    </body>
</html>
