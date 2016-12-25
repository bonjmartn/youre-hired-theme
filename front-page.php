<?php get_header(); ?>

<div class="resume-container">

<!-- SUMMARY AND PHOTO -->

<div class="section group">
	<div class="col span_6_of_12">
		<div class="contact">
			<?php if ( ! dynamic_sidebar( 'photo-contact') ): ?>
                <h3>Photo and Contact Setup</h3>
                <p>Go to Appearance > Widgets and add the Photo and Contact widget to the "Photo and Contact" widget area.</p>
			<?php endif; ?>

			<!-- DOWNLOAD RESUME -->

			<?php if ( ! dynamic_sidebar( 'resume-download') ): ?>
		        <p>Resume Download Setup</p>
		        <p>Go to Appearance > Widgets and add the Resume Download Widget to the "Resume Download" widget area.</p>
			<?php endif; ?>

		</div>
	</div>

<!-- SUMMARY - NAME, TITLE, SOCIAL ICONS -->

	<div class="col span_6_of_12">
		<div class="name-headline">

			<?php if ( ! dynamic_sidebar( 'summary') ): ?>
                <h3>Summary Setup</h3>
                <p>Go to Appearance > Widgets and add the Summary widget to the "Summary - Name, Title, and Social" widget area.</p>
			<?php endif; ?>

		</div>

	</div>
</div>

<!-- SKILLS -->

<div class="skills">
	<?php if ( ! dynamic_sidebar( 'skills') ): ?>
		<p>Skills Setup</p>
		<p>Go to Appearance > Widgets and add the Skills widget to the "Skills" widget area.</p>
	<?php endif; ?>
</div>


<!-- ABOUT ME -->

<div class="about-title">
	<h3>About Me</h3>
</div>

<div class="about">
	<?php if ( ! dynamic_sidebar( 'about-me') ): ?>
        <p>About Me Setup</p>
        <p>Go to Appearance > Widgets and add the About Me widget to the "About Me" widget area.</p>
	<?php endif; ?>
</div>

<!-- EXPERIENCE -->

<div class="experience-title">
	<h3>Experience</h3>
</div>

<div class="experience">
	<?php if ( ! dynamic_sidebar( 'experience') ): ?>
        <p>Experience Setup</p>
        <p>Go to Appearance > Widgets and add Experience widgets to the "Experience" widget area.</p>
	<?php endif; ?>
</div>


<!-- EDUCATION -->

<div class="section group">
	<div class="col span_6_of_12">

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

<!-- LANGUAGES -->

	<div class="col span_6_of_12">

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


<!-- ACCOMPLISHMENTS -->

<div class="section group">

	<div class="col span_6_of_12">
		<div class="accomplishments-title">
			<h3>Accomplishments</h3>
		</div>

		<div class="accomplishments">
			<?php if ( ! dynamic_sidebar( 'accomplishments') ): ?>
				<p>Accomplishments Setup</p>
				<p>Go to Appearance > Widgets and add a Text widget to the "Accomplishments" widget area.</p>
				<p>Use this space highlight additional accomplishments or other items, such as certificates earned, major projects completed, or links to external examples of your work.</p>
			<?php endif; ?>
		</div>

	</div>

<!-- ADDITIONAL INFO -->

	<div class="col span_6_of_12">
		<div class="additional-title">
			<h3>Additional Info</h3>
		</div>

		<div class="additional">
			<?php if ( ! dynamic_sidebar( 'additional') ): ?>
				<p>Additional Info Setup</p>
				<p>Go to Appearance > Widgets and add a Text widget to the "Additional Info" widget area.</p>
				<p>Use this space to add anything else that you'd like to make employers aware of, including personal interests, volunteer experience, whether you're willing to relocate, and anything that doesn't fit within the other sections. Since it's the last area on the page, leave them with a good impression.</p>
			<?php endif; ?>
		</div>

	</div> 

</div>

<?php get_footer(); ?>