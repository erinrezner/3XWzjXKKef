<?php

get_header(); ?>

	<div class="container">
        <div class="row">
			<div id="primary" class="col-md-9 content-area">
				<main id="main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'template-parts/content',get_post_format()); //Manually insert article code so I can add details for this category ?>
					
					<article id="post-<?php the_ID(); ?>"  <?php post_class('post-content'); ?>>
					
						<?php
						if ( is_sticky() && is_home() && ! is_paged() ) {
							printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'writers' ) );
						} ?>
					
					
						<header class="entry-header">	
					
							<span class="screen-reader-text"><?php the_title();?></span>
					
							<?php if (get_theme_mod('blog_post_author_image') ) : ?>
							<div class="subpage-author-image" style="background-image: url('<?php echo esc_url(get_theme_mod('blog_post_author_image')) ?>')"></div>
					
									
					
						<?php else : ?>
					
					<?php endif; ?>
					
					<?php if ( is_single() ) : ?>
					
					
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
					<?php endif; // is_single() ?>
					
					<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							<h5 class="entry-date"><?php writers_posted_on_no_link(); ?></h5>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					</header><!-- .entry-header -->
					
					<div class="entry-content">
						<?php					
						the_content('&hellip; <p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'writers') . '<span class="screen-reader-text"> '. __(' Read More', 'writers').'</span></a></p>');
						?>
						
						<div class="truecrime-footnotes">
							<p style="font-size: small;"><strong>*NOTE*</strong> Please see <a href="/?p=71">why I try not to name the criminals</a> in the crimes I mention.</p>
						</div>
					
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'writers' ),
							'after'  => '</div>',
							) );
							?>
						</div><!-- .entry-content -->
					
						<footer class="entry-footer">
							<?php writers_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->
					
				</main><!-- #main -->				

				<div>
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						if(!comments_open())

					?>
				</div>			

				<div class="post-navigation">				
					<?php writers_post_navigation(); ?>
				</div>

				<?php endwhile; // End of the loop. ?>

				
			</div><!-- #primary -->

			<?php get_sidebar('sidebar-1'); ?>
		</div> <!--.row-->            
    </div><!--.container-->
    <?php get_footer(); ?>
