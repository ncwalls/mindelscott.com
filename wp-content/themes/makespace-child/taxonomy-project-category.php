<?php get_header(); ?>

	<div class="container">
		<article class="inner-container">
			<?php the_field('projects_overview', 'option'); ?>
			<div class="filter-container">
				<div class="filter-dropdown">
					<div class="filter-display">
						<?php
							if(single_term_title('', false) ){ 
								single_term_title();
							}
							else {
								echo 'All Projects';
							};
						?>
					</div>
					<ul>
						<li><a href="<?php echo home_url('projects'); ?>">All Projects</a></li>
						<?php
							$categories = get_categories( array(
								'orderby' => 'name',
								'order'   => 'ASC',
								'taxonomy'=> 'project-category'
							) );

							foreach( $categories as $category ) {
								$caturl = get_category_link( $category->term_id );
								$catname = $category->name;

								echo '<li><a href="' . $caturl .'">' . $catname. '</a></li>';
							} 
						?>
					</ul>
				</div>
			</div>
		</article>
	</div>
	<div class="projects-archive-list">
		<div class="wide-container">
			<ul>
				<?php while( have_posts() ): the_post(); ?>
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<figure>
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
													<image xlink:href="<?php the_post_thumbnail_url( 'medium' ); ?>" x="0" y="0" width="175" height="114" />
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
								<h2><?php the_title(); ?></h2>
								<?php the_excerpt(); ?>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
	<div class="wide-container">
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