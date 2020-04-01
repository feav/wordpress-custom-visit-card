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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(1);

	define('WPCVC_PLUGIN_FILE',__FILE__);
	define('WPCVC_DIR', plugin_dir_path(__FILE__));
	 
	define('WPCVC_URL', plugin_dir_url(__FILE__));

	define('WPCVC_API_URL_SITE', get_site_url() . "/");



	class WpCustomVisitCard {
		private $post_type;
		private $post_status_template;
	    function __construct() {
			$this->post_type = 'wp_custom_visit_card';
			$this->post_status = 'template';
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
	    function get_my_gallery(){
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
	 		return $imgs;
	    }
	    function add_into_my_gallery($file){
	    	if($file && $file['size']){
			    // WordPress environment
			    require( WPMM_DIR . '/../../../wp-load.php' );
			     
			    $wordpress_upload_dir = wp_upload_dir();
			    // $wordpress_upload_dir['path'] is the full server path to wp-content/uploads/2017/05, for multisite works good as well
			    // $wordpress_upload_dir['url'] the absolute URL to the same folder, actually we do not need it, just to show the link to file
			    $i = 1; // number of tries when the file with the same name is already exists
			     
			    $profilepicture = $file;
			    $new_file_path = $wordpress_upload_dir['path'] . '/' . $profilepicture['name'];
			    $new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
			     
			    if( empty( $profilepicture ) )
			        die( 'File is not selected.' );
			     
			    if( $profilepicture['error'] )
			        die( $profilepicture['error'] );
			     
			    if( $profilepicture['size'] > wp_max_upload_size() )
			        die( 'It is too large than expected.' );
			     
			    if( !in_array( $new_file_mime, get_allowed_mime_types() ) )
			        die( 'WordPress doesn\'t allow this type of uploads.' );
			     
			    while( file_exists( $new_file_path ) ) {
			        $i++;
			        $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $profilepicture['name'];
			    }
			     
			    // looks like everything is OK
			    if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {
			     
			     
			        $upload_id = wp_insert_attachment( array(
			            'guid'           => $new_file_path, 
			            'post_mime_type' => $new_file_mime,
			            'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'] ),
			            'post_content'   => '',
			            'post_status'    => 'attachment',
			            // 'post_parent' => $parent_post_id
			        ), $new_file_path );
			     
			        // wp_generate_attachment_metadata() won't work if you do not include this file
			        require_once( ABSPATH . 'wp-admin/includes/image.php' );
			     
			        // Generate and save the attachment metas into the database
			        wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
			     
			        // update_post_meta(  $parent_post_id, '_thumbnail_id',  $upload_id );

			        // Show the uploaded file in browser
			        //wp_redirect( $wordpress_upload_dir['url'] . '/' . basename( $new_file_path ) );
			     	return $upload_id;
			    }
			}
			return 0;
	    }
	    function create_visit_cart_element($type,$post_status,$post_parent){
			$post_information = array(
			        'post_title' =>  " VC - ".$type." - ".date('ymdhi'),
			        'post_content' => '',
			        'post_type' => $this->post_type,
			        'post_status' => $post_status,
			        'post_parent' => $post_parent
			);
			$post_id = wp_insert_post( $post_information );
			return $post_id;
	    }
	    function get_elements_of_visit_cart($post_id){
	    	$args = array(
				'post_type'   => array( $this->post_type ),
			    'post_status' => array( 'template'),    
			    'post_parent' => $post_id,
			    'orderby' => 'ID',
			    'order' => 'ASC'
			);
			$query_visit_cart = new WP_Query( $args );
			$elements = array();
			if ( $query_visit_cart->have_posts() ) {
				while ( $query_visit_cart->have_posts() ) {
					$query_visit_cart->the_post();
					$elements[] = array(
						'id' => get_the_ID(),
						'title'=>get_the_title(),
                        'type' => get_post_meta(get_the_ID(), 'vc_type', true),
                        'property'=>array(
                            'style' => get_post_meta(get_the_ID(), 'vc_style', true),
                            'src' => get_the_post_thumbnail_url()
                        ),
                        'inner'=>get_post_meta(get_the_ID() , 'vc_text', true)
					);
				}
			}
			return array(
				'id' => $post_id,
                'type' => 'root',
                'property'=>array('style'=>"background-color:white;"),
                'inner'=>'',
                'childs'=>$elements 
			);
	    }
		function ajax_callback() {
		    $module = "";
		    if(isset($_POST['function'])){
		    	$module	= trim($_POST['function']);
		    }
		    if(isset($_GET['function'])){
		    	$module	= trim($_GET['function']);
		    }


		    if($module=="get_gallery"){

	 			echo json_encode($this->get_my_gallery());
		    }else if($module=="add_to_gallery"){

	 			echo $this->add_into_my_gallery($_FILES['post_image']);

		    }else if($module=="update_style"){

		    	$post_id = $_POST['object_id'];
		 		$style = $_POST['style'];
		 		echo update_post_meta($post_id, 'vc_style', $style);


		    }else if($module=="create_vc_element"){

		    	$post_parent = $_POST['parent_id'];

		    	$post_id = 0;
		    	
		    	if(isset($_POST['image_id'])){
		 		
		 			$post_id  = $this->create_visit_cart_element('image',$this->post_status,$post_parent);
		 			$thumbnail_id = $_POST['image_id'];
		 			set_post_thumbnail( $post_id,  $thumbnail_id );
		 			$text = $_POST['type'];
		 			update_post_meta($post_id, 'vc_type', 'image');
		 			$style = $_POST['style'];
		 			update_post_meta($post_id, 'vc_style', $style);
		 			echo $post_id;
		    	
		    	}else if(isset($_POST['text'])){
		 		
		 			$post_id  = $this->create_visit_cart_element('text',$this->post_status,$post_parent);
		 			$text = $_POST['text'];
		 			update_post_meta($post_id, 'vc_inner', $text);
		 			$text = $_POST['type'];
		 			update_post_meta($post_id, 'vc_type', 'text');
		 			$style = $_POST['style'];
		 			update_post_meta($post_id, 'vc_style', $style);
		 			echo $post_id;
		    	
		    	}

		    }else if($module=="get_visit_cart_object"){

		    	$post_parent = $_GET['post_id'];

		    	echo json_encode($this->get_elements_of_visit_cart($post_parent));

		    }else{
		    	echo "No route found";
		    }
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