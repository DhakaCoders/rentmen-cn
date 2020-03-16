<?php 
get_header();
while ( have_posts() ) :
  the_post();
?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <strong class="page-title">Nieuws</strong>
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

<section class="innerpage-con-wrap" id="nieuws-details-page-cntlr">
  <div class="container-sm">
    <div class="row">
      <div class="col-md-12">
        <article class="default-page-con">
          <div class="dfp-promo-module clearfix">
          <?php 
            if( !empty(get_the_title()) ) printf('<div><strong class="dfp-promo-module-title">%s</strong></div>', get_the_title());
            while ( have_rows('inhoud') ) : the_row(); 
            if( get_row_layout() == 'introductietekst' ){
              $afbeelding = get_sub_field('afbeelding');
              if( !empty($afbeelding) ){
            ?>
            <div class="dft-share-on">
              <span>Deel op:</span>
              <a href="#">
                <i>
                  <svg class="facebook-icon-svg" width="6" height="12" viewBox="0 0 6 12" fill="#1E1E1E;">
                    <use xlink:href="#facebook-icon-svg"></use>
                  </svg> 
                </i>
              </a>
              <a href="#">
                <i>
                  <svg class="instagram-icon-svg" width="12" height="12" viewBox="0 0 12 12" fill="#1E1E1E;">
                    <use xlink:href="#instagram-icon-svg"></use>
                  </svg> 
                </i>
              </a>
            </div>
            <div class="dfp-plate-one-img-bx">
              <div class="dft-blog-item-des-date">
                <strong><?php echo get_the_date('d'); ?></strong>
                <span><?php echo get_the_date('M'); ?></span>
              </div>
              <?php echo cbv_get_image_tag($afbeelding); ?>
            </div>
            <?php } break; }else{ ?>
            <div class="dft-date-xs-cntlr">
              <div class="dft-blog-item-des-date">
                <strong><?php echo get_the_date('d'); ?></strong>
                <span><?php echo get_the_date('M'); ?></span>
              </div>
              <div class="dft-share-on dft-share-on-xs-cntlr">
                <span>Deel op:</span>
                <a href="#">
                  <i>
                    <svg class="facebook-icon-svg" width="6" height="12" viewBox="0 0 6 12" fill="#1E1E1E;">
                      <use xlink:href="#facebook-icon-svg"></use>
                    </svg> 
                  </i>
                </a>
                <a href="#">
                  <i>
                    <svg class="instagram-icon-svg" width="12" height="12" viewBox="0 0 12 12" fill="#1E1E1E;">
                      <use xlink:href="#instagram-icon-svg"></use>
                    </svg> 
                  </i>
                </a>
              </div>
            </div>
            <hr>
            <?php
            }
            endwhile;
            ?>
            </div>
            <?php
            while ( have_rows('inhoud') ) : the_row(); 
            if( get_row_layout() == 'teksteditor' ){
              $beschrijving = get_sub_field('fc_teksteditor');
              echo '<div class="dfp-text-module clearfix">';
                if( !empty( $beschrijving ) ) echo wpautop($beschrijving);
              echo '</div>';    
            }elseif( get_row_layout() == 'afbeelding_tekst' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              $imgsrc = cbv_get_image_src($fc_afbeelding, 'dfpageg1');
              $fc_tekst = get_sub_field('fc_tekst');
              $positie_afbeelding = get_sub_field('positie_afbeelding');
              $imgposcls = ( $positie_afbeelding == 'right' ) ? 'fl-dft-rgtimg-lftdes' : '';
              echo '<div class="fl-dft-overflow-controller">
                <div class="fl-dft-lftimg-rgtdes clearfix '.$imgposcls.'">';
                      echo '<div class="fl-dft-lftimg-rgtdes-lft mHc" style="background: url('.$imgsrc.');"></div>';
                      echo '<div class="fl-dft-lftimg-rgtdes-rgt mHc">';
                        echo wpautop($fc_tekst);
                      echo '</div>';
              echo '</div></div>';      
            }elseif( get_row_layout() == 'galerij' ){
              $gallery_cn = get_sub_field('afbeeldingen');
              $lightbox = get_sub_field('lightbox');
              $kolom = get_sub_field('kolom');
              if( $gallery_cn ):
              echo "<div class='gallery-wrap clearfix'><div class='gallery gallery-columns-{$kolom}'>";
                foreach( $gallery_cn as $image ):
                $imgsrc = cbv_get_image_src($image['ID'], 'gallerygrid');  
                echo "<figure class='gallery-item'><div class='gallery-icon portrait'>";
                if( $lightbox ) echo "<a data-fancybox='gallery' href='{$image['url']}'>";
                    //echo '<div class="dfpagegalleryitem" style="background: url('.$imgsrc.');"></div>';
                    echo wp_get_attachment_image( $image['ID'], 'gallerygrid' );
                if( $lightbox ) echo "</a>";
                echo "</div></figure>";
                endforeach;
              echo "</div></div>";
              endif;      
            }elseif( get_row_layout() == 'usps' ){
              $fc_usps = get_sub_field('fc_usps');
              echo "<div class='dft-question-mark-slider-cntlr'><div class='dft-question-mark-slider dft-slider-pagi'>";
                foreach( $fc_usps as $usp ):
                  $knop = $usp['knop'];
                  echo "<div class='dft-question-mark-slide-item'><div class='dft-question-mark-slide-item-inr mHc'>";
                    if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                      printf('<a class="overlay-link" href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
                    }
                    echo '<i>
                    <svg class="question-icon-svg" width="60" height="60" viewBox="0 0 60 60" fill="#E2E2E2">
                      <use xlink:href="#question-icon-svg"></use>
                    </svg> 
                  </i>';
                    printf('<h3 class="dft-question-mark-slide-item-title"><strong>%s</strong></h3>', $usp['titel']);
                    echo '<span><img src="'.THEME_URI.'/assets/images/arrow-orange.svg"></span>';
                  echo "</div></div>";
                endforeach;
              echo "</div></div>";
            }elseif( get_row_layout() == 'quote' ){
              $fc_diensten = get_sub_field('fc_quote');
              $naam = get_sub_field('naam');
              $positie = get_sub_field('positie');
              echo "<div class='dft-blockquote'>";
              echo '<blockquote>';
              printf('%s', $fc_diensten);
              printf('<span><strong>-%s,</strong> %s</span>', $naam, $positie);
              echo '</blockquote>';
              echo "</div>";
            }elseif( get_row_layout() == 'promo' ){
              $fc_title = get_sub_field('fc_title');
              $fc_beschrijving = get_sub_field('fc_beschrijving');
              $fc_knop = get_sub_field('fc_knop');
              $achtergrond = get_sub_field('achtergrond');
              echo "<div class='dft-bnr-con' style='background-image: url({$achtergrond});'>";
              printf('<h3>%s</h3>', $fc_title);
              echo wpautop( $beschrijving );
              printf('<a target="%s" href="%s">%s</a>', $fc_knop['target'], $fc_knop['url'], $fc_knop['title']);
              echo "</div>";
            }elseif( get_row_layout() == 'table' ){
              $fc_table = get_sub_field('fc_table');
              cbv_table($fc_table);
            }elseif( get_row_layout() == 'nieuws' ){
              $fc_product = get_sub_field('fc_nieuws');
              $memQuery = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page'=> -1,
                'post__in' => $fc_product
              ));
              if( $memQuery->have_posts() ):
                echo '<div class="dft-blog-slider-cntlr"><div class="dft-blog-slider dft-slider-pagi">';
                        while($memQuery->have_posts()): $memQuery->the_post();
                        $gridImage = get_post_thumbnail_id(get_the_ID());
                        if(!empty($gridImage)){
                          $pimgScr = cbv_get_image_src($gridImage, 'bloggrid');
                        }else{
                          $pimgScr = '';
                        }  
                        echo '<div class="dft-blog-item">';
                        echo '<div class="dft-blog-item-inr"><div class="dft-blog-item-fea-img-cntlr">
                          <a class="overlay-link" href="'.get_the_permalink().'"></a>';
                        echo '<div class="dft-blog-item-fea-img" style="background-image: url('.$pimgScr.');"></div></div>';
                        echo '<div class="dft-blog-item-des mHc">';
                        echo '<div class="dft-blog-item-des-date"><strong>'.get_the_date('d').'</strong>';
                        echo '<span>'.get_the_date('M').'</span>';
                        echo '</div>';
                        printf('<h3 class="dft-blog-item-title"><a href="%s">%s</a></h3>', get_the_permalink(), get_the_title());
                        echo wpautop( get_the_excerpt(), true );;
                        echo '<a href="'.get_the_permalink().'">Lees Meer</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    endwhile;

                echo '</div></div> <div class="dft-2grd-img-content-separetor"></div>';
              endif; wp_reset_postdata();
            }elseif( get_row_layout() == 'horizontal_rule' ){
              $fc_horizontal_rule = get_sub_field('fc_horizontal_rule');
              echo '<div class="dft-2grd-img-content-separetor" style="height:'.$fc_horizontal_rule.'px"></div>';
            }elseif( get_row_layout() == 'afbeelding' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              if( !empty( $fc_afbeelding ) ){
                printf('<div class="dfp-plate-one-img-bx">%s</div>', cbv_get_image_tag($fc_afbeelding));
              }
            }elseif( get_row_layout() == 'horizontal_rule' ){
              $rheight = get_sub_field('fc_horizontal_rule');
              printf('<div class="dfhrule clearfix" style="height: %spx;"></div>', $rheight);
          
            }elseif( get_row_layout() == 'gap' ){
             $gap = get_sub_field('fc_gap');
             printf('<div class="gap clearfix" data-value="20" data-md="20" data-sm="20" data-xs="10" data-xxs="10"></div>', $rheight);
            }
          
           endwhile;?>
        </article>
      </div>
    </div>
  </div>
</section>
<?php 
endwhile; 
get_footer(); 
?>