<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-inner">
        <div class="site-logo">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo '<span class="logo-mark"><i class="fa-solid fa-plane"></i></span>';
                echo '<span>' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
            }
            ?>
        </div>
        <button class="nav-toggle" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <nav class="primary-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => '',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>
        <div class="header-actions">
            <a class="btn btn-outline" href="tel:+18005551234"><i class="fa-solid fa-phone"></i> Call Us</a>
            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/search-flights' ) ); ?>">Book Now</a>
        </div>
    </div>
</header>
