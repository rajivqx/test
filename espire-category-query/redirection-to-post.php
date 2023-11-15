<?php 
/* 
Template Name: Ready Steady Baby
*/


get_header('ready-main'); ?>



    <!-- Mobile Search HTML Start -->
    <form class="custom_search mobile_search_detail">
        <input class="form-control" type="text" placeholder="Search NHS inform/Services" aria-label="Search">
        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <!-- Mobile Search HTML End -->

  

    <nav class="breadcrumb_section" aria-label="breadcrumb">
        <div class="container">
            <div class="col-sm-12">
            <?php //get_sidebar('breadcrumb');?>
            <ol class="breadcrumb" id="yost_custom">
        <li class="breadcrumb-item"><a class="nhsuk-breadcrumb__link" href="<?php echo home_url();?>">Home</a></li>
       
       </ol>
        </div>
    </div>
    </nav>
    
    <!--Alert Section HTML End-->

    <!--Banner Section HTML Start-->
    <div class="micro-baby"  style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/rsbalt3.jpg')">
        <div class="wrapper">
            <div class="row">
            <div class="container">
                <div class="col-sm-12 col-md-8 col-lg-7">
                    <div class="ready-title-steady">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1 class="no-margin clr"><?php the_title();?></h1>
                    <p class="ready-title-steady-font"><?php the_content(); ?></p>
                    <?php endwhile; wp_reset_postdata();?>
                    <?php endif; ?>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

 <div class="readySteady-wrapper" id="readySteadyID">   
    <!--Banner Section HTML End-->
    <?php $rsbCat=get_terms(['taxonomy' => 'ready_categories', 'hide_empty'=>false]);?>



    <!-- Symptoms Section HTML Start -->
    <div class="readySteadyLanding bg-ready-bc-green" id="readyLandingID">
        <div class="wrapper">
            <div class="row p3">
            <div class="col-sm-12 col-md-9 panel-content-ready m-18">
                <div class="panel-bg-line">
                    <?php
                        $category_slug = 'pregnancy'; // Replace with your category slug
                        $category = get_term_by('slug', $category_slug, 'ready_categories');
                        $category_name = $category->name;
                        // print_r($category);

                    ?>


    
                    <h2 class="panel-text" id="14658"> <?php echo $category_name;?> </h2>
                </div>
                <div class="cf js-equal-height row">
                        <!-- Child Item -->
                        

                        <?php
                            $args1 = array(
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ready_categories', // Replace with your custom taxonomy name
                                        'field' => 'slug',
                                        'terms' => 'pregnancy',
                                        'include_children' => false
                                    )
                                )
                            );
                            $my_query1 = new WP_Query($args1);
                        ?>

                        <?php if ($my_query1->have_posts()) : ?>
                            <?php while ($my_query1->have_posts()) : $my_query1->the_post(); ?>
                        
                                
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                            <a href="<?php the_permalink(); ?>" class="pannel_module panel-min-130 panel-min-130">
                                <h3 class="module__title-ready"><?php the_title(); ?> <i class="fa-solid fa-angle-right"></i> </h3>
                                <p>  <?php the_excerpt(); ?>    </p>
                            </a>
                        </div>

                        <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p><?php __('No Data'); ?></p>
                        <?php endif; ?>




                        <?php

                        $parent_category_slug = 'pregnancy';
                        $parent_category = get_term_by( 'slug', $parent_category_slug, 'ready_categories' );

                            $args = array(
                                'type' => 'ready-steady-baby',
                                'child_of' => $parent_category->term_id,
                                'taxonomy' => 'ready_categories',
                                'hide_empty' => false,
                            );

                            $subcategories = get_categories($args);
                            
                           






                            foreach ($subcategories as $subcategory) {
                                $custom_summry =''; 
                              $custom_summry = get_field('summary', $subcategory );
                                //echo '<pre>'; print_r($custom_field);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                            <a href="<?php echo get_category_link($subcategory->term_id); ?>" class="pannel_module panel-min-130 panel-min-130">
                                <h3 class="module__title-ready"> <?php echo $subcategory->name; ?> <i class="fa-solid fa-angle-right"></i> </h3>
                                <p> <?php echo isset($custom_summry) ? $custom_summry:""; ?></p>
                            </a>
                        </div>
                        <?php 
                            }
                        ?>
                        
                        <!-- Child Item -->
                        
                </div>
            </div>
            <div class="col-md-3 show-for-medium-up p-18 readyRightAlign">
                    <img class="microsite__landing-image" src="<?php echo get_template_directory_uri();?>/assets/images/pregnancy.png" alt="1 (1)" data-id="14652" data-type="png">
            </div>
        </div>
        </div>
    </div>

    <div class="readySteadyLanding bg-ready-bc-purple" id="readyLandingID">
        <div class="wrapper">
            <div class="row p3">
            <div class="col-sm-12 col-md-9 panel-content-ready">
                <div class="panel-bg-line">
                    <?php
                        $category_slug = 'labour-and-birth'; // Replace with your category slug
                        $category = get_term_by('slug', $category_slug, 'ready_categories');
                        $category_name = $category->name;
                        // print_r($category);
                        // echo $category_name;

                    ?>
                    <h2 class="panel-text" id="14656"> <?php echo $category_name; ?>  </h2>
                </div>
                <div class="cf js-equal-height row">
                        <!-- Child Item -->
                        


                        <?php

                        $parent_category_slug = 'labour-and-birth';
                        $parent_category = get_term_by( 'slug', $parent_category_slug, 'ready_categories' );

                            $args = array(
                                'type' => 'ready-steady-baby',
                                'child_of' => $parent_category->term_id,
                                'taxonomy' => 'ready_categories',
                                'hide_empty' => false,
                            );

                            $subcategories = get_categories($args);

                            foreach ($subcategories as $subcategory) {
                                
                                $custom_summry =''; 
                              $custom_summry = get_field('summary', $subcategory );
                        ?>

                        

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                            <a href="<?php echo get_category_link($subcategory->term_id); ?>" class="pannel_module panel-min-130 panel-min-130">
                                <h3 class="module__title-ready"> <?php echo $subcategory->name; ?> <i class="fa-solid fa-angle-right"></i> </h3>
                                <p>  <?php echo isset($custom_summry) ? $custom_summry:""; ?>	</p>
                            </a>
                        </div>
                        

                        <?php 
                            }
                        ?>        


                        

                        

                        
                        <!-- Child Item -->
                        
                </div>
            </div>
            <div class="col-md-3 show-for-medium-up p-18 readyRightAlign">
                    <img class="microsite__landing-image" src="<?php echo get_template_directory_uri();?>/assets/images/rsbicon2babe.png" alt="1 (1)" data-id="14652" data-type="png">
            </div>
        </div>
    </div>
    </div>

    <div class="readySteadyLanding bg-ready-bc-lightGreen" id="readyLandingID">
        <div class="wrapper">
            <div class="row p3">
            <div class="col-sm-12 col-md-9 panel-content-ready">
                <div class="panel-bg-line">
                    <?php
                        
                        $category_slug = 'early-parenthood'; // Replace with your category slug
                        $category = get_term_by('slug', $category_slug, 'ready_categories');
                        $category_name = $category->name;
                        // print_r($category);
                        // echo $category_name;

                    
                    ?> 
                    <h2 class="panel-text" id="14655"> <?php echo $category_name; ?>  </h2>
                </div>
                <div class="cf js-equal-height row">
                        <!-- Child Item -->

                        <?php

                        $parent_category_slug = 'early-parenthood';
                        $parent_category = get_term_by( 'slug', $parent_category_slug, 'ready_categories' );

                            $args = array(
                                'type' => 'ready-steady-baby',
                                'child_of' => $parent_category->term_id,
                                'taxonomy' => 'ready_categories',
                                'hide_empty' => false,
                            );

                            $subcategories = get_categories($args);

                            foreach ($subcategories as $subcategory) {
                              $custom_summry =''; 
                              $custom_summry = get_field('summary', $subcategory );

                        ?>



                        <div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                            <a href="<?php echo get_category_link($subcategory->term_id); ?>" class="pannel_module panel-min-130 panel-min-130">
                                <h3 class="module__title-ready"><?php echo $subcategory->name; ?> <i class="fa-solid fa-angle-right"></i> </h3>
                                <p>  <?php  echo isset($custom_summry) ? $custom_summry:""; ?>	</p>
                            </a>
                        </div>

                        <?php 
                            }
                        ?>

                        



                        <?php
                            $args2 = array(
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ready_categories', // Replace with your custom taxonomy name
                                        'field' => 'slug',
                                        'terms' => 'early-parenthood',
                                        'include_children' => false
                                    )
                                )
                            );
                            $my_query2 = new WP_Query($args2);
                        ?>

                        <?php if ($my_query2->have_posts()) : ?>
                            <?php while ($my_query2->have_posts()) : $my_query2->the_post(); 
                                  $postID = $my_query2->post->ID;
                                 $redirect_to_content = get_field('redirect_to_content', $postID);
                                 if(!empty($redirect_to_content)){
                                    $permalink = $redirect_to_content;
                                 }
                                 else {
                                    $permalink = get_the_permalink($postID);
                                 }
                                ?>
                        
                                
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                            <a href="<?php echo $permalink; ?>" class="pannel_module panel-min-130 panel-min-130">
                                <h3 class="module__title-ready"><?php the_title(); ?> <i class="fa-solid fa-angle-right"></i> </h3>
                                <p>  <?php the_excerpt(); ?>    </p>
                            </a>
                        </div>

                        <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p><?php __('No Data'); ?></p>
                        <?php endif; ?>







                        
                        <!-- Child Item -->
                        
                </div>
            </div>
            <div class="col-md-3 show-for-medium-up p-18 readyRightAlign">
                    <img class="microsite__landing-image" src="<?php echo get_template_directory_uri();?>/assets/images/rsbicon3family.png" alt="1 (1)" data-id="14652" data-type="png">
            </div>
        </div>
        </div>
    </div>

    <div class="readySteadyLanding bg-ready-bc-green" id="readyLandingIDSecond">
        <div class="wrapper">
            <div class="row p3">
            <div class="col-sm-12 col-md-9 panel-content-ready">
                <div class="panel-bg-line">
                   <?php
                        
                        $category_slug = 'other-languages-and-formats'; // Replace with your category slug
                        $category = get_term_by('slug', $category_slug, 'ready_categories');
                        $category_name = $category->name;
                        // print_r($category);
                        // echo $category_name;

                    
                   ?>  

                    <h2 class="panel-text" id="19365"> <?php echo $category_name; ?>  </h2>
                </div>
                <div class="cf js-equal-height row">
                        <!-- Child Item -->
                        <?php
                             // the query
                            $the_query = new WP_Query(array(
                                // 'category_name' => 'other-languages-and-formats',
                                'post_type' => 'ready-steady-baby' ,
                                // 'category' => '368',
                                'post_status' => 'publish',
                                'posts_per_page' => 10,
                                'tax_query' => array(
                                                      array(
                                                        'taxonomy' => 'ready_categories',
                                                        // 'field' => 'term_id',
                                                        // 'terms' => '368'
                                                        'field' => 'slug',
                                                        'terms' => 'other-languages-and-formats'
                                                      )
                                                    )
                            ));
                            
                        ?>

                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); 
                                 $postID = $the_query->post->ID;
                                 $redirect_to_content = get_field('redirect_to_content', $postID);
                                 if(!empty($redirect_to_content)){
                                    $permalink = $redirect_to_content;
                                 }
                                 else {
                                    $permalink = get_the_permalink($postID);
                                 }
                                 ?>
                                
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-36">
                            <a href="<?php echo $permalink; ?>" class="pannel_module panel-min-130 panel-min-130">
                                <h3 class="module__title-ready"><?php the_title(); ?> <i class="fa-solid fa-angle-right"></i> </h3>
                                <p>  <?php the_excerpt(); ?>	</p>
                            </a>
                        </div>

                        <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p><?php __('No News'); ?></p>
                        <?php endif; ?>


                        <!-- Child Item -->
                        
                </div>
            </div>
            <div class="col-md-3 show-for-medium-up p-18 readyRightAlign">
                    <img class="microsite__landing-image" src="<?php echo get_template_directory_uri();?>/assets/images/pregnancy.png" alt="1 (1)" data-id="14652" data-type="png">
            </div>
        </div>
        </div>
    </div> 
    
     

</div>
   <!-- Symptoms Section HTML End -->
    <!-- Footer HTML Start -->
<?php get_footer(); ?>