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
                <i><?php echo $logo_tag; ?></i>
              </div>
              <div class="ftr-logo-2">
                <i><?php echo $logo_tag2; ?></i>
              </div>
            </div>
            <div class="ftr-col ftr-col-2">
              <?php 
                _e( '<h6>Navigatie</h6>', THEME_NAME ); 
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
                _e( '<h6>Categorieën</h6>', THEME_NAME ); 
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
                _e( '<h6>mijn rekening</h6>', THEME_NAME ); 
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
              <?php _e( '<h6>contact</h6>', THEME_NAME ); ?>
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
<?php wp_footer(); ?>
</body>
</html>