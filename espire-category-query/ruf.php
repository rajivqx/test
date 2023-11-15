<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nhsinform
 */

get_header('ready-main');?>

    <!--Alert Section HTML Start-->
 

    

    <!--Alert Section HTML End-->

 
    <!--Banner Section HTML End-->
                      <!-- Breadcrumb HTML Start -->
                        <?php get_sidebar('breadcrumb');?>
           
    <!-- Symptoms Section HTML Start -->
    <section class="pannel_wrapper microsite_wrapper single-ready-steady">
        <div class="container">
            <div class="row">
  
                <div class="col-lg-9 col-sm-12 mb-4 panel-content guidetabs">
                  
                    <!-- <div class="wrapperNHS panel-content push--bottom push--top"> -->
                    <div class="row">
                        <div class="col col-sm-12">
                            <h1 class="giga bold primary-color push--bottom ">
                                <?php the_title();?>
                            </h1>
                        
                            
                        </div>

                    
   

                    <div class="col-sm-12">
    
                      <?php  while(have_posts()): the_post();?>
                        
                      <?php the_content(); 
                        if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;?>
                
                        <?php endwhile; ?>
                        
                        <?php
                            if(@get_field('feedback_disabled')[0] !="yes"){
                                get_sidebar('feedback-form'); 
                            } 
                        ?>

                        <div class="col-sm-12">
                        <p class="nhsuk-body-s nhsuk-u-secondary-text-color no-margin">
                         Last updated:
                        <br />
                        <?php  the_modified_date('d F Y'); ?>
                        </p>
                        </div>
                        
                        </div>

                    

                </div>
                


                </div>

                
                
                <div class="col-lg-3 col-sm-12 mb-4">
                   

                    <div class="panel-content panel-content--half push--bottom">
                        <div class="push--bottom">
                    <h3 class="gamma bold primary-color push-half--bottom">
                        Also on NHS inform
                    </h3>
                    <div class="overline bg-primary-color push-half--ends"></div>
                    <ul class="nhsuk-list list-style-none">
                            <li>
                                
        
        <a href="/illnesses-and-conditions/muscle-bone-and-joints/conditions/arthritis" rel="" target="_self" data-node-id="5961">
            Arthritis
        </a>
        
                            </li>
                    </ul>
                </div>
                <div class="push--bottom">
                    <h3 class="gamma bold primary-color push-half--bottom">
                        Other health sites
                    </h3>
                    <div class="overline bg-primary-color push-half--ends"></div>
                    <ul class="nhsuk-list list-style-none">
                            <li>
                                
        
        <a href="https://livingmadeeasy.org.uk" rel="external nofollow" target="_self" data-node-id="8892">
            Disabled Living Foundation (DLF)
            <i class="fa-solid fa-up-right-from-square"></i>
        </a>
        
                            </li>
                            <li>
                                
        
        <a href="http://www.ricability.org.uk" rel="external nofollow" target="_self" data-node-id="8893">
            Rica: consumer research charity <i class="fa-solid fa-up-right-from-square"></i>
        </a>
        
                            </li>
                            <li>
                                
        
        <a href="http://www.hcpc-uk.org" rel="external nofollow" target="_self" data-node-id="4943">
            Health &amp; Care Professions Council (HCPC) <i class="fa-solid fa-up-right-from-square"></i>
        </a>
        
                            </li>
                    </ul>
                </div>
        
            </div>


            <div class="panel-content panel-content--half push--bottom text-center pc-alter">
                <button class="btn--clean border-none" onclick="Velaro.Engagement.LoadPopoutChat()" onkeydown="Velaro.Engagement.LoadPopoutChat()">
                    <img src="https://api-visitor-us-east.velaro.com/20046/4564/button.jpg" alt="NHS Inform Live Support">
                </button>
            </div>

                <!-- <div class="col-lg-4 col-md-5 col-sm-12 mb-4 bg-white panel-content push--bottom push--top "> -->
                   
                </div>


 </div>
        </div>
    </section>

<?php
//get_sidebar();
get_footer();
get_sidebar('feedback_js');
get_sidebar('tab-pagination_js');
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ========================================================================================================================





<?php 
        //$term = get_term( $id, $taxonomy );
		//$slug = $term->slug;
		
		
		
		
		
		$term       = get_queried_object(); 
        // print_r($term);
        // die();
        // $getSlug    = $term->slug;
        
    
        $parent_id    = $term->parent;
        if($parent_id == 359):
        // server 362, local 359 
            get_template_part( 'template-parts/readysteadybaby', 'pregnancy' );
        elseif($parent_id == 360) :
        // server 36, local 360 

        get_template_part( 'template-parts/readysteadybaby', 'labourbirth' );
        else :
        get_template_part( 'template-parts/readysteadybaby', 'earlyparenthood' );
        endif;

        ?>






<?php
$term_Data  = get_queried_object();
                        $args = array(
                        'post_type' => 'ready-steady-baby',
                        'posts_per_page' => -1,
                        'tax_query' => array(             
                            array(
                                'taxonomy' => 'ready_categories',
                                'field' => 'slug',
                                'terms' =>  $term_Data->slug,
                            ),
                        )
                    );

                    $query = new WP_Query($args);
                    if($query->have_posts()){
                    while($query->have_posts()){
                        $query->the_post(); ?>

                        
                        <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo esc_url( get_permalink()); ?>" class="pannel_module">
                            <h3><?php the_title();?> <i class="fa-solid fa-angle-right"></i></h3>
                                <?php the_excerpt();?>
                            </a>
                        </div>
                    <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>








                        <?php
                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'ready_categories', // Replace with your custom taxonomy name
                                    'field' => 'slug',
                                    'terms' => 'pregnancy',
                                    'include_children' => false
                                )
                            )
                        );

                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                // Display post content here
                                the_title();
                            }
                            wp_reset_postdata();
                        } else {
                            // No posts found
                        }
                        ?>
						
						
						
						
						<div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                        <?php $pageID = '9755';
                            $postCcontent = get_post($pageID);
                        ?>
                            <a href="<?php echo esc_url( get_permalink($pageID)); ?>" class="pannel_module">
                            <h3><?php echo get_the_title($pageID); ?> <i class="fa-solid fa-angle-right"></i></h3>
                                <p>
                                    <?php echo $postCcontent->post_content;?>
                                </p>
                            </a>
                        </div>

























<?php 
        $term       = get_queried_object(); 
        $getSlug    = $term->slug;
        if($getSlug == "pregnancy"):
            get_template_part( 'template-parts/readysteadybaby', 'pregnancy' );?>
       <?php else :?>
        <?php get_template_part( 'template-parts/readysteadybaby', 'labourbirth' );?>
       <?php endif;?> 


          <?php
            if (is_home() ) :
            get_header('home' );
            elseif(is_404() ) :
            get_header('404' );
            else:
            get_header();
            endif;
          ?>

    <!-- Footer HTML Start -->
    <?php
    get_footer();
    ?>



























%category%/%postname%


Page id 1219


<?php echo $rsbCat[0]['name']; ?> 

echo $subcategory->name;
                                echo"</br>";
                                echo $subcategory->description;
                                echo"</br>";
                            }
							
							
							<?php echo get_category_link( $subcategorie->term_id ); ?>
							
							
							


health-problems-in-pregnancy


<!-- Mobile Search HTML Start -->
    <form class="custom_search mobile_search_detail">
        <input class="form-control" type="text" placeholder="Search NHS inform/Services" aria-label="Search">
        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <!-- Mobile Search HTML End -->

   <!-- Breadcrumb HTML Start -->
   <?php get_sidebar('breadcrumb');?>
    <!-- Breadcrumb HTML End -->
    <!-- Pannel Intro Section HTML Start -->
    <section class="pannel_intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                       <?php if(have_posts()):?>
						<?php
						    //post_type_archive_title('',false);
							the_archive_title( '<h1>', '</h1>');
							the_archive_description( '<p>', '</p>');
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;?>
                </div>
            </div>
        </div>
    </section>
    <!-- Pannel Intro Section HTML End -->
<?php 
        $term       = get_queried_object(); 
        $getSlug    = $term->slug;
        if($getSlug == "cancer"):
            get_template_part( 'template-parts/illnesses', 'cancer' );?>
       <?php else :?>
        <?php get_template_part( 'template-parts/illnesses', 'default' );?>
       <?php endif;?> 

    