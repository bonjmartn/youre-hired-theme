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
		'before_widget' => '<li>',
		'after_widget' => '</li>',
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

function contact_widget( $name, $id, $description ) {

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

function footer_widget( $name, $id, $description ) {

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

// Create Resume Widget Areas

resume_widget( 'Photo and Contact Info', 'photo-contact', 'Photo and contact info at the top-left of the page' );
resume_widget( 'Summary - Name, Title, Social', 'summary', 'Main summary area with your name, title, and social icons' );
resume_widget( 'Resume Download', 'resume-download', 'Offer a file download version of your resume' );
resume_widget( 'About Me', 'about-me', 'About Me paragraph' );
resume_widget( 'Experience', 'experience', 'Work experience - Add as many widgets as you need' );
resume_widget( 'Education', 'education', 'Education - Add as many widgets as you need' );
resume_widget( 'Languages', 'languages', 'Languages - Add as many widgets as you need' );
resume_widget( 'Recommendations', 'recommendations', 'Recommendations - Add as many widgets as you need' );
skills_widget( 'Skills', 'skills', 'Skills area' );

// Create Widget areas for Pages and Blog Posts

create_widget( 'Sidebar', 'blog', 'Displays on the right of blog posts and pages' );

// Create Widget areas for Footer

contact_widget( 'Footer Contact Form', 'contact-footer', 'Add a contact form to the footer' );
footer_widget( 'Footer Open Content', 'content-footer', 'Add any widgets to the right half of the footer' );

?>