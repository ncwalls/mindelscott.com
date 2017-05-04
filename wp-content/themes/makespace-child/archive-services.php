<?php get_header(); ?>

	<div class="container">
		<article class="inner-container">
			<?php the_field('services_overview', 'option'); ?>
		</article>
	</div>
	<div class="services-archive-list">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="container">
					<div class="inner">
						<figure class="icon">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'large'); ?></a>
						</figure>
						<div class="content">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
							<p class="more">
								<a href="<?php the_permalink(); ?>" class="button">Learn More</a>
							</p>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();