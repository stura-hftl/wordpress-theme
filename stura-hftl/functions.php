<?php

add_action('init', 'setup');

function setup() {

	register_sidebar(array('id'=> 'footer-col-1', 'name' => "Footer Spalte 1", ));
	register_sidebar(array('id'=> 'footer-col-2', 'name' => "Footer Spalte 2", ));
	register_sidebar(array('id'=> 'footer-col-3', 'name' => "Footer Spalte 3", ));
	register_sidebar(array('id'=> 'footer-col-4', 'name' => "Footer Spalte 4", ));

	register_nav_menu('stura-menu', __('StuRa Menu'));
	register_nav_menu('club-menu', __('Club Menu'));
	register_nav_menu('service-menu', __('Service Menu'));
	register_nav_menu('sport-menu', __('Sport Menu'));
	register_nav_menu('technik-menu', __('Technik Referat Menu'));
	register_nav_menu('hopo-menu', __('HoPo Referat Menu'));
	register_nav_menu('betreuung-menu', __('Betreuung Referat Menu'));
	register_nav_menu('finanzen-menu', __('Finanzen Referat Menu'));
}

function stura_get_tile_name($post) {
	return "stura";
}
?>