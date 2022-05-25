<?php
require_once '../../../wp-load.php';
/*
Plugin Name: Mon second plugin
Description: Mon second plugin !
Author: Cocci38
Version: 0.1
*/
/*
C’est le fichier principal du plugin
*/
// fonction WordPress plugin_dir_path(__ FILE__) donne le chemin d’accès complet au répertoire où notre plugin est stocké.
//require_once plugin_dir_path(__FILE__) . 'inclus/mfp-test.php';

$dupe = $wpdb->get_results( $wpdb->prepare("SELECT name_champ, type_input FROM `wp_mfp_champ`
INNER JOIN wp_mfp_liaison ON wp_mfp_champ.id_champ = wp_mfp_liaison.champ_id
INNER JOIN wp_mfp_input ON wp_mfp_liaison.input_id = wp_mfp_input.id_input
WHERE category_id = 18"));

//var_dump($dupe);
?>
<form action="" method="post">
    <?php foreach ($dupe as $key) { 
        //echo "<pre>",print_r( $value) ,"</pre><br>";
        //var_dump($value->name_champ);?>

        
        <label for="<?= $value->type_input ?>"><?= $value->name_champ ?></label>
        <input type="<?= $value->type_input ?>">
    <?php } ?>

</form>