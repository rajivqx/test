<?php 

function enqueue_my_scripts() {
  // Enqueue custom JS file in the footer
  wp_enqueue_script( 'my-custom-script', get_stylesheet_directory_uri() . '/js/my-custom-script.js', array( 'jquery' ), false, true );
  
  // Enqueue custom CSS file in the footer
  wp_enqueue_style( 'my-custom-style', get_stylesheet_directory_uri() . '/css/my-custom-style.css', array(), false, 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts' );




// File access method in Template file
style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/rsbalt3.jpg')"

// css including method
wp_enqueue_style('nhsinform-style', get_stylesheet_uri(), array(), _S_VERSION );
wp_enqueue_style('app-style','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css',array(), _S_VERSION);
wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css',array(), _S_VERSION);

//js including method
wp_enqueue_script('jquery-3.3.1.min', get_template_directory_uri().'/assets/js/jquery-3.3.1.min.js', array(), _S_VERSION, true );
wp_enqueue_script('bootstrap-bundle-min', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );

wp_enqueue_script( 'custom-js', get_template_directory_uri().'/js/custom-js.js', array(), _S_VERSION, true );

// Implement the Custom Header feature.
 
require get_template_directory().'/inc/custom-header.php';

require get_template_directory().'/inc/template-tags.php';

//including header method
get_header();
include_once(get_template_directory() .'/assets/site_parts/common_blocks/head.php'); 
?>


?>





<?php 
// list of catwgory acces methos
echo get_the_category_by_ID( 'category_id_here' );

// array and object access method
echo $rsbCat[3]->name; 

$rsbCat=get_terms(['taxonomy' => 'ready_steady_baby_type', 'hide_empty'=>false]); 

<a href="<?php echo get_category_link($subcategory->term_id); ?>">
?> 



<?php $pageID = '7915';
	$postCcontent = get_post($pageID);
?>
<a href="<?php echo esc_url( get_permalink($pageID)); ?>">
<	h3><?php echo get_the_title($pageID); ?> </h3>
	<p>
		<?php echo $postCcontent->post_content;?>
	</p>
</a>




<?php
	$args = array(
		'type' => 'ready_steady_baby',
		'child_of' => 225,
		'taxonomy' => 'ready_steady_baby_type',
		'hide_empty' => false,
	);

	$subcategories = get_categories($args);

	foreach ($subcategories as $subcategory) {
		
?>
	<div class="col-lg-4 col-md-6 col-sm-12 mb-36">
		<a href="<?php echo get_category_link($subcategory->term_id); ?>" class="pannel_module panel-min-130 panel-min-130">
			<h3 class="module__title-ready">  <?php echo $subcategory->name; ?> <i class="fa-solid fa-angle-right"></i> </h3>
			<p> <?php echo $subcategory->description; ?></p>
		</a>
	</div>
<?php 
	}
?>





++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

<div id="sidebar">

<?php
// Let's generate info appropriate to the page being displayed.
if ( is_home() ) {
	// We're on the home page, so let's show a list of all top-level categories.
	wp_list_categories( 'optionall=0&sort_column=name&list=1&children=0' );
} elseif ( is_category() ) {
	// We're looking at a single category view, so let's show _all_ the categories.
	wp_list_categories( 'optionall=1&sort_column=name&list=1&children=1&hierarchical=1' );
} elseif ( is_single() ) {
	// We're looking at a single page, so let's not show anything in the sidebar.
} elseif ( is_page() ) {
	// We're looking at a static page. Which one?
	if ( is_page( 'About' ) ) {
		// Our about page.
		echo 'This is my about page!';
	} elseif ( is_page( 'Colophon' ) ) {
		echo 'This is my colophon page, running on WordPress ' . bloginfo( 'version' ) . '';
	} else {
		// Catch-all for other pages.
		echo 'Vote for Pedro!';
	}
} else {
	// Catch-all for everything else (archives, searches, 404s, etc)
	echo 'Pedro offers you his protection.';
}
?>

</div><!-- #sidebar -->


===============================================================================================================
<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'secondary-menu' => __( 'Secondary Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
?>

<?php
// Primary menu
wp_nav_menu( array(
  'theme_location' => 'primary-menu',
  'menu_class' => 'primary-menu-class',
) );

// Secondary menu
wp_nav_menu( array(
  'theme_location' => 'secondary-menu',
  'menu_class' => 'secondary-menu-class',
) );

?>

==================================================================================================









+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

<?php
$t = date("H");

if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?>



========================================================================================================
<?php
/**
 * Enqueue scripts and styles.
 */
function nhsinform_scripts(){

	wp_enqueue_style('nhsinform-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('app-style','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css',array(), _S_VERSION);

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css',array(), _S_VERSION);

	if(is_page('9254') || is_tax( 'languages' ) || is_singular('translations')){
		wp_enqueue_style('custom-ready',get_template_directory_uri().'/assets/css/custom-ready.css',array(), _S_VERSION);
		wp_enqueue_style('translations',get_template_directory_uri().'/assets/css/translations.css',array(), _S_VERSION);
	} else {
		wp_enqueue_style('custom',get_template_directory_uri().'/assets/css/custom.css',array(), _S_VERSION);
		wp_enqueue_style('ssd',get_template_directory_uri().'/assets/css/ssds.css',array(), _S_VERSION);
		wp_enqueue_style('layoutTemp',get_template_directory_uri().'/assets/css/layoutTemp.css',array(), _S_VERSION);
	}


		if(is_singular( 'mental-health-shg' )){
			wp_enqueue_style('shg-mental-health',get_template_directory_uri().'/assets/css/main.css',array(), _S_VERSION);	
		}
	wp_style_add_data('app-style','rtl','replace');
	
    wp_enqueue_script('jquery-3.3.1.min', get_template_directory_uri().'/assets/js/jquery-3.3.1.min.js', array(), _S_VERSION, true );

	wp_enqueue_script('bootstrap-bundle-min', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'custom-js', get_template_directory_uri().'/js/custom-js.js', array(), _S_VERSION, true );

	if(is_singular() && comments_open() && get_option( 'thread_comments' )){
		wp_enqueue_script( 'comment-reply' );
	}

if(is_singular( 'self-help-guides' ) || is_singular( 'symptoms-self-guides' )){
	wp_enqueue_script('shg-js', get_template_directory_uri().'/js/selfHelpGuide.js', array(), _S_VERSION, true );
	}
	wp_localize_script( 'shg-js', 'shg_js_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'home_url' => home_url(),
			
		)
	);

	if(is_singular( 'mental-health-shg' )){
		wp_enqueue_script( 'shg-custom-js', get_template_directory_uri().'/assets/js/custom.js', array(), _S_VERSION, true );
	}
	
}
add_action('wp_enqueue_scripts', 'nhsinform_scripts');

?>



=============================================================================================================

<?php


/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory().'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

require get_template_directory().'/inc/Class-wp-navwalker.php';

require get_template_directory().'/inc/custom_footer_widget.php';
require get_template_directory().'/inc/nhsinform_breadcrumbs.php';

if(is_admin()){
require get_template_directory().'/templates/get-all-shg.php';
}

require get_template_directory().'/inc/feedback_form.php';

require get_template_directory().'/inc/mental-health-shg.php';

//require get_template_directory().'/inc/mental-health-taxonomy.php';

/**
 * Load Jetpack compatibility file.
 */

if(defined('JETPACK__VERSION')){
	require get_template_directory().'/inc/jetpack.php';
}


add_filter( 'get_the_archive_title', function ($title) {    
	if ( is_category() ) {    
			$title = single_cat_title( '', false );    
		} elseif ( is_tag() ) {    
			$title = single_tag_title( '', false );    
		} elseif ( is_author() ) {    
			$title =get_the_author();    
		} elseif ( is_tax() ) { //for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title( '', false );
		}
	return $title;    
});

?>