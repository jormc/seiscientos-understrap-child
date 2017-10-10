<?php
/**
 * Partial template for content in section-rightsidebar-page.php
 *
 * @package seiscientos
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php /*
        <div class="row">
			<div class="col">
				<? if ( has_post_thumbnail() ) the_post_thumbnail('thumbnail', array('class' => 'club-logo')); ?>
			</div>
        </div>	
        */ ?>	
		<div class="row">
			<div class="col">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

        <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->