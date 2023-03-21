<?php

/***** ADDING A NEW BACK END PAGE FOR HANDLING THE SUBMISSIONS BY RESERVATION FORM & CONTACT INFORMATIONS *****/
add_action('admin_menu','lapizzeria_options');
function lapizzeria_options(){
	add_menu_page('La Pizzeria', 'Adjustments', 'administrator', 'lapizzeria_options', 'lapizzeria_adjustments', '', 20);
	add_submenu_page('lapizzeria_options', 'Reservations', 'Reservations', 'administrator', 'lapizzeria_reservations', 'lapizzeria_reservations');
}

add_action('init', 'lapizzeria_settings');
function lapizzeria_settings() {
	register_setting('lapizzeria_options_info', 'lapizzeria_locations');
	register_setting('lapizzeria_options_info', 'lapizzeria_phone');
}

function lapizzeria_adjustments(){ ?>
	<div class="wrap">
		<h1>Lapizzeria Adjustments</h1>
		<form action="options.php" method="post">
			<h2>Address & Phone Number</h2>
			<?php 
				settings_fields('lapizzeria_options_info');
				do_settings_sections('lapizzeria_options_info');
			?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Address: </th>
					<td><input type="text" name="lapizzeria_locations" value="<?php echo esc_attr(get_option('lapizzeria_locations')); ?>"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Phone Number: </th>
					<td><input type="text" name="lapizzeria_phone" value="<?php echo esc_attr(get_option('lapizzeria_phone')); ?>"></td>
				</tr>
			</table><!--.form-table-->
			<?php submit_button(); ?>
		</form>
	</div><!--.wrap-->
<?php } 

function lapizzeria_reservations(){ ?>
	<div class="wrap">
		<h1>Reservations</h1>
		<table class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Name</th>
					<th class="manage-column">Date of Reservation</th>
					<th class="manage-column">E-Mail</th>
					<th class="manage-column">Phone Number</th>
					<th class="manage-column">Message</th>
					<th class="manage-column">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					global $wpdb;
					$table = $wpdb->prefix . 'reservations';
					$reservations = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
					foreach($reservations as $reservation): ?>
						<tr>
							<td><?php echo $reservation['id']; ?></td>
							<td><?php echo $reservation['name']; ?></td>
							<td><?php echo $reservation['date']; ?></td>
							<td><?php echo $reservation['email']; ?></td>
							<td><?php echo $reservation['phone']; ?></td>
							<td><?php echo $reservation['message']; ?></td>
							<td><a href="#" class="remove_reservation" data-reservation="<?php echo $reservation['id']; ?>">Remove</a></td>
						</tr>
					<?php endforeach;
				?>
			</tbody>
		</table><!--.wp-list-table-->
	</div><!--.wrap-->
<?php }

?>