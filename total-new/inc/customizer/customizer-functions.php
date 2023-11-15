<?php

add_action('wp_ajax_total_order_sections', 'total_order_sections');

function total_order_sections() {
    if (isset($_POST['sections'])) {
        set_theme_mod('total_frontpage_sections', $_POST['sections']);
    }
    wp_die();
}

function total_get_section_position($key) {
    $sections = total_home_section();
    $position = array_search($key, $sections);
    $return = ( $position + 1 ) * 10;
    return $return;
}

if (!function_exists('total_post_count_choice')) {

    function total_post_count_choice() {
        return array(3 => 3, 6 => 6, 9 => 9);
    }

}

if (!function_exists('total_percentage')) {

    function total_percentage() {
        for ($i = 1; $i <= 100; $i++) {
            $total_percentage[$i] = $i;
        }
        return $total_percentage;
    }

}

if (!function_exists('total_widget_list')) {

    function total_widget_list() {
        global $wp_registered_sidebars;
        $menu_choice = array();
        $widget_list['none'] = esc_html__('-- Choose Widget --', 'total');
        if ($wp_registered_sidebars) {
            foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
                $widget_list[$wp_registered_sidebar['id']] = $wp_registered_sidebar['name'];
            }
        }
        return $widget_list;
    }

}

if (!function_exists('total_cat')) {

    function total_cat() {
        $cat = array();
        $categories = get_categories(array('hide_empty' => 0));
        if ($categories) {
            foreach ($categories as $category) {
                $cat[$category->term_id] = $category->cat_name;
            }
        }
        return $cat;
    }

}

if (!function_exists('total_page_choice')) {

    function total_page_choice() {
        $page_choice = array();
        $pages = get_pages(array('hide_empty' => 0));
        if ($pages) {
            foreach ($pages as $pages_single) {
                $page_choice[$pages_single->ID] = $pages_single->post_title;
            }
        }
        return $page_choice;
    }

}

if (!function_exists('total_menu_choice')) {

    function total_menu_choice() {
        $menu_choice = array('none' => esc_html('Select Menu', 'total'));
        $menus = get_terms('nav_menu', array('hide_empty' => false));
        if ($menus) {
            foreach ($menus as $menus_single) {
                $menu_choice[$menus_single->slug] = $menus_single->name;
            }
        }
        return $menu_choice;
    }

}


if (!function_exists('total_icon_box_selector')) {

    function total_icon_box_selector() {
        echo '<div id="total-append-icon-box" class="total-icon-box" style="display:none">';
        echo '<div class="total-icon-search">';
        echo '<select>';

        if (apply_filters('total_show_ico_font', true)) {
            echo '<option value="icofont-list">' . esc_html__('Ico Font', 'total') . '</option>';
        }

        if (apply_filters('total_show_font_awesome', true)) {
            echo '<option value="fontawesome-list">' . esc_html__('Font Awesome', 'total') . '</option>';
        }

        if (apply_filters('total_show_material_icon', true)) {
            echo '<option value="material-icon-list">' . esc_html__('Material Icon', 'total') . '</option>';
        }

        if (apply_filters('total_show_essential_icon', true)) {
            echo '<option value="essential-icon-list">' . esc_html__('Essential Icon', 'total') . '</option>';
        }

        echo '</select>';
        echo '<input type="text" class="total-icon-search-input" placeholder="' . esc_html__('Type to filter', 'total') . '" />';
        echo '</div>';

        $active_class = ' active';

        if (apply_filters('total_show_ico_font', true)) {
            echo '<ul class="total-icon-list icofont-list total-clearfix' . $active_class . '">';
            $total_icofont_icon_array = total_icofont_icon_array();
            foreach ($total_icofont_icon_array as $total_icofont_icon) {
                echo '<li><i class="' . esc_attr($total_icofont_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        if (apply_filters('total_show_font_awesome', true)) {
            echo '<ul class="total-icon-list fontawesome-list total-clearfix' . $active_class . '">';
            $total_plus_font_awesome_icon_array = total_font_awesome_icon_array();
            foreach ($total_plus_font_awesome_icon_array as $total_plus_font_awesome_icon) {
                echo '<li><i class="' . esc_attr($total_plus_font_awesome_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        if (apply_filters('total_show_material_icon', true)) {
            echo '<ul class="total-icon-list material-icon-list total-clearfix' . $active_class . '">';
            $total_materialdesignicons_icon_array = total_materialdesignicons_array();
            foreach ($total_materialdesignicons_icon_array as $total_materialdesignicons_icon) {
                echo '<li><i class="' . esc_attr($total_materialdesignicons_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        if (apply_filters('total_show_essential_icon', true)) {
            echo '<ul class="total-icon-list essential-icon-list total-clearfix' . $active_class . '">';
            $total_essentialicons_icon_array = total_essential_icon_array();
            foreach ($total_essentialicons_icon_array as $total_essentialicons_icon) {
                echo '<li><i class="' . esc_attr($total_essentialicons_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        echo '</div>';
    }

}

add_action('customize_controls_print_footer_scripts', 'total_icon_box_selector');
