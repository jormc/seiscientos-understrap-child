<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<?php /*
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'understrap' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'understrap' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'understrap' ), $the_theme->get( 'Name' ),
						'<a href="http://understrap.com/">understrap.com</a>' ); ?>
						(<?php printf( __( 'Version: %1$s', 'understrap' ), $the_theme->get( 'Version' ) ); ?>)
					</div><!-- .site-info -->
					*/ ?>

					<div id="footer-sidebar" class="secondary container-fluid">
						<div class="row">
							<div id="footer-sidebar1" class="col-sm">
								<?php
								if(is_active_sidebar('footer-sidebar-1')){
									dynamic_sidebar('footer-sidebar-1');
								}
								?>
							</div>
							<div id="footer-sidebar2" class="col-sm">
								<?php
								if(is_active_sidebar('footer-sidebar-2')){
									dynamic_sidebar('footer-sidebar-2');
								}
								?>
							</div>
							<div id="footer-sidebar3" class="col-sm">
								<?php
								if(is_active_sidebar('footer-sidebar-3')){
									dynamic_sidebar('footer-sidebar-3');
								}
								?>
							</div>
							<div id="footer-sidebar4" class="col-sm">
								<?php
								if(is_active_sidebar('footer-sidebar-4')){
									dynamic_sidebar('footer-sidebar-4');
								}
								?>
							</div>
						</div>
					</div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
