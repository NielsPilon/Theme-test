<?php 
	
	add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check of functie bestaat
	// nog en extra regel erbij 
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout', // Zie https://wordpress.org/gutenberg/handbook/block-api/
			'icon'				=> 'admin-links', // Dashicon icon class name
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
		
		// register a repeater block
		acf_register_block(array(
			'name'				=> 'repeater',
			'title'				=> __('Repeater'),
			'description'		=> __('A custom repeater block.'),
			'render_callback'	=> 'my_acf_repeater_block_render_callback',
			'category'			=> 'widgets', // Zie https://wordpress.org/gutenberg/handbook/block-api/
			'icon'				=> 'update', // Dashicon icon class name
			'keywords'			=> array( 'testimonial', 'quote' ),
		));

		
	}
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists(STYLESHEETPATH . "/blocks/content-{$slug}.php") ) {
		include( STYLESHEETPATH . "/blocks/content-{$slug}.php" );
	}
}

function my_acf_repeater_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "block" folder
	if( file_exists(STYLESHEETPATH . "/blocks/content-{$slug}.php") ) {
		include( STYLESHEETPATH . "/blocks/content-{$slug}.php" );
	}
}