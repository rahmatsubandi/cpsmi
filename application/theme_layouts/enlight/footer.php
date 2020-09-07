  <!--==========================
    Footer
  ============================-->

  <footer class="probootstrap-footer probootstrap-bg probootstrap-page-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="probootstrap-footer-widget">
            <h3>About Us</h3>
            <p><?php echo $app->app_description ?></p>
            <h3>Social</h3>
            <ul class="probootstrap-footer-social">
              <?php if (!empty($app->contact->twitter)): ?>
              <li><a href="http://twitter.com/<?php echo $app->contact->twitter ?>" target="_blank"><span class="icon-twitter"></span></a></li>
              <?php endif; ?>
              <?php if (!empty($app->contact->facebook)): ?>
              <li><a href="http://facebook.com/<?php echo $app->contact->facebook ?>" target="_blank"><span class="icon-facebook"></span></a></li>
              <?php endif; ?>
              <?php if (!empty($app->contact->instagram)): ?>
              <li><a href="http://instagram.com/<?php echo $app->contact->instagram ?>" target="_blank"><span class="icon-instagram"></span></a></li>
              <?php endif; ?>
              <?php if (!empty($app->contact->linkedin)): ?>
              <li><a href="http://linkedin.com/in/<?php echo $app->contact->linkedin ?>" target="_blank"><span class="icon-linkedin"></span></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-md-push-1">
          <div class="probootstrap-footer-widget">
            <h3>Links</h3>
            <ul>
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li><a href="<?php echo base_url('page/terms-and-conditions') ?>">Terms and Conditions</a></li>
              <li><a href="<?php echo base_url('page/privacy-policy') ?>">Privacy Policy</a></li>
              <li><a href="<?php echo base_url('page/disclaimer') ?>">Disclaimer</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="probootstrap-footer-widget">
            <h3>Contact Info</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span><?php echo $app->contact->address ?></span></li>
              <li><i class="icon-mail"></i><span><?php echo $app->contact->email ?></span></li>
              <li><i class="icon-phone2"></i><span><?php echo $app->contact->phone ?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="probootstrap-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-left">
            <p>&copy; <?php echo $app->app_name ?>. All Rights Reserved.
            <br/> Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://probootstrap.com/" target="_blank">ProBootstrap.com</a>
          </div>
          <div class="col-md-4 probootstrap-back-to-top">
            <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?php echo base_url('themes/enlight/') ?>js/scripts.min.js"></script>
  <script src="<?php echo base_url('themes/enlight/') ?>js/main.min.js"></script>
  <script src="<?php echo base_url('themes/enlight/') ?>js/custom.js"></script>
  <script src="<?php echo base_url('themes/enlight/') ?>vendor/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url('themes/_public/') ?>js/public.fe.js"></script>

</body>
</html>
