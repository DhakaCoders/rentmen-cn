<?php 
/**
* Get the image tag with alt/title tag
*/
function cbv_get_image_tag( $id, $size = 'full', $title = false ){
	if( isset( $id ) ){
		$output = '';
		$image_title = get_the_title($id);
		$image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    if( empty( $image_alt ) ){
      $image_alt = $image_title;
    }
		$image_src = wp_get_attachment_image_src( $id, $size, false );

		if( $title ){
			$output = '<img src="'.$image_src[0].'" alt="'.$image_alt.'" title="'.$image_title.'">';
		}else{
			$output = '<img src="'.$image_src[0].'" alt="'.$image_alt.'">';
		}

		return $output;
	}
	return false;
}

/**
* Get the image src url by attachement it
*/
function cbv_get_image_src( $id, $size = 'full' ){
  if( isset( $id ) ){
    $afbeelding = wp_get_attachment_image_src($id, $size, false );
    if( is_array( $afbeelding ) && isset( $afbeelding[0] ) ){
      return $afbeelding[0];
    }
  }
  return false;
}
/**
* Get the image tag with alt/title tag
*/
function cbv_get_image_alt( $url ){
  if( isset( $url ) ){
    $output = '';
    $id = attachment_url_to_postid($url);
    $image_title = get_the_title($id);
    $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    if( empty( $image_alt ) ){
      $image_alt = $image_title;
    }
    $image_alt = str_replace('-', ' ', $image_alt);
    $output = $image_alt;

    return $output;
  }
  return false;
}

function cbv_imagegrid( $image, $desc, $position = 'left' ){
	$output = '';
	if( !empty( $image ) && !empty( $desc ) ){
		$output = ( $position == 'left' ) ? 
			"<div class='df-text-rgt-img-grd-2 clearfix'>" : 
			"<div class='df-text-lft-img-grd-2 clearfix'>";
		$output .= '<div>' .cbv_get_image_tag( $image ). '</div>';
		$output .= '<div>' .wpautop( $desc ). '</div>';
		$output .= "</div>";
	}
	return $output;
}
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
function cbv_table( $table){
  if ( ! empty ( $table ) ) {
    echo '<div class="dfp-tbl-wrap">
    <div class="table-dsc" data-aos="fade-up" data-aos-delay="200">
    <table>';
    if ( ! empty( $table['caption'] ) ) {
      echo '<caption>' . $table['caption'] . '</caption>';
    }
    if ( ! empty( $table['header'] ) ) {
      echo "<thead class='dfp-thead'>";
      echo '<tr>';
      echo '<th><span>#</span></th>';
      foreach ( $table['header'] as $th ) {
        echo '<th><span>';
        echo $th['c'];
        echo '</span></th>';
      }
      echo '</tr>';
      echo '</thead>';
    }
    echo '<tbody>';
    $i = 1;
    foreach ( $table['body'] as $tr ) {
      echo '<tr>';
      echo '<td><span>'.$i.'.</span></td>';
      foreach ( $tr as $td ) {
        echo '<td><span class="mHc">';
        echo $td['c'];
        echo '</span></td>';
      }
      echo '</tr>';
      $i++;
    }
    echo '</tbody>';
    echo '</table></div>';
    echo '</div>';
  }  
}

function cbv_get_excerpt($limit = 8, $dot = ''){
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`',$dot,$excerpt);
  return $excerpt;
}

function cookieset($atts = []){
   // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $atts = shortcode_atts([
               'url' => '#',
           ], $atts);
  $output = '<div class="catapult-cookie-wrp">
  <div id="catapult-cookie-bar" class="catapult-cookie-bar clearfix">
    <div class="catapult-cookie-topbar">
      <i><img src="'.THEME_URI.'/assets/images/cookie-icon.svg"></i>
      <strong class="catapult-close-btn">
       <img src="'.THEME_URI.'/assets/images/cookie-close-icon.svg">
      </strong>
    </div>
    <span class="ctcc-left-side">
      <h4>Deze website maakt gebruik van cookies.</h4>
      Phasellus ac tortor mi. Aliquam eget volutpat elit. Duis dapibus dolor sit amet arcu porttitor laoreet. Mauris eget massa nulla. 
      <a class="ctcc-more-info-link" tabindex="0"  href="'.$atts['url'].'">Meer Info</a>
    </span>
    <span class="catapultCookieBtn">
      
    </span>
    <a role="button" tabindex="0" data-cli_action="accept" id="cookie_action_close_header" class="medium cli-plugin-main-button cookie_action_close_header cli_action_button">ok, bedankt</a>
  </div>
</div>';
$output .= '<style>
#cookie-law-info-bar {
    border: 0;
    font-size: initial;
    margin: 0 auto;
    padding: 0 !important;
    position: inherit;
    width: initial;

    box-shadow: transparent;
}
.cli-plugin-button, .cli-plugin-button:visited {
    text-decoration: none;
    position: inherit !important;
    background-color: transparent !important;
    display: none !important;
}
</style>';
return $output;
}

add_shortcode('getcookie', 'cookieset' );