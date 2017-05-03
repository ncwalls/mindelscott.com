<?php get_header(); ?>

	<div class="container">
		<article class="inner-container">
			<?php the_field('careers_overview', 'option'); ?>
			<div class="filter-container">
				<div class="filter-dropdown">
					<div class="filter-display">
						<?php
							if(single_term_title('', false) ){ 
								single_term_title();
							}
							else {
								echo 'All Job Postings';
							};
						?>
					</div>
					<ul>
						<li><a href="<?php echo home_url('jobs'); ?>" data-action="job-filter" data-target="all">All Job Postings</a></li>
						<?php
							$services = get_posts( array(
								'post_type' => 'services'
							) );
							foreach( $services as $service ) {
								echo '<li><a href="' . get_permalink($service->ID) .'" data-action="job-filter" data-target="' .  $service->post_name . '">' . get_the_title($service->ID) . '</a></li>';
							} 
						?>
					</ul>
				</div>
			</div>
		</article>
		<div class="wide-container jobs-list-container">
			<div class="jobs-list-header">
				<div class="col-title">Service Sector</div>
				<div class="col-title">Position Title</div>
				<div class="col-title">Job Description</div>
			</div>
			<ul class="jobs-list">
				<?php while( have_posts() ): the_post(); ?>
					<li class="vis <?php echo get_post_field( 'post_name', get_field('service_type')); ?>">
						<div class="inner">
							<div class="service">
								<?php echo get_the_post_thumbnail(get_field('service_type'), 'large'); ?>
							</div>
							<div class="title">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="description">
								<div class="excerpt">
									<?php the_excerpt(); ?>
								</div>
								<div class="full-content">
									<?php the_content(); ?>
									<a href="#application-form" class="button" data-action="application-form" data-position="<?php the_title(); ?>">Apply For This Position</a>
								</div>
							</div>
							<div class="toggle">
								<div class="toggle-button" data-action="job-toggle"></div>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
			<div id="application-form">
				<h2><span id="application-job-title"></span></h2>
				<?php echo do_shortcode( '[gravityform id="2" title="false" description="false"]' ); ?>
			</div>
		</div>
	</div>

<?php get_footer();