<?php

$groups = array(
	"studentenrat" => "Studentenrat",
	"club" => "HfTL-Club",
	"service" => "Service",
	"sport" => "Sport"
);

$pictures = array(
	"frontpage" => array("Frontpage Big-Picture", "960 x 300 px"),
	"studentenrat" => array("StuRa Big-Picture", "960 x 150 px"),
	"club" => array("Club Big-Picture", "960 x 150 px"),
	"service" => array("Service Big-Picture", "960 x 150 px"),
	"sport" => array("Sport Big-Picture", "960 x 300 px"),
	"uncategorized" => array("Allgemein Big-Picture", "960 x 150 px"),
	"error404" => array("404 Not Found Picture", "960 x 640 px")
);


	

add_action('init', 'setup');
add_action("admin_menu", "setup_settings");
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');


function startswith($haystack, $needle)
{
    return !strncmp($haystack, $needle, strlen($needle));
}




function setup() {
	
	register_sidebar(array('id' => 'sidebar', 'name' => "Sidebar", ));
	register_sidebar(array('id' => 'footer-col-1', 'name' => "Footer Spalte 1", ));
	register_sidebar(array('id' => 'footer-col-2', 'name' => "Footer Spalte 2", ));
	register_sidebar(array('id' => 'footer-col-3', 'name' => "Footer Spalte 3", ));
	register_sidebar(array('id' => 'footer-col-4', 'name' => "Footer Spalte 4", ));

	register_nav_menu('studentenrat-menu', __('StuRa Menu'));
	register_nav_menu('club-menu', __('Club Menu'));
	register_nav_menu('service-menu', __('Service Menu'));
	register_nav_menu('sport-menu', __('Sport Menu'));
	register_nav_menu('technik-menu', __('Technik Referat Menu'));
	register_nav_menu('hopo-menu', __('HoPo Referat Menu'));
	register_nav_menu('betreuung-menu', __('Betreuung Referat Menu'));
	register_nav_menu('finanzen-menu', __('Finanzen Referat Menu'));
	
	// relocate some plugin styles
	wp_deregister_style("form-manager-css");
	wp_register_style("form-manager-css", get_template_directory_uri()."/styles/form-manager.css");
}

function setup_settings() {
	add_menu_page('StuRa', 'StuRa', 'manage_options', 'studentenrat', 'setup_settings_index');
	add_submenu_page("studentenrat", "Frontpage", "Frontpage", "manage_options", "frontpage", "setup_settings_frontpage");
	add_submenu_page("studentenrat", "Pictures", "Pictures", "manage_options", "pictures", "setup_settings_pictures");
}

function setup_settings_index() {
}

function setup_settings_frontpage() {
	global $groups;

	foreach($groups as $key => $label)
	{
		if (isset($_POST[$key."-teaser"])) {
			$teaser = esc_attr($_POST[$key."-teaser"]);
			update_option("stura-frontpage-teaser-".$key, $teaser);
		}
	}
	
	require "settings-frontpage.php";
}

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_directory').'/js/big-picture-upload.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}


function setup_settings_pictures() {
	global $pictures;
	
	foreach($pictures as $slug => $info)
	{
		list($label, $hint) = $info;
		if (isset($_POST["upload_picture_".$slug])) {
			$url = esc_attr($_POST["upload_picture_".$slug]);
			update_option("stura-bigpicture-" . $slug, $url);
		}
	}

	require "settings-pictures.php";
}


function _get_group_by_page($page)
{
	$ancestors = get_ancestors( $page->ID, 'page' );
	$root_id = array_pop($ancestors);
	$root_page = get_page($root_id);

	return $root_page->post_name;
}

function _get_group_by_post($post)
{
	global $groups;
	
	foreach(get_the_category($post->ID) as $cat)
	{
		foreach($groups as $slug => $label)
		{
			$parent_cat = get_category_by_slug($slug);
			if($parent_cat->slug == $cat->slug || cat_is_ancestor_of($parent_cat, $cat))
			{
				return $slug;
			}
		}
	}
	
	return 'uncategorized';
}

function stura_group_name($obj)
{
	/**
	 * Group names are: frontpage, stura, service, club, sport
	 */
	 
	if($obj instanceof WP_Post)
	{
		if($obj->post_type == "page")
		{
			return _get_group_by_page($obj);
		}
		
		if($obj->post_type == "post")
		{
			return _get_group_by_post($obj);
		}
	}

	return 'uncategorized';
}

function stura_is_grouppage($obj)
{
	global $groups;
	
	if(!$obj instanceof WP_Post)
		return false;
	
	if($obj->post_type != "page")
		return false;
	
	if(!isset($groups[$obj->post_name]))
		return false;
	
	return true;
}

function stura_group_label($obj)
{
	global $groups;
	$grp = stura_group_name($obj);
	return $groups[$grp];
}

function stura_print_menu($obj)
{
	$group = stura_group_name($obj);
	wp_nav_menu( array( 'theme_location' => $group.'-menu' ) );
}

function stura_print_bg_class($obj)
{
	print "bg-cat bg-cat-".stura_group_name($obj);
}



