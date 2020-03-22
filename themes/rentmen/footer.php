<?php 
  $cproposal = get_field('Contacteerons', 'options');
  $showhide_conons = get_field('showhide_contacteerons', 'options');
  $logoObj = get_field('logo_footer', 'options');
  $logoObj2 = get_field('logo_footer2', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  if( is_array($logoObj2) ){
    $logo_tag2 = '<img src="'.$logoObj2['url'].'" alt="'.$logoObj2['alt'].'" title="'.$logoObj2['title'].'">';
  }else{
    $logo_tag2 = '';
  }
  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $adres = get_field('address', 'options');
  $gmapsurl = get_field('google_maps', 'options');
  $e_mailadres = get_field('emailaddress', 'options');
  $show_telefoon = get_field('telephone', 'options');
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
  $show_telefoon1 = get_field('telephone2', 'options');
  $telefoon1 = trim(str_replace($spacialArry, $replaceArray, $show_telefoon1));
  $copyright_text = get_field('copyright_text', 'options');
  $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';
  $smedias = get_field('sociale_media', 'options');
?>
<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php if( $showhide_conons ): ?>
          <div class="ftr-top-head text-center m-auto">
            <?php
              if( !empty($cproposal['titel']) ) printf('<h2>%s</h2>', $cproposal['titel']);
              if( !empty($cproposal['beschrijving']) ) echo wpautop( $cproposal['beschrijving'] );

              $knop = $cproposal['knop'];
              if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
              }
              ?>
          </div>
        <?php endif; ?>
          <div class="ftr-col-main clearfix">
            <div class="ftr-col ftr-col-1">
              <div class="ftr-logo-1">
                <a href="<?php echo esc_url(home_url('/')); ?>"><i><?php echo $logo_tag; ?></i></a>
              </div>
              <div class="ftr-logo-2">
                <i><?php echo $logo_tag2; ?></i>
              </div>
            </div>
            <div class="ftr-col ftr-col-2">
              <?php 
                _e( '<h6><span>Navigatie</span></h6>', THEME_NAME ); 
                $fmenuOptionsa = array( 
                    'theme_location' => 'cbv_fta_menu', 
                    'menu_class' => 'ulc',
                    'container' => 'fnava',
                    'container_class' => 'fnava'
                  );
                wp_nav_menu( $fmenuOptionsa ); 
              ?>
            </div>
            <div class="ftr-col ftr-col-3">
              <?php 
                _e( '<h6><span>Categorieën</span></h6>', THEME_NAME ); 
                $fmenuOptionsb = array( 
                    'theme_location' => 'cbv_ftb_menu', 
                    'menu_class' => 'ulc',
                    'container' => 'fnavb',
                    'container_class' => 'fnavb'
                  );
                wp_nav_menu( $fmenuOptionsb ); 
              ?>              
            </div>
            <div class="ftr-col ftr-col-4">
              <?php 
                _e( '<h6><span>Mijn Rekening</span></h6>', THEME_NAME ); 
                $fmenuOptionsc = array( 
                    'theme_location' => 'cbv_ftc_menu', 
                    'menu_class' => 'ulc',
                    'container' => 'fnavc',
                    'container_class' => 'fnavc'
                  );
                wp_nav_menu( $fmenuOptionsc ); 
              ?>                
            </div>
            <div class="ftr-col ftr-col-5">
              <?php _e( '<h6><span>Contact</span></h6>', THEME_NAME ); ?>
              <ul class="ulc">
                <?php if( !empty( $adres ) ): ?>
                <li>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/ftr-map-icon.svg" alt=""></i>
                  <a href="<?php echo $gmaplink; ?>"><?php echo $adres;?></a>
                </li>
                <?php endif; ?>
                <?php if( !empty($telefoon) ): ?>
                <li>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/ftr-cell-icon.svg" alt=""></i>
                  <a href="<?php echo $telefoon; ?>"><?php echo $show_telefoon; ?></a>
                </li>
                <?php endif; ?>
                <?php if( !empty($telefoon1) ): ?>
                <li>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/ftr-cell-icon.svg" alt=""></i>
                  <a href="<?php echo $telefoon1; ?>"><?php echo $show_telefoon1; ?></a>
                </li>
                <?php endif; ?>
                <?php if( !empty($e_mailadres) ): ?>
                <li>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/ftr-mail-icon.svg" alt=""></i>
                  <a href="<?php echo $e_mailadres; ?>"><?php echo $e_mailadres; ?></a>
                </li>
                <?php endif; ?>
              </ul>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="ftr-btm-innr clearfix">
            <div class="ftr-btm-col-1">
              <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?>
            </div>
            <div class="ftr-btm-col-2">
            <?php 
              $ftmenuOptions = array( 
                  'theme_location' => 'cbv_copyright_menu', 
                  'menu_class' => 'ulc clearfix',
                  'container' => 'copynav',
                  'container_class' => 'copynav'
                );
              wp_nav_menu( $ftmenuOptions ); 
            ?>
            </div>
            <div class="ftr-btm-col-3 text-right">
              <a href="#">webdesign by conversal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="xs-menu-bar xs-menu-bar-open">
  <div class="xs-menu-bar-inr">
    <div class="xs-humbergur-btn">
      <span><img src="<?php echo THEME_URI; ?>/assets/images/xs-humbergar-icon.png"></span>
      <strong>Menu</strong>
    </div>
    <div class="xs-menu-bar-cart">
      <a href="#">
        <img src="<?php echo THEME_URI; ?>/assets/images/xs-cart-icon.png">
      </a>
    </div>
  </div>
</div>

<div class="show-sm">
  <div class="xs-pop-up-menu">
    <div class="xs-pop-up-menu-inr">
      <div class="xs-pop-menu-con">
        <nav class="xs-main-nav clearfix">
          <ul class="clearfix reset-list">
            <li class="current-menu-item"><a href="#">Home</a></li>
            <li class="menu-item-has-children">
              <a href="#">Over Ons</a>
              <ul class="sub-menu">
                <li><a href="#">sub menu item</a></li>
                <li><a href="#">sub menu item</a></li>
                <li><a href="#">sub menu item</a></li>
                <li><a href="#">sub menu item</a></li>
                <li><a href="#">sub menu item</a></li>
              </ul>
            </li>
            <li><a href="#">Nieuws</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        <div class="xs-social">
          <div class="hdr-social">
            <ul class="reset-list">
              <li>
                <a href="#">
                  <i>
                    <svg class="facebook-icon-svg" width="6" height="12" viewBox="0 0 6 12" fill="#FFFFFF">
                      <use xlink:href="#facebook-icon-svg"></use>
                    </svg> 
                  </i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i>
                    <svg class="instagram-icon-svg" width="12" height="12" viewBox="0 0 12 12" fill="#FFFFFF">
                      <use xlink:href="#instagram-icon-svg"></use>
                    </svg> 
                  </i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="xs-sign-up">
          <div class="hdr-sign-up">
            <a href="#">
              <i>
                <svg class="sign-up-icon-svg" width="26" height="26" viewBox="0 0 26 26" fill="#FFFFFF">
                  <use xlink:href="#sign-up-icon-svg"></use>
                </svg> 
              </i>
              <strong>Aanmelden</strong>
            </a>
          </div>
        </div>
      </div>
      <div class="xs-menu-bar xs-menu-bar-close">
        <div class="xs-menu-bar-inr">
          <div class="xs-humbergur-btn">
            <span><img src="<?php echo THEME_URI; ?>/assets/images/xs-close-icon.png"></span>
            <strong>Sluit</strong>
          </div>
          <div class="xs-menu-bar-cart">
            <a href="#">
              <img src="<?php echo THEME_URI; ?>/assets/images/xs-cart-icon.png">
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>