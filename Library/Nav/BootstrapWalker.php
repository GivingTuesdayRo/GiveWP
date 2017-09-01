<?php

namespace GivingTuesdayWp\Library\Nav;

use Walker_Nav_Menu;

/**
 * Class BootstrapWalker
 * @package GivingTuesdayWp\Library\Nav
 *
 * Description: A custom WordPress nav walker class to implement the Bootstrap 4
 * navigation style in a custom theme using the WordPress built in menu manager.
 */
class BootstrapWalker extends Walker_Nav_Menu
{


    /** @noinspection PhpMethodNamingConventionInspection
     *
     * Starts the list before the elements are added.
     *
     * @inheritdoc
     */
    function start_lvl(&$output, $depth = 0, $args = [])
    { // ul
        $indent = str_repeat("\t", $depth); // indents the outputted HTML
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }


    /**
     * Starts the element output.
     *
     * @inheritdoc
     */
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    { // li a span

        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= $indent . '<li class="divider" role="presentation">';
        } else if (strcasecmp($item->title, 'divider') == 0 && $depth === 1) {
            $output .= $indent . '<li class="divider" role="presentation">';
        } else if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= $indent . '<li class="dropdown-header" role="presentation">' . esc_html($item->title);
        } else if (strcasecmp($item->attr_title, 'disabled') == 0) {
            $output .= $indent . '<li class="disabled" role="presentation"><a href="#">' . esc_html($item->title) . '</a>';
        } else {
            $class_names = $value = '';
            $classes = empty($item->classes) ? array() : (array)$item->classes;
            $classes[] = 'nav-item menu-item-' . $item->ID;
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            /*
            if ( $args->has_children )
              $class_names .= ' dropdown';
            */
            if ($args->has_children && $depth === 0) {
                $class_names .= ' dropdown';
            } elseif ($args->has_children && $depth > 0) {
                $class_names .= ' dropdown-submenu';
            }
            if (in_array('current-menu-item', $classes)) {
                $class_names .= ' active';
            }
            // remove Font Awesome icon from classes array and save the icon
            // we will add the icon back in via a <span> below so it aligns with
            // the menu item
            if (in_array('fa', $classes)) {
                $key = array_search('fa', $classes);
                $icon = $classes[$key + 1];
                $class_names = str_replace($classes[$key + 1], '', $class_names);
                $class_names = str_replace($classes[$key], '', $class_names);
            }
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';
            $output .= $indent . '<li' . $id . $value . $class_names . '>';
            $atts = array();
            $atts['title'] = !empty($item->title) ? $item->title : '';
            $atts['target'] = !empty($item->target) ? $item->target : '';
            $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
            // If item has_children add atts to a.
            if ($args->has_children && $depth === 0) {
                $atts['href'] = '#';
                $atts['data-toggle'] = 'dropdown';
                $atts['class'] = 'nav-link dropdown-toggle';
            } else {
                $atts['href'] = !empty($item->url) ? $item->url : '';
                $atts['class'] = 'nav-link';
            }
            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (!empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }
            $item_output = $args->before;
            // Font Awesome icons
            if (!empty($icon)) {
                $item_output .= '<a' . $attributes . '><span class="fa ' . esc_attr($icon) . '"></span>&nbsp;';
            } else {
                $item_output .= '<a' . $attributes . '>';
            }
            $item_output .= $args->link_before . apply_filters('the_title', $item->title,
                    $item->ID) . $args->link_after;
            $item_output .= ($args->has_children && 0 === $depth) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }

    /**
     * Traverse elements to create list from elements.
     *
     * @inheritdoc
     */
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        if (!$element) {
            return;
        }
        $id_field = $this->db_fields['id'];
        // Display this element.
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback($args)
    {
        if (current_user_can('manage_options')) {
            extract($args);
            $fb_output = null;
            /** @var string $container */
            if ($container) {
                $fb_output = '<' . $container;
                /** @var String $container_class */
                if ($container_class) {
                    $fb_output .= ' class="' . $container_class . '"';
                }
                /** @var string $container_id */
                if ($container_id) {
                    $fb_output .= ' id="' . $container_id . '"';
                }
                $fb_output .= '>';
            }
            $fb_output .= '<ul';
            /** @var string $menu_class */
            if ($menu_class) {
                $fb_output .= ' class="' . $menu_class . '"';
            }
            /** @var string $menu_id */
            if ($menu_id) {
                $fb_output .= ' id="' . $menu_id . '"';
            }
            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">Add a menu</a></li>';
            $fb_output .= '</ul>';
            if ($container) {
                $fb_output .= '</' . $container . '>';
            }
            echo $fb_output;
        }
    }
}
