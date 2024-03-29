<?php
/**
 * Theme footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 *  
 * @package qm
 */
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="site-info">
        <?php 
        $blog_info = get_bloginfo( 'name' );
        if ( ! empty( $blog_info ) ) : ?>
            <a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
        <?php endif;
        if ( function_exists( 'the_privacy_policy_link' ) ) {
            the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
        }
        if ( has_nav_menu( 'footer' ) ) : ?>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'qm' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </nav><!-- .footer-navigation -->
        <?php endif; ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
