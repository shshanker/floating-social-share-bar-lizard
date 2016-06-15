<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Woo Floating Minicart Backend
 *
 * Allows admin to set WooCommerce Floating Minicart of specific product.
 *
 * @class   awfss_backend 
 */


class awfss_backend {

	/**
	 * Init and hook in the integration.
	 *
	 * @return void
	 */


	public function __construct() {
		$this->id                 = 'awfss_backend';
		$this->method_title       = __( 'Floating Social Share Bar Lizard Backend', 'floating-social-share-bar-lizard' );
		$this->method_description = __( 'Floating Social Share Bar Lizard Backend', 'floating-social-share-bar-lizard' );

	
		// action
		
		add_action("admin_menu", array( $this, "awfss_menu_item"));
		add_action("admin_init", array( $this, "awfss_settings"));
		
	}

	public function awfss_menu_item()
        {
            add_submenu_page("options-general.php", "Floating Social Share", "Floating Social Share", "manage_options", "awfss-social-share", array($this, "awfss_page"));
        }


        public function awfss_page()
        {
            ?>
            <div class="wrap">
                <h1><?php _e('Floating Social Share Bar (Lizard)')?></h1>

                <form method="post" action="options.php">
                    <?php
                    settings_fields("awfss_config_section");
                    

                    do_settings_sections("awfss-social-share");

                    submit_button();
                    ?>
                </form>
            </div>
            <?php
        }


        public function awfss_settings() {
            
          
            add_settings_section("awfss_config_section", "Select Floating Share Options", null, "awfss-social-share");
            
            add_settings_field("awfss-social-share-position", "Position", array($this, "awfss_position"), "awfss-social-share", "awfss_config_section");
            register_setting("awfss_config_section", "awfss-social-share-position");

            add_settings_field("awfss-social-share-envelope", "Mailto link", array($this, "awfss_envelope_checkbox"), "awfss-social-share", "awfss_config_section");
            add_settings_field("awfss-social-share-facebook", "Facebook", array($this, "awfss_facebook_checkbox"), "awfss-social-share", "awfss_config_section");
            add_settings_field("awfss-social-share-twitter", "Twitter", array($this, "awfss_twitter_checkbox"), "awfss-social-share", "awfss_config_section");
            add_settings_field("awfss-social-share-linkedin", "LinkedIn", array($this, "awfss_linkedin_checkbox"), "awfss-social-share", "awfss_config_section");
            add_settings_field("awfss-social-share-googleplus", "Googleplus", array($this, "awfss_googleplus_checkbox"), "awfss-social-share", "awfss_config_section");
            add_settings_field("awfss-social-share-tumblr", "Tumblr", array($this, "awfss_tumblr_checkbox"), "awfss-social-share", "awfss_config_section");
            add_settings_field("awfss-social-share-linkurl", "Copy linkurl", array($this, "awfss_linkurl_checkbox"), "awfss-social-share", "awfss_config_section");
           
            register_setting("awfss_config_section", "awfss-social-share-envelope");
            register_setting("awfss_config_section", "awfss-social-share-facebook");
            register_setting("awfss_config_section", "awfss-social-share-twitter");
            register_setting("awfss_config_section", "awfss-social-share-linkedin");
            register_setting("awfss_config_section", "awfss-social-share-googleplus");
            register_setting("awfss_config_section", "awfss-social-share-tumblr");
            register_setting("awfss_config_section", "awfss-social-share-linkurl");

            

        }

        public function awfss_position(){
            
            ?>
            <ul>
                <li>
                    <input type="radio" id="awfss-social-share-left" name="awfss-social-share-position" value="left" <?php checked('left', get_option('awfss-social-share-position'), true); ?> />
                    <label for="awfss-social-share-left"><?php _e('Left', 'floating-social-share-bar-lizard'); ?></label>
                </li><li>
                    <input type="radio" id="awfss-social-share-right" name="awfss-social-share-position" value="right" <?php checked('right', get_option('awfss-social-share-position'), true); ?> />
                    <label for="awfss-social-share-right"><?php _e('Right', 'floating-social-share-bar-lizard'); ?></label>
                </li>
            </ul>
           <?php
        }  




        public function awfss_envelope_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-envelope"  value="1" <?php checked(1, get_option('awfss-social-share-envelope'), true); ?> /> Check for Yes
            <?php
        }


        public function awfss_facebook_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-facebook" value="1" <?php checked(1, get_option('awfss-social-share-facebook'), true); ?> /> Check for Yes
            <?php
        }

        public function awfss_twitter_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-twitter" value="1" <?php checked(1, get_option('awfss-social-share-twitter'), true); ?> /> Check for Yes
            <?php
        }

        public function awfss_linkedin_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-linkedin" value="1" <?php checked(1, get_option('awfss-social-share-linkedin'), true); ?> /> Check for Yes
            <?php
        }

        public function awfss_googleplus_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-googleplus" value="1" <?php checked(1, get_option('awfss-social-share-googleplus'), true); ?> /> Check for Yes
            <?php
        }

        public function awfss_tumblr_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-tumblr" value="1" <?php checked(1, get_option('awfss-social-share-tumblr'), true); ?> /> Check for Yes
            <?php
        }
        public function awfss_linkurl_checkbox()
        {
            ?>
            <input type="checkbox" name="awfss-social-share-linkurl" value="1" <?php checked(1, get_option('awfss-social-share-linkurl'), true); ?> /> Check for Yes
            <?php
        }
}

$awfm_backend = new awfss_backend();