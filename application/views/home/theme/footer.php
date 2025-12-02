<?php 
    $system_image = $this->db->get_where('system_settings',array('type'=>'system_image'))->row()->description;
    $system_img_with_path = base_url().'uploads/admin/'.$system_image;
?>
<footer id="footer" class="footer">

  <div class="container">
    <div class="row gy-5 align-items-start">

      <!-- Left: Logo + Description + Social -->
      <div class="col-lg-5 col-md-12 footer-info">
        <div class="footer-logo mb-3">
          <a href="/" class="logo d-flex align-items-center">
            <img src="<?php echo $system_img_with_path; ?>" height="55" alt="Logo">
          </a>
        </div>

        <?php 
          $flag_desc = $this->db->get_where('system_settings', array('type'=>'show_logo_description_flag'))->row()->description; 
          if($flag_desc==1){ 
        ?>
          <p class="footer-desc">
            Perfektes Sparerlebnis – entdecken Sie exklusive Marken und Angebote.
          </p>
        <?php } ?>

        <div class="social-links d-flex gap-3 mt-3">
          <a href="#" class="social-icon" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" class="social-icon" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="social-icon" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-icon" title="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </div>

      <!-- Middle Columns -->
      <div class="col-lg-2 col-6 footer-links">
          <h5 style="color:white">Sonderseiten</h5>
        <ul>
          <li><a href="<?php echo base_url().'marken'; ?>">Geschäfte von A-Z</a></li>
          <li><a href="<?php echo base_url().'home/categories/'; ?>">Kategorien von A bis Z</a></li>
          <li><a href="<?php echo base_url().'home/blog_info'?>">Gutschein-Infoblog</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h5 style="color:white">Allgemeines</h5>
        <ul>
          <li><a href="<?php echo base_url().'ueber-uns'?>">Über uns</a></li>
          <li><a href="<?php echo base_url().'home/faqs/users'?>">FAQ</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 footer-links">
        <h5 style="color:white">Bedienung</h5>
        <ul>
          <li><a href="<?php echo base_url().'home/contact_us'?>">Kontakt und Feedback</a></li>
          <li><a href="<?php echo base_url().'home/privacy_policy'?>">Datenschutz-Bestimmungen</a></li>
          <li><a href="<?php echo base_url().'home/imprints'?>">Impressum</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container mt-5 text-center">
    <hr>
    <div class="copyright">
      © <?php echo date('Y'); ?> <strong>versandkostenfrei.promo</strong> — Alle Rechte vorbehalten.
    </div>
  </div>
</footer>
