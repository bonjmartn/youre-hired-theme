<?php get_header(); ?>

<a id="summary"></a>         

<div class="full-container">
<div class="page-container">

<!-- SUMMARY AND PHOTO -->


	<div class="section group">
		<div class="col span_4_of_12">
			<div class="contact">
				<?php if ( ! dynamic_sidebar( 'photo-contact') ): ?>
                    <h3>Photo and Contact Setup</h3>
                    <p>Go to Appearance > Widgets and add the Photo and Contact widget to the "Photo and Contact" widget area.</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="col span_8_of_12">
			<div class="name-headline">

				<?php if ( ! dynamic_sidebar( 'summary') ): ?>
                    <h3>Summary Setup</h3>
                    <p>Go to Appearance > Widgets and add the Summary widget to the "Summary - Name, Title, and Social" widget area.</p>
				<?php endif; ?>

			</div>

		</div>
	</div>


	<div class="section group">
		<div class="col span_4_of_12">

<!-- DOWNLOAD RESUME -->

		<?php if ( ! dynamic_sidebar( 'resume-download') ): ?>
            <p>Resume Download Setup</p>
            <p>Go to Appearance > Widgets and add the Resume Download Widget to the "Resume Download" widget area.</p>
		<?php endif; ?>

<!-- SKILLS -->

			<a id="skills"></a>

			<ul class="skills-block">
				<div class="skills">
	                <?php if ( ! dynamic_sidebar( 'skills') ): ?>
	                <p>Skills Setup</p>
	                    <p>Go to Appearance > Widgets and add the Skills widget to the "Skills" widget area.</p>
					<?php endif; ?>
				</div>
			</ul>
		</div>
		<div class="col span_8_of_12">

		<a id="about"></a>

		<div class="floating-icons">
			<i class="fa fa-user"></i>
		</div>

			<div class="about">
				<h3>About Me</h3>
				<?php if ( ! dynamic_sidebar( 'about-me') ): ?>
                    <p>About Me Setup</p>
                    <p>Go to Appearance > Widgets and add the About Me widget to the "About Me" widget area.</p>
				<?php endif; ?>
			</div>

<!-- EXPERIENCE -->

		<a id="experience"></a>

		<div class="floating-icons">
			<i class="fa fa-briefcase"></i>
		</div>

			<div class="experience-title">
				<h3>Experience</h3>
			</div>
			
			<div class="experience">
					<?php if ( ! dynamic_sidebar( 'experience') ): ?>
                    <p>Experience Setup</p>
                    <p>Go to Appearance > Widgets and add Experience widgets to the "Experience" widget area.</p>
					<?php endif; ?>
			</div>



		</div> <!-- END 8 OF 12 -->
	</div> <!-- END OF SECTION GROUP -->


	<div class="section group">
		<div class="col span_6_of_12">

<!-- EDUCATION -->

			<a id="education"></a>

			<div class="floating-icons">
				<i class="fa fa-graduation-cap"></i>
			</div>

			<div class="education-title">
				<h3>Education</h3>
			</div>

			<div class="education">
				<?php if ( ! dynamic_sidebar( 'education') ): ?>
					<p>Education Setup</p>
					<p>Go to Appearance > Widgets and add Education widgets to the "Education" widget area.</p>
				<?php endif; ?>
			</div>

		</div>


		<div class="col span_6_of_12">

<!-- LANGUAGES -->

			<a id="languages"></a>

			<div class="floating-icons">
				<i class="fa fa-comments-o"></i>
			</div>

			<div class="languages-title">
				<h3>Languages</h3>
			</div>

			<div class="languages">
				<?php if ( ! dynamic_sidebar( 'languages') ): ?>
					<p>Languages Setup</p>
					<p>Go to Appearance > Widgets and add Languages widgets to the "Languages" widget area.</p>
				<?php endif; ?>
			</div>

		</div>

	</div>

	<div class="section group">

<!-- PROJECTS -->

		<div class="col span_6_of_12">

			<a id="projects"></a>

			<div class="floating-icons">
				<i class="fa fa-folder-open"></i>
			</div>

				<div class="projects-title">
					<h3>Projects</h3>
				</div>

		    <div class="projects">

		      <?php
		      $args = array( 'posts_per_page' => 2, 'orderby' => 'date' );
		      $postslist = get_posts( $args );
		      foreach ( $postslist as $post ) :
		      setup_postdata( $post ); ?> 

		            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>

		            <p><?php the_excerpt(); ?></p><br>

		      <?php
		      endforeach; 
		      wp_reset_postdata();
		      ?>

			</div>
			
		</div>

	<!-- RECOMMENDATIONS -->

		<div class="col span_6_of_12">

			<a id="recommendations"></a>
			
			<div class="floating-icons">
				<i class="fa fa-users"></i>
			</div>

				<div class="recommendations-title">
					<h3>Recommendations</h3>
				</div>

				<div class="recommendations">
					<?php if ( ! dynamic_sidebar( 'recommendations') ): ?>
						<p>Recommendations Setup</p>
						<p>Go to Appearance > Widgets and add Recommendations widgets to the "Recommendations" widget area.</p>
					<?php endif; ?>
				</div>

		</div>

	</div> <!-- END OF SECTION GROUP -->

</div>
</div><!-- end of full container -->

<?php get_footer(); ?>