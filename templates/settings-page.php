<?php

/**
 * Settings page template.
 *
 * @package Hide_Admin_Bar
 */

defined('ABSPATH') || die("Can't access directly");

$roles = get_all_roles();
?>
<div class="wrap">
	<h1>Hide and Show Admin Bar</h1>
	<form method="post" action="options.php">
		<?php
		settings_fields('hsab-settings-group');
		do_settings_sections('hsab-settings-group');
		?>
		<table class="form-table">
			<?php foreach ($roles as $role_key => $role) : ?>
			<tr valign="top">
				<th scope="row">Hide : <?php echo esc_html($role['name']); ?></th>
				<td>
					<input type="checkbox" name="hsab_hide_admin_bar_role<?php echo esc_html($role_key); ?>" value="1" <?php checked(1, get_option('hsab_hide_admin_bar_role'.$role_key), true); ?> />
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php submit_button(); ?>
	</form>
</div>
<?php
