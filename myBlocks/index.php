<?php
/* Plugin Name: My Blocks */

Class myBlocks{

	public function __construct(){
		add_action('acf/init', array($this,'initiate_acf_block'));
		add_action( 'wp_enqueue_scripts', array($this,'enqueue_myblockscripts_style') );
	}
	
	public function enqueue_myblockscripts_style() {
        $plugin_url = plugin_dir_url( __FILE__ );
        wp_enqueue_style( 'my-block-style',  $plugin_url . "/assets/css/style.css");
    }

	public function initiate_acf_block() {
		/* check function exists */
		if( function_exists('acf_register_block') ) {
			/* Register a Header block */
			acf_register_block(array(
				'name'              => 'myheader',
				'title'             => __('My Header'),
				'description'       => __('A custom Header block.'),
				'render_callback'   => array($this,'block_render_callback'),
				'category'          => 'formatting',
				'icon'              => 'book-alt',
				'keywords'          => array( 'myblock','myblocks','header','myheader'),
				'mode' 				=> true,
			));
			/* Register a Feed block */
			 acf_register_block(array(
				'name'              => 'feed',
				'title'             => __('Feed'),
				'description'       => __('A custom Feed block.'),
				'render_callback'   => array($this,'block_render_callback'),
				'category'          => 'formatting',
				'icon'              => 'book-alt',
				'keywords'          => array( 'myblock','myblocks','myfeed','feed'),
			));    
		}
	}
	
	public function block_render_callback( $block ) {
			$slug = str_replace('acf/', '', $block['name']); 
			include( "template-parts/block/content-{$slug}.php") ;
	}
	
}

$obj = new myBlocks();

?>
