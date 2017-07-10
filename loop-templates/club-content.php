<?php
/**
 * Partial template for content in page.php
 *
 * @package seiscientos
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
		    <h6 class="card-subtitle mb-2 text-muted">
					<?php the_post_thumbnail('thumbnail', array('class' => 'club-logo')); ?>
					<span class="club-headquarters"><?php the_field('headquarters'); ?></span>
    			<span class="club-address"><?php the_field('address'); ?></span>
        </h6>
		    <hr />
		    <p class="card-text">
					<div class="details">
				    <ul class="list-group">
				    	<li class="list-group-item justify-content-between">Fecha de fundaci&oacute;n 
					    	<div>
					    		<div class="detail"><span><?php the_field('foundation_date'); ?></span><i class="fa fa-calendar" aria-hidden="true"></i></div>
					    	</div>
				    	<li class="list-group-item justify-content-between">Club multimarca <span class="badge badge-default badge-pill"><?php if (get_field('is_multimarc') == 1): ?>Si<?php else: ?>No<?php endif; ?></span></li>
				    	<li class="list-group-item justify-content-between">Presidente
				    		<div>
					    		<div class="detail"><span><?php the_field('president_name'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('president_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('president_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
						    </div>
					  	</li>
				    	<li class="list-group-item justify-content-between">Vicepresidente
				    		<div>
					    		<div class="detail"><span><?php the_field('vicepresident_name'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('vicepresident_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('vicepresident_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
						    </div>
				    	</li>
				    	<li class="list-group-item justify-content-between">Secretario
				    		<div>
					    		<div class="detail"><span><?php the_field('secretary_name'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('secretary_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('secretary_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
						    </div>
				    	</li>
				    	<li class="list-group-item justify-content-between">Tesorero
				    		<div>
					    		<div class="detail"><span><?php the_field('treasurer_name'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('treasurer_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('treasurer_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
						    </div>
				    	</li>
				    	<li class="list-group-item justify-content-between">Vocal
				    		<div>
					    		<div class="detail"><span><?php the_field('vocal_name'); ?></span><i class="fa fa-address-card" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('vocal_phone'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('vocal_email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
						    </div>
				    	</li>
				    	<li class="list-group-item justify-content-between">Tel&eacute;fonos de contacto
					    	<div>
						    	<div class="detail"><span><?php the_field('contact_phone_1'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('contact_phone_2'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
						    	<div class="detail"><span><?php the_field('contact_phone_3'); ?></span><i class="fa fa-phone-square" aria-hidden="true"></i></div>
					    	</div>
				    	</li>
				    	<li class="list-group-item justify-content-between">Email de contacto 
				    		<div>
				    			<div class="detail"><span><?php the_field('email'); ?></span><i class="fa fa-envelope" aria-hidden="true"></i></div>
				    		</div>
				    	<li class="list-group-item justify-content-between">P&aacute;gina web 
				    		<div>
				    			<div class="detail"><span><?php the_field('webpage'); ?></span><i class="fa fa-globe" aria-hidden="true"></i></div>
				    		</div>
				    	<li class="list-group-item justify-content-between">Otros datos 
				    		<div>
				    			<div class="detail"><span>&nbsp;</span><i class="fa fa-pencil-square" aria-hidden="true"></i></div>
				    		</div>
				    	</li>
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
    		<a href="<?php echo get_edit_post_link(); ?>" class="card-link btn btn-primary">Editar</a>
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
		
		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->