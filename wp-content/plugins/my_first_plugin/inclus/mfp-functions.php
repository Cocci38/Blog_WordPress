<?php

/*
Ce fichier est l’endroit où toutes les fonctions de mon plugin seront stockées.

L’écriture d’une nouvelle fonction implique les étapes suivantes :

- Écrire un commentaire décrivant la fonction
- Nommer la fonction
- Écrire la fonction
*/

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
        'My First Plugin', // Le texte à afficher en tant que lien de menu (ce devrait être le nom du plugin)
        'manage_options', // La capacité pour l’utilisateur d’afficher le menu
        'includes/mfp-first-acp-page.php' // Le fichier à utiliser lors de l’affichage de la page réelle
    );
}









?>