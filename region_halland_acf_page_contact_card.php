<?php

	/**
	 * @package Region Halland ACF Page Contact Card
	 */
	/*
	Plugin Name: Region Halland ACF Page Contact Card
	Description: Skapar post_typen "kontakter", dvs "contact card" + visa dessa "contact cards" på en sida 
	Version: 1.0.0
	Author: Roland Hydén
	License: MIT
	Text Domain: regionhalland
	*/

	// vid 'init', anropa funktionen region_halland_register_utbildning()
	add_action('init', 'region_halland_register_page_contact_card' );

	// Denna funktion registrerar en ny post_type och gör den synlig i wp-admin
	function region_halland_register_page_contact_card() {
		
		// Vilka labels denna post_type ska ha
		$labels = array(
		        'name'                  => _x('Kontakter', 'Post type general name', 'textdomain' ),
		        'singular_name'         => _x('Kontakter', 'Post type singular name', 'textdomain' ),
		        'menu_name'             => _x('Kontakter', 'Admin Menu text', 'textdomain' ),
		        'add_new'               => __('Lägg till ny', 'textdomain' ),
        		'add_new_item'          => __('Lägg till ny', 'textdomain' ),
        		'edit_item'          	=> __('Editera', 'textdomain' )
		    );
		
		// Inställningar för denna post_type 
	    $args = array(
	        'labels' => $labels,
	        'rewrite' => array('slug' => 'kontakter'),
			'show_ui' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'public' => true,
			'query_var' => false,
			'menu_icon' => 'dashicons-megaphone',
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revision')
	    );

	    // Registrera post_type
	    register_post_type('kontakter', $args);
	    
	}

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_page_contact_card_field_groups');

	// Function för att lägga till "field groups"
	function my_acf_page_contact_card_field_groups() {

		if (function_exists('acf_add_local_field_group')):

			acf_add_local_field_group(array(
			    'key' => 'group_1000115',
			    'title' => 'Kontaktperson',
			    'fields' => array(
			        0 => array(
			        	'key' => 'field_1000167',
			            'label' => __('Namn', 'regionhalland'),
			            'name' => 'name_1000168',
			            'type' => 'text',
			            'instructions' => __('Ange namn. Max 80 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 80,
			            'new_lines' => '',
			        ),
			        1 => array(
			        	'key' => 'field_1000169',
			            'label' => __('Epost', 'regionhalland'),
			            'name' => 'name_1000170',
			            'type' => 'text',
			            'instructions' => __('Ange epost. Max 80 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 80,
			            'new_lines' => '',
			        ),
			        2 => array(
			        	'key' => 'field_1000171',
					    'label' => 'Länk till mer info',
					    'name' => 'name_1000172',
					    'type' => 'link',
					    'instructions' => '',
					    'required' => 0,
					    'conditional_logic' => 0,
					    'wrapper' => [
					        'width' => '',
					        'class' => '',
					        'id' => '',
					    ],
					    'return_format' => 'array',
			        ),
			        3 => array(
			        	'key' => 'field_1000173',
					    'label' => 'Bild på personen',
					    'name' => 'name_1000174',
					    'type' => 'image',
					    'instructions' => '',
					    'required' => 0,
					    'conditional_logic' => 0,
					    'wrapper' => [
					        'width' => '',
					        'class' => '',
					        'id' => '',
					    ],
					    'return_format' => 'array',
					    'preview_size' => 'thumbnail',
					    'library' => 'all',
					    'min_width' => '',
					    'min_height' => '',
					    'min_size' => '',
					    'max_width' => '',
					    'max_height' => '',
					    'max_size' => '',
					    'mime_types' => '',
			        ),
			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'kontakter',
			            ),
			        )
			    ),
			    'menu_order' => 0,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));

		endif;

	}

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_add_main_post_page_contact_card_repeater_field_groups');

	// Function för att lägga till "field groups"
	function my_acf_add_main_post_page_contact_card_repeater_field_groups() {

		// Om funktionen existerar
		if (function_exists('acf_add_local_field_group')):

			// Skapa formlärfält
			acf_add_local_field_group(array(
			    
			    'key' => 'group_1000175',
			    'title' => 'Visa kontakter på sidan',
			    'fields' => array(
			        0 => array(
			            'key' => 'field_1000176',
			            'label' => __('Välj vilka kontakter som ska visas', 'halland'),
			            'name' => 'name_1000177',
			            'type' => 'repeater',
			            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en ny kontakt.', 'halland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'collapsed' => '',
			            'min' => 0,
			            'max' => 25,
			            'layout' => 'row',
			            'button_label' => '',
			            'sub_fields' => array(
			              0 => array(
		            		  'key' => 'field_1000178',
		            		  'label' => __('Kontaktperson', 'regionhalland'),
		            		  'name' => 'name_1000179',
		            		  'type' => 'page_link',
		            		  'post_type' => 'kontakter',
		            		  'allow_archives' => 0,
		            		  'instructions' => __('Lägg till en valfri kontaktperson'),
		            		  'required' => 0,
		            		  'conditional_logic' => 0,
		            		  'wrapper' => array(
		                		'width' => '',
		                		'class' => '',
		                		'id' => '',
		            		  ),
		            		  'return_format' => 'array',
		        		  )
				        
			            ),
		        	),
			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'post',
			            ),
			        ),
			        1 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'page',
			            ),
			        ),
			    ),
			    'menu_order' => 0,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));

		endif;

	}
	
	// Returnera blurbar
	function get_region_halland_acf_main_post_page_contact_cards($myID = 0) {
	
		// Hämta alla länkar
		if ($myID == 0) {
			$myFields = get_field('name_1000177');
		} else {
			$myFields = get_field('name_1000177', $myID);
		}

		// Temporär array för alla poster
		$myPosts = array();
		
		if ($myFields) {

			// Loopa igenom alla länkar
			foreach ($myFields as $field) {
			    
			    // Länk url
			    $strLinkUrl		= $field['name_1000179'];

			    // Längden på url:en
			    $lenLinkUrl     = strlen($strLinkUrl);
				
			    // Kolla så att det faktiskt finns en länk
				if ($lenLinkUrl > 0 ) {

					// Splitta länken på "/"
					$arrUrl = explode("/",$strLinkUrl);
					$countUrl = count($arrUrl);
					
					// välj post_name
					$strPostName = $arrUrl[$countUrl-2];			    
					
					// Funktion som returnerar postID basterat på post_name
					$postID = get_region_halland_acf_page_contact_card_post_id($strPostName);
					
					// Hämta hela posten
					$post = get_post($postID);

					// Post title från posten
					$postTitle = $post->post_title;
					
					// Post content från posten
					$postContent = $post->post_content;
					
					// Name
					$contactName = get_field('name_1000168', $postID);
					
					// Epost
					$contactEpost = get_field('name_1000170', $postID);

					// Hämta ACF-objektet för link
					$fieldLink 		= get_field_object('field_1000171', $postID);
				
					// Kontrollera om det finns en sparad länk
					$isFieldLinkArray = is_array($fieldLink['value']);
									
					// Spara ner ACF-data i page-arrayen
					if ($isFieldLinkArray) {
						$contactLinkTitle = $fieldLink['value']['title'];
						$contactLinkUrl = $fieldLink['value']['url'];
						$contactLinkTarget = $fieldLink['value']['target'];
					} else {
						$contactLinkTitle = "";
						$contactLinkUrl = "";
						$contactLinkTarget = "";
					}

					// Kontakt-bild
					$image_field_object = get_field('field_1000173', $postID);
					$contactImageUrl = $image_field_object['url'];
					$contactImageWidth = $image_field_object['width'];
					$contactImageHeight = $image_field_object['height'];
					if ($contactImageUrl) {
						$contactHasImage = 1;
					} else {
						$contactHasImage = 0;
					}

					// Pusha data till temporär array
			        array_push($myPosts, array(
			           'contact_name' => $contactName,
			           'contact_epost' => $contactEpost,
			           'contact_link_title' => $contactLinkTitle,
			           'contact_link_url' => $contactLinkUrl,
			           'contact_link_target' => $contactLinkTarget,
			           'contact_image_url' => $contactImageUrl,
			           'contact_image_width' => $contactImageWidth,
			           'contact_image_height' => $contactImageHeight,
			           'contact_has_image' => $contactHasImage,
			        ));

				}
	        }

		}

		// Returnera alla poster
		return $myPosts;
	
	}

	function get_region_halland_acf_page_contact_card_post_id($post_name) {
		
		// Databas connection
		global $wpdb; 

		// Select
		$sql = "";
		$sql .= "SELECT ID FROM wp_posts ";
		
		// Where
		$sql .= "WHERE ";
		$sql .= "post_type = 'kontakter' ";
		$sql .= "AND ";
		$sql .= "post_status = 'publish' ";
		$sql .= "AND ";
		$sql .= "post_name = '$post_name' ";

		// Get result
		$arrID = $wpdb->get_row($sql, ARRAY_A);
		
		// Get ID from result
		$myID = intval($arrID['ID']);
		
		// Return id
		return $myID;
			
	}

	
	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_page_contact_card_activate() {
		
		// Vi aktivering, registrera post_type "blurbs"
		region_halland_register_page_contact_card();

		// Tala om för wordpress att denna post_type finns
		// Detta gör att permalink fungerar
	    flush_rewrite_rules();
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_acf_page_contact_card_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_acf_page_contact_card_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_acf_page_contact_card_deactivate');

?>