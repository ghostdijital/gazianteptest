<?php
/*
Template Name: Search Flights
*/
get_header();
?>
<section class="section">
    <div class="container">
        <h1 class="section-title">Search Flights</h1>
        <div class="card">
            <form class="search-grid" method="get" action="<?php echo esc_url( home_url( '/flight-results' ) ); ?>">
                <div>
                    <label for="from">Departure City</label>
                    <input id="from" name="departure_city" type="text" placeholder="e.g. London">
                </div>
                <div>
                    <label for="to">Arrival City</label>
                    <input id="to" name="arrival_city" type="text" placeholder="e.g. Dubai">
                </div>
                <div>
                    <label for="depart">Departure Date</label>
                    <input id="depart" name="departure_date" type="date">
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
                    <button class="btn btn-primary" type="submit">Find Flights</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
get_footer();
