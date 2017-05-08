<?php get_header(); ?>

	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class('inner-container'); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<ul class="post-meta">
					<li><?php the_time( 'F j, Y' ); ?></li>
					<li><?php echo MakespaceFramework::read_time(); ?></li>
				</ul>
				<?php the_content(); ?>
				<footer class="single-nav">
					<ul>
						<li class="item prev">
							<?php if( get_previous_post() ): $prev = get_previous_post(); ?>
								<a href="<?php echo get_permalink( $prev->ID ); ?>"><span class="fa fa-angle-left"></span> Previous <span class="extra-words">Article</span></a>
							<?php endif; ?>
						</li>
						<li class="item next">
							<?php if( get_next_post() ): $next = get_next_post(); ?>
							<a href="<?php echo get_permalink( $next->ID ); ?>">Next <span class="extra-words">Article</span> <span class="fa fa-angle-right"></span></a>
							<?php endif; ?>
						</li>
						<li class="all">
							<a href="<?php echo home_url('blog'); ?>">
								All Articles
							</a>
						</li>
					</ul>
				</footer>
			</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();