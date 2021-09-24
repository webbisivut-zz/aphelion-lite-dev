<?php
/**
 * Theme constants
 *
 * @package Aphelion_Lite
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! defined( '_MAIN_SIDEBAR_ACTIVE' ) ) {
	$sidebar = false;

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$sidebar = true;
	}

	define( '_MAIN_SIDEBAR_ACTIVE', $sidebar );
}

if ( ! defined( '_PAGE_SIDEBAR_ACTIVE' ) ) {
	$sidebar = false;

	if ( is_active_sidebar( 'sidebar-page' ) ) {
		$sidebar = true;
	}

	define( '_PAGE_SIDEBAR_ACTIVE', $sidebar );
}

if ( ! defined( '_SHOW_TOP_HEADER' ) ) {
	define( '_SHOW_TOP_HEADER', true );
}

if ( ! defined( '_SHOW_STICKY_HEADER' ) ) {
	define( '_SHOW_STICKY_HEADER', true );
}

if ( ! defined( '_LOAD_MINICART_AJAX' ) ) {
	define( '_LOAD_MINICART_AJAX', false );
}

if ( ! defined( '_SHOW_SUB_HEADER' ) ) {
	define( '_SHOW_SUB_HEADER', true );
}

if ( ! defined( '_FOOTER_COLUMNS' ) ) {
	define( '_FOOTER_COLUMNS', 4 );
}

if ( ! defined( '_FOOTER_COPYRIGHT_TEXT' ) ) {
	define( '_FOOTER_COPYRIGHT_TEXT', '&copy; Copyright Aphelion Lite' );
}

if ( ! defined( '_MOBILE_FOOTER' ) ) {
	define( '_MOBILE_FOOTER', true );
}