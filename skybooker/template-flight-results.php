<?php
/*
Template Name: Flight Results
*/
get_header();

$departure_city = isset( $_GET['departure_city'] ) ? sanitize_text_field( wp_unslash( $_GET['departure_city'] ) ) : '';
$arrival_city   = isset( $_GET['arrival_city'] ) ? sanitize_text_field( wp_unslash( $_GET['arrival_city'] ) ) : '';
$departure_date = isset( $_GET['departure_date'] ) ? sanitize_text_field( wp_unslash( $_GET['departure_date'] ) ) : '';

$meta_query = array( 'relation' => 'AND' );

if ( $departure_city ) {
    $meta_query[] = array(
        'key'     => 'departure_city',
        'value'   => $departure_city,
        'compare' => 'LIKE',
    );
}

if ( $arrival_city ) {
    $meta_query[] = array(
        'key'     => 'arrival_city',
        'value'   => $arrival_city,
        'compare' => 'LIKE',
    );
}

if ( $departure_date ) {
    $meta_query[] = array(
        'key'     => 'departure_date',
        'value'   => $departure_date,
        'compare' => '=',
    );
}

$query_args = array(
    'post_type'      => 'flights',
    'posts_per_page' => 10,
    'meta_query'     => $meta_query,
);

$flight_query = new WP_Query( $query_args );
?>
<section class="section">
    <div class="container">
        <h1 class="section-title">Flight Results</h1>
        <div class="card" style="margin-bottom: 24px;">
            <p>Showing flights<?php echo $departure_city ? ' from ' . esc_html( $departure_city ) : ''; ?><?php echo $arrival_city ? ' to ' . esc_html( $arrival_city ) : ''; ?><?php echo $departure_date ? ' on ' . esc_html( $departure_date ) : ''; ?>.</p>
            <a class="btn btn-outline" href="<?php echo esc_url( home_url( '/search-flights' ) ); ?>">Modify Search</a>
        </div>
        <div class="flight-list">
            <?php
            if ( $flight_query->have_posts() ) :
                while ( $flight_query->have_posts() ) :
                    $flight_query->the_post();
                    $price = skybooker_get_flight_field( get_the_ID(), 'price', '0' );
                    ?>
                    <article class="flight-card">
                        <div class="flight-meta">
                            <div>
                                <?php
                                $airline_name = skybooker_get_flight_field( get_the_ID(), 'airline_name', 'Airline' );
                                $airline_logo = 'https://dummyimage.com/120x60/0a1f44/ffffff&text=' . rawurlencode( $airline_name );
                                ?>
                                <img src="<?php echo esc_url( $airline_logo ); ?>" alt="<?php echo esc_attr( $airline_name ); ?>">
                                <strong><?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'departure_city', 'N/A' ) ); ?></strong>
                                →
                                <strong><?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'arrival_city', 'N/A' ) ); ?></strong>
                                <p><?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'departure_date', '' ) ); ?></p>
                                <p><?php echo esc_html( $airline_name ); ?> · <?php echo esc_html( skybooker_get_flight_field( get_the_ID(), 'flight_number', '' ) ); ?></p>
                            </div>
                            <div>
                                <span class="price-tag"><?php echo esc_html( skybooker_format_price( $price ) ); ?></span>
                                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Book Now</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No flights match your search. Try adjusting your criteria.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();
