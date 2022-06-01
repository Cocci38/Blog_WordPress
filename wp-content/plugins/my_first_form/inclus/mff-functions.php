<?php

require '../../../../wp-load.php';

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
function catId()
{
    $args = get_the_category();
    //$cat_id = $args['cat'];
// On exécute la WP Query
$my_query = new WP_Query($args);

// On lance la boucle !
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();

    the_ID();
    the_category();
    the_title();
    the_content();
    the_post_thumbnail();
    var_dump($args);
endwhile;
endif;
return $args;
}
// $args = array(
//     'cat' => '18',
//     'tax_query' => array(
//         array(
//             'taxonomy' => 'category',
//             'field'    => 'slug',
//             'terms'    =>'beignet',
//         ),
//     ),
// );


// function formulaire(){
//     global $wpdb;
//     echo 'coucou';
//     $dupe = $wpdb->get_results( $wpdb->prepare("SELECT name_champ, type_input, name_label FROM `wp_mfp_champ`
//     INNER JOIN wp_mfp_liaison ON wp_mfp_champ.id_champ = wp_mfp_liaison.champ_id
//     INNER JOIN wp_mfp_input ON wp_mfp_liaison.input_id = wp_mfp_input.id_input
//     WHERE category_id = 18"));

// ?>
// <form action="" method="post">
//     <?php foreach ($dupe as $key) { 
//         echo "<pre>",print_r( $key) ,"</pre><br>";?>

        
//         <label for="<?= $key->name_input ?>"><?= $key->name_label ?></label>
//         <input type="<?= $key->name_input ?>" name="<?= $key->name_champ ?>">
//     <?php } ?>
//         <div class="wp-block-button is-style-primary">
//             <button type="submit" class="wp-block-button__link">Je valide</button>
//         </div>
        
// </form>
// <?php
// }
// function shortcode_mon_formulaire(){
//     return '<form action="" method="post">
//     foreach ($dupe as $key) {       
//         <label for="$key->name_input ">$key->name_label </label>
//         <input type="$key->name_input " name="$key->name_champ ">
//     }
//         <div class="wp-block-button is-style-primary">
//             <button type="submit" class="wp-block-button__link">Je valide</button>
//         </div>
// </form>';
// }
$name = $_POST['name'];
$comment = $_POST['comment'];
$recette = $_POST['recette'];
$wpdb->insert(
    'wp_mfp_formulaire',
        array(
            'category_id' => $cat_id,
            'name' => $name,
            'comment' => $comment,
            'recette' => $recette,
        ),array('%d', '%s', '%s','%s' )
);
add_action('get_footer', 'formulaire');
//add_filter();
//add_shortcode('formulaire', 'shortcode_mon_formulaire');
// On réinitialise à la requête principale (important)
wp_reset_postdata();





?>