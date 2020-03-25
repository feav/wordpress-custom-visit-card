<?php
/**
* @package WPCVC
*/
/*
	Plugin Name: Management des Visit Card
	  Plugin URI: https://www.ars-agency.com
	  Description: Carte de Visite Custom Post Type
	  Version: 1.0
	  Author: ARS GROUP
	  Author URI: http://www.ars-agency.com
	 */

	define('WPCVC_PLUGIN_FILE',__FILE__);
	define('WPCVC_DIR', plugin_dir_path(__FILE__));
	 
	define('WPCVC_URL', plugin_dir_url(__FILE__));

	define('WPCVC_API_URL_SITE', get_site_url() . "/");



	class WpCustomVisitCard {
		private $post_type;

	    function __construct() {
			$this->post_type = 'wp_custom_visit_card';
			add_action( 'init', array(&$this,'register_post_types'), 0 );
			add_shortcode( 'wpm-my-visit-card', array(&$this,'my_visit_card') );
			add_shortcode( 'wpm-add-visit-card', array(&$this,'add_visit_card') );
			add_shortcode( 'wpm-all-visit-card', array(&$this,'all_visit_card') );

			add_action('add_meta_boxes', array(&$this,'wporg_add_custom_box'));
			add_action('save_post', array(&$this,'wporg_save_postdata'));

			add_filter( 'single_template',  array(&$this,'custom_visit_card_template') );

			// add_action('manage_'.$this->post_type.'_posts_custom_column', array(&$this, 'custom_visit_card_columns'), 15, 3);
			// add_filter('manage_'.$this->post_type.'_posts_columns', array(&$this, 'visit_card_columns'), 15, 1);
			//add_filter( 'cron_schedules', array(&$this,'add_cron_interval') );
			add_action( 'wp_ajax_visit_card_ajax_request', array(&$this,'ajax_callback') );
  			add_action( 'wp_ajax_nopriv_visit_card_ajax_request', array(&$this,'ajax_callback') );

	    }  /* Filter the single_template with our custom function*/

		function ajax_callback() {
		    $name	= isset($_POST['name'])?trim($_POST['name']):"";
		    $args = array(
			    'author' => get_current_user_id(),
			    'post_type' => 'attachment',
			    'post_status'=>array('inherit','publish','future')
			);
			$query = new WP_Query( $args );
			$imgs =   array( );
			if ( $query->have_posts() ) : 
				while ( $query->have_posts() ) : $query->the_post(); 
					$imgs[] = array(
						'id' => get_the_ID(),
						'image'=> wp_get_attachment_image_src(get_the_ID(), 'full')[0],
						'image_icon'=> wp_get_attachment_image_src(get_the_ID())[0],
						'url'=>get_the_permalink()
					);
 				endwhile; 
 			endif; 
 			echo json_encode($imgs);
		    exit;
		  }
		function custom_visit_card_template($single) {
		    global $post;
		    // echo WPCVC_DIR.'template/html/front-custon-visit-card.php';
		    if ( $post->post_type == $this->post_type ) {
		        if ( file_exists( WPCVC_DIR.'template/html/front-custon-visit-card.php' ) ) {
					$single = WPCVC_DIR.'template/html/front-custon-visit-card.php';
		        }
		    }
		    return $single;
		}
		function add_cron_interval( $schedules ) {
			 $schedules['daily'] = array(
			 'interval' => 86400,	
			 'display' => esc_html__( 'Every Days' ),
			 );
			return $schedules;
		 }
	    function visit_card_columns($defaults ){

				$defaults['visit_card_visible'] = esc_html__('Etat', 'wp_custom_visit_card_manage');
				$defaults['visit_card_date'] = esc_html__('Date', 'wp_custom_visit_card_manage');
				return $defaults;
	    }

	    function custom_visit_card_columns($column_name, $postid){
			if ( $column_name == 'visit_card_visible' ) {
			 	$name = get_post_meta($postid,  'postVisibility',  false )[0];
				if($name ==1){
					echo "<span style='background: #63f597;color: white;padding: 6px;'>Deja Approuvee</span>";
				}else if($name == -1){
					echo "<span style='background: #f56363;color: white;padding: 6px;'> Masque par l'utilisateur</span>";
				}	else {

					echo "<span style='background: #f56363;color: white;padding: 6px;'> En Attente d'Approbation</span>";
				}		

			}else 
			if ( $column_name == 'visit_card_date' ) {
			 	$name = get_post_meta($postid,  'postDate',  false )[0];
				echo $name;
			}

	    }
	     function wpse27856_set_content_type(){
            return "text/html";
        }
	    function notification_email($post_id,$visible){
			
	    }
	    function wpcs_set_email_content_type() {
		    return 'text/html';
		}
	    function wporg_save_postdata($post_id)
		{
		    if (array_key_exists('postThematique', $_POST)) {
		    	$metas = array("postThematique","postEmail","postPhone","postCountry","postTown","postDate","postHour","postVisibility");
		    	
		    	foreach ($_POST as $key => $value) {
		    		if (in_array($key, $metas)) {
					   update_post_meta($post_id,$key,$value);
					}
		    	}

		        
		    }
		}
		function wporg_add_custom_box()
		{
		    $screens = [$this->post_type, 'wporg_cpt'];
		    foreach ($screens as $screen) {
		        add_meta_box(
		            'visit_card_',           // Unique ID
		            'Details de la visit_card',  // Box title
		            array($this,'wporg_custom_box_html'),  // Content callback, must be of type callable
		            $screen                   // Post type
		        );
		    }
		}
		function wporg_custom_box_html($post)
		{
			include(WPCVC_DIR.'template/html/admin-visit_card-detai.php');
		}
		function meta_box_visit_card( $meta_boxes ) {
			$prefix = 'visit_card_';

			$meta_boxes[] = array(
				'id' => 'meta',
				'title' => esc_html__( 'Details', 'wp_custom_visit_card_manage' ),
				'post_types' => array($this->post_type),
				'context' => 'side',
				'priority' => 'high',
				'autosave' => 'false',
				'fields' => array(
					array(
						'id' => $prefix . 'theme',
						'type' => 'text',
						'name' => esc_html__( 'Thematique', 'wp_custom_visit_card_manage' ),
					),
					array(
						'id' => $prefix . 'email',
						'name' => esc_html__( 'Email Organisateur', 'wp_custom_visit_card_manage' ),
						'type' => 'email',
					),
					array(
						'id' => $prefix . 'phone',
						'type' => 'text',
						'name' => esc_html__( 'Telephone Organisateur', 'wp_custom_visit_card_manage' ),
					),
					array(
						'id' => $prefix . 'visible',
						'name' => esc_html__( 'Rendre Visible', 'wp_custom_visit_card_manage' ),
						'type' => 'radio',
						'placeholder' => '',
						'options' => array(esc_html__( 'Cacher###', '###Voir', 'wp_custom_visit_card_manage' ) ),
						'inline' => 'true',
						'std' => '1',
					),
					array(
						'id' => $prefix . 'date',
						'type' => 'date',
						'name' => esc_html__( 'Date Programmation', 'wp_custom_visit_card_manage' ),
					),
					array(
						'id' => $prefix . 'time',
						'name' => esc_html__( 'Heure Programmation', 'wp_custom_visit_card_manage' ),
						'type' => 'time',
					),
					array(
						'id' => $prefix . 'gallery',
						'type' => 'image_advanced',
						'name' => esc_html__( 'Gallery', 'wp_custom_visit_card_manage' ),
					),
				),
			);

			return $meta_boxes;
		}

		// Register Custom Post Type
		function register_post_types() {

			$labels = array(
				'name'                  => _x( 'Carte Visite', 'Post Type General Name', 'wp_custom_visit_card_manage' ),
				'singular_name'         => _x( 'Carte Visite', 'Post Type Singular Name', 'wp_custom_visit_card_manage' ),
				'menu_name'             => __( 'Carte Visites', 'wp_custom_visit_card_manage' ),
				'name_admin_bar'        => __( 'Carte Visite', 'wp_custom_visit_card_manage' ),
				'archives'              => __( 'Archive des Carte Visite', 'wp_custom_visit_card_manage' ),
				'attributes'            => __( 'Attributs d\'une Carte Visite', 'wp_custom_visit_card_manage' ),
				'parent_item_colon'     => __( 'Parent de la Carte Visite', 'wp_custom_visit_card_manage' ),
				'all_items'             => __( 'Toutes les Carte Visites', 'wp_custom_visit_card_manage' ),
				'add_new_item'          => __( 'Ajouter une Carte Visite', 'wp_custom_visit_card_manage' ),
				'add_new'               => __( 'Ajouter une nouvelle', 'wp_custom_visit_card_manage' ),
				'new_item'              => __( 'Nouvelle Carte Visite', 'wp_custom_visit_card_manage' ),
				'edit_item'             => __( 'Editer la Carte Visite', 'wp_custom_visit_card_manage' ),
				'update_item'           => __( 'Mettre a jour la Carte Visite', 'wp_custom_visit_card_manage' ),
				'view_item'             => __( 'Voir la Carte Visite', 'wp_custom_visit_card_manage' ),
				'view_items'            => __( 'Voir les Carte Visite', 'wp_custom_visit_card_manage' ),
				'search_items'          => __( 'Rechercher une Carte Visite', 'wp_custom_visit_card_manage' ),
				'not_found'             => __( 'Carte Visite non trouvee', 'wp_custom_visit_card_manage' ),
				'not_found_in_trash'    => __( 'Pas trouve dans la corbeille', 'wp_custom_visit_card_manage' ),
				'featured_image'        => __( 'Multiples Images', 'wp_custom_visit_card_manage' ),
				'set_featured_image'    => __( 'Modifer l\'image', 'wp_custom_visit_card_manage' ),
				'remove_featured_image' => __( 'Retirer l\'image', 'wp_custom_visit_card_manage' ),
				'use_featured_image'    => __( 'Utiliser comme image', 'wp_custom_visit_card_manage' ),
				'insert_into_item'      => __( 'inserer dans la Carte Visite', 'wp_custom_visit_card_manage' ),
				'uploaded_to_this_item' => __( 'Charger dans la Carte Visite', 'wp_custom_visit_card_manage' ),
				'items_list'            => __( 'Liste de Carte Visite', 'wp_custom_visit_card_manage' ),
				'items_list_navigation' => __( 'Les Carte Visite', 'wp_custom_visit_card_manage' ),
				'filter_items_list'     => __( 'Filtrer les Carte Visite', 'wp_custom_visit_card_manage' ),
			);
			$args = array(
				'label'                 => __( 'visit_card', 'wp_custom_visit_card_manage' ),
				'description'           => __( 'Les differentes visit_card', 'wp_custom_visit_card_manage' ),
				'labels'                => $labels,
				'supports'              => array( 'title', 'editor', 'thumbnail','excerpt' ),
				'taxonomies'            => array( 'category', 'post_tag' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 10,
				'menu_icon'             => 'dashicons-admin-comments',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => 'visit_card',
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'post',
				'show_in_rest'          => true,
			);
			register_post_type( $this->post_type, $args );

		}

	    // Add Shortcode
		function my_visit_card() {
			include(WPCVC_DIR.'template/html/front-custon-visit-card.php');
		}

	    function add_visit_card() {			
	    	include(WPCVC_DIR.'template/html/menu.php');
			include(WPCVC_DIR.'template/html/ajouter-visit_card.php');
		}

	    function all_visit_card() {
			include(WPCVC_DIR.'template/html/menu.php');
			include(WPCVC_DIR.'template/html/toutes-visit_card.php');
		}
	}

	new WpCustomVisitCard();