<?php
/*
 * Template Name: Home Page
 */
get_header(); ?>

<!-- VideoBG -->
<div id="video-on-bg">

</div>
<!--[if lt IE 9]>
<script>
    document.createElement('video');
</script>
<![endif]-->
<style type="text/css">
    video { display: block; width: 100%; }
    #video-on-bg {
        -webkit-background-size: cover;
           -moz-background-size: cover;
            -ms-background-size: cover;
             -o-background-size: cover;
                background-size: cover;
                max-height: 600px;
                min-height: 400px;
                overflow: hidden;
        width: 100%;
        left: 0; /* прикрепить видео к левому краю или правому? (right:0;) */
        top: -100px; /* прикрепить видео к нижнему краю или верхнему (top:0;) */
        z-index: -998;
    }
</style>

<div class="about">	
	<div class="row ">
		<div class="large-6 large-offset-5 medium-6 medium-offset-3 small-10 small-offset-1 columns">
			<!-- <h4>About Us</h4> -->
			<p>We are a young and ambitious command, which deals in websites developing of any complexity and scale. Our web-studio "Unic Web" offers a wide range of services from creating design and layout of the website to setting up the server software</p>
			<div class="small button radius" id="mainmodal">Get Site</div>
			<div class="modal-container"  id="modalform">
				
			</div>
			<div class="modal-content">
					<i id='modal-close' class="fa fa-times cross"></i>
					
					<?php 
				    $form_object = get_field('mainform');
				    echo do_shortcode('[gravityform id="1' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
					?>
			</div>
		</div>
	</div>
</div>


<div class="suggest-background">
	<div class="row">
		<div class="large-12 medium-12 small-12 columns">
			<div class="suggest text-center">
	     <h4 class="upper">Our Suggestions</h4>
	     <div class="row" data-equalizer data-equalizer-mq="large-up">
	       <div id="box" class="large-4 medium-4 small-12 columns blocks">
	         <div class="service">
	           <div class="service-icon-box">
	           <img class="service-icon" src="<?php echo get_template_directory_uri() ?>/images/des.png" alt="">
				<h4 class="service-heading">Design</h4>
	           </div>
	           <div class="service-description">
	             <p>Corporate identity</p>
	             <p>Site design</p>
	             <p>Logo design</p>
	             <button class="button radius">Get design</button>
	           </div>
	         </div>
	       </div>
	       <div id="box" class="large-4 medium-4 small-12 columns blocks">
	         <div class="service">
	           <div class="service-icon-box">
	           	<img class="service-icon" src="<?php echo get_template_directory_uri() ?>/images/dev.png" alt="">
	           <h4 class="service-heading">Development</h4>
	           </div>
	           <div class="service-description">
	             <p>Mobile version of site</p>
	             <p>Company website</p>
	             <p>One page site</p>
	             <p>Online store</p>
	             <button class="button radius">Get development</button>
	           </div>
	         </div>
	       </div>
	       <div id="box" class="large-4 medium-4 small-12 columns blocks">
	         <div class="service">
	           <div class="service-icon-box">
	           <img class="service-icon" src="<?php echo get_template_directory_uri() ?>/images/supp.png" alt="">
	           <h4 class="service-heading">Support</h4>
	           </div>
	           <div class="service-description">
	             <p>Domain registration</p>
	             <p>Internet acquiring</p>
	             <p>Site maintenance</p>
	             <p>Web hosting</p>
	             <button class="button radius">Get support</button>
	           </div>
	         </div>
	       </div>
	     </div>
	   </div>
	 </div>
	</div>

</div>

<div class="background-slider">
	<div class="row">
		  <div class="large-12 medium-12 small-12 columns">
		    <div class="slider text-center">
		      <h4>Portfolio</h4>
		 		<?php echo home_slider_template(); ?>
		    </div>
		  </div>
	</div>
</div>


<div class="background-technology">
	<div class="row">
			<h4 class="upper">Technologies</h4>
			<div class="large-2 medium-2 small-4 columns">
	          <img src="<?php echo get_template_directory_uri() ?>/images/html51.png" alt="">
	          <p>Html5</p>
	        </div>
	        <div class="large-2 medium-2 small-4 columns">
	          <img src="<?php echo get_template_directory_uri() ?>/images/CSS.png" alt="">
	          <p>CSS3</p>
	        </div>
	        <div class="large-2 medium-2 small-4 columns">
	          <img src="<?php echo get_template_directory_uri() ?>/images/JavaScript.png" alt="">
	          <p>JavaScript</p>
	        </div>
	        <div class="large-2 medium-2 small-4 columns">
	          <img src="<?php echo get_template_directory_uri() ?>/images/bootstrap.png" alt="">
	          <p>Bootstrap</p>
	        </div>
	        <div class="large-2 medium-2 small-4 columns">
	          <img src="<?php echo get_template_directory_uri() ?>/images/wordpress.png" alt="">
	          <p>Wordpress</p>
	        </div>
	        <div class="large-2 medium-2 small-4 columns">
	          <img src="<?php echo get_template_directory_uri() ?>/images/php.png" alt="">
	          <p>Php</p>
	        </div>
	</div>
</div>

<div class="team-background">
	<div class="row">
	    <h4 class="upper">Our Team</h4>
	    <div class="large-3 medium-3 small-6 columns text-center "  >
	      <img src="http://placehold.it/178x200" alt="">
	      <h5>Web designer</h5>
	      <p>Tolia</p>
	    </div>
	    <div class="large-3 medium-3 small-6 columns text-center ">
	      <img src="http://placehold.it/178x200" alt="" >
	      <h5>Front end developer</h5>
	      <p>Vadim</p>
	    </div>
	    <div class="large-3 medium-3 small-6 columns text-center ">
	      <img src="http://placehold.it/178x200" alt="" >
	      <h5>Back end developer</h5>
	      <p>Slava</p>
	    </div>
	    <div class="large-3 medium-3 small-6 columns text-center ">
	      <img src="http://placehold.it/178x200" alt="" >
	      <h5>Back end developer</h5>
	      <p>Sergei</p>
	    </div>
	</div>
</div>

<?php get_footer(); ?>
