<?php get_header(); ?>

<?php while( have_posts() ): the_post(); ?>
	
<div class="home-main">
	<div class="container">
		<div class="home-intro">
			<h1><?php the_field('intro_title'); ?></h1>
			<p><?php the_field('intro_content'); ?></p>
			<a class="button" href="<?php the_field('intro_link'); ?>"><?php the_field('intro_link_text'); ?></a>
		</div>
	</div>
	<div class="home-hero">
		<svg version="1.1"
			 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
			 x="0px" y="0px" width="175.1px" height="114.2px" viewBox="0 0 175.1 114.2" style="enable-background:new 0 0 175.1 114.2;"
			 xml:space="preserve">
			<?php
				$fill = '#75b94b';
				if(get_the_post_thumbnail_url()):
					$fill = 'url(#img-' . get_the_ID() . ')'; ?>
					<defs>
						<pattern id="img-<?php the_ID(); ?>" patternUnits="userSpaceOnUse" width="175" height="114">
							<image xlink:href="<?php the_post_thumbnail_url( 'medium' ); ?>" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMinYMin slice" />
						</pattern>
					</defs>
			<?php endif; ?>
			<polygon class="img" fill="<?php echo $fill; ?>" points="56.1,3.1 2.4,93.4 13.7,111.8 162.1,111.8 172.4,93.8 118.7,2.4 98.1,2.4 87.4,20.4 76.7,2.4 "/>
			<path class="logo" d="M175,92.9l0-0.1c0-0.1-0.1-0.3-0.1-0.4l0-0.1l-53.2-91c-0.4-0.8-1.3-1.2-2.2-1.2L98.1,0l-0.1,0c-0.1,0-0.1,0-0.2,0
				c-0.1,0-0.1,0-0.2,0l-0.1,0c-0.1,0-0.1,0-0.2,0.1l-0.5,0.3c0,0-0.1,0.1-0.2,0.1l-0.2,0.2c0,0-0.1,0.1-0.1,0.2l-8.7,14.8
				L79.1,1.2C78.6,0.5,77.8,0,76.9,0H55.6l-0.2,0c-0.1,0-0.3,0-0.4,0.1l-0.1,0c-0.2,0-0.3,0.1-0.4,0.2l-0.1,0.1
				c-0.2,0.1-0.3,0.2-0.5,0.3l-0.1,0.1c-0.1,0.1-0.2,0.2-0.2,0.3l0,0l-53.2,91c-0.5,0.8-0.5,1.7,0,2.5L11,112.9
				c0.4,0.8,1.3,1.2,2.2,1.2h148.8c0.9,0,1.7-0.5,2.2-1.2l10.6-18.2l0.1-0.1c0.1-0.1,0.1-0.2,0.2-0.4l0-0.1
				c0.1-0.2,0.1-0.4,0.1-0.6C175.1,93.3,175,93.1,175,92.9z M55.6,37.4L55.6,37.4L55.6,37.4L55.6,37.4z M56.7,37.8L56.7,37.8
				L56.7,37.8L56.7,37.8z M66.3,52.1l-8.5-14.5l-0.1-0.1c0-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.2
				c-0.1-0.1-0.1-0.1-0.2-0.1l-0.2-0.1c-0.1,0-0.2-0.1-0.2-0.1c-0.1,0-0.1-0.1-0.2-0.1c-0.1,0-0.2,0-0.3-0.1c-0.1,0-0.1,0-0.2,0
				c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0.1-0.2,0.1c-0.1,0-0.2,0.1-0.2,0.1
				c-0.1,0-0.1,0-0.2,0.1l-0.1,0.1c-0.1,0-0.1,0.1-0.2,0.2C54,37,53.9,37,53.9,37.1c-0.1,0.1-0.1,0.1-0.2,0.2
				c-0.1,0.1-0.1,0.1-0.1,0.2l-0.1,0.1l-40.4,69.2L5.4,93.5l50.3-86L74,38.9L66.3,52.1z M55.3,37.4L55.3,37.4L55.3,37.4L55.3,37.4z
				 M55.6,43.8l7.7,13.3L42.9,92.2c-0.5,0.8-0.5,1.7,0,2.5c0.4,0.8,1.3,1.3,2.2,1.3l123.2,0l-7.7,13.2h-143L55.6,43.8z M54.5,37.9
				L54.5,37.9L54.5,37.9L54.5,37.9z M120.9,72.7l-20.5-35.1l-0.1-0.1c0-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.2
				c-0.1-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.1c-0.1,0-0.1-0.1-0.2-0.2c-0.1,0-0.2-0.1-0.2-0.1c-0.1,0-0.2-0.1-0.2-0.1
				c-0.1,0-0.2,0-0.2-0.1c-0.1,0-0.2,0-0.2,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0.1
				c-0.1,0-0.2,0.1-0.2,0.1c-0.1,0-0.1,0.1-0.2,0.1c-0.1,0-0.1,0-0.2,0.1l-0.1,0.1c-0.1,0-0.1,0.1-0.2,0.2
				c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.1,0.2c-0.1,0.1-0.1,0.1-0.1,0.2L74.7,74c-0.4,0.8-0.5,1.7,0,2.5
				c0.4,0.8,1.3,1.3,2.2,1.3h19.8l7.7,13.2l-55.1,0L98.2,7.5l38.1,65.3H120.9z M81.3,72.7L87.5,62l6.3,10.7H81.3z M98.2,43.8
				l19.1,32.7c0.4,0.8,1.3,1.2,2.2,1.2h21.3c1.4,0,2.5-1.1,2.5-2.5c0-0.5-0.2-1-0.5-1.5L102.5,5H118l50.2,86h-58L90.4,57.1
				L98.2,43.8z M60,5h15.5l9.2,15.7l-7.7,13.2L60,5z M97.6,1.1L97.6,1.1L97.6,1.1L97.6,1.1z"/>
		</svg>
	</div>
</div>

<section class="home-services">
	<div class="container">
		<div class="inner">
			<h2><?php the_field('services_title'); ?></h2>
			<p><?php the_field('services_content'); ?></p>
		</div>
		<ul class="services-list">
			<?php
				$service_posts = get_posts(array(
					'post_type' => 'services',
					'posts_per_page' => -1
				));
				foreach($service_posts as $service):
			?>
			<li>
				<a href="<?php echo get_permalink($service->ID); ?>">
					<?php echo get_the_post_thumbnail($service->ID, 'large'); ?>
					<?php echo get_the_title($service->ID); ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<section class="home-about">
	<div class="about-image">
		<?php if(have_rows('about_links')): $about_i = 0;?>
			<?php while(have_rows('about_links')): the_row(); $about_i++; ?>
				<div class="img <?php if($about_i == 1){ echo 'vis'; } ?> " style="background-image: url(<?php echo get_sub_field('image')['sizes']['large']; ?>)"></div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="about-content">
		<div class="inner">
			<h2><?php the_field('about_title'); ?></h2>
			<p><?php the_field('about_content'); ?></p>
			<?php if(have_rows('about_links')): ?>
				<ul class="about-links">
					<?php while(have_rows('about_links')): the_row(); ?>
						<li>
							<a class="button" href="<?php the_sub_field('link'); ?>">
								<?php the_sub_field('link_text'); ?>
								<span class="hover-text">Learn More</span>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
<section class="home-projects">
	<div class="container">
		<div class="inner-container">
			<h2><?php the_field('projects_title'); ?></h2>
			<p><?php the_field('projects_content'); ?></p>
		</div>
	</div>
	<div class="projects-archive-list">
		<div class="wide-container">
			<ul>
				<?php while( have_rows('projects') ): the_row(); $project_id = get_sub_field('project')->ID; ?>
					<li>
						<a href="<?php echo get_permalink($project_id); ?>" title="<?php echo get_the_title($project_id); ?>">
							<figure>
								<svg version="1.1"
									 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									 x="0px" y="0px" width="175.1px" height="114.2px" viewBox="0 0 175.1 114.2" style="enable-background:new 0 0 175.1 114.2;"
									 xml:space="preserve">
									<?php
										$fill = '#75b94b';
										if(get_the_post_thumbnail_url($project_id)):
											$fill = 'url(#img-' . $project_id . ')'; ?>
											<defs>
												<pattern id="img-<?php echo $project_id ?>" patternUnits="userSpaceOnUse" width="175" height="114">
													<image xlink:href="<?php the_post_thumbnail_url( 'medium' ); ?>" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMinYMin slice" />
												</pattern>
											</defs>
									<?php endif; ?>
									<polygon class="img" fill="<?php echo $fill; ?>" points="56.1,3.1 2.4,93.4 13.7,111.8 162.1,111.8 172.4,93.8 118.7,2.4 98.1,2.4 87.4,20.4 76.7,2.4 "/>
									<path class="logo" d="M175,92.9l0-0.1c0-0.1-0.1-0.3-0.1-0.4l0-0.1l-53.2-91c-0.4-0.8-1.3-1.2-2.2-1.2L98.1,0l-0.1,0c-0.1,0-0.1,0-0.2,0
										c-0.1,0-0.1,0-0.2,0l-0.1,0c-0.1,0-0.1,0-0.2,0.1l-0.5,0.3c0,0-0.1,0.1-0.2,0.1l-0.2,0.2c0,0-0.1,0.1-0.1,0.2l-8.7,14.8
										L79.1,1.2C78.6,0.5,77.8,0,76.9,0H55.6l-0.2,0c-0.1,0-0.3,0-0.4,0.1l-0.1,0c-0.2,0-0.3,0.1-0.4,0.2l-0.1,0.1
										c-0.2,0.1-0.3,0.2-0.5,0.3l-0.1,0.1c-0.1,0.1-0.2,0.2-0.2,0.3l0,0l-53.2,91c-0.5,0.8-0.5,1.7,0,2.5L11,112.9
										c0.4,0.8,1.3,1.2,2.2,1.2h148.8c0.9,0,1.7-0.5,2.2-1.2l10.6-18.2l0.1-0.1c0.1-0.1,0.1-0.2,0.2-0.4l0-0.1
										c0.1-0.2,0.1-0.4,0.1-0.6C175.1,93.3,175,93.1,175,92.9z M55.6,37.4L55.6,37.4L55.6,37.4L55.6,37.4z M56.7,37.8L56.7,37.8
										L56.7,37.8L56.7,37.8z M66.3,52.1l-8.5-14.5l-0.1-0.1c0-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.2
										c-0.1-0.1-0.1-0.1-0.2-0.1l-0.2-0.1c-0.1,0-0.2-0.1-0.2-0.1c-0.1,0-0.1-0.1-0.2-0.1c-0.1,0-0.2,0-0.3-0.1c-0.1,0-0.1,0-0.2,0
										c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0.1-0.2,0.1c-0.1,0-0.2,0.1-0.2,0.1
										c-0.1,0-0.1,0-0.2,0.1l-0.1,0.1c-0.1,0-0.1,0.1-0.2,0.2C54,37,53.9,37,53.9,37.1c-0.1,0.1-0.1,0.1-0.2,0.2
										c-0.1,0.1-0.1,0.1-0.1,0.2l-0.1,0.1l-40.4,69.2L5.4,93.5l50.3-86L74,38.9L66.3,52.1z M55.3,37.4L55.3,37.4L55.3,37.4L55.3,37.4z
										 M55.6,43.8l7.7,13.3L42.9,92.2c-0.5,0.8-0.5,1.7,0,2.5c0.4,0.8,1.3,1.3,2.2,1.3l123.2,0l-7.7,13.2h-143L55.6,43.8z M54.5,37.9
										L54.5,37.9L54.5,37.9L54.5,37.9z M120.9,72.7l-20.5-35.1l-0.1-0.1c0-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.2
										c-0.1-0.1-0.1-0.1-0.2-0.2c-0.1-0.1-0.1-0.1-0.2-0.1c-0.1,0-0.1-0.1-0.2-0.2c-0.1,0-0.2-0.1-0.2-0.1c-0.1,0-0.2-0.1-0.2-0.1
										c-0.1,0-0.2,0-0.2-0.1c-0.1,0-0.2,0-0.2,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0.1
										c-0.1,0-0.2,0.1-0.2,0.1c-0.1,0-0.1,0.1-0.2,0.1c-0.1,0-0.1,0-0.2,0.1l-0.1,0.1c-0.1,0-0.1,0.1-0.2,0.2
										c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.1,0.2c-0.1,0.1-0.1,0.1-0.1,0.2L74.7,74c-0.4,0.8-0.5,1.7,0,2.5
										c0.4,0.8,1.3,1.3,2.2,1.3h19.8l7.7,13.2l-55.1,0L98.2,7.5l38.1,65.3H120.9z M81.3,72.7L87.5,62l6.3,10.7H81.3z M98.2,43.8
										l19.1,32.7c0.4,0.8,1.3,1.2,2.2,1.2h21.3c1.4,0,2.5-1.1,2.5-2.5c0-0.5-0.2-1-0.5-1.5L102.5,5H118l50.2,86h-58L90.4,57.1
										L98.2,43.8z M60,5h15.5l9.2,15.7l-7.7,13.2L60,5z M97.6,1.1L97.6,1.1L97.6,1.1L97.6,1.1z"/>
								</svg>

							</figure>
							<div class="content">
								<h2><?php echo get_the_title($project_id); ?></h2>
								<?php echo MakespaceChild::get_excerpt_by_id($project_id); ?>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<a class="button all" href="<?php echo home_url('projects');?>">See All Projects</a>
		</div>
	</div>
</section>
<section class="home-affiliations">
	<div class="container">
		<div class="inner-container">
			<h2><?php the_field('affiliates_title'); ?></h2>
			<p><?php the_field('affiliates_content'); ?></p>
		</div>
		<div class="wide-container">
			
			<?php if(have_rows('about_links')): ?>
				<div class="affiliates-list">
					<ul>
						<?php while(have_rows('affiliates')): the_row(); ?>
							<li>
								<?php if(get_sub_field('link')):?>
								<a href="<?php the_sub_field('link'); ?>">
								<?php endif; ?>
								<img src="<?php echo get_sub_field('icon')['sizes']['medium']; ?>" alt="<?php the_sub_field('title'); ?>">
								<?php if(get_sub_field('link')):?>
								</a>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
</section>

<?php endwhile; ?>
		
<?php get_footer();