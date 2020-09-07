  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col-sm-6">
                <div class="footer-info">
                  <h3><?php echo $app->app_name ?></h3>
                  <p><?php echo $app->app_slogan ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><a href="<?php echo base_url('page/terms-and-conditions/') ?>">Terms And Conditions</a></li>
                <li><a href="<?php echo base_url('page/privacy-policy/') ?>">Privacy Policy</a></li>
                <li><a href="<?php echo base_url('page/disclaimer/') ?>">Disclaimer</a></li>
              </ul>
            </div>
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

          <div class="col">
            <h4>Map Location</h4>
            <a href="https://www.google.com/maps/search/<?php echo str_replace('<br/>', ' ', $app->contact->address) ?>" target='_blank'>
              <img class="img-thumbnail img-map" src="<?php echo base_url($app->contact->img_map) ?>" />
            </a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><?php echo $app->app_name ?></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
        Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url('themes/rapid/lib/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/jquery/jquery-migrate.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/easing/easing.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/mobile-nav/mobile-nav.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/wow/wow.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/waypoints/waypoints.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/counterup/counterup.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/isotope/isotope.pkgd.min.js') ?>"></script>
  <script src="<?php echo base_url('themes/rapid/lib/lightbox/js/lightbox.min.js') ?>"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url('themes/rapid/contactform/contactform.js') ?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url('themes/rapid/js/main.js') ?>"></script>
  <script src="<?php echo base_url('themes/_public/') ?>js/public.fe.js"></script>

</body>
</html>
