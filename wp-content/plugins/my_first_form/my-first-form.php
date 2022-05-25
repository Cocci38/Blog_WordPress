<?php
/*
Plugin Name: Mon premier formulaire
Description: Mon second plugin !
Author: Cocci38
Version: 0.1
*/
/*
C’est le fichier principal du plugin
*/

//=================================================
// Sécurité : On sort si ce fichier est appelé directement
//=================================================
if ( !defined('ABSPATH') ) { 
    die;
}

// fonction WordPress plugin_dir_path(__ FILE__) donne le chemin d’accès complet au répertoire où notre plugin est stocké.
require_once plugin_dir_path(__FILE__) . 'inclus/mff-functions.php';

