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


/*
 * Ajouter un nouveau menu sur le panneau de contrôle administrateur.
 */

// Crochet d'action 'admin_menu', execute la fonction 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'mfp_Add_My_Admin_Link' );

// ajoute un nouveau lien de niveau supérieur au menu de navigation 
function mfp_Add_My_Admin_Link()
{
    add_menu_page(
        'My First Page', // Le titre de la page
        'My First Form', // Le texte à afficher en tant que lien de menu (ce devrait être le nom du plugin)
        'manage_options', // La capacité pour l’utilisateur d’afficher le menu
        //'includes/mff-first-acp-page.php' // Le fichier à utiliser lors de l’affichage de la page réelle
        'script-perso',
        'page_gen'
    );

}
function page_gen()
{
    include('script-perso.php');
}


