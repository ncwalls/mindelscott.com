<?php get_header(); ?>

	<div class="container">
		<article class="inner-container">
			<?php the_field('staff_overview', 'option'); ?>
		</article>
		<div class="wide-container staff-list">
			<?php while( have_posts() ): the_post(); ?>
				<section <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<figure>
							<?php if(get_post_thumbnail_id($post->ID)):	?>
								<div class="img" style="background-image: url(<?php the_post_thumbnail_url( 'medium' ); ?>)"></div>
							<?php endif; ?>
						</figure>
						<div class="content">
							<div class="inner">
								<h2><?php the_title(); ?></h2>
								<p><?php the_field('job_title'); ?></p>
							</div>
						</div>
						<div class="meet">Meet <?php the_field('first_name'); ?></div>
					</a>
				</section>
			<?php endwhile; ?>
		</div>
		<div class="archive-pagination">
			<?php
				echo paginate_links( array(
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'next_text' => '<i class="fa fa-angle-right"></i>',
					'type' => 'list'
				) );
			?>
		</div>
	</div>

<?php get_footer();