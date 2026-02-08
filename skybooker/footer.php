<?php
?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h3>SkyBooker</h3>
                <p>Premium flight booking experiences, curated routes, and trusted airline partners worldwide.</p>
                <div class="footer-social">
                    <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Company</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Resources</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_class'     => '',
                    'container'      => false,
                    'fallback_cb'    => false,
                ) );
                ?>
            </div>
            <div>
                <h4>Newsletter</h4>
                <p>Get exclusive fare drops and travel inspiration.</p>
                <form>
                    <input type="email" placeholder="Enter your email">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> SkyBooker. All rights reserved.</span>
            <span>Made for modern travelers.</span>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
