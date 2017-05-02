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
							$categories = get_categories( array(
								'orderby' => 'name',
								'order'   => 'ASC'
							) );

							foreach( $categories as $category ) {
								$caturl = get_category_link( $category->term_id );
								$catname = $category->name;

								echo '<li><a href="' . $caturl .'" data-action="job-filter" data-target="'.$category->slug.'">' . $catname. '</a></li>';
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
					<li>
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
									<a href="" class="button">Apply For This Position</a>
								</div>
							</div>
							<div class="toggle">
								<div class="toggle-button" data-action="job-toggle"></div>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>

<?php get_footer();