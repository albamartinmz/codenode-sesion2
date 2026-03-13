<?php

//  Codenode Child Theme - Functions

// Cargamos los estilos del tema padre (Twenty Twenty)
function codenode_enqueue_styles() {
    wp_enqueue_style(
        'twentytwenty-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'codenode-style',
        get_stylesheet_uri(),
        array('twentytwenty-style')
    );
}
add_action('wp_enqueue_scripts', 'codenode_enqueue_styles');

// Cargamos el CSS y JS del formulario de contacto
function codenode_enqueue_contact_form() {
    if (is_page('contact')) {
        wp_enqueue_style(
            'contact-form-style',
            get_stylesheet_directory_uri() . '/contact-form.css'
        );
        wp_enqueue_script(
            'contact-form-script',
            get_stylesheet_directory_uri() . '/contact-form.js',
            array(),
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'codenode_enqueue_contact_form');