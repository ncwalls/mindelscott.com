<?php
/*
 * Template Name: Contact
 */
get_header(); ?>

	<?php while( have_posts() ): the_post(); ?>
		<div class="container">
			<article <?php post_class('inner-container'); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		</div>
		<div class="contact-middle">
			<div class="contact-info">
				<?php $contact_info = get_field('contact_information', 'option')[0]; ?>
				<div class="row phone">
					<span class="fa fa-mobile"></span><a href="tel:<?php echo $contact_info['phone_number']; ?>"><?php echo $contact_info['phone_number']; ?></a>
				</div>
				<div class="row fax">
					<span class="fa fa-fax"></span><a href="#" class="disablelink"><?php echo $contact_info['fax_number']; ?></a>
				</div>
				<div class="row address">
					<span class="fa fa-map-marker"></span><?php echo $contact_info['address']; ?>
				</div>
				<div class="row social">
					<span class="fa fa-share-alt"></span>
					<ul>
						<?php
							$social_links = $contact_info['social_media_links'];
							foreach($social_links as $social):
						?>
							<li><a href="<?php echo $social['url']; ?>" class="fa <?php echo $social['class']; ?>"></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="contact-map">
				<div id="gmap"></div>
			</div>
		</div>
		<div class="container contact-form">
			<div class="inner-container">
				<?php the_field('contact_form_content'); ?>
				<?php echo do_shortcode( '[gravityform id="1" title="false" description="false"]' ); ?>
			</div>
		</div>
	<?php endwhile; ?>

<?php get_footer();