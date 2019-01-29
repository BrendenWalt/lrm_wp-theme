<?php
/*
	Template Name: Standalone Page
 */


?>
<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main standalone">
		
			
		<section class="header">
			<div>
				<div class="info">
					<h1>
						<a href="/">
							<?php bloginfo('name'); ?>
						</a>
					</h1>
					
					<h2>
						<a href="/">
							<?php bloginfo('description'); ?></h2>
						</a>
				</div>
				
			</div>
		</section>

		<section class="page-content">
			<?php while(have_posts()) : the_post(); ?>
			<?php the_content();?>
			<?php endwhile; ?>
		</section>

		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', 'page' );

			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
