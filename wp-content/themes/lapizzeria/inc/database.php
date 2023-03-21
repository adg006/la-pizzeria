<?php

/***** CREATING DATABASE FOR RESERVATION FORM*****/
add_action('after_setup_theme','lapizzeria_database');
function lapizzeria_database(){
	global $wpdb, $lapizzeria_db_version;
	$lapizzeria_db_version = '1.0';
	$table = $wpdb->prefix . 'reservations';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			name varchar(50) NOT NULL,
			date datetime NOT NULL,
			email varchar(50) DEFAULT '' NOT NULL,
			phone varchar(10) NOT NULL,
			message longtext NOT NULL,
			PRIMARY KEY (id)
	) $charset_collate; ";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

?>