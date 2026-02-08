<?php
get_header();
?>
<section class="section">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article class="card">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <p><?php echo esc_html( get_the_date() ); ?></p>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'large' ); ?>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
