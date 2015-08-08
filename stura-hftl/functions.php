<?php

$groups = array(
	"studentenrat" => "Studentenrat",
	"club" => "HfTL-Club",
	"service" => "Service",
	"sport" => "Sport",
	"intern" => "Intern"
);

$group_alias = array(
	"shop" => "service"
);

$pictures = array(
	"frontpage" => array("Frontpage Big-Picture", "960 x 300 px"),
	"studentenrat" => array("StuRa Big-Picture", "960 x 150 px"),
	"club" => array("Club Big-Picture", "960 x 150 px"),
	"service" => array("Service Big-Picture", "960 x 150 px"),
	"sport" => array("Sport Big-Picture", "960 x 150 px"),
	"intern" => array("Intern Big-Picture", "960 x 150 px"),
	"uncategorized" => array("Allgemein Big-Picture", "960 x 150 px"),
	"error404" => array("404 Not Found Picture", "960 x 150 px"),
	"shop" => array("Shop", "960 x 150 px")
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

	global $groups;
	global $group_alias;
	
	register_sidebar(array('id' => 'sidebar', 'name' => "Sidebar", ));
	register_sidebar(array('id' => 'footer-col-1', 'name' => "Footer Spalte 1", ));
	register_sidebar(array('id' => 'footer-col-2', 'name' => "Footer Spalte 2", ));
	register_sidebar(array('id' => 'footer-col-3', 'name' => "Footer Spalte 3", ));
	register_sidebar(array('id' => 'footer-col-4', 'name' => "Footer Spalte 4", ));
	register_sidebar(array('id' => 'not-found', 'name' => "404 Widgets", ));

	foreach($groups as $slug => $label)
		register_nav_menu($slug."-menu", $label . " Menu");

	foreach($group_alias as $slug => $alias)
		register_nav_menu($slug."-menu", "Alias Menu: " . $slug);

	// relocate some plugin styles
	wp_deregister_style("form-manager-css");
	wp_register_style("form-manager-css", get_template_directory_uri()."/styles/form-manager.css");
	
	wp_deregister_style("wp-publication-archive-frontend");
	wp_register_style("wp-publication-archive-frontend", get_template_directory_uri()."/styles/wp-publication-archive-frontend.css");
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
	global $groups;
	global $group_alias;

	$ancestors = get_ancestors( $page->ID, 'page' );
	$root_id = array_pop($ancestors);
	$root_page = get_page($root_id);

	$name = $root_page->post_name;

	if(isset($groups[$name]))
		return $name;

	if(isset($group_alias[$name]))
		return $name;

	return "uncategorized";

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

function stura_alias_name($obj)
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

function stura_group_name($obj)
{
	global $group_alias;

	$group = stura_alias_name($obj);

	if(isset($group_alias[$group]))
		return $group_alias[$group];

	else
		return $group;

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
	$group = stura_alias_name($obj);
	if(!has_nav_menu($group.'-menu'))
		$group = stura_group_name($obj);
		
	wp_nav_menu( array( 'theme_location' => $group.'-menu' ) );
}

function stura_print_bg_class($obj)
{
	print "bg-cat bg-cat-".stura_group_name($obj);
}


//function etherpad_scripts() {
//    	wp_enqueue_script( 'jquery' );
//	wp_register_script( 'etherpad-jquery', 'https://stura.hft-leipzig.de/wp-includes/js/jquery/etherpad.js');
//    	wp_enqueue_script( 'etherpad-jquery' );
//}    

//add_action('wp_enqueue_scripts', 'etherpad_scripts');


// limit archive widget to show only the last 10 months
function my_limit_archives($args){
    $args['limit'] = 10;
    return $args;
}
add_filter( 'widget_archives_args', 'my_limit_archives' );

