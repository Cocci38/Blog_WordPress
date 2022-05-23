<?php
require_once '../../../../wp-load.php';
/*
Ce fichier est l’endroit où toutes les fonctions de mon plugin seront stockées.

L’écriture d’une nouvelle fonction implique les étapes suivantes :

- Écrire un commentaire décrivant la fonction
- Nommer la fonction
- Écrire la fonction
*/
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

/*
 * Ajouter un nouveau menu sur le panneau de contrôle administrateur.
 */

// Crochet d'action 'admin_menu', execute la fonction 'mfp_Add_My_Admin_Link()'
// add_action( 'admin_menu', 'mfp_Add_My_Admin_Link' );

// On définit les arguments pour définir ce que l'on souhaite récupérer
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    =>'beignet',
        ),
    ),
);
//var_dump($args);
// On exécute la WP Query
$my_query = new WP_Query($args);

// On lance la boucle !
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    
    the_ID();
    the_category();
    the_title();
    the_content();
    //the_post_thumbnail();
    
endwhile;
endif;

// On réinitialise à la requête principale (important)
wp_reset_postdata();
//echo '<pre>' .print_r($my_query) . '<pre>';
