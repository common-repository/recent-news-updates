<?php
get_header(); ?>
<div class="run-detail">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>



				<div class="run-each-post">
					<h1 class="run-entry-title"><?php the_title(); ?></h1>

					<div class="run-entry-content">
						<?php the_content(); ?>

					</div><!-- .entry-content -->

				</div><!-- #post-## -->

				<div class="run-navigation">
					<div class="run-nav-previous">
					<?php previous_post_link( '%link', '<span class="run-previous-Class">&larr;Previous</span>' ); ?>
					</div>
					<div class="nav-next">
					<?php next_post_link( '%link', '<span class="run-next-Class">Next&rarr;</span>' ); ?></div>
				</div><!-- #nav-below -->


<?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>