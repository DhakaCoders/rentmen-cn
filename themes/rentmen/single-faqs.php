<?php 
get_header(); 
while( have_posts() ): the_post();
$thisID = get_the_ID();
?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <strong class="page-title">FAQ</strong>
          </div>          
          <div class="breadcrumbs-main">
            <?php cbv_breadcrumbs(); ?>
          </div>
        </div>
        <div class="breadcrumbs-innr show-xs clearfix">
          <div class="breadcrumbs-left">
            <a href="<?php echo esc_url( home_url() );?>"></a>
          </div>
          <div class="breadcrumbs-right">
            <a href="javascript:history.go(-1)">Terug</a>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<section class="rm-faq-backlink-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="rm-faq-backlink-sec-inr">
          <a href="javascript:history.go(-1)">
            <i>
              <svg class="faq-left-arrow-svg" width="18" height="8" viewBox="0 0 18 8" fill="#1E1E1E;">
                <use xlink:href="#faq-left-arrow-svg"></use>
              </svg> 
            </i>
          Terug
        </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
$attach_id = get_post_thumbnail_id(get_the_ID());
if( !empty($attach_id) ):
  $faq_src = cbv_get_image_src($attach_id,'faqfull');
  $faq_tag = cbv_get_image_tag($attach_id,'faqfull');
else:
  $faq_src = '';
  $faq_tag = '';
endif;
?>
<section class="rm-faq-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="rm-faq-cnt-sec-inr clearfix">
          <div class="rm-faq-cnt-sec-img" style="background: url('<?php echo $faq_src; ?>');">
            <?php echo $faq_tag; ?>
          </div>
          <div class="rm-faq-cnt-sec-des">
            <h1 class="faq-con-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>