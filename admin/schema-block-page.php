<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

function clivern_plugin_top_menu(){
	add_menu_page(
		__( 'Schema Blocks', 'schema-blocks' ),
		__( 'Schema Blocks', 'schema-blocks' ),
		'manage_options', 
		'schema_gutenberg_blocks', 
		'clivern_render_plugin_page', 
		plugin_dir_url( __FILE__ ) . 'images/logo.png');
}
add_action('admin_menu','clivern_plugin_top_menu');

function clivern_render_plugin_page(){
?>
<div class="akdesk-wrap-deah">
	<div class="header-wrap wrap">
	<img class="akdesk-logo" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'images/large-logo.png' ); ?>" alt="<?php esc_html_e( 'Visit schema gutenberg blocks', 'schema_gutenberg_blocks' ); ?>" />
		<span>Getting started with <strong>Gutenberg Blocks</strong></span>
	</div>
	<div class="welcome-text-wrap wrap banner-padd">
	<h2 class="section-head-adk">Welcome to the future of site building with Gutenberg!</h2>
	<p>This Gutenberg Blocks is now ready to use in your posts and pages.
	Simply search for "Schema" in the block inserter to display the Schema Blocks collection.</p>
	</div>
	<div class="Available-text-wrap wrap banner-padd">
	<h2 class="section-head-adk black-000">Available Gutenberg Blocks</h2>
	<p>The following blocks are available. More blocks are on the way so stay tuned!</p>
	<div class="Available-block-here-akd">
	<h3>Accordion Block - With Schema FAQ.</h3>
	<p>Add an accordion text toggle with a title and descriptive text. With Schema FAQ.</p>
	</div>
	<div class="Available-block-here-akd">
	<h3>Testimonial Block - With No Schema.</h3>
	<p>Add a customer or client testimonial to your site with an avatar, text, citation.</p>
	</div>
	</div>
	<style>
.header-wrap.wrap {
    position: relative;
    font-size: 24px;
    color: #fff;
    background: #000;
    padding: 35px 20px;
    line-height: 1.2;
    font-weight: lighter;
}
.header-wrap.wrap img.akdesk-logo {
    position: absolute;
    right: 20px;
    top: 20px;
}
.banner-padd {
    line-height: 1.2;
    padding: 5%;
    color: #fff;
    background: rgb(2,0,36);
	background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}
.akdesk-wrap-deah h2.section-head-adk {
    font-size: 30px;
    font-weight: bold;
	text-transform: uppercase;
	color: #fff;
}
.akdesk-wrap-deah p {
	font-size: 20px;
}
.welcome-text-wrap.wrap p{
	max-width:800px;
}
.Available-text-wrap.banner-padd {
    background: rgb(204,204,204);
    background: linear-gradient(90deg, rgba(204,204,204,1) 0%, rgba(204,204,204,1) 35%, rgba(153,153,153,1) 100%);
	text-align: center;
	color: #000;
}
h2.section-head-adk.black-000 {
    color: #000;
}
.Available-block-here-akd p {
    font-size: 16px;
}
.Available-block-here-akd h3 {
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
}
.Available-block-here-akd {
    width: 30%;
    background: #fff;
    padding: 50px;
    box-shadow: 0 0 50px rgba(0,0,0,0.2);
    margin: 50px 1%;
    border-radius: 10px;
    display: inline-block;
}
	</style>
<?php
}

