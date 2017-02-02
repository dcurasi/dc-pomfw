<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1><?php _e( 'Prices Only Members for Woocommerce', 'dc-pomfw' ); ?></h1>
<form method="post" action="options.php">
    <!--necessaria per il corretto aggiornamento dei dati-->
    <?php settings_fields('dc_pomfw_options_group'); ?>
    <?php settings_errors(); ?>
    <h2><?php _e( 'Configuration', 'dc-pomfw' ); ?></h2>
    <table class="form-table">
       <tbody>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_activate"><?php _e( 'Enable / Disable', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                  <label for="dc_pomfw_activate">
                      <input type="checkbox" id="dc_pomfw_activate" value="1" <?php checked(get_option('dc_pomfw_activate'), 1); ?> name="dc_pomfw_activate"> <?php _e( 'Activate Options', 'dc-pomfw' ); ?>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_message"><?php _e( 'Message', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                  <label for="dc_pomfw_message">
                  	  <textarea id="dc_pomfw_message" name="dc_pomfw_message" class="large-text" cols="50" rows="5"><?php echo get_option('dc_pomfw_message'); ?>
                  	  </textarea>
                  	  <p class="description"><?php _e( 'The notification message that appears when the user is not logged in.', 'dc-pomfw' ); ?></p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_position"><?php _e( 'Message Position', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                    <select id="dc_pomfw_position" name="dc_pomfw_position">
                        <option value="before_main_content" <?php selected(get_option('dc_pomfw_position'), 'before_main_content'); ?> ><?php _e( 'Before main content', 'dc-pomfw' ); ?></option>
                        <option value="replacing_price" <?php selected(get_option('dc_pomfw_position'), 'replacing_price'); ?> ><?php _e( 'Replacing Price', 'dc-pomfw' ); ?></option>
                    </select>
                    <p class="description"><?php _e( 'The notification message position.', 'dc-cookie-notice-bar' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_login_text"><?php _e( 'Login Text', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                    <input type="text" id="dc_pomfw_login_text" value="<?php echo get_option('dc_pomfw_login_text'); ?>" name="dc_pomfw_login_text" class="regular-text">
                    <p class="description"><?php _e( 'The text of the link to go to the login. Use the shortcode [login] to add the login link in the text message.', 'dc-pomfw' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_login_link"><?php _e( 'Login Link', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                    <input type="text" id="dc_pomfw_login_link" value="<?php echo get_option('dc_pomfw_login_link'); ?>" name="dc_pomfw_login_link" class="regular-text">
                    <p class="description"><?php _e( 'The link to go to the login.', 'dc-pomfw' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_register_text"><?php _e( 'Register Text', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                    <input type="text" id="dc_pomfw_register_text" value="<?php echo get_option('dc_pomfw_register_text'); ?>" name="dc_pomfw_register_text" class="regular-text">
                    <p class="description"><?php _e( 'The text of the link to go to the register. Use the shortcode [register] to add the register link in the text message.', 'dc-pomfw' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_pomfw_register_link"><?php _e( 'Register Link', 'dc-pomfw' ); ?></label>
                </th>
                <td>
                    <input type="text" id="dc_pomfw_register_link" value="<?php echo get_option('dc_pomfw_register_link'); ?>" name="dc_pomfw_register_link" class="regular-text">
                    <p class="description"><?php _e( 'The link to go to the register.', 'dc-pomfw' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
               <th scope="row"></th>
               <td>
                   <p>
                       <?php submit_button(); ?>
                   </p>
               </td>
            </tr>
        </tbody>
   </table>
</form>