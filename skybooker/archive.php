<?php
get_header();
?>
<section class="section">
    <div class="container">
        <h1 class="section-title"><?php the_archive_title(); ?></h1>
        <div class="blog-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="card blog-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                        <?php endif; ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
                        <a class="btn btn-outline" href="<?php the_permalink(); ?>">Read More</a>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();
