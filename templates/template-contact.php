<?php
/*
 * Template Name: Contact
 */
get_header(); ?>
<div class="suggest-background">
		<div class="row">
			<div class="large-6 large-offset-1 medium-6 small-12 columns">
				<div class='contact-form'>
					<?php 
					    $form_object = get_field('contactform');
					    echo do_shortcode('[gravityform id="2' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
					?>
				</div>
			</div>
			<div class="large-5 medium-5 small-12 columns ">
				<div class="info-right">
						<h3>Telephone</h3>
						<a href="tel:+380663564463">+380-066-6666</a>
						<h3>E-mail</h3>
						<a href="mailto:contact@unicweb.com.ua">contact@unicweb.com.ua</a>
						<h3>Skype</h3>
						<a href="skype:unicweb.team">Unicweb</a>
						<h3>Address</h3>
						<p>Ukraine, Poltava</p>
				</div>
			</div>
		</div>
</div>

<?php get_footer(); ?>