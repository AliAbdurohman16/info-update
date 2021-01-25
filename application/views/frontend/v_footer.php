  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" data-aos="zoom-in"
      style="background-image: url(<?= base_url('gambar/bg-image/'). $pengaturan->bg_footer; ?>)">
      <div class="overlay-mf"></div>
      <footer>
          <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="copyright-box">
                          <div class="socials">
                              <ul>
                                  <li><a target="_blank" href="<?php echo $pengaturan->link_facebook ?>"><span
                                              class="ico-circle" data-aos="zoom-out-up"><i
                                                  class="ion-social-facebook"></i></span></a></li>
                                  <li><a target="_blank" href="<?php echo $pengaturan->link_instagram ?>"><span
                                              class="ico-circle" data-aos="zoom-out-down"><i
                                                  class="ion-social-instagram"></i></span></a>
                                  </li>
                                  <li><a target="_blank" href="<?php echo $pengaturan->link_twitter ?>"><span
                                              class="ico-circle" data-aos="zoom-out-up"><i
                                                  class="ion-social-twitter"></i></span></a></li>
                                  <li><a target="_blank" href="<?php echo $pengaturan->link_linkedin ?>"><span
                                              class="ico-circle" data-aos="zoom-out-down"><i
                                                  class="ion-social-linkedin"></i></span></a>
                                  </li>
                                  <li><a target="_blank" href="<?php echo $pengaturan->link_github ?>"><span
                                              class="ico-circle" data-aos="zoom-out-up"><i
                                                  class="ion-social-github"></i></span></a></li>
                              </ul>
                          </div>
                          <p class="copyright">&copy; Copyright <strong><?= $pengaturan->nama; ?></strong>. All Rights
                              Reserved</p>
                          <div class="credits">
                              Created by <i style="color: red;" class="fa fa-heart"></i> Ali Abdurohman</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="<?= base_url('assets_frontend/'); ?>lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/popper/popper.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/easing/easing.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/counterup/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/counterup/jquery.counterup.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?= base_url('assets_frontend/'); ?>lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?= base_url('assets_frontend/'); ?>contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?= base_url('assets_frontend/'); ?>js/main.js"></script>

  <!-- Aos -->
  <script src="<?= base_url('assets_frontend/'); ?>dist/aos.js"></script>
  <script>
AOS.init();
  </script>

  </body>


  </html>