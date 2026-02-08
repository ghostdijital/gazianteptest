<?php
get_header();
?>
<section class="section">
    <div class="container">
        <h1 class="section-title">Search results for: <?php echo esc_html( get_search_query() ); ?></h1>
        <div class="blog-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="card blog-card">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();
