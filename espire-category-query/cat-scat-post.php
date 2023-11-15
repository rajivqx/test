====================================================================================================================

<?php
// Standard Loop
// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>




<?php
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<h2><?php the_title(); ?></h2>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



=================================================================================================================


<?php

// The Query
$query1 = new WP_Query( $args );

// The Loop
while ( $query1->have_posts() ) {
	$query1->the_post();
	echo '<li>' . get_the_title() . '</li>';
}

/* Restore original Post Data
 * NB: Because we are using new WP_Query we aren't stomping on the
 * original $wp_query and it does not need to be reset with
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
wp_reset_postdata();

/* The 2nd Query (without global var) */
$query2 = new WP_Query( $args2 );

// The 2nd Loop
while ( $query2->have_posts() ) {
	$query2->the_post();
	echo '<li>' . get_the_title( $query2->post->ID ) . '</li>';
}

// Restore original Post Data
wp_reset_postdata();

?>

====================================================================================================================

To display only the posts belonging to the parent category and not any of its subcategories, you can use the following custom query in WordPress:


<?php
$args = array(
    'category__in'     => get_queried_object_id(), // Gets the current parent category ID
    'category__not_in' => get_term_children( get_queried_object_id(), 'category' ), // Excludes posts from subcategories
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Display post content here
    }
    wp_reset_postdata();
} else {
    // No posts found
}
?>



===============================================
<?php
$args = array(
    'tax_query' => array(
        array(
            'taxonomy' => 'custom_taxonomy_name', // Replace with your custom taxonomy name
            'field' => 'id',
            'terms' => get_queried_object_id(),
            'include_children' => false
        )
    )
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Display post content here
    }
    wp_reset_postdata();
} else {
    // No posts found
}
?>

==============================================================================================================










<?php
$args = array('child_of' => 17);
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
    echo '<p> Description:'. $category->description . '</p>';
    echo '<p> Post Count: '. $category->count . '</p>';  
}
?>


To get posts from a child category of a custom post type in WordPress, you can use the WP_Query class with the appropriate parameters. Here's an example code snippet to achieve this:

<?php
$args = array(
   'post_type' => 'your-custom-post-type',
   'category_name' => 'parent-category/child-category'
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
   while ( $query->have_posts() ) {
      $query->the_post();
      // Output your post content here
   }
} else {
   // No posts found
}

wp_reset_postdata();

?>






List all subcategories from category
++++++++++++++++++++++++++++++++++++
<?php	
	$categories = get_terms( array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent' => 17 // or 
		//'child_of' => 17 // to target not only direct children
	) );
	
	foreach($categories as $category) { 
		echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
		echo '<p> Description:'. $category->description . '</p>';
		echo '<p> Post Count: '. $category->count . '</p>';  
	}
?>

++++++++++++
<?php
$args = array('child_of' => 17);
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
    echo '<p> Description:'. $category->description . '</p>';
    echo '<p> Post Count: '. $category->count . '</p>';  
}
?>
++++++++++++
<?php
$args = array('parent' => 17);
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
    echo '<p> Description:'. $category->description . '</p>';
    echo '<p> Post Count: '. $category->count . '</p>';  
}
?>
+++++++++++++





To list all the subcategories of a custom category of a custom post type, you can use the get_categories() function in WordPress. Here is an example code snippet:

<?php
$args = array(
    'type' => 'post',
    'child_of' => YOUR_CUSTOM_CATEGORY_ID,
    'taxonomy' => 'YOUR_CUSTOM_TAXONOMY_SLUG',
    'hide_empty' => 0,
);

$subcategories = get_categories($args);

foreach ($subcategories as $subcategory) {
    echo $subcategory->name;
}

?>

+++++++++++
For custom post types "categories" use get_terms().
<?php
$categories = get_terms( array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent' => 17 // or 
                //'child_of' => 17 // to target not only direct children
            ) );
            
            foreach($categories as $category) { 
                echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
                echo '<p> Description:'. $category->description . '</p>';
                echo '<p> Post Count: '. $category->count . '</p>';  
            }
?>






++++++++++++
<?php
	$args = array('parent' => 17);
	$categories = get_categories( $args );
	foreach($categories as $category) { 
		echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
		echo '<p> Description:'. $category->description . '</p>';
		echo '<p> Post Count: '. $category->count . '</p>';  
	}
?>





+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

To display posts within subcategories within a category of a custom post type in WordPress, you can use the following code:

<?php
    $category = get_queried_object();
    $args = array(
        'post_type' => 'custom_post_type_name',
        'tax_query' => array(
            array(
                'taxonomy' => 'custom_taxonomy_name',
                'field'    => 'term_id',
                'terms'    => $category->term_id,
            ),
        ),
    );
    $query = new WP_Query($args);
    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            // Display the post content here
        }
    }
    wp_reset_postdata();
?>

Explanation:

First, we get the current category using the get_queried_object() function and store it in the $category variable.

Then, we define an array of arguments to pass to the WP_Query() function. We specify the custom post type as custom_post_type_name, and use a tax_query parameter to filter the posts by the current category ID.

We create a new instance of the WP_Query() class using the arguments we defined and store it in the $query variable.

We check if there are any posts returned by the query using the have_posts() method, and if so, we loop through each post using the the_post() function.

Inside the loop, you can display the post content as you like.

Finally, we reset the post data using the wp_reset_postdata() function to restore the original query and ensure that other post-related functions work correctly.

You can place this code in your WordPress theme files wherever you want to display the posts within subcategories within a category of a custom post type. For example, you can add this code to the custom post type template file (single-custom_post_type.php) within the loop to display the posts for each subcategory.


+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

To display subcategories within a category of a custom post type in WordPress, you can use the following code:


<?php
    $category = get_queried_object();
    $args = array(
        'parent' => $category->term_id,
        'hide_empty' => false,
        'taxonomy' => 'custom_taxonomy_name'
    );
    $subcategories = get_categories($args);
    if($subcategories) {
        echo '<ul>';
        foreach($subcategories as $subcategory) {
            echo '<li><a href="'.get_term_link($subcategory->term_id).'">'.$subcategory->name.'</a></li>';
        }
        echo '</ul>';
    }
?>


Explanation:

First, we get the current category using the get_queried_object() function and store it in the $category variable.

Then, we define an array of arguments to pass to the get_categories() function. We specify the parent category ID as the $category->term_id, set hide_empty to false so that empty subcategories are also displayed, and specify the taxonomy of the custom post type as custom_taxonomy_name.

We use the get_categories() function to get an array of subcategories that match the arguments we defined, and store it in the $subcategories variable.

We then check if there are any subcategories returned, and if so, we loop through each subcategory and display its name and link using the get_term_link() function.

Finally, we wrap the subcategory list in an unordered list (<ul>) for better formatting.

You can place this code in your WordPress theme files wherever you want to display the subcategories within a category of a custom post type. For example, you can add this code to the custom post type template file (single-custom_post_type.php) within the loop to display the subcategories for each category.






++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

To display subcategories within a category in WordPress, you can use the following code:

<?php
    $category = get_queried_object();
    $args = array(
        'parent' => $category->term_id,
        'hide_empty' => false
    );
    $subcategories = get_categories($args);
    if($subcategories) {
        echo '<ul>';
        foreach($subcategories as $subcategory) {
            echo '<li><a href="'.get_category_link($subcategory->term_id).'">'.$subcategory->name.'</a></li>';
        }
        echo '</ul>';
    }
?>


Explanation:

First, we get the current category using the get_queried_object() function and store it in the $category variable.

Then, we define an array of arguments to pass to the get_categories() function. We specify the parent category ID as the $category->term_id and set hide_empty to false so that empty subcategories are also displayed.

We use the get_categories() function to get an array of subcategories that match the arguments we defined, and store it in the $subcategories variable.

We then check if there are any subcategories returned, and if so, we loop through each subcategory and display its name and link using the get_category_link() function.

Finally, we wrap the subcategory list in an unordered list (<ul>) for better formatting.

You can place this code in your WordPress theme files wherever you want to display the subcategories within a category. For example, you can add this code to the category template file (category.php) within the loop to display the subcategories for each category.






++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Custome Template

<?php 
/* 
Template Name: Illnesses and conditions
*/
get_header(); ?>




<div class="col-lg-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title();?></h1>
                     <?php the_content(); ?>
                <?php endwhile; wp_reset_postdata();?>
                <?php endif; ?>
</div>



<?php

$hero=get_field('idname');
echo '<pre>';
print_r($hero);
die();

?>


<?php

$hero=get_field('idname');
echo '<pre>';
print_r($hero);
die();

?>






<?php 
/* 
Template Name: Winter Vaccines
*/

$wc_section_1=get_field('wc_section_1');
$wc_section_2=get_field('wc_section_2');
$wc_section_3=get_field('wc_section_3');
echo '<pre>';
print_r($wc_section_1);
print_r($wc_section_2);
print_r($wc_section_3);
die();


get_header(); ?>





[banner][url]
<?php echo $wc_section_3['heading'] ?> 


        style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/00663016_sgv_nhs-inform-page-images-1920x1080px6.jpg')">


<div class="col-sm-12 section-Alignment bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h2>
                    <?php echo $wc_section_3['heading'] ?> 
                    </h2>
<div class="editor">
<?php echo $wc_section_3['description'] ?> 
</div>
                </div>
            </div>
        </div>
    </div>
	
	 class="image-panel__overlay"
	 
	 
	 <?php // use inside loop echo $youtubevideo_code = wp_oembed_get( get_field('video_url') ); ?>



<iframe src="<?php echo $embedcode; ?>" width="600" height="350" frameborder="0"></iframe>


Custome Template

<?php 
/* 
Template Name: Illnesses and conditions
*/
get_header(); ?>




<div class="col-lg-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title();?></h1>
                     <?php the_content(); ?>
                <?php endwhile; wp_reset_postdata();?>
                <?php endif; ?>
</div>



<?php

$hero=get_field('idname');
echo '<pre>';
print_r($hero);
die();

?>


<?php 
/* 
Template Name: Winter Vaccines
*/

$wc_section_1=get_field('wc_section_1');
$wc_section_2=get_field('wc_section_2');
$wc_section_3=get_field('wc_section_3');
echo '<pre>';
print_r($wc_section_1);
print_r($wc_section_2);
print_r($wc_section_3);
die();


get_header(); ?>





[banner][url]
<?php echo $wc_section_3['heading'] ?> 


        style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/00663016_sgv_nhs-inform-page-images-1920x1080px6.jpg')">


<div class="col-sm-12 section-Alignment bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h2>
                    <?php echo $wc_section_3['heading'] ?> 
                    </h2>
<div class="editor">
<?php echo $wc_section_3['description'] ?> 
</div>
                </div>
            </div>
        </div>
    </div>
	
	 class="image-panel__overlay"
	 
	 
	 <?php // use inside loop echo $youtubevideo_code = wp_oembed_get( get_field('video_url') ); ?>



<iframe src="<?php echo $embedcode; ?>" width="600" height="350" frameborder="0"></iframe>





Showing categories and subcategories with posts










<?php
// showing-categories-and-subcategories-with-posts


// Get all the top-level categories
$categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0 
) );

// Loop through each category
foreach ( $categories as $category ) {
    echo '<h2>' . $category->name . '</h2>';

    // Get all the subcategories for this category
    $subcategories = get_categories( array(
        'orderby' => 'name',
        'parent'  => $category->term_id
    ) );

    // Loop through each subcategory and display its posts
    foreach ( $subcategories as $subcategory ) {
        echo '<h3>' . $subcategory->name . '</h3>';
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'category__in'   => $subcategory->term_id
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            echo '<ul>';
            while ( $query->have_posts() ) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        } else {
            echo 'No posts found';
        }
    }
}
?>


This code first gets all the top-level categories using get_categories() function, and then loops through each category to display its name. Inside the loop, it gets all the subcategories for that category using get_categories() function again, and then loops through each subcategory to display its name and posts.

For displaying posts, it uses WP_Query to get all the posts that belong to the current subcategory, and then loops through each post to display its title and permalink.

Note that this code assumes that you have assigned categories and subcategories to your posts in WordPress. If you haven't done so, you'll need to first create categories and subcategories and then assign them to your posts.





Wordpress custom post categories and subcategories on category.php

https://wordpress.stackexchange.com/questions/251890/wordpress-custom-post-categories-and-subcategories-on-category-php

If category don't have subcategories I need to display this:

<ul class="cat-arc-links">
    <li><a href="#" class="product-link">Product 1</a></li>
    <li><a href="#" class="product-link">Product 2</a></li>
    <li><a href="#" class="product-link">Product 3</a></li>
......
</ul>

<span class="subhead-title">Subcat 1</span>
<ul class="cat-arc-links">
    <li><a href="#" class="product-link">Product 1</a></li>
    <li><a href="#" class="product-link">Product 2</a></li>
    <li><a href="#" class="product-link">Product 3</a></li>
......
</ul>

<span class="subhead-title">Subcat 2</span>
<ul class="cat-arc-links">
    <li><a href="#" class="product-link">Product 1</a></li>
    <li><a href="#" class="product-link">Product 2</a></li>
    <li><a href="#" class="product-link">Product 3</a></li>
......
</ul>


$parent= get_queried_object()->term_id;
$taxonomy = get_categories('child_of='.$parent. '&hide_empty=0&echo=0&taxonomy=custom_taxonomy');

if(count($taxonomy) > 0){

     foreach ( $taxonomy as $row ) { 
        echo '<span>'.$row->name.'</span>';
        if(count($child)==$i){
            echo '<ul class="cat-arc-links">';
            $args=array( 'post_type' => 'custom_post','posts_per_page'=>1,'tax_query'  => array( array('taxonomy' => 'custom_taxonomy','terms' =>$row->term_id, 'field' => 'id' )) );
            $second_query = new WP_Query( $args );
                if ($second_query->have_posts()) :
                    while ($second_query->have_posts()) : $second_query->the_post();
                        echo ' <li><a href="'.get_permalink(get_the_ID()).'" class="product-link">'.get_the_title().'</a></li>';
                    endwhile; 
                endif; wp_reset_query();
            echo '</ul>';       
        }
     }

}else{
    echo '<ul class="cat-arc-links">';
    $args=array( 'post_type' => 'custom_post','posts_per_page'=>1,'tax_query'  => array( array('taxonomy' => 'custom_taxonomy','terms' =>get_queried_object()->term_id, 'field' => 'id' )) );
    $second_query = new WP_Query( $args );
        if ($second_query->have_posts()) :
            while ($second_query->have_posts()) : $second_query->the_post();
                echo ' <li><a href="'.get_permalink(get_the_ID()).'" class="product-link">'.get_the_title().'</a></li>';
            endwhile; 
        endif; wp_reset_query();
    echo '</ul>';       

}




++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Custom Template for CPT Categories

Any way to set a custom template for CPT categories?
Example: When Using Coding Category for PHP and Python CPT's.
Can I set a Custom Category template for PHP Posts, and another category template for Python Posts?

When you say CPT categories, is this a custom taxonomy or are you using the built in taxonomy named category for your custom post type? If it's a custom taxonomy, what is the name of the taxonomy?

If you're talking about the category (archive) you would create category-php.php for php cpt listing, and category-python.php' for python cpt listing. If you're talking about single posts you would use single-php.php` for php cpt's and single-python.php' for python cpt's, and if you want the content to change if they are in the coding` category you'd need to add a conditional, like if(in_category('coding')) { // use this code } else { // use default code }




++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Showing categories and subcategories with posts


https://wordpress.stackexchange.com/questions/270176/showing-categories-and-subcategories-with-posts

<?php

function ow_categories_with_subcategories_and_posts( $taxonomy, $post_type ) {
    $taxonomy   = $taxonomy;
    $post_type  = $post_type;

    // Get the top categories that belong to the provided taxonomy (the ones without parent)
    $categories = get_terms( 
        array(
            'taxonomy'   => $taxonomy,
            'parent'     => 0, // <-- No Parent
            'orderby'    => 'term_id',
            'hide_empty' => true // <-- change to false to also display empty ones
        )
    );
    ?>
    <div>
        <?php
        // Iterate through all categories to display each individual category
        foreach ( $categories as $category ) {

            $cat_name = $category->name;
            $cat_id   = $category->term_id;
            $cat_slug = $category->slug;

            // Display the name of each individual category
            echo '<h3>Category: ' . $cat_name . ' - ID: ' . $cat_id . ' - Slug: ' . $cat_slug  . '</h3>'; 


            // Get all the subcategories that belong to the current category
            $subcategories = get_terms(
                array(
                    'taxonomy'   => $taxonomy,
                    'parent'     => $cat_id, // <-- The parent is the current category
                    'orderby'    => 'term_id',
                    'hide_empty' => true
                )
            );
            ?>
            <div>
                <?php
                // Iterate through all subcategories to display each individual subcategory
                foreach ( $subcategories as $subcategory ) {

                    $subcat_name = $subcategory->name;
                    $subcat_id   = $subcategory->term_id;
                    $subcat_slug = $subcategory->slug;

                    // Display the name of each individual subcategory with ID and Slug
                    echo '<h4>Subcategory: ' . $subcat_name . ' - ID: ' . $subcat_id . ' - Slug: ' . $subcat_slug  . '</h4>';

                    // Get all posts that belong to this specific subcategory
                    $posts = new WP_Query(
                        array(
                            'post_type'      => $post_type,
                            'posts_per_page' => -1, // <-- Show all posts
                            'hide_empty'     => true,
                            'order'          => 'ASC',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'terms'    => $subcat_id,
                                    'field'    => 'id'
                                )
                            )
                        )
                    );

                    // If there are posts available within this subcategory
                    if ( $posts->have_posts() ):
                        ?>
                        <div>
                            <?php

                            // As long as there are posts to show
                            while ( $posts->have_posts() ): $posts->the_post();

                                //Show the title of each post with the Post ID
                                ?>
                                <p>Post: <?php the_title(); ?> - ID: <?php the_ID(); ?></p>
                                <?php

                            endwhile;
                            ?>
                        </div>
                        <?php
                    else:
                        echo 'No posts found';
                    endif;

                    wp_reset_query();
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
ow_categories_with_subcategories_and_posts( 'the_name_of_your_taxonomy', 'the_name_of_your_post_type' );

?>


++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
display wordpress posts by sub category


https://stackoverflow.com/questions/37042936/display-wordpress-posts-by-sub-category


function ow_subcategories_with_posts_by_category( $taxonomy, $post_type, $term ) {
    $category = get_term_by( 'slug', $term, $taxonomy );
    $cat_id   = $category->term_id;

    // Get all subcategories related to the provided $category ($term)
    $subcategories = get_terms(
        array(
            'taxonomy'   => $taxonomy,
            'parent'     => $cat_id,
            'orderby'    => 'term_id',
            'hide_empty' => true
        )
    );
    ?>
    <div>
        <?php
        // Iterate through all subcategories to display each individual subcategory
        foreach ( $subcategories as $subcategory ) {

            $subcat_name = $subcategory->name;
            $subcat_id   = $subcategory->term_id;
            $subcat_slug = $subcategory->slug;

            // Display the name of each individual subcategory with ID and Slug
            echo '<h4>Subcategory: ' . $subcat_name . ' - ID: ' . $subcat_id . ' - Slug: ' . $subcat_slug  . '</h4>';

            // Get all posts that belong to this specific subcategory
            $posts = new WP_Query(
                array(
                    'post_type'      => $post_type,
                    'posts_per_page' => -1, // <-- Show all posts
                    'hide_empty'     => true,
                    'order'          => 'ASC',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'terms'    => $subcat_id,
                            'field'    => 'id'
                        )
                    )
                )
            );

            // If there are posts available within this subcategory
            if ( $posts->have_posts() ):
                ?>
                <div>
                    <?php
                    while ( $posts->have_posts() ): $posts->the_post();

                        //Show the title of each post with the Post ID
                        ?>
                        <p>Post: <?php the_title(); ?> - ID: <?php the_ID(); ?></p>
                        <?php
                    endwhile;
                    ?>
                </div>
                <?php
            else:
                echo 'No posts found';
            endif;

            wp_reset_query();
        }
        ?>
    </div>
    <?php
}








++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Showing categories and subcategories with posts

$args = array(
  'post_type' => 'books',
  'posts_per_page' => -1, // Show all posts
  'tax_query' => array(
    array(
      'taxonomy' => 'book_category', // Category taxonomy name
      'field' => 'term_id',
      'terms' => get_terms( 'book_category', array( 'hide_empty' => false ) ), // Get all categories
      'operator' => 'IN'
    ),
    array(
      'taxonomy' => 'book_subcategory', // Subcategory taxonomy name
      'field' => 'term_id',
      'terms' => get_terms( 'book_subcategory', array( 'hide_empty' => false ) ), // Get all subcategories
      'operator' => 'IN'
    ),
  ),
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    // Display post title, category, and subcategory
    echo '<h2>' . get_the_title() . '</h2>';
    echo '<p>Category: ' . get_the_term_list( get_the_ID(), 'book_category', '', ', ' ) . '</p>';
    echo '<p>Subcategory: ' . get_the_term_list( get_the_ID(), 'book_subcategory', '', ', ' ) . '</p>';
  }
}

wp_reset_postdata();








++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Custom template for sub-sub-categories

https://wordpress.stackexchange.com/questions/300733/custom-template-for-sub-sub-categories






++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

class WP_Tax_Query {}
Core class used to implement taxonomy queries for the Taxonomy API.


$args = array(
    'post_type' => 'album',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'genre',
            'field'    => 'slug',
            'terms'    => array( 'jazz', 'improv' )
        )
    )
);
$query = new WP_Query( $args );


+++++++++++++++++++++



$args = array(
    'post_type' => 'album',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => array( 'genre', 'dance' ), // <-- NO! Does not work.
            'field'    => 'slug',
            'terms'    => array( 'jazz', 'improv', 'tango', 'jitterbug' )
        )
    )
);
$query = new WP_Query( $args );


+++++++++++++++++++++

$args = array(
    'post_type' => 'album',
    'post_status' => 'publish',
    'tax_query' => array(
		'relation' => 'OR',
        array(
            'taxonomy' => 'genre',
            'field'    => 'slug',
            'terms'    => array( 'jazz', 'improv' )
        ),
        array(
            'taxonomy' => 'dance',
            'field'    => 'slug',
            'terms'    => array( 'jazz', 'improv', 'tango', 'jitterbug' )
        )
    )
);
$query = new WP_Query( $args );






++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

https://wordpress.stackexchange.com/questions/300733/custom-template-for-sub-sub-categories

I'm trying to add a custom template for all posts in a sub-sub-category. I mean like

Category --> SubCategory Level 1 --> Subcategory Level 2 --> post


Instead of include(), use get_template_part()

<?php
$post = $wp_query->post;
if (cat_is_ancestor_of( 42, $cat ) ) {
  get_template_part( 'services', 'template' )
} else {
  get_template_part( 'single', 'default' );
}
?>




++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

<p>Category: <?php single_cat_title(); ?></p>


<?php echo get_the_category_by_ID( 'category_id_here' ); ?>

https://developer.wordpress.org/reference/functions/get_the_category_by_id/