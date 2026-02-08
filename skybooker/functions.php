<?php

if ( ! defined( 'SKYBOOKER_VERSION' ) ) {
    define( 'SKYBOOKER_VERSION', '1.0' );
}

function skybooker_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'skybooker' ),
        'footer'  => __( 'Footer Menu', 'skybooker' ),
    ) );
}
add_action( 'after_setup_theme', 'skybooker_theme_setup' );

function skybooker_enqueue_assets() {
    wp_enqueue_style( 'skybooker-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null );
    wp_enqueue_style( 'skybooker-style', get_stylesheet_uri(), array( 'skybooker-fonts' ), SKYBOOKER_VERSION );
    wp_enqueue_script( 'skybooker-script', get_template_directory_uri() . '/assets/js/main.js', array(), SKYBOOKER_VERSION, true );
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );
}
add_action( 'wp_enqueue_scripts', 'skybooker_enqueue_assets' );

function skybooker_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'skybooker' ),
        'id'            => 'footer-1',
        'description'   => __( 'Footer widget area.', 'skybooker' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'skybooker' ),
        'id'            => 'footer-2',
        'description'   => __( 'Footer widget area.', 'skybooker' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'skybooker_widgets_init' );

function skybooker_register_flight_cpt() {
    $labels = array(
        'name'               => __( 'Flights', 'skybooker' ),
        'singular_name'      => __( 'Flight', 'skybooker' ),
        'add_new_item'       => __( 'Add New Flight', 'skybooker' ),
        'edit_item'          => __( 'Edit Flight', 'skybooker' ),
        'new_item'           => __( 'New Flight', 'skybooker' ),
        'view_item'          => __( 'View Flight', 'skybooker' ),
        'search_items'       => __( 'Search Flights', 'skybooker' ),
        'not_found'          => __( 'No flights found', 'skybooker' ),
        'not_found_in_trash' => __( 'No flights found in Trash', 'skybooker' ),
    );

    register_post_type( 'flights', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-airplane',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'rewrite'      => array( 'slug' => 'flights' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'skybooker_register_flight_cpt' );

function skybooker_register_flight_meta() {
    $fields = array(
        'departure_city',
        'arrival_city',
        'departure_date',
        'return_date',
        'price',
        'airline_name',
        'flight_number',
    );

    foreach ( $fields as $field ) {
        register_post_meta( 'flights', $field, array(
            'type'         => 'string',
            'single'       => true,
            'show_in_rest' => true,
        ) );
    }
}
add_action( 'init', 'skybooker_register_flight_meta' );

function skybooker_seed_flights() {
    if ( get_option( 'skybooker_seeded_flights' ) ) {
        return;
    }

    $existing = new WP_Query( array(
        'post_type'      => 'flights',
        'posts_per_page' => 1,
    ) );

    if ( $existing->have_posts() ) {
        update_option( 'skybooker_seeded_flights', true );
        return;
    }

    $sample_flights = array(
        array(
            'title'          => 'New York to Paris - Morning Express',
            'departure_city' => 'New York',
            'arrival_city'   => 'Paris',
            'departure_date' => date( 'Y-m-d', strtotime( '+10 days' ) ),
            'return_date'    => date( 'Y-m-d', strtotime( '+17 days' ) ),
            'price'          => '649',
            'airline_name'   => 'Skyline Air',
            'flight_number'  => 'SA 204',
        ),
        array(
            'title'          => 'London to Dubai - Evening Comfort',
            'departure_city' => 'London',
            'arrival_city'   => 'Dubai',
            'departure_date' => date( 'Y-m-d', strtotime( '+14 days' ) ),
            'return_date'    => date( 'Y-m-d', strtotime( '+21 days' ) ),
            'price'          => '720',
            'airline_name'   => 'Azure Wings',
            'flight_number'  => 'AW 980',
        ),
        array(
            'title'          => 'Tokyo to Singapore - Sunrise Route',
            'departure_city' => 'Tokyo',
            'arrival_city'   => 'Singapore',
            'departure_date' => date( 'Y-m-d', strtotime( '+5 days' ) ),
            'return_date'    => date( 'Y-m-d', strtotime( '+12 days' ) ),
            'price'          => '540',
            'airline_name'   => 'Pacific Jet',
            'flight_number'  => 'PJ 450',
        ),
        array(
            'title'          => 'Istanbul to Rome - Business Select',
            'departure_city' => 'Istanbul',
            'arrival_city'   => 'Rome',
            'departure_date' => date( 'Y-m-d', strtotime( '+8 days' ) ),
            'return_date'    => date( 'Y-m-d', strtotime( '+15 days' ) ),
            'price'          => '410',
            'airline_name'   => 'AeroVista',
            'flight_number'  => 'AV 318',
        ),
        array(
            'title'          => 'Sydney to Bali - Weekend Escape',
            'departure_city' => 'Sydney',
            'arrival_city'   => 'Bali',
            'departure_date' => date( 'Y-m-d', strtotime( '+20 days' ) ),
            'return_date'    => date( 'Y-m-d', strtotime( '+27 days' ) ),
            'price'          => '590',
            'airline_name'   => 'Coral Air',
            'flight_number'  => 'CA 112',
        ),
    );

    foreach ( $sample_flights as $flight ) {
        $post_id = wp_insert_post( array(
            'post_title'   => $flight['title'],
            'post_type'    => 'flights',
            'post_status'  => 'publish',
            'post_content' => 'Premium flight experience with flexible booking and curated amenities.',
        ) );

        if ( $post_id ) {
            foreach ( $flight as $key => $value ) {
                if ( 'title' === $key ) {
                    continue;
                }
                update_post_meta( $post_id, $key, $value );
            }
        }
    }

    update_option( 'skybooker_seeded_flights', true );
}
add_action( 'after_setup_theme', 'skybooker_seed_flights' );

function skybooker_get_flight_field( $post_id, $key, $default = '' ) {
    $value = get_post_meta( $post_id, $key, true );
    return $value ? $value : $default;
}

function skybooker_format_price( $price ) {
    if ( ! $price ) {
        return '';
    }
    return '$' . number_format_i18n( floatval( $price ) );
}

