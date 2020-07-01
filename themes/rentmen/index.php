<?php 
get_header(); 
$thisID = get_option( 'page_for_posts' );
get_template_part('templates/page', 'banner');
?>
<?php  
  $showhidenews = get_field('showhidenews', $thisID);
  $introsec = get_field('introsec', $thisID);
  if($showhidenews):
?>
<section class="rm-nieuws-overview-entry-hdr-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="rm-nieuws-overview-entry-hdr">
          <?php 
            if( !empty($introsec['titel']) ) printf('<div class="rm-nieuws-overview-entry-hdr-title">%s</div>', $introsec['titel']);
            if( !empty($introsec['beschrijving']) ) echo wpautop( $introsec['beschrijving'] );
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="rm-news-section">
  <div class="container">
    <?php if(have_posts()): ?>
    <div class="row">
      <div class="col-md-12">
        <div class="rm-news-sec-inr">
          <ul class="clearfix reset-list">
            <?php 
              $blog_src = '';
              while(have_posts()): the_post();
                
                $attach_id = get_post_thumbnail_id(get_the_ID());
                if( !empty($attach_id) )
                  $blog_src = cbv_get_image_src($attach_id,'bloggrid');
                else
                  $blog_src = THEME_URI .'/assets/images/blogdef.png';
            ?>
            <li>
              <div class="dft-blog-item">
                <div class="dft-blog-item-inr">
                  <div class="dft-blog-item-fea-img-cntlr">
                    <a class="overlay-link" href="<?php the_permalink();?>"></a>
                    <div class="dft-blog-item-fea-img" style="background: url(<?php echo $blog_src; ?>);"></div>
                  </div>
                  <div class="dft-blog-item-des">
                    <div class="dft-blog-item-des-date">
                      <strong><?php echo get_the_date('d'); ?></strong>
                      <span><?php echo get_the_date('M'); ?></span>
                    </div>
                    <h3 class="dft-blog-item-title mHc">
                     <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h3>
                    <div class="dft-blog-item-excerpt mHc2"><?php the_excerpt();?></div>
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
        <div class="faq-pagination">
          <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer
            $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

            echo paginate_links( array(
              'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'type'      => 'list',
              'prev_text' => __('«'),
              'next_text' => __('»'),
              'format'    => '?paged=%#%',
              'current'   => $current,
              'total'     => $wp_query->max_num_pages
            ) );
          ?>
        </div>
      </div>
    </div>
    <?php else: ?>
      <div class="notfound">Geen resultaat!</div>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>