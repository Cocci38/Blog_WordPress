<?php

	/**
	 * Pour récupérer le formulaire dans la base de donnée selon la catégorie de l'article
	 *
	 * @since 3.1.0

	 */

    //error_log('POST 1: '.print_r($_POST,1));
    
function formulaire(){
    global $wpdb;
    $cat = get_the_category();
    // $lien = get_site_url();
    // echo "<pre>",print_r($lien) ,"</pre><br>";
    $dupe = $wpdb->get_results( $wpdb->prepare("SELECT name_champ, type_input, name_label, category_id FROM `wp_mfp_champ`
    INNER JOIN wp_mfp_liaison ON wp_mfp_champ.id_champ = wp_mfp_liaison.champ_id
    INNER JOIN wp_mfp_input ON wp_mfp_liaison.input_id = wp_mfp_input.id_input
    WHERE category_id = " . $cat[0]->term_taxonomy_id));

    $result = "<form action='' method='post'>
    <input type='hidden' name= 'category_id' value=".$cat[0]->term_taxonomy_id.">";
        foreach ($dupe as $key) { 
            // echo "<pre>",print_r( $key) ,"</pre><br>"
            $result .= "<label for='$key->name_champ'> $key->name_label </label><br>
            <input type='$key->type_input' name='$key->name_champ'><br>";
            
        } 
        if (!empty($dupe)) {
            $result .="<br><div class='wp-block-button is-style-secondary'>
            <button type='submit' class='wp-block-button__link'>Je valide</button>
        </div>";

            //echo "<pre>",print_r($_POST) ,"</pre><br>";
        }
    "</form>"; 
    return $result  ;
//var_dump($_POST);
// echo "<pre>",print_r($_POST) ,"</pre><br>";die();
}

if (!empty($_POST)) {
    $category_id = $_POST['category_id'];
    $name = $_POST['nom'];
    $comment = $_POST['comment'];
    $recette = $_POST['recette'];
    $wpdb->insert(
    'wp_mfp_formulaire',
        array(
            'category_id' => $category_id,
            'nom' => $name,
            'comment' => $comment,
            'recette' => $recette,
        ),array('%d', '%s', '%s','%s' )
    );
}

	/**
	 * Pour afficher le formulaire sur le contenu avec le contenu
	 *
	 * @since 3.1.0

	 */
function afficher($content){
    $afficher = $content;
    $afficher .= formulaire();
    return $afficher;
}

// function category(){
//     $result = get_the_category();
//   print_r($result);
// }
error_log("Appel add filter");
add_filter('the_content', 'afficher', 1);
