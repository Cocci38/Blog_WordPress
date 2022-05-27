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
// $cat = get_query_var('cat');
// query_posts('cat' . $cat );
// var_dump(query_posts('cat' . $cat . '&orderby=desc'));
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
var_dump($args['cat']);
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

$dupe = $wpdb->get_results( $wpdb->prepare("SELECT name_champ, type_input, name_label FROM `wp_mfp_champ`
INNER JOIN wp_mfp_liaison ON wp_mfp_champ.id_champ = wp_mfp_liaison.champ_id
INNER JOIN wp_mfp_input ON wp_mfp_liaison.input_id = wp_mfp_input.id_input
WHERE category_id = 18"));


//var_dump($dupe);
?>
<form action="" method="post">
    <?php foreach ($dupe as $key) { 
        //echo "<pre>",print_r( $key) ,"</pre><br>";?>

        
        <label for="<?= $key->name_input ?>"><?= $key->name_label ?></label>
        <input type="<?= $key->name_input ?>">
    <?php } ?>
        <div class="wp-block-button is-style-primary">
            <button type="submit" class="wp-block-button__link">Je valide</button>
        </div>
</form>
<?php
// On réinitialise à la requête principale (important)
wp_reset_postdata();
//echo '<pre>' .print_r($my_query) . '<pre>';
