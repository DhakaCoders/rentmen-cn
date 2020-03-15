<?php 
/*
  Template Name: Contact
*/
get_header(); 
$thisID = get_the_ID();
$spacialArry = array(".", "/", "+", " ");$replaceArray = '';
$adres = get_field('address', 'options');
$gmapsurl = get_field('google_maps', 'options');
$e_mailadres = get_field('emailaddress', 'options');
$show_telefoon = get_field('telephone', 'options');
$telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
$show_telefoon1 = get_field('telephone2', 'options');
$telefoon1 = trim(str_replace($spacialArry, $replaceArray, $show_telefoon1));
$gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';

$gmap = get_field('google_maps', $thisID);
$contact = get_field('contacteer_ons', $thisID);
$google_map = $gmap['maps'];

?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <strong class="page-title">Contact</strong>
          </div>          
          <div class="breadcrumbs-main">
            <ul>           
              <li><a href="#">Home</a></li>
              <li><a href="#">Binnenpagina</a></li>
              <li><a href="#">Binnenpagina</a></li>
            </ul>
          </div>
        </div>
        <div class="breadcrumbs-innr show-xs clearfix">
          <div class="breadcrumbs-left">
            <a href="#">Home</a>
          </div>
          <div class="breadcrumbs-right">
            <a href="javascript:history.go(-1)">Terug</a>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>

<section class="contact-info-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-de-kijker-head">
          <?php 
            if(!empty($contact['titel'])) printf('<h3>%s</h3>', $contact['titel']);
            if(!empty($contact['beschrijving'])) echo wpautop( $contact['beschrijving'], true );
          ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-info-wrp clearfix">
          <?php if( !empty($telefoon) ): ?>
          <div class="contact-info">
            <a href="tel:<?php echo $telefoon; ?>">
              <i>
                <svg class="contact-phone-icon-svg" width="36" height="36" viewBox="0 0 36 36" fill="#FFFFFF">
                  <use xlink:href="#contact-phone-icon-svg"></use>
                </svg> 
              </i>
              <?php echo $telefoon; ?>
            </a>
          </div>
          <?php endif; ?>
          <?php if( !empty($e_mailadres) ): ?>
          <div class="contact-info">
            <a href="mailto:<?php echo $e_mailadres; ?>">
              <i>
                <svg class="contact-mail-icon-svg" width="36" height="36" viewBox="0 0 36 36" fill="#FFFFFF">
                  <use xlink:href="#contact-mail-icon-svg"></use>
                </svg> 
              </i>
              <?php echo $e_mailadres; ?>
            </a>
          </div>
          <?php endif; ?>
          <?php if( !empty($telefoon1) ): ?>
          <div class="contact-info">
            <a href="tel:<?php echo $telefoon1; ?>">
              <i>
                <svg class="contact-phone-icon-svg" width="36" height="36" viewBox="0 0 36 36" fill="#FFFFFF">
                  <use xlink:href="#contact-phone-icon-svg"></use>
                </svg> 
              </i>
              <?php echo $telefoon1; ?>
            </a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="rm-contact-form-block-wrp">
          <div class="rm-contact-form-block">
            <div class="rm-contact-form-tab clearfix">
              <h4>E-mail Ons</h4>
              <ul class="reset-list tabs-menu clearfix">
                <li><a href="#tabs">particulier</a></li>
                <li><a href="#tabs">bedrijf</a></li>
              </ul>
            </div>
            <div class="tabs">
              <div class="contact-form-wrp clearfix">
                <div class="wpforms-container">
                  <?php 
                    if( !empty( $contact['form_shortcode'] ) ) echo do_shortcode($contact['form_shortcode']); 
                  ?>
                </div>
              </div>
            </div>
            <div class="tabs">
              <div class="contact-form-wrp contact-form-prd clearfix">
                <div class="wpforms-container">
                  <?php 
                    if( !empty( $contact['bedrijf_form_shortcode'] ) ) echo do_shortcode($contact['bedrijf_form_shortcode']); 
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if( !empty($google_map) ): ?>
<section class="contact-google-map-wrp">
  <div data-homeurl="<?php echo THEME_URI; ?>" id="googlemap" data-latitude="<?php echo $google_map['lat']; ?>" data-longitude="<?php echo $google_map['lng']; ?>"></div>
  <?php if( !empty( $adres ) ): ?>
  <div class="google-map-dsc-wrp clearfix">
    <div class="google-map-dsc-lft">
      <span>
        <i>
          <svg class="contact-map-icon-svg" width="30" height="40" viewBox="0 0 30 40" fill="#F3BF00">
            <use xlink:href="#contact-map-icon-svg"></use>
          </svg> 
        </i>
        <?php echo $adres; ?></span>
    </div>
    <div class="google-map-back-btn">
      <a href="<?php echo $gmaplink; ?>">Route</a>
    </div>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>
<?php get_footer(); ?>