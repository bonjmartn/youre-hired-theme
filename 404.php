<?php

get_header(); ?>

<div class="full-container">
<div class="page-container">

    <div class="section group">
      
      <div class="col span_8_of_12">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Hmm. That page doesn&rsquo;t exist.', 'youre-hired' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'youre-hired' ); ?></p>

					<?php get_search_form(); ?>

				</div>
			</section>

		</div>

	<?php get_sidebar( ' page' ); ?>

</div>
</div>
<?php get_footer(); ?>
