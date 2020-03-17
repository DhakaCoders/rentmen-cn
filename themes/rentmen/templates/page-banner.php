<?php 
$thisID = get_the_ID();
$pageTitle = get_the_title($thisID);
?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <?php if( is_single() || is_blog() ): ?>
              <strong class="page-title">Nieuws</strong>
            <?php elseif( is_page('faq') ): ?>
              <strong class="page-title">FAQ</strong>
            <?php else: ?>
              <strong class="page-title"><?php echo $pageTitle; ?></strong>
            <?php endif; ?>
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