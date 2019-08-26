<?php
/**
 * Template part for catagory chips
 *
 * @package The_Stallion
 */

?>

<?php //echo implode(" ",get_categories())

?>

    <?php
    $menuParamaters = array(
        'theme_location' => 'cat-menu',
        'menu_id'        => 'cat-menu',
        'items_wrap'     => '<div id="%1$s" class="mdc-chip-set--choice mdc-chip-set">%3$s</div>',
        'walker'         => new Catagory_Walker(),
    );

    wp_nav_menu( $menuParamaters);

    class Catagory_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0)
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        !empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= "<div id='menu-item-$item->ID' $class_names>";
        $attributes  = '';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before
        . "<a class='mdc-chip__text' $attributes>"
        . $args->link_before
        . $title
        . '</a></div>'
        . $args->link_after
        . $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);
    }
}
    ?>
</div>