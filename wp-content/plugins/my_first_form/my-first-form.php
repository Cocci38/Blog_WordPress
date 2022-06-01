<?php
/*
Plugin Name: Mon premier formulaire
Description: Mon second plugin !
Author: Cocci38
Version: 1.0.0
*/
/*
C’est le fichier principal du plugin
*/

//=================================================
// Sécurité : On sort si ce fichier est appelé directement
//=================================================
//require_once '../../../wp-load.php';
// if ( !defined('ABSPATH') ) { 
//     die;
// }

// // fonction WordPress plugin_dir_path(__ FILE__) donne le chemin d’accès complet au répertoire où notre plugin est stocké.

	/**
	 * Pour faire apparaître le formulaire
	 *
	 * @since 3.1.0

	 */
function formulaire(){
    global $wpdb;
    $cat = get_the_category();
    //echo "<pre>",print_r( $cat[0]->term_taxonomy_id) ,"</pre><br>";
    $dupe = $wpdb->get_results( $wpdb->prepare("SELECT name_champ, type_input, name_label, category_id FROM `wp_mfp_champ`
    INNER JOIN wp_mfp_liaison ON wp_mfp_champ.id_champ = wp_mfp_liaison.champ_id
    INNER JOIN wp_mfp_input ON wp_mfp_liaison.input_id = wp_mfp_input.id_input
    WHERE category_id = " . $cat[0]->term_taxonomy_id));
    
?>
<form action="" method="post">
    <?php foreach ($dupe as $key) { 
        // echo "<pre>",print_r( $key) ,"</pre><br>";?>
        <input type="hidden" name="<?= 'category_id' ?>" value="<?= $key->category_id ?>">
        
        <label for="<?= $key->name_input ?>"><?= $key->name_label ?></label>
        <input type="<?= $key->name_input ?>" name="<?= $key->name_champ ?>">
        
    <?php } ?>
        <div class="wp-block-button is-style-primary">
            <button type="submit" class="wp-block-button__link">Je valide</button>
        </div>
        
</form>
<?php

//var_dump($_POST);
//echo "<pre>",print_r($_POST) ,"</pre><br>";die();
$category_id = $_POST['category_id'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$recette = $_POST['recette'];
$wpdb->insert(
    'wp_mfp_formulaire',
        array(
            'category_id' => $category_id,
            'name' => $name,
            'comment' => $comment,
            'recette' => $recette,
        ),array('%d', '%s', '%s','%s' )
);
}

//add_filter('the_content', 'formulaire');
add_action('get_footer', 'formulaire');