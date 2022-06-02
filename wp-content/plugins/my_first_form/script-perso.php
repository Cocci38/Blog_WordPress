<?php
    require_once('admin.php');
    include_once('./admin-header.php'); 

/**
	 * Pour récupérer les données du formulaire 
	 *
	 * @since 3.1.0

	 */
        global $wpdb;

        $dupe = $wpdb->get_results( $wpdb->prepare("SELECT nom, comment, recette FROM `wp_mfp_formulaire`"));
        //var_dump($dupe);
        // error_log('$dupe 1: '.print_r($dupe,1));
        //echo "<pre>",print_r( $dupe[0]) ,"</pre><br>"
    ?>

    <div class="wrap nosubsub"> 

        <h2><?php echo esc_html($title); ?></h2>
        <table>
    <thead>
    <tr>
        <th>Utilisateur</th>
        <th>Commentaire</th>
        <th>Recette</th>
    </tr>
    </thead>
    <?php
            foreach ($dupe as $key) { 
                //echo "<pre>",print_r($key),"</pre>";
                ?>
            
                <tr>
                <td><?= $key->nom ?></td>
                <td><?= $key->comment ?></td>
                <td><?= $key->recette ?></td>
            </tr>
                <?php }  ?>

</table>
    </div>
<?php include('./admin-footer.php');