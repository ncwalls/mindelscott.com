<?php get_header(); ?>

	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class('inner-container'); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<figure class="service-icon"><?php echo get_the_post_thumbnail($post->ID, 'large'); ?></figure>
				<?php the_content(); ?>
				<p class="back"><a href="<?php echo home_url('services'); ?>" class="button">Back to All Services</a></p>
			</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();