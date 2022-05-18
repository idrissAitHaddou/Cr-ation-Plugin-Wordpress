<?php
/**
 * Plugin Name: Change the Author Permalink Structure
 * Description:       this is plugin  to Change the Author Permalink Structure in your project
 */

add_action('init', 'cng_author_base');
function cng_author_base() {
    global $wp_rewrite;
    $author_slug = 'profile'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}