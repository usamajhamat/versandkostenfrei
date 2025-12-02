
<!-- Footer -->
<footer id="cs-footer" style="padding-top: 0px !important;">
   <div id="cs-footer-style">
      <div class="container-fluid">
         <div class="row footer-d">
            <!-- A-Z -->
            <div class="cs-footer-item cs-footer-item-cs col-md-3">
               <div class="cs-footer-h5 container-fluid mt-3">
                  <div style="width: 92%;">
                     <font style="vertical-align: inherit;">
                     <img class="img-fluid" src="<?php echo base_url(); ?>uploads/admin/<?php echo @$system_image;?>" alt="<?php echo @$system_name ?>" />
                     </font>
                  </div>
                  <?php
                     $flag_desc =  $this->db->get_where('system_settings',array('type'=>'show_logo_description_flag'))->row()->description;
                     if($flag_desc==1){ 
                                      ?>
                  <label class="lbl_below_logo_footer">Perfektes Sparerlebnis.</label>
                  <?php
                     }
                     ?>
                  <div class="cs-footer-social cs-flex" style="text-align:center;">
                     <a target="_blank" class="cs-social-facebook" href="https://www.facebook.com/" title="<?php echo @$system_name ?> on Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                     <a target="_blank" class="cs-social-instagram" href="https://www.instagram.com/" title="<?php echo @$system_name ?> on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>   
                     <a target="_blank" class="cs-social-twitter" href="https://www.twitter.com/" title="<?php echo @$system_name ?> on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </div>
                  <!-- <div id="google_translate_element"></div> -->
               </div>
               <h5>DISCLOSURE</h5>
               <p>versandkostenfrei.promo ist Teilnehmer am Amazon Services LLC-Partnerprogramm, einem Partner-Werbeprogramm, mit dem Websites Werbegebühren verdienen können, indem sie Werbung schalten und auf Amazon.de verlinken. Gutscheinfuralles wird für die Weiterleitung von Verkehr und Geschäft an diese Unternehmen entschädigt.</p>
            </div>
            <div class="cs-footer-item cs-footer-item-service col-md-6">
               <!-- Special pages -->
               <div class="cs-footer-item cs-footer-item-service col-md-4 text-center">
                  <div class="cs-footer-h5">
                     <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;font-weight: 600;">Sonderseiten</font>
                     </font>
                  </div>
                  <ul>
                     <li>
                        <a href="<?php echo base_url().'marken'; ?>" title="Geschäfte von A-Z">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Geschäfte von A-Z</font>
                        </font>
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo base_url().'home/categories/'; ?>" title="Kategorien von A bis Z">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Kategorien von A bis Z</font>
                        </font>
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo base_url().'home/blog_info'?>" title="Gutschein-Infoblog">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Gutschein-Infoblog</font>
                           </font>
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- General -->
               <div class="cs-footer-item cs-footer-item-social col-md-4 footer-set text-center" >
                  <div class="cs-footer-h5">
                     <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;font-weight: 600;">Allgemeines</font>
                     </font>
                  </div>
                  <ul>
                     <li>
                        <a href="<?php echo base_url().'home/about_us'; ?>" title="Über uns>
                           <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Über uns</font>
                        </font>
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo base_url().'home/faqs/users'; ?>" title="FAQ">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">FAQ</font>
                        </font>
                        </a>
                     </li>
                    <?php /* <li>
                        <a href="<?php echo base_url().'home/advertise'; ?>" title="Werben">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Werben</font>
                        </font>
                        </a>
                     </li> */ ?>
                  </ul> 
               </div>
               <!-- Service -->
               <div class="cs-footer-item cs-footer-item-comp col-md-4 text-center">
                  <div class="cs-footer-h5">
                     <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;font-weight: 600;">Bedienung</font>
                     </font>
                  </div>
                  <ul>
                     <li>
                        <a href="<?php echo base_url().'home/contact_us'; ?>" title="Kontakt und Feedback">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Kontakt und Feedback</font>
                        </font>
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo base_url().'home/privacy_policy'; ?>" title="Datenschutz-Bestimmungen">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Datenschutz-Bestimmungen</font>
                        </font>
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo base_url().'home/imprints'; ?>" title="Impressum">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Impressum</font>
                        </font>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- Newsletter -->
            <div class="cs-footer-item cs-footer-item-comp col-md-3">
               <div class="cs-footer-h5" style="margin-bottom: 5px;">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;font-weight: 600;">Newsletter abonnieren</font>
                  </font>
               </div>
               <label style="color:#000 !important; margin-bottom:10px; line-height:16px; font-size: 0.65rem;">Wenn neue Gutscheine, Angebote und Aktionen zu uns kommen, kommen sie direkt zu Ihnen.</label>
               <div class="controls controls-row js-newsletter">
                  <div class="row">
                     <?php
                        $get_page_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
                        ?>
                     <label class="hidden">
                     <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Your e-mail</font>
                     </font>
                     </label>
                     <input id="page_type_footer"  value="<?php echo $get_page_id ?>" type="hidden">
                     <input id="optin-email_footer" style="margin-bottom: 0px; width:70%; font-size:12px; border-top-left-radius: 5px; border-bottom-left-radius: 5px;" name="nlr[1]" type="text" placeholder="E-Mail-Addresse" class="cs-newsletter-home-input cs-input footer_input">
                     <button type="submit" id="subscribe_footer" class="js-newsletter-checkbox cs-newsletter-btn btn cs-flat-btn-grey cs-transition-fast footer_btn" style="position: relative; bottom:0px; font-size:12px; backgound: #5c8374 !important;  border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                     Subscribe
                     </button>
                     <label class="" id="news_error_footer" style="color:red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></label>
                  </div>
                  <label class="cs-newsletter-label" style="color:#000 !important; font-size: 0.65rem;">
                  <input class="cs-newsletter-checkbox js-newsletter-checkbox" id="privacy_footer" type="checkbox" name="" value="">
                  <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Ja, ich stimme der Datenschutzerklärung und Erklärung zu.</font>
                  </font>
                  </label>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>

<!-- Copyright -->
<div class="cs-footer-copy row" style="border-top: 20px solid #5c8374;">
   <font style="vertical-align: inherit;">.     
   <font style="vertical-align: inherit;">
   Urheberrechte &#169; <?php echo date('Y'); ?> versandkostenfrei.promo. Alle Rechte vorbehalten.
   </font>
   </font>
</div>

<div id="js-btn-scroll-top" class="cs-btn-scroll-top cs-jump-btn" title="to the top" onclick="ga(&#39;send&#39;,&#39;event&#39;,&#39;Navigation&#39;,&#39;Back-To-Top&#39;);" style="display: block;">
	<i class="fa fa-chevron-up" aria-hidden="true"></i>
</div>