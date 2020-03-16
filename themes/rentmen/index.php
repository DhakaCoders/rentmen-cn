<?php 
get_header(); 
$thisID = get_the_ID();
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

<section class="rm-nieuws-overview-entry-hdr-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="rm-nieuws-overview-entry-hdr">
          <div class="rm-nieuws-overview-entry-hdr-title">Laatste Nieuws</div>
          <p>Morbi euismod blandit massa id congue. Mauris dignissim, augue ac maximus dapibus, enim ante facilisis odio, vel blandit tortor quam sit amet ante. Suspendisse a volutpat nulla.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if(have_posts()): ?>
<section class="rm-news-section">
  <div class="container">
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
                    <a class="overlay-link" href="#"></a>
                    <div class="dft-blog-item-fea-img" style="background: url(<?php echo $blog_src; ?>);"></div>
                  </div>
                  <div class="dft-blog-item-des mHc">
                    <div class="dft-blog-item-des-date">
                      <strong><?php echo get_the_date('d'); ?></strong>
                      <span><?php echo get_the_date('M'); ?></span>
                    </div>
                    <h3 class="dft-blog-item-title">
                     <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h3>
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
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>