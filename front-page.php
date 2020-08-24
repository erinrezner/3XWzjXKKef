<?php

get_header(); ?>

<style>
	.navbar-brand {display: none !important;} /* Hide Logo - top left */
	.entry-title {display: none !important;} /* Hide Title */
	.printfriendly {display: none !important;} /* Hide Landing Page PF */
</style>

		<div class="container">
            <div class="row">
				<div id="primary" class="col-md-12 content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div> <!--.row-->            
        </div><!--.container-->
        <?php get_footer(); ?>
