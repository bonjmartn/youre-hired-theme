<?php

function resume_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function skills_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// Create Resume Widget Areas

resume_widget( 'Photo and Contact Info', 'photo-contact', 'Photo and contact info at the top-left of the page' );
resume_widget( 'Summary - Name, Title, Social', 'summary', 'Main summary area with your name, title, and social icons' );
resume_widget( 'Resume Download', 'resume-download', 'Offer a file download version of your resume. See documentation for instructions.' );
skills_widget( 'Skills', 'skills', 'Use the "Skills" widget here.' );
resume_widget( 'About Me', 'about-me', 'Use the "About Me" and "Quotes" widgets here. Add as many Quotes widgets as you need.' );
resume_widget( 'Experience', 'experience', 'Use the "Experience" widgets here. Add as many widgets as you need.' );
resume_widget( 'Education', 'education', 'Use the "Education" widgets here. Add as many widgets as you need.' );
resume_widget( 'Languages', 'languages', 'Use the "Languages" widgets here. Add as many widgets as you need.' );
resume_widget( 'Accomplishments', 'accomplishments', 'Use a Text widget here to add any information you want to display.' );
resume_widget( 'Additional Info', 'additional', 'Use a Text widget here to add any information you want to display.' );

// Create Widget areas for Pages and Blog Posts

create_widget( 'Sidebar', 'blog', 'Displays on the right of blog posts and pages' );

?>