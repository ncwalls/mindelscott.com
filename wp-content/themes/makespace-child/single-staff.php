<?php get_header(); ?>

	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class('wide-container'); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<section class="staff-details">
					<figure>
						<?php if(get_post_thumbnail_id($post->ID)):	?>
							<div class="img" style="background-image: url(<?php the_post_thumbnail_url( 'large' ); ?>)"></div>
						<?php endif; ?>
					</figure>
					<div class="info">
						<div class="inner">
							<div class="left">
								<h2><?php the_title(); ?></h2>
								<p><?php the_field('job_title'); ?></p>
								<?php if ( have_rows('social_links') ): ?>
									<ul class="social">
										<?php while(have_rows('social_links')): the_row(); ?>
											<li>
												<a href="<?php the_sub_field('url'); ?>" class="fa <?php the_sub_field('social_site'); ?>"></a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="right">
								<p class="phone-fax"><?php the_field('phone'); ?><br>
								<?php the_field('fax'); ?></p>
								<p class="email"><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
							</div>
						</div>
					</div>
				</section>
				<?php if( get_field('staff_projects') ): ?> 
					<aside class="staff-projects">
						<h3><?php the_field('first_name'); ?>'s Work</h3>
						<ul>
							<?php
								$projects = get_field('staff_projects'); 
								foreach($projects as $project):
							?>
								<li>
									<a href="<?php echo get_permalink($project->ID); ?>">
										<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url($project->ID, 'small'); ?>)"></div>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</aside>
				<?php endif; ?>
				<div class="staff-main-content">
					<?php the_content(); ?>
				</div>
				
				<footer class="single-nav">
					<ul>
						<li class="item prev">
							<?php /*if( get_previous_post() ):*/ $prev = get_previous_post(); ?>
							<a href="<?php echo get_permalink( $prev->ID ); ?>"><span class="fa fa-angle-left"></span> Previous <span class="extra-words">Staff Member</span></a>
							<?php //endif; ?>
						</li>
						<li class="item next">
							<?php /*if( get_next_post() ):*/ $next = get_next_post(); ?>
							<a href="<?php echo get_permalink( $next->ID ); ?>">Next <span class="extra-words">Staff Member</span> <span class="fa fa-angle-right"></span></a>
							<?php //endif; ?>
						</li>
						<li class="all">
							<a href="<?php echo home_url('staff'); ?>">
								All Staff
							</a>
						</li>
					</ul>
				</footer>
			</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();