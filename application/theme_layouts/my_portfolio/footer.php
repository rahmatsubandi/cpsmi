  <!--==========================
    Footer
  ============================-->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p class="mb-1">&copy; Copyright <strong><?php echo $app->app_name ?></strong>. All Rights Reserved</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=MyPortfolio
            -->
            Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
          </div>
        </div>
        <div class="col-sm-6 social text-md-right">
          <?php if (!empty($app->contact->twitter)): ?>
          <a href="http://twitter.com/<?php echo $app->contact->twitter ?>" target="_blank"><span class="icofont-twitter"></span></a>
          <?php endif; ?>
          <?php if (!empty($app->contact->facebook)): ?>
          <a href="http://facebook.com/<?php echo $app->contact->facebook ?>" target="_blank"><span class="icofont-facebook"></span></a>
          <?php endif; ?>
          <?php if (!empty($app->contact->instagram)): ?>
          <a href="http://instagram.com/<?php echo $app->contact->instagram ?>" target="_blank"><span class="icofont-instagram"></span></a>
          <?php endif; ?>
          <?php if (!empty($app->contact->linkedin)): ?>
          <a href="http://linkedin.com/in/<?php echo $app->contact->linkedin ?>" target="_blank"><span class="icofont-linkedin"></span></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/easing/easing.min.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/aos/aos.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('themes/my_portfolio/') ?>vendor/lightbox/js/lightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('themes/my_portfolio/') ?>js/main.js"></script>
  <script src="<?php echo base_url('themes/_public/') ?>js/public.fe.js"></script>

</body>
</html>
