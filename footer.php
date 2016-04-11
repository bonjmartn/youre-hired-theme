<footer>
	<div class="page-container">

		<div class="section group">
			<div class="col span_6_of_12">

				<!-- OPEN CONTENT AREA -->

				<div class="open-content">
					<?php if ( ! dynamic_sidebar( 'content-footer') ): ?>
						<p>Open Content Area Setup</p>
						<p>This is an open content area. You can use any widgets in this space.</p>
						<p>Recommendation: Write a brief letter to potential employers, something like an open cover letter. Explain why you're a great person to hire and what you can bring to an organization. Give it a more personal touch than the rest of the formal resume details.</p>
						<p>But that's not required. You can use this space for anything!</p>
					<?php endif; ?>
				</div>

			</div>
			<div class="col span_6_of_12">

				<!-- CONTACT FORM -->

				<div class="footer-contact">
					<?php if ( ! dynamic_sidebar( 'contact-footer') ): ?>
						<p>Contact Form Setup</p>
						<p>To set up a contact form in the footer, you must use a plugin. Use a text widget in the Footer widget area to enter the form shortcode.</p>
					<?php endif; ?>
				</div>

			</div>
		</div>

	</div>
</footer>

  <!-- Bottom Strip -->

  <div class="footer-strip">
    <div class="page-container">
      <span id="copyright">&copy; <?php echo date ('Y') ?> <?php bloginfo('name'); ?> &nbsp; &bull; &nbsp; Website design by <a href="https://www.zenwebthemes.com/">ZenWebThemes.com</a></span>
    </div>
  </div>

<?php wp_footer(); ?>

</body>
</html>