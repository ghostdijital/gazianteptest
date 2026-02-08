<?php
get_header();
?>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Premium flights tailored for modern travelers.</h1>
            <p>Search, compare, and book flights with confidence. Discover curated routes, flexible dates, and exclusive deals from trusted airlines.</p>
        </div>
        <div class="search-card">
            <form class="search-grid" method="get" action="<?php echo esc_url( home_url( '/flight-results' ) ); ?>">
                <div>
                    <label for="from">From</label>
                    <input id="from" name="departure_city" type="text" placeholder="City or airport" required>
                </div>
                <div>
                    <label for="to">To</label>
                    <input id="to" name="arrival_city" type="text" placeholder="Destination" required>
                </div>
                <div>
                    <label for="depart">Departure</label>
                    <input id="depart" name="departure_date" type="date" required>
                </div>
                <div>
                    <label for="passengers">Passengers</label>
                    <select id="passengers" name="passengers">
                        <option>1 Adult</option>
                        <option>2 Adults</option>
                        <option>3 Adults</option>
                        <option>4 Adults</option>
                    </select>
                </div>
                <div>
                    <label>&nbsp;</label>
                    <button class="btn btn-primary" type="submit">Search Flights</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Popular destinations</h2>
            <a class="btn btn-outline" href="<?php echo esc_url( home_url( '/search-flights' ) ); ?>">View all</a>
        </div>
        <div class="slider-row">
            <?php
            $destinations = array(
                array( 'Paris', 'France', 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=800&q=80' ),
                array( 'Tokyo', 'Japan', 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&w=800&q=80' ),
                array( 'Dubai', 'UAE', 'https://images.unsplash.com/photo-1504270997636-07ddfbd48945?auto=format&fit=crop&w=800&q=80' ),
                array( 'New York', 'USA', 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80' ),
            );
            foreach ( $destinations as $destination ) :
                ?>
                <article class="card">
                    <img src="<?php echo esc_url( $destination[2] ); ?>" alt="<?php echo esc_attr( $destination[0] ); ?>">
                    <h3><?php echo esc_html( $destination[0] ); ?></h3>
                    <p><?php echo esc_html( $destination[1] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Best deals today</h2>
            <p>Limited-time prices on curated routes.</p>
        </div>
        <div class="card-grid">
            <?php
            $deal_cards = array(
                array( 'Istanbul', 'Rome', '$410', 'Business Select', 'fa-briefcase' ),
                array( 'Sydney', 'Bali', '$590', 'Weekend Escape', 'fa-umbrella-beach' ),
                array( 'London', 'Dubai', '$720', 'Evening Comfort', 'fa-moon' ),
            );
            foreach ( $deal_cards as $deal ) :
                ?>
                <article class="card">
                    <span class="icon-pill"><i class="fa-solid <?php echo esc_attr( $deal[4] ); ?>"></i></span>
                    <h3><?php echo esc_html( $deal[0] . ' → ' . $deal[1] ); ?></h3>
                    <p><?php echo esc_html( $deal[3] ); ?></p>
                    <div class="deal-price"><?php echo esc_html( $deal[2] ); ?></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why choose us</h2>
            <p>We combine smart technology with human care.</p>
        </div>
        <div class="card-grid">
            <article class="card">
                <span class="icon-pill"><i class="fa-solid fa-shield-heart"></i></span>
                <h3>Trusted partners</h3>
                <p>Work with leading airlines and verified travel providers globally.</p>
            </article>
            <article class="card">
                <span class="icon-pill"><i class="fa-solid fa-clock"></i></span>
                <h3>24/7 concierge</h3>
                <p>Dedicated travel experts ready to support bookings and changes.</p>
            </article>
            <article class="card">
                <span class="icon-pill"><i class="fa-solid fa-wifi"></i></span>
                <h3>Smart search</h3>
                <p>Flexible dates, smart filters, and real-time price tracking.</p>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Traveler stories</h2>
            <p>Hear from customers who fly with SkyBooker.</p>
        </div>
        <div class="card-grid">
            <article class="card testimonial">
                <p>“Effortless booking and premium service. The seat upgrades were a bonus.”</p>
                <strong>— Maria C., Milan</strong>
            </article>
            <article class="card testimonial">
                <p>“I saved hours comparing flights. The interface feels truly premium.”</p>
                <strong>— Adam L., Toronto</strong>
            </article>
            <article class="card testimonial">
                <p>“The concierge team handled my changes instantly. Highly recommended.”</p>
                <strong>— Hana S., Tokyo</strong>
            </article>
        </div>
    </div>
</section>

<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Airline partners</h2>
            <p>Leading carriers that trust SkyBooker.</p>
        </div>
        <div class="partner-logos">
            <img src="https://dummyimage.com/180x80/0a1f44/ffffff&text=Skyline" alt="Skyline">
            <img src="https://dummyimage.com/180x80/0a1f44/ffffff&text=AeroVista" alt="AeroVista">
            <img src="https://dummyimage.com/180x80/0a1f44/ffffff&text=Pacific" alt="Pacific">
            <img src="https://dummyimage.com/180x80/0a1f44/ffffff&text=Azure" alt="Azure">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="newsletter">
            <h2>Get exclusive fare alerts</h2>
            <p>Join our newsletter and be the first to know about seasonal deals and new routes.</p>
            <form>
                <input type="email" placeholder="Email address">
                <button class="btn btn-primary" type="submit">Join Newsletter</button>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
