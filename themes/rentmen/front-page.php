<?php get_header(); ?>
<?php  
  $hshowhide_slide = get_field('showhide_slider', HOMEID);
  $hslides = get_field('home_slider', HOMEID);
  if($hshowhide_slide):
?>
<section class="hm-banner-sec-wrp">
  <?php if($hslides){ ?>
  <div class="hm-slider-wrp">
    <?php
      $i = 1;
      foreach( $hslides as $hslide ): 
      $slideposter = !empty($hslide['afbeelding'])? $hslide['afbeelding']: '';
    ?>
    <div class="hm-banner-bg" style="background: url(<?php echo $slideposter; ?>);">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="hm-banner-dsc">
              <?php
                if( !empty($hslide['subtitel']) ) printf('<h3>%s</h3>', $hslide['subtitel']);
                if( !empty($hslide['titel']) ) printf('<h1>%s</h1>', $hslide['titel']);
                if( !empty($hslide['beschrijving']) ) echo wpautop( $hslide['beschrijving'] );

                $knop = $hslide['knop'];
                $knop1 = $hslide['knop2'];
                if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                    printf('<a href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
                }
                if( is_array( $knop1 ) &&  !empty( $knop1['url'] ) ){
                    printf('<a href="%s" target="%s">%s</a>', $knop1['url'], $knop1['target'], $knop1['title']); 
                } 
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $i++; endforeach; ?>
  </div>    
  <?php } ?>
</section>
<?php endif; ?>
<section class="hm-de-kijker-post-sec-wrp">
  <div class="container">
    <?php
      $hshowhide_cases = get_field('showhide_cases', HOMEID);
      $hcasesgrp = get_field('cases_in_de_kijker', HOMEID);
      if( $hshowhide_cases ):
    ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-de-kijker-head">
          <?php 
            if( !empty($hcasesgrp['titel']) ) printf('<h2>%s</h2>', $hcasesgrp['titel']);
            if( !empty($hcasesgrp['beschrijving']) ) echo wpautop( $hcasesgrp['beschrijving'] );
            $knop2 = $hcasesgrp['knop'];
            if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
                printf('<a href="%s" target="%s">%s</a>', $knop2['url'], $knop2['target'], $knop2['title']); 
            } 
          ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
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
                  <?php if(!empty($hknop['afbeelding'])): $hknopsrc = cbv_get_image_src($hknop['afbeelding'], 'knopgrid');?>
                    <?php 
                      if( is_array( $h_knop ) &&  !empty( $h_knop['url'] ) ){
                        printf('<a class="overlay-link" href="%s" target="%s"></a>', $h_knop['url'], $h_knop['target']); 
                      } 
                    ?>
                  <div class="hm-de-kijker-post-img" style="background: url(<?php echo $hknopsrc; ?>);"></div>
                  </div>
                  <?php endif; ?>
                <div class="hm-de-kijker-post-dsc">
                  <?php 
                    if( is_array( $h_knop ) &&  !empty( $h_knop['url'] ) ){
                      printf('<a href="%s" target="%s">%s</a>', $h_knop['url'], $h_knop['target'], $h_knop['title']); 
                    } 
                  ?>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <?php  
      $showhide_pcats = get_field('showhide_pcats', HOMEID);
      $cats= get_field('categorie_selecteren', HOMEID);
      if($showhide_pcats):
    ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="categorie-xs-btn">
          <span>meer categorieën</span>
        </div>
        <?php if( $cats ): ?>
        <div class="hm-post-categorie-wrp clearfix">
          <ul class="reset-list">
            <?php foreach( $cats as $cat ): 
              $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
              $hoverid = get_field( 'hover_thumbnail', $cat );
              ?>
            <li>
              <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
               <div class="hm-post-categorie-title">
                  <span>
                    <?php if( !empty($thumbnail_id) ): $catimg = cbv_get_image_src($thumbnail_id); ?>
                    <i>
                      <img class="style-svg" src="<?php echo $catimg; ?>" alt="<?php echo $cat->name; ?>">
                      <svg class="post-cty-table-icon-svg" width="26" height="26" viewBox="0 0 26 26" fill="#1E1E1E;">
                        <use xlink:href="#post-cty-table-icon-svg"></use>
                      </svg> 
                    </i>
                    <?php endif; ?>
                    <?php echo $cat->name; ?>
                  </span>
                </div>
              </a>
           </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php
  $hshowhide_overons = get_field('showhide_overons', HOMEID);
  $hoverons = get_field('home_overons', HOMEID);
  if( $hshowhide_overons ):
    $deshoversrc = '';
    if(!empty($hoverons['afbeelding']))
      $deshoversrc = cbv_get_image_src($hoverons['afbeelding'], 'hovers');

?>
<section class="hm-two-grid-sec-wrp">
  <div class="hm-two-grid-sec-bg"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-two-grid-wrp clearfix">
          <div class="hm-two-grid-rgt-img order-2" style="background:url(<?php echo $deshoversrc; ?>);">
            <?php if( !empty($hoverons['mobiel_afbeelding']) )
                echo cbv_get_image_tag($hoverons['mobiel_afbeelding']);
            ?>
            <span>
              <?php if( !empty($hoverons['logo']) ): 
                $hoverlogo = cbv_get_image_src($hoverons['logo']);
              ?>
              <img class="hide-sm" src="<?php echo $hoverlogo; ?>" alt="<?php echo cbv_get_image_alt($hoverlogo); ?>">
              <?php endif; ?>
              <?php if( !empty($hoverons['mobiel_logo']) ): 
                $mhoverlogo = cbv_get_image_src($hoverons['mobiel_logo']);
              ?>
              <img class="show-sm" src="<?php echo $mhoverlogo; ?>" alt="<?php echo cbv_get_image_alt($mhoverlogo); ?>">
              <?php endif; ?>
            </span>
          </div>
          <div class="hm-two-grid-lft order-1">
            <div class="hm-two-grid-dsc">
            <?php
              if( !empty($hoverons['subtitel']) ) printf('<span>%s</span>', $hoverons['subtitel']);
              if( !empty($hoverons['titel']) ) printf('<h2>%s</h2>', $hoverons['titel']);
              if( !empty($hoverons['beschrijving']) ) echo wpautop( $hoverons['beschrijving'] );
              $knop4 = $hoverons['knop'];
              if( is_array( $knop4 ) &&  !empty( $knop4['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop4['url'], $knop4['target'], $knop4['title']); 
              }
            ?>     
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
  $showhidegv = get_field('showhidegv', HOMEID);
  $gvsec = get_field('gvsec', HOMEID);
  $vragenIDs = $gvsec['select_gestelde_vragen'];
  if(!empty($vragenIDs) && $vragenIDs > 0)
    $vragenIDs = $vragenIDs;
  else
    $vragenIDs = array();

  if( $showhidegv ):
  $query = new WP_Query(array( 
      'post_type'=> 'faqs',
      'post_status' => 'publish',
      'posts_per_page' => 4,
      'orderby' => 'date',
      'order'=> 'desc',
      'post__in' => $vragenIDs
    ) 
  );
?>
<section class="hm-download-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-de-kijker-head">
          <?php
            if( !empty($gvsec['titel']) ) printf('<h2>%s</h2>', $gvsec['titel']);
            if( !empty($gvsec['beschrijving']) ) echo wpautop( $gvsec['beschrijving'] );
          ?>  
        </div>
        <?php if($query->have_posts()): ?>
        <div class="hm-dw-slider-wrp dft-slider-pagi clearfix">
          <?php while($query->have_posts()): $query->the_post(); ?>
          <div class="hm-download-box-item">
            <div class="hm-download-box">
              <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
              <strong>
                <i>
                  <svg class="dw-question-icon-svg" width="60" height="60" viewBox="0 0 60 60" fill="#E2E2E2">
                    <use xlink:href="#dw-question-icon-svg"></use>
                  </svg> 
                </i>
                <?php the_title(); ?>
              </strong>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <?php if($query->have_posts()): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-download-btn">
          <a href="<?php echo esc_url( home_url('faq') );?>">BEKIJK ALLES</a>
        </div>
      </div>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>
<?php
  $showhidenews = get_field('showhidenews', HOMEID);
  $newssec = get_field('newssec', HOMEID);
  $blg_query = new WP_Query(array( 
    'post_type'=> 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order'=> 'desc'
    ) 
  );
  if( $showhidenews ):
?>
<section class="hm-lates-news-post-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-de-kijker-head">
          <?php
            if( !empty($newssec['titel']) ) printf('<h2>%s</h2>', $newssec['titel']);
            if( !empty($newssec['beschrijving']) ) echo wpautop( $newssec['beschrijving'] );
          ?> 
        </div>
      </div>
    </div>
    <?php if($blg_query->have_posts()): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="rm-news-sec-inr">
          <ul class="clearfix reset-list dft-slider-pagi">
            <?php 
              $blog_src = '';
              while($blg_query->have_posts()): $blg_query->the_post();
                
                $attach_id = get_post_thumbnail_id(get_the_ID());
                if( !empty($attach_id) )
                  $blog_src = cbv_get_image_src($attach_id,'bloggrid');
                else
                  $blog_src = '';
            ?>
            <li>
              <div class="dft-blog-item">
                <div class="dft-blog-item-inr">
                  <div class="dft-blog-item-fea-img-cntlr">
                    <a class="overlay-link" href="#"></a>
                    <div class="dft-blog-item-fea-img" style="background: url(<?php echo $blog_src; ?>);"></div>
                  </div>
                  <div class="dft-blog-item-des mHc">
                    <div class="dft-blog-item-des-date">
                      <strong><?php echo get_the_date('d'); ?></strong>
                      <span><?php echo get_the_date('M'); ?></span>
                    </div>
                    <h5>
                     <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h5>
                    <?php the_excerpt();?>
                    <a href="<?php the_permalink();?>">Lees Meer</a>
                  </div>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-download-btn">
          <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">BEKIJK ALLES</a>
        </div>
      </div>
    </div>
    <?php 
      endif;  
      wp_reset_postdata();
    ?>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>