<?php

add_action('init', 'setup');
add_action("admin_menu", "setup_settings");

function setup() {

	register_sidebar(array('id' => 'footer-col-1', 'name' => "Footer Spalte 1", ));
	register_sidebar(array('id' => 'footer-col-2', 'name' => "Footer Spalte 2", ));
	register_sidebar(array('id' => 'footer-col-3', 'name' => "Footer Spalte 3", ));
	register_sidebar(array('id' => 'footer-col-4', 'name' => "Footer Spalte 4", ));

	register_nav_menu('stura-menu', __('StuRa Menu'));
	register_nav_menu('club-menu', __('Club Menu'));
	register_nav_menu('service-menu', __('Service Menu'));
	register_nav_menu('sport-menu', __('Sport Menu'));
	register_nav_menu('technik-menu', __('Technik Referat Menu'));
	register_nav_menu('hopo-menu', __('HoPo Referat Menu'));
	register_nav_menu('betreuung-menu', __('Betreuung Referat Menu'));
	register_nav_menu('finanzen-menu', __('Finanzen Referat Menu'));
}

function setup_settings() {
	add_menu_page('StuRa', 'StuRa', 'manage_options', 'stura', 'setup_settings_index');

	add_submenu_page("stura", "Frontpage", "Frontpage", "manage_options", "frontpage", "setup_settings_frontpage");
	add_submenu_page("stura", "Subpages", "Subpages", "manage_options", "subpages", "setup_settings_subpages");
	
}

function setup_settings_index() {
}

function setup_settings_frontpage() {
	$teasers = array(
		"stura" => "StuRa",
		"club" => "Club",
		"service" => "Service",
		"sport" => "Sport"
	);
	
	foreach($teasers as $key => $label)
	{
		if (isset($_POST[$key."-teaser"])) {
			$teaser = esc_attr($_POST[$key."-teaser"]);
			update_option("stura-frontpage-teaser-".$key, $teaser);
		}
	}
	
	require "settings-frontpage.php";
}

function setup_settings_subpages() {
	require "settings-subpages.php";
}

function startswith($haystack, $needle)
{
    return !strncmp($haystack, $needle, strlen($needle));
}

function _get_root_category($id)
{
	$parent = get_category($id);
	
	if ( $parent->parent && ( $parent->parent != $parent->term_id ))
		return _get_root_category($parent->parent);
	else
		return $parent->slug;
	
}

function stura_tile_name($post)
{
	$slugs = array(
		"studentenrat" => "stura",
		"stura" => "stura",
		"sturaveranstaltungen" => "stura",
		"referat-technik" => "stura",
		"referat-betreuung" => "stura",
		"referat-finanzen" => "stura",
		"referat-hochschulpolitik" => "stura",
		"uncategorized" => "stura",
		"club" => "club",
		"clubveranstaltungen" => "club",
		"service" => "service",
		"sport" => "sport",
	);
	
	if($post->post_type == "page")
	{
		$uri = get_page_uri( $post->ID );

		if(startswith($uri, "studentenrat"))
			return "stura";

		if(startswith($uri, "hftl-club"))
			return "club";

		if(startswith($uri, "service"))
			return "service";

		if(startswith($uri, "sport"))
			return "sport";
	}

	if($post->post_type == "post")
	{
		$cat = get_the_category($post->ID);

		return $slugs[$cat[0]->slug];
	}
}
?>