<?php

	/**
	 * @package Region Halland ACF Page Contact Card
	 */
	/*
	Plugin Name: Region Halland ACF Page Contact Card
	Description: Skapar post_typen "kontakter", dvs "contact card" + visa dessa "contact cards" på en sida 
	Version: 1.5.1
	Author: Roland Hydén
	License: GPL-3.0
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
	        'supports' => array( 'title', 'editor', 'author', 'revision')
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
			    'key' => 'group_1000211',
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
			        	'key' => 'field_1000202',
			            'label' => __('Titel', 'regionhalland'),
			            'name' => 'name_1000203',
			            'type' => 'text',
			            'instructions' => __('Ange titel. Max 80 tecken.', 'regionhalland'),
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
			        3 => array(
			        	'key' => 'field_1000212',
			            'label' => __('Telefon', 'regionhalland'),
			            'name' => 'name_1000213',
			            'type' => 'text',
			            'instructions' => __('Ange telefonnummer. Max 80 tecken.', 'regionhalland'),
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
			        4 => array(
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
			        4 => array(
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

					// Lägg till sidans url 	
					$postUrl = get_permalink($post->ID);
					
					// Post title från posten
					$postTitle = $post->post_title;
					
					// Post content från posten
					$postContent = $post->post_content;
					
					// Name
					$contactName = get_field('name_1000168', $postID);
					
					// Titel
					$contactTitle = get_field('name_1000203', $postID);
					
					// Epost
					$contactEpost = get_field('name_1000170', $postID);

					// Telefon
					$contactTelefon = get_field('name_1000213', $postID);

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
			           'post_id' => $postID,
			           'post_title' => $postTitle,
			           'post_content' => $postContent,
			           'post_url' => $postUrl,
			           'contact_name' => $contactName,
			           'contact_title' => $contactTitle,
			           'contact_epost' => $contactEpost,
			           'contact_telefon' => $contactTelefon,
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

	// Returnera Namn
	function get_region_halland_acf_page_contact_card_name($id) {
		return get_field('name_1000168', $id);
	}

	// Returnera Titel
	function get_region_halland_acf_page_contact_card_title($id) {
		return get_field('name_1000203', $id);
	}


	// Returnera Epost
	function get_region_halland_acf_page_contact_card_epost($id) {
		return get_field('name_1000170', $id);
	}

	// Returnera Epost
	function get_region_halland_acf_page_contact_card_telefon($id) {
		return get_field('name_1000213', $id);
	}


	// Returnera Bild
	function get_region_halland_acf_page_contact_card_image($id) {
		$image_field_object = get_field('field_1000173', $id);
		$myImage = array();
		$myImage['image-url'] = $image_field_object['url'];
		$myImage['image-width'] = $image_field_object['width'];
		$myImage['image-height'] = $image_field_object['height'];
		if ($myImage['image-url']) {
			$myImage['has-image'] = 1;
		} else {
			$myImage['has-image'] = 0;
		}
		return $myImage;
	}

	// Returnera länk
	function get_region_halland_acf_page_contact_card_link($id) {
		$fieldLink = get_field_object('field_1000171', $id);
		$isFieldLinkArray = is_array($fieldLink['value']);
		$myLink = array();
		if ($isFieldLinkArray) {
			$myLink['link-title'] = $fieldLink['value']['title'];
			$myLink['link-url'] = $fieldLink['value']['url'];
			$myLink['link-target'] = $fieldLink['value']['target'];
			$myLink['has-link'] = 1;
		} else {
			$myLink['link-title'] = "";
			$myLink['link-title'] = "";
			$myLink['link-target'] = "";
			$myLink['has-link'] = 0;
		}
		return $myLink;
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