<?php
/**
 * The footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bikeride
 */
?>
            </main>
            <footer class="footer">
                <div class="social">
                    <a href="<?php echo esc_url( get_theme_mod( 'set_facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'set_instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'set_pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest-square"></i></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'set_youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube-square"></i></a>
                </div>
                <div class="copyright-policies">
                <?php echo esc_html( get_theme_mod( 'set_copyright', __( 'Copyright - All Rights Reserved', 'bikeride' ) ) ); ?>
                </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>