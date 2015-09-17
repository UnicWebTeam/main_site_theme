<?php
/*
 * Template Name: Portfolio
 */
get_header(); ?>

<div class="suggest-background">
	


<div class="row">
	<div class="large-12 small-12 columns">
	<h3>Our works:</h3>
		<div class='row'>
			<?php $posts = get_posts('numberposts=12&category=3') // get the posts from db ?> 

					<?php foreach ($posts as $post) { ?>
					<div class="large-3 medium-4 small-6 columns no-padding">
						<div class="image-wrapper overlay-fade-in">
							<?php echo $post->post_content?>
							<div class="image-overlay-content">
								<h2><?php echo $post->post_title?></h2>
								<div class='small button radius'><a href="<?php echo $post->postlink?>" target='blank'>View to site</a></div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
</div>

<?php get_footer(); ?>