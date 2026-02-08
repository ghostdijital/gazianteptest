<?php
get_header();
?>
<section class="hero" style="padding-bottom: 120px;">
    <div class="container">
        <div class="hero-content">
            <h1><?php the_title(); ?></h1>
            <p>Premium flight experience with curated comforts and flexible booking.</p>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                $price = skybooker_get_flight_field( get_the_ID(), 'price', '0' );
                ?>
                <div class="flight-hero">
                    <div class="flight-meta">
                        <div>
                            <h2><?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'departure_city', '' ) ); ?> → <?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'arrival_city', '' ) ); ?></h2>
                            <p>Departure: <?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'departure_date', '' ) ); ?></p>
                            <p>Return: <?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'return_date', '' ) ); ?></p>
                            <p>Airline: <?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'airline_name', '' ) ); ?> · <?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'flight_number', '' ) ); ?></p>
                        </div>
                        <div>
                            <div class="price-tag"><?php echo esc_html( skybooker_format_price( $price ) ); ?></div>
                            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Book this flight</a>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 24px;">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
