<?php get_header(); ?>

<?php while( have_posts() ): the_post(); ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="bg">
		<div class="container">
			<div class="wide-container">
				<?php if(get_post_thumbnail_id($post->ID)):	?>
					<figure class="project-hero">
						<?php the_post_thumbnail( 'large' ); ?>
					</figure>
				<?php endif; ?>
				<div class="project-main-content">
					<?php the_content(); ?>
				</div>
				<aside class="project-side">
					<section class="project-categories">
						<h3>Project Services</h3>
						<ul>
							<?php
								$project_categories = wp_get_post_terms($post->ID, 'project-category'); 
								foreach($project_categories as $cat):
									//print_r($cat);
									$services = get_posts(array(
										'name'        => $cat->slug,
										'post_type'   => 'services'
									));
									$service_ID = $services[0]->ID;
							?>
							<li>
								<a href="<?php echo get_permalink($service_ID); ?>">
									<?php echo get_the_post_thumbnail($service_ID, 'large'); ?>
									<?php echo get_the_title($service_ID); ?>
								</a>
							</li>
							<?php endforeach; ?>
						</ul>
					</section>
					<?php if( get_field('project_gallery') ): ?> 
						<section class="project-gallery">
							<h3>Project Gallery</h3>
							<ul>
								<?php
									$gallery = get_field('project_gallery'); 
									foreach($gallery as $img):
								?>
									<li>
										<a href="<?php echo $img['sizes']['large']; ?>" title="<?php echo $img['title']; ?>">
											<div class="img" style="background-image: url(<?php echo $img['sizes']['thumbnail']; ?>)"></div>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</section>
					<?php endif; ?>
					<?php
						/*global $wbdp;
						$thisID = get_the_ID();
						$project_staff = $wpdb->get_results( "SELECT post_id FROM $wpdb->postmeta WHERE meta_value LIKE '%\"$thisID\"%'");
						
						//$project_staff = get_field('project_staff');
						
						if($project_staff):
							$project_staff_ID = $project_staff[0]->post_id;
					
					?>
					<section class="project-staff">
						<h3>Project manager</h3>
						<a href="<?php echo get_permalink($project_staff_ID); ?>" title="">
							<figure>
								<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url($project_staff_ID, 'small'); ?>)"></div>
							</figure>
							<div class="content">
								<h4><?php echo get_the_title($project_staff_ID); ?></h4>
								<p class="job-title"><?php echo get_field('job_title', $project_staff_ID); ?></p>
							</div>
						</a>
					</section>
					<?php endif;*/ ?>
				</aside>
				
				<div class="project-share">
					<p>Share This Project</p>
					<?php echo do_shortcode('[addtoany]'); ?>
				</div>
			</div>
		</div>
	</div>
		
	<div class="container">
		<div class="wide-container">
			<footer class="single-nav">
				<ul>
					<li class="item prev">
						<?php if( get_previous_post() ): $prev = get_previous_post(); ?>
							<a href="<?php echo get_permalink( $prev->ID ); ?>"><span class="fa fa-angle-left"></span> Previous <span class="extra-words">Project</span></a>
						<?php endif; ?>
					</li>
					<li class="item next">
						<?php if( get_next_post() ): $next = get_next_post(); ?>
						<a href="<?php echo get_permalink( $next->ID ); ?>">Next <span class="extra-words">Project</span> <span class="fa fa-angle-right"></span></a>
						<?php endif; ?>
					</li>
					<li class="all">
						<a href="<?php echo home_url('projects'); ?>">
							All Projects
						</a>
					</li>
				</ul>
			</footer>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer();