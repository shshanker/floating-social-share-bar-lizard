<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Woo Floating Minicart
 *
 * Allows user to get WooCommerce Floating Minicart.
 *
 * @class   awfss_frontend 
 */


class awfss_frontend {

	/**
	 * Init and hook in the integration.
	 *
	 * @return void
	 */


	public function __construct() {
		$this->id                 = 'Floating_social_share_lizard_menu';
		$this->method_title       = __( 'Floating Social Share Bar Lizard Frontend', 'floating-social-share-bar-lizard' );
		$this->method_description = __( 'Floating Social Share Bar Lizard Frontend', 'floating-social-share-bar-lizard' );


		// Scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'Wp_floating_social_share_scripts' ));
		
		// Actions
		add_action( 'wp_head', array( $this, 'awfss_display_function' ));		
		add_action( 'wp_footer', array( $this, 'awfss_footer_style' ));		

		// Filters 
		//add_filter('add_to_cart_fragments', array( $this, 'Wp_floating_social_share_add_to_cart_fragment'));

	}

	/**
	 * Loading scripts.
	 *
	 * @return void
	 */

	public function Wp_floating_social_share_scripts(){

		// loading WordPress Default jquery.js file
		wp_enqueue_script('jquery');

		// loading plugin custom js file
		wp_register_script( 'floating-social-share-bar-lizard-script', plugins_url( 'floating-social-share-bar-lizard/js/awfss-scripts.js' ), array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'floating-social-share-bar-lizard-script' );

		// loading plugin custom css file
		wp_register_style( 'floating-social-share-bar-lizard-style', plugins_url( 'floating-social-share-bar-lizard/css/awfss-style.css' ) );
		wp_enqueue_style( 'floating-social-share-bar-lizard-style' );

		
	} // end of Wp_floating_social_share_scripts

	
	/**
	 * Loading minicart option on wp_head section.
	 *
	 * @return void
	 */

	public function awfss_display_function(){

		

			echo "<div class='awfss-warp-content'>";
				$this->awfss_display_function_callto();
			echo "</div>";


	}



	/**
	 * Initiating WooCommerce minicart function .
	 *
	 * @return void
	 */


	public function awfss_display_function_callto(){	

		?>


			<div id="floating-social-share-bar-lizard" class="floating-social-share-bar-lizard" style="">
			
			<div id="floating-social-share-bar-lizard-wrapper">			
			
			<?php echo $this->awfss_share_icons(); ?>

			</div>	
			</div> <!-- END .floating-social-share-bar-lizard-active -->
		<?php
	}


	public function awfss_share_icons(){

        	
            $html = "<div class='awfss-share-warp'>";
            $html = $html . "<div class='awfss-social-link'>";

            $html = $html . "<ul class='awfss-social-link-main-icon icon-share2'>";
            			
    			if (get_option("awfss-social-share-envelope") == 1) { $html = $html . "<li class='awfss-li envelope'></li>"; }		
				if (get_option("awfss-social-share-facebook") == 1) { $html = $html . "<li class='awfss-li facebook'></li>"; }							        
				if (get_option("awfss-social-share-twitter") == 1) { $html = $html . "<li class='awfss-li twitter'></li>"; }							        
				if (get_option("awfss-social-share-linkedin") == 1) { $html = $html . "<li class='awfss-li linkedin'></li>"; }							        
				if (get_option("awfss-social-share-googleplus") == 1) { $html = $html . "<li class='awfss-li googleplus'></li>"; }							        
				if (get_option("awfss-social-share-tumblr") == 1) { $html = $html . "<li class='awfss-li tumblr'></li>"; }							        
				if (get_option("awfss-social-share-linkurl") == 1) { $html = $html . "<li class='awfss-li linkurl'></li>"; }							        
			
			$html = $html ."</ul>"; 
            
            $html = $html . "<ul class='awfss-social-link-lists'>";
            global $wp;
			$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
			
			if(is_home()){
				$title = get_bloginfo('name'); 
			} else{
				$title = wp_title( '', false );
			}

            
            $url = esc_url($current_url);
            
            if (get_option("awfss-social-share-envelope") == 1) {
                $html = $html . "<li class='awfss-li envelope' title='".__('Mail','floating-social-share-bar-lizard')."'><a  class='awfss-icon icon-envelop' target='_blank' href='mailto:?subject=I wanted you to see this site&amp;body=check out this site ". $url ."&amp;title=".$title."'></a></li>";
            }

            if (get_option("awfss-social-share-facebook") == 1) {
                $html = $html . "<li class='awfss-li facebook' title='".__('Share on Facebook','floating-social-share-bar-lizard')."'><a  class='awfss-icon icon-facebook' target='_blank' href='http://www.facebook.com/sharer.php?u=" . $url . "&amp;t=" . $title . "'></a></li>";
            }

            if (get_option("awfss-social-share-twitter") == 1) {
                $html = $html . "<li class='awfss-li twitter' title='".__('Share on Twitter','floating-social-share-bar-lizard')."'><a class='awfss-icon icon-twitter' target='_blank' href='https://twitter.com/share?text=" . $title . "&amp;url=" . $url . "'></a></li>";
            }

            if (get_option("awfss-social-share-linkedin") == 1) {
                $html = $html . "<li class='awfss-li linkedin' title='".__('Share on Linkedin','floating-social-share-bar-lizard')."'><a  class='awfss-icon icon-linkedin2' target='_blank' href='http://www.linkedin.com/shareArticle?mini=true&amp;title=" . $title . "&amp;url=" . $url . "'></a></li>";
            }

            if (get_option("awfss-social-share-googleplus") == 1) {
                $html = $html . "<li class='awfss-li googleplus' title='".__('Share on Google Plus','floating-social-share-bar-lizard')."'><a class='awfss-icon icon-google-plus' target='_blank' href='https://plus.google.com/share?url=" . $url . "'></a></li>";
            }

            if (get_option("awfss-social-share-tumblr") == 1) {
                $html = $html . "<li class='awfss-li tumblr' title='".__('Share on Tumblr','floating-social-share-bar-lizard')."'><a  class='awfss-icon icon-tumblr' target='_blank' href='https://www.tumblr.com/share/link?url=" . $url . "'></a></li>";
            }

            if (get_option("awfss-social-share-linkurl") == 1) {
                $html = $html . "<li class='awfss-li linkurl' title='".__('Copy Link','floating-social-share-bar-lizard')."'><a  class='awfss-icon icon-link' href='javascript:;' id='awfss-icon-linkurl'></a></li>";
                $html = $html . "<textarea style='opacity:0;'  id='awfss-copy-linkurl'>".$url."</textarea>";
            }


            $html = $html . "</ul>";
            $html = $html . "</div>";           
            $html = $html . "</div>";

            return $html;
        }


	/**
	 * Loading footer css.
	 *
	 * @return void
	 */
	public function awfss_footer_style(){			

			$bar_count = 0;

			    if (get_option("awfss-social-share-envelope") == 1) {  $bar_count+=1; }		
				if (get_option("awfss-social-share-facebook") == 1) {  $bar_count+=1; }							        
				if (get_option("awfss-social-share-twitter") == 1) {  $bar_count+=1; }							        
				if (get_option("awfss-social-share-linkedin") == 1) { $bar_count+=1; }							        
				if (get_option("awfss-social-share-googleplus") == 1) {  $bar_count+=1; }							        
				if (get_option("awfss-social-share-tumblr") == 1) {  $bar_count+=1; }							        
				if (get_option("awfss-social-share-linkurl") == 1) {  $bar_count+=1; }							        
			
			echo '<style type="text/css">';		   

				if( $bar_count != 0 ){
					$bar_width = 100/$bar_count; 
					echo 'ul.awfss-social-link-main-icon li.awfss-li {
							width: '.$bar_width.'%;
					}';
					if($bar_count == 1 ){
						echo '.awfss-social-link{
								top: 40%;
						}';
						} else {
							echo '.awfss-social-link{
								top: '.$bar_width.'%;
						}';
					}
				}

				

				if (get_option("awfss-social-share-position") == 'right'){
					echo '.awfss-social-link{
						right: 0px;
					}';
				} else {
					echo '.awfss-social-link{
						left: 0px;
					}';
				}
			
			echo '</style>';
		    


		
	}
	


}

$minicart = new awfss_frontend();