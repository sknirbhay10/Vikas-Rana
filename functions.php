<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    }
    
function exclude_category_home( $query ) {
if ( $query->is_home ) {
$query->set( 'cat', '-34' );
}
return $query;
}
 
add_filter( 'pre_get_posts', 'exclude_category_home' );

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );





/**
 * Add a sidebar.
 */
function retailwire_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Pre Footer', 'retailwire' ),
        'id'            => 'prefooter',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'retailwire' ),
        'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );
	
}
add_action( 'widgets_init', 'retailwire_widgets_init' );



function footerad() { 
?>
<div class="stickyFooterAds" id="stickyFooterAds" > 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Footer Ad Block -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3604249076514482"
     data-ad-slot="8634061239"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
    	jQuery(document).ready(function() {
		jQuery(".stickFooterClose").click(function(){
		jQuery("#stickyFooterAds").hide();
	});
	});
</script> 
<span class="stickFooterClose">x</span>
</div>

<?php
 }

//add_action( 'successcommercegurus_footer', 'footerad', 999 );

// This is your function, you can name it anything you want
function belowheaderad() { 
     if ( !is_home() && ! is_front_page() ) : ?>
 	<div class="container"> 	
           <?php // dynamic_sidebar( 'belowheader' ); ?> 
           <?php echo do_shortcode('[flexy_breadcrumb]');?>
        </div>
 <?php endif; 
 }

//add_action( 'successcommercegurus_maybe_mobile_menu', 'belowheaderad', 999 );


function gravatar_alt($crunchifyGravatar) {
	if (have_comments()) {
		$alt = get_comment_author();
	}
	else {
		$alt = get_the_author_meta('display_name');
	}
	$crunchifyGravatar = str_replace('alt=\'\'', 'alt=\'' . $alt . '\' title=\'Gravatar for ' . $alt . '\'', $crunchifyGravatar);
	return $crunchifyGravatar;
}
add_filter('get_avatar', 'gravatar_alt');
