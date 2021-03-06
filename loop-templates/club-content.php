<?php
/**
 * Partial template for content in club-rightsidebar-page.php
 *
 * @package seiscientos
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<div class="row">
			<div class="col">
				<? if ( has_post_thumbnail() ) the_post_thumbnail('thumbnail', array('class' => 'club-logo')); ?>
			</div>
		</div>		
		<div class="row">
			<div class="col">
				<?php the_title( '<h1 class="entry-title club-name">', '</h1>' ); ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<!-- Print club details -->
		<div class="card club">
		  	<div class="card-block">
				<!--
				<h4 class="card-title">
					<div class="club-name">
						<span class="club-name"><?php the_field('name'); ?></span>
					</div>
				</h4>
				-->
				<!--
				<h6 class="card-subtitle mb-2 text-muted">
					<?php the_post_thumbnail('full', array('class' => 'club-logo')); ?>
					<span class="club-headquarters"><?php the_field('headquarters'); ?></span>
					<span class="club-address"><?php the_field('address'); ?></span>
				</h6>
				<hr />
				-->
				
				<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
				<a href="<?php seiscientos_return_to_parent_url(); ?>" class="card-link btn btn-primary">Volver</a>
				<a href="<?php echo get_edit_post_link(); ?>" class="card-link btn btn-primary">Editar</a>
				<?php } ?>

				<p class="card-text">
					<div class="details">
						<ul class="list-group">
							<li class="list-group-item justify-content-between">Fecha de fundaci&oacute;n 
								<div>
									<div class="detail"><span><?php the_field('foundation_date'); ?></span><i class="fa fa-calendar" aria-hidden="true"></i></div>
								</div>
							<li class="list-group-item justify-content-between">Club multimarca <span class="badge badge-default badge-pill"><?php if (get_field('is_multimarc') == 1): ?>Si<?php else: ?>No<?php endif; ?></span></li>
							<?php if( get_field('president') || get_field('president_phone') || get_field('president_email') ): ?>
							<li class="list-group-item justify-content-between">Presidente
								<div>
									<?php if( get_field('president') ): ?>
									<div class="detail"><span><?php the_field('president'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
									<?php endif; if( get_field('president_phone') ): ?>
									<div class="detail"><span><?php the_field('president_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('president_email') ): ?>
									<div class="detail"><span><?php the_field('president_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
									<?php endif; ?>		
								</div>
							</li>
							<?php endif; if( get_field('vicepresident') || get_field('vicepresident_phone') || get_field('vicepresident_email') ): ?>
							<li class="list-group-item justify-content-between">Vicepresidente
								<div>
									<?php if( get_field('vicepresident') ): ?>
									<div class="detail"><span><?php the_field('vicepresident'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
									<?php endif; if( get_field('vicepresident_phone') ): ?>
									<div class="detail"><span><?php the_field('vicepresident_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('vicepresident_email') ): ?>
									<div class="detail"><span><?php the_field('vicepresident_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
									<?php endif; ?>
								</div>
							</li>
							<?php endif; if( get_field('secretary') || get_field('secretary_phone') || get_field('secretary_email') ): ?>
							<li class="list-group-item justify-content-between">Secretario
								<div>
									<?php if( get_field('secretary') ): ?>
									<div class="detail"><span><?php the_field('secretary'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
									<?php endif; if( get_field('secretary_phone') ): ?>
									<div class="detail"><span><?php the_field('secretary_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('secretary_email') ): ?>
									<div class="detail"><span><?php the_field('secretary_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
									<?php endif; ?>
								</div>
							</li>
							<?php endif; if( get_field('treasurer') || get_field('treasurer_phone') || get_field('treasurer_email') ): ?>
							<li class="list-group-item justify-content-between">Tesorero
								<div>
									<?php if( get_field('treasurer') ): ?>
									<div class="detail"><span><?php the_field('treasurer'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
									<?php endif; if( get_field('treasurer_phone') ): ?>
									<div class="detail"><span><?php the_field('treasurer_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('treasurer_email') ): ?>
									<div class="detail"><span><?php the_field('treasurer_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
									<?php endif; ?>
								</div>
							</li>
							<?php endif; if( get_field('vocal') || get_field('vocal_phone') || get_field('vocal_email') ): ?>
							<li class="list-group-item justify-content-between">Vocal
								<div>
									<?php if( get_field('vocal') ): ?>
									<div class="detail"><span><?php the_field('vocal'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
									<?php endif; if( get_field('vocal_phone') ): ?>
									<div class="detail"><span><?php the_field('vocal_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('vocal_email') ): ?>
									<div class="detail"><span><?php the_field('vocal_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
									<?php endif; ?>
								</div>
							</li>
							<?php endif; if( get_field('contact_phone_1') || get_field('contact_phone_2') || get_field('contact_phone_3') ): ?>
							<li class="list-group-item justify-content-between">Tel&eacute;fonos de contacto
								<div>
									<?php if( get_field('contact_phone_1') ): ?>
									<div class="detail"><span><?php the_field('contact_phone_1'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('contact_phone_2') ): ?>
									<div class="detail"><span><?php the_field('contact_phone_2'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; if( get_field('contact_phone_3') ): ?>
									<div class="detail"><span><?php the_field('contact_phone_3'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
									<?php endif; ?>
								</div>
							</li>
							<?php endif; if( get_field('email') ): ?>
							<li class="list-group-item justify-content-between">Email de contacto 
								<div>
									<div class="detail"><span><?php the_field('email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
								</div>
							</li>
							<?php endif; if( get_field('webpage') ): ?>
							<li class="list-group-item justify-content-between">P&aacute;gina web 
								<div>
									<div class="detail"><span><?php the_field('webpage'); ?></span><i class="fa fa-globe" aria-hidden="true"></i></div>
								</div>
							</li>
							<?php endif;  if( get_field('description') ): ?>
							<li class="list-group-item justify-content-between"><span>Descripci&oacute;n</span><hr />
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								<div>
									<div class="detail"><span><p style="text-align: left:"><?php the_field('description'); ?></p></span></div>
								</div>
							</li>
							<?php endif; ?>
							<li class="list-group-item justify-content-between">Verificado
								<span class="badge badge-default badge-pill"><?php if (get_field('is_verified') == 1): ?>Si<?php else: ?>No<?php endif; ?></span>
							</li>
							<li class="list-group-item justify-content-between">Fecha de &uacute;ltima actualizaci&oacute;n 
								<div>
									<div class="detail"><span><?php the_field('update_date'); ?></span><i class="fa fa-calendar" aria-hidden="true"></i></div>
								</div>
							</li>
						</ul>
					</div>
				</p>
				<a href="<?php seiscientos_return_to_parent_url(); ?>" class="card-link btn btn-primary">Volver</a>
				<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
				<a href="<?php echo get_edit_post_link(); ?>" class="card-link btn btn-primary">Editar</a>
				<?php } ?>
			</div>
		</div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
		<?php // edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->