<?php
get_header();
?>
<section class="section">
    <div class="container">
        <div class="card" style="text-align:center;">
            <h1 class="section-title">Page not found</h1>
            <p>We couldn't find the page you're looking for. Try returning to the homepage or searching flights.</p>
            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go Home</a>
        </div>
    </div>
</section>
<?php
get_footer();
