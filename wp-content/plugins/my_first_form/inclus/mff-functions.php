<?php
/**
	 * Displays a dropdown for filtering items in the list table by month.
	 *
	 * @since 3.1.0
	 *
	 * @global wpdb      $wpdb      WordPress database abstraction object.
	 * @global WP_Locale $wp_locale WordPress date and time locale object.
	 *
	 * @param string $post_type The post type.
	 */
function trouve() {
    $args = array(
        'cat' => '18',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    =>'beignet',
            ),
        ),
    );
    //var_dump($args['cat']);
    $cat_id = $args['cat'];
    // On exécute la WP Query
    $my_query = new WP_Query($args);
    
    // On lance la boucle !
    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    
        // the_ID();
        // the_category();
        // the_title();
        //the_content();
        //the_post_thumbnail();
    
    endwhile;
    endif;
}
var_dump($args['cat']);


?>