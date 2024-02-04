<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles()
{
    wp_enqueue_style('parent_style', get_template_directory_uri(). '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', [], filemtime(get_stylesheet_directory() . '/css/theme.css'));
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    wp_enqueue_style('widget_style', get_stylesheet_directory_uri() . '/css/widgets/image-titre-widget.css', [], filemtime(get_stylesheet_directory() . '/css/widgets/image-titre-widget.css'));
    wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', [], filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));
    wp_enqueue_style('bloc-lien-image-widget', get_stylesheet_directory_uri() . '/css/widgets/bloc-lien-image.css', [], filemtime(get_stylesheet_directory() . '/css/widgets/bloc-lien-image.css'));
}

/* CHARGEMENT DES WIDGETS */
require_once(__DIR__ . '/widgets/ImageTitreWidget.php');
require_once(__DIR__ . '/widgets/BlocLienImageWidget.php');

function register_widgets()
{
    register_widget('Image_Titre_Widget');
    register_widget('Bloc_Lien_Image');
}

add_action('widgets_init', 'register_widgets');

/* SHORTCODES */

add_shortcode('banniere-titre', 'banniere_titre_func');

function banniere_titre_func($atts)
{
    $atts = shortcode_atts([
        'src' => '',
        'titre' => 'Titre'
    ], $atts, 'banniere-titre');

    ob_start();

    if ($atts['src'] != "") {
        ?>

        <div class="banniere-titre" style="background-image: url(<?= $atts['src'] ?>";>
            <h2 class="titre"><?= $atts['titre'] ?></h2>
        </div>

        <?php
    }

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/* HOOK FILTERS */

// Filtre le titre de l'article et le renomme pour la catégorie outil
function the_title_filter($title)
{
    if (is_single() && in_category('outils') && in_the_loop()) {

        return 'Outil : ' . $title;
    }

    return $title;
}

add_filter('the_title', 'the_title_filter');

// Filtre le titre de la catégorie dans la page archive
add_filter('get_the_archive_title', function($title) {
    if (is_category()) {
        $title = "Liste des " . strtolower(single_cat_title('', false));
    }
    return $title;
});

function the_category_filter($categories)
{
    return str_replace("Outils", "Tous les outils", $categories);
}

add_filter('the_category', 'the_category_filter');

function the_content_filter($content)
{
    if (is_single() && in_category('outils')) {
        return '<hr><h2>Description</h2>' . $content;
    }
    return $content;
}

add_filter('the_content', 'the_content_filter');

function the_excerpt_filter($content)
{
    if (is_archive()) {
        return $content . "<div class='more-excerpt'><a href='".get_the_permalink()."'>En savoir plus sur l'outil</a></div>";
    }
    return $content;
}

function paginate_links_filter($r)
{
    return "Pages ". $r;
}

add_filter('paginate_links_output', 'paginate_links_filter');

/* HOOK ACTION */
function loop_end_action() 
{
    if (is_archive()) : ?>
        <p class="after-loop">
            <?php 
                echo do_shortcode('[banniere-titre titre="BricoTips" src="http://localhost/bricotips/wp-content/uploads/2024/02/banniere-image.webp"]');
            ?>
        </p>
        <?php
    endif;
}

add_action('loop_end', 'loop_end_action');

$shown = false;

function bricotips_intro_section_action() 
{
    global $shown;
    if (is_archive() && !$shown): 
        ?>
        <p class="intro">
        Vous trouverez dans cette page la liste de tous les outils que nous avons référencée pour le moment. La liste n'est pas exhaustive, mais s'enrichira au fur et à mesure.
        </p>
        <?php
        $shown = true;
    endif;

}

add_action('bricotips_intro_section', 'bricotips_intro_section_action');