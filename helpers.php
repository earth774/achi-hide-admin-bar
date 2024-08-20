<?php
/**
 * Utility functions for Hide Admin Bar.
 *
 * @package Hide_Admin_Bar
 */

 function get_all_roles()
 {
     global $wp_roles;

     if (! isset($wp_roles)) {
         $wp_roles = new WP_Roles();
     }

     return $wp_roles->roles;
 }

 function get_current_user_roles() {
    // Get the current user object
    $current_user = wp_get_current_user();
    
    // Get the roles array
    $roles = $current_user->roles;
    
    return $roles;
}

