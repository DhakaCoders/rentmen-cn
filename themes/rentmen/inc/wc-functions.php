<?php 
defined( 'ABSPATH' ) || exit;

/*Remove Archive Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
	
	return false;
	
}

/*Loop Hooks*/


/**
 * Add loop inner details are below
 */
 
 remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3; // 3 products per row
    }
}

// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="breadcrumbs clearfix"><ul class="ulc clearfix">',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li class="wclist">',
            'after'       => '</li>',
            'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
	function add_shorttext_below_title_loop() {
		global $product, $woocommerce, $post;
        $product_thumb = '';
        $thumb_id = get_post_thumbnail_id($product->get_id());
        if(!empty($thumb_id)){
            $product_thumb = cbv_get_image_tag($thumb_id, 'prodgrid');
        }
		echo '<div class="product-grid-inr">
        <div class="product-grid-img"><a href="'.get_permalink( $product->get_id() ).'" class="overlay-link"></a>';
        echo $product_thumb;
        woocommerce_template_loop_add_to_cart( );
        echo '</div>
        <div class="product-grid-title">
        <h5><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h5>
        </div>
        </div>';
	}
}

add_action('woocommerce_before_shop_loop', 'shop_loop_custom_wrapper_start', 30, 2);
add_action('woocommerce_after_shop_loop', 'shop_loop_custom_wrapper_end', 10, 2);
function shop_loop_custom_wrapper_start(){
    echo '<div class="product-grid-wrp">';
}

function shop_loop_custom_wrapper_end(){
    echo '</div>';
}

add_action('woocommerce_before_single_product_summary', 'open_add_custom_div_inside_loop', 10);
add_action('woocommerce_after_single_product_summary', 'close_add_custom_div_inside_loop', 20);

function open_add_custom_div_inside_loop(){
    echo '<div class="home-top-content clearfix"><div class="fl-product clearfix">';
}

function close_add_custom_div_inside_loop(){
    echo '</div></div>';
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action('woocommerce_single_product_summary', 'add_custom_box_product_summary', 5);
if (!function_exists('add_custom_box_product_summary')) {
    function add_custom_box_product_summary() {
        global $product, $woocommerce, $post;
        $sh_desc = '';
        if( !empty($sh_desc) ) $sh_desc = $sh_desc;
        $sh_desc = $product->get_short_description();
        echo '<strong class="price">'.$product->get_price_html().' / stuk</strong>';
        echo '<div class="pro-details-pro-title">';
        echo '<strong>'.$product->get_title().'</strong>';
        echo '</div>';
        echo '<span>Totaal beschikbare producten: 129</span>';
        echo wpautop( $sh_desc, true );
        echo'<div class="pro-counter-wrp clearfix">';
        woocommerce_template_single_add_to_cart();
        echo'</div>';
    }
}

function product_option_custom_field(){
    global $product, $woocommerce;
    if( !$product->is_type('variable') ){
        $attributes = $product->get_attributes(); //get all attributes
        if ( !empty($attributes) && $attributes ):
        echo '<div class="single-pro-filter-wrp">';
        foreach ( $attributes as $attribute ){
          if ( $attribute['name'] == 'pa_color' || $attribute['name'] == 'color' ) {
            $pa_colors = get_the_terms( $product->get_id(), $attribute['name']);
            echo '<div class="color-filter">
                <h6>beschikbare kleur</h6>
                 <div class="feature-filter-btn clor">';
                 foreach ( $pa_colors as $pa_color ) {
                    $color_code = get_field('akleur', $pa_color);
                    $bgcolr = $pa_color->slug;
                    if( !empty($color_code) ) $bgcolr = $color_code; 
                echo '<input type="radio" id="'.$pa_color->slug.'" name="kleur" value="'.$pa_color->name.'">';
                echo '<label style="background:'.$bgcolr.'" for="'.$pa_color->slug.'">'.$pa_color->name.'</label>';
              }
            echo '</div></div>';
             
          } elseif ($attribute['name'] == 'pa_variabelen') {
              $pa_variabelens = get_the_terms( $product->get_id(), $attribute['name']);
              echo '<div class="variables-filter">
              <h6>variabelen</h6>
              <div class="feature-filter-btn">';
              foreach( $pa_variabelens as $pa_variabelen ) {
                echo '<input type="radio" id="'.$pa_variabelen->slug.'" name="variabelen" value="'.$pa_variabelen->name.'">';
                echo '<label for="'.$pa_variabelen->slug.'">'.$pa_variabelen->name.'</label>';
              }
              echo '</div></div>';
          } elseif ( ($attribute['name'] == 'pa_size') || ($attribute['name'] == 'size') ) {
              $pa_variabelens = get_the_terms( $product->get_id(), $attribute['name']);
              echo '<div class="variables-filter">
              <h6>Size</h6>
              <div class="feature-filter-btn">';
              foreach( $pa_variabelens as $pa_variabelen ) {
                echo '<input type="radio" id="'.$pa_variabelen->slug.'" name="size" value="'.$pa_variabelen->name.'">';
                echo '<label for="'.$pa_variabelen->slug.'">'.$pa_variabelen->name.'</label>';
              }
              echo '</div></div>';
          }
        }
        echo '</div>';
        endif;
    }
    echo '<div class="pro-calendar">';
    echo '<i><img src="'.THEME_URI.'/assets/images/pro-calendar.svg" alt=""></i>';
    echo '<span>selecteer datum en controleer beschikbaarheid</span>';
    echo '</div>';

}

function product_attribute_filter(){
    global $product, $woocommerce;
        $attributes = get_terms( 'pa_color', 'orderby=count&hide_empty=0' );
        if ( !empty($attributes) && $attributes ):
        echo '<div class="feature-filter-btn clor">';
            foreach ( $attributes as $pa_color ) {
                $color_code = get_field('akleur', $pa_color);
                $bgcolr = $pa_color->slug;
                if( !empty($color_code) ) $bgcolr = $color_code; 
                echo '<input type="checkbox" id="'.$pa_color->slug.'" name="kleur" value="'.$pa_color->name.'">';
                echo '<label style="background:'.$bgcolr.'" for="'.$pa_color->slug.'">'.$pa_color->name.'</label>';
              }
             
        echo '</div>';
        endif;

}

// Front: Calculate new item price and add it as custom cart item data
add_filter('woocommerce_add_cart_item_data', 'add_custom_product_data', 10, 3);
function add_custom_product_data( $cart_item_data, $product_id, $variation_id ) {
    $status = false;
    if ( isset($_POST['kleur']) && !empty($_POST['kleur'])) {
        $cart_item_data['color_val'] = $_POST['kleur'];
        $cart_item_data['color_label'] = 'Beschikbare Kleur';
        $status = true;
    }
    if ( isset($_POST['variabelen']) && !empty($_POST['variabelen'])) {
        $cart_item_data['variabe_val'] = $_POST['variabelen'];
        $cart_item_data['variabe_label'] = 'Variabelen';
        $status = true;
    }
    if ( isset($_POST['size']) && !empty($_POST['size'])) {
        $cart_item_data['size_val'] = $_POST['size'];
        $cart_item_data['size_label'] = 'Size';
        $status = true;
    }
    if($status){
       $cart_item_data['unique_key'] = md5(microtime().rand()); 
    }
    
    return $cart_item_data;
}

// Front: Display option in cart item
add_filter('woocommerce_get_item_data', 'display_custom_item_data', 10, 2);

function display_custom_item_data($cart_item_data, $cart_item) {
    if ( isset($cart_item['color_val']) && isset($cart_item['color_label']) ) {
        $cart_item_data[] = array(
            'name' => __($cart_item['color_label'], "woocommerce"),
            'value' => strip_tags($cart_item['color_val'])
        );

        
    }

    if( isset($cart_item['variabe_val']) && isset($cart_item['variabe_label']) ) {
        $cart_item_data[] = array(
            'name' => __($cart_item['variabe_label'], "woocommerce"),
            'value' => strip_tags($cart_item['variabe_val'])
        );
    }
    if( isset($cart_item['size_val']) && isset($cart_item['size_label']) ) {
        $cart_item_data[] = array(
            'name' => __($cart_item['size_label'], "woocommerce"),
            'value' => strip_tags($cart_item['size_val'])
        );
    }

    return $cart_item_data;
}


// Save and display custom fields in order item meta
add_action( 'woocommerce_add_order_item_meta', 'add_custom_fields_order_item_meta', 20, 3 );
function add_custom_fields_order_item_meta( $item_id, $cart_item, $cart_item_key ) {

    if ( isset($cart_item['color_val']) && isset($cart_item['color_label']) ) {
        wc_add_order_item_meta($item_id, $cart_item['color_label'], $cart_item['color_val']);
        
    }
    if( isset($cart_item['variabe_val']) && isset($cart_item['variabe_label']) ) {
        wc_add_order_item_meta($item_id, $cart_item['variabe_label'], $cart_item['variabe_val']);
    }
    if( isset($cart_item['size_val']) && isset($cart_item['size_label']) ) {
        wc_add_order_item_meta($item_id, $cart_item['size_label'], $cart_item['size_val']);
    }

}


function single_add_to_cart_text(){
    echo '<i><svg class="pro-cart-btn-svg" width="26" height="24" viewBox="0 0 26 24" fill="#fff"><use xlink:href="#pro-cart-btn-svg"></use></svg></i>';
    echo '<span>winkel nu</span>';
}

function mj_taxonomy_add_custom_meta_field() {
?>
<div class="form-field">
    <label for="term_meta[custom_titel_term_meta]"><?php _e( 'Category Custom Titel', 'MJ' ); ?></label>
    <input type="text" name="term_meta[custom_titel_term_meta]" id="term_meta[custom_titel_term_meta]" value="">
</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'mj_taxonomy_add_custom_meta_field', 0, 0 );

function mj_taxonomy_edit_custom_meta_field($term) {

        $t_id = $term->term_id;
        $term_meta = get_option( "taxonomy_$t_id" ); 
       ?>
        <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[custom_titel_term_meta]"><?php _e( 'Category Custom Titel', 'MJ' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[custom_titel_term_meta]" id="term_meta[custom_titel_term]" value="<?php echo esc_attr( $term_meta['custom_titel_term_meta'] ) ? esc_attr( $term_meta['custom_titel_term_meta'] ) : ''; ?>">
            </td>
        </tr>
    <?php
    }

add_action( 'product_cat_edit_form_fields','mj_taxonomy_edit_custom_meta_field', 10, 2 );

function mj_save_taxonomy_custom_meta_field( $term_id ) {
        if ( isset( $_POST['term_meta'] ) ) {

            $t_id = $term_id;
            $term_meta = get_option( "taxonomy_$t_id" );
            $cat_keys = array_keys( $_POST['term_meta'] );
            foreach ( $cat_keys as $key ) {
                if ( isset ( $_POST['term_meta'][$key] ) ) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option( "taxonomy_$t_id", $term_meta );
        }

    }  
add_action( 'edited_product_cat', 'mj_save_taxonomy_custom_meta_field', 10, 2 );  
add_action( 'create_product_cat', 'mj_save_taxonomy_custom_meta_field', 10, 2 );