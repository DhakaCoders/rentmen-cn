<?php 
/*
  Template Name: Overons
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/page', 'banner');
?>
<?php
  $showhide_intro = get_field('showhide_intro', $thisID);
  if( $showhide_intro ):
    $introsec = get_field('introsec', $thisID);
    $deshoversrc = '';
    if(!empty($introsec['afbeelding']))
      $deshoversrc = cbv_get_image_src($introsec['afbeelding'], 'hovers');
?>
<section class="overons-two-part-sec-wrp clearfix">
  <div class="overons-two-part-lft clearfix">
    <div class="overons-two-part-lft-img" style="background:url(<?php echo $deshoversrc; ?>);">
    </div>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="overons-two-part-rgt">
            <div class="ovr-two-grid-dsc">
              <div class="ovr-two-grid-dsc-title">
                <?php 
                if( !empty($introsec['subtitel']) ) printf('<span>%s</span>', $introsec['subtitel']);
                if( !empty($introsec['titel']) ) printf('<strong>%s</strong>', $introsec['titel']);
                ?>
              </div>
              <?php
              if( !empty($introsec['beschrijving']) ) echo wpautop( $introsec['beschrijving'] );
              $knop1 = $introsec['knop_1'];
              $knop2 = $introsec['knop_2'];
              if( is_array( $knop1 ) &&  !empty( $knop1['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop1['url'], $knop1['target'], $knop1['title']); 
              }
              if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop2['url'], $knop2['target'], $knop2['title']); 
              }
            ?> 
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php endif; ?>
<?php
  $showhide_usp = get_field('showhide_usp', $thisID);
  if( $showhide_usp ):
    $uspssec = get_field('uspssec', $thisID);
    $husps = $uspssec['alle_usps'];
?>
<section class="overons-service-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="overons-justo-box">
          <?php if( !empty($uspssec['titel']) ) printf('<h2>%s</h2>', $uspssec['titel']); ?>
        </div>
      </div>
    </div>
    <?php if( $husps ): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="overons-service-wrp clearfix">
          <ul class="reset-list dft-slider-pagi clearfix">
             <?php foreach( $husps as $husp ): ?>
            <li>
              <div class="overons-service-box-dsc">
                <?php if( !empty($husp['icon']) ): ?>
                <i class="mHc"><img src="<?php echo $husp['icon']; ?>" alt="<?php echo cbv_get_image_alt( $husp['icon'] ); ?>"></i>
                <?php endif; ?>
                <?php
                  if( !empty($husp['titel']) ) printf('<h3 class="overons-service-box-dsc-title">%s</h3>', $husp['titel']);
                  if( !empty($husp['beschrijving']) ) echo wpautop( $husp['beschrijving'] );
                ?>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<?php
  $showhide_pcat = get_field('showhide_pcat', $thisID);
  if( $showhide_pcat ):
    $prcats = get_field('productenkijker', $thisID);
?>
<section class="hm-de-kijker-post-sec-wrp overons-de-post-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-de-kijker-head">
          <?php 
            if( !empty($prcats['titel']) ) printf('<h2>%s</h2>', $prcats['titel']);
            if( !empty($prcats['beschrijving']) ) echo wpautop( $prcats['beschrijving'] );
          ?>
        </div>
      </div>
    </div>
    <?php  
      $showhide_cknop = get_field('showhide_cknop', HOMEID);
      $hknops = get_field('home_knops', HOMEID);
      if($showhide_cknop):
        if( $hknops ): 
    ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-de-kijker-post-wrp clearfix">
          <ul class='reset-list clearfix'>
            <?php 
            foreach( $hknops as $hknop ): 
              $h_knop = $hknop['knop'];
              
            ?>
            <li>
              <div class="hm-de-kijker-post-innr">
                <div class="hm-de-kijker-post-img-overflow">
                  <?php 
                    if( is_array( $h_knop ) &&  !empty( $h_knop['url'] ) ){
                      printf('<a class="overlay-link" href="%s" target="%s"></a>', $h_knop['url'], $h_knop['target']); 
                    } 
                  ?>
                  <?php if(!empty($hknop['afbeelding'])): $hknopsrc = cbv_get_image_src($hknop['afbeelding'], 'knopgrid');?>
                  <div class="hm-de-kijker-post-img" style="background: url(<?php echo $hknopsrc; ?>);"></div>
                  <?php endif; ?>
                </div>
                <div class="hm-de-kijker-post-dsc">
                  <h3 class="hm-de-kijker-post-dsc-link">
                  <?php 
                    if( is_array( $h_knop ) &&  !empty( $h_knop['url'] ) ){
                      printf('<a href="%s" target="%s">%s</a>', $h_knop['url'], $h_knop['target'], $h_knop['title']); 
                    } 
                  ?>
                  </h3>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php 
          $pknop = $prcats['knop'];
          if( is_array( $pknop ) &&  !empty( $pknop['url'] ) ){
            printf('<div class="hm-download-btn"><a href="%s" target="%s">%s</a></div>', $pknop['url'], $pknop['target'], $pknop['title']); 
          } 
        ?>
      </div>
    </div>
     <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>