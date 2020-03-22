<?php
/*
  Plugin Name: Cartes Personnalisées
  Plugin URI: 
  Description: Permettre au client de graver des textes et images sur les produits
  Version: 1.0
  Author: ARS GROUP
  Author URI: http://www.ars-agency.com
 */

/*

add_filter( 'template_include', 'so_43621049_template_include', 20 );

function so_43621049_template_include( $template ) {
  
	  	if ( is_singular('product') ) {
	    	$template = plugin_dir_path( __FILE__ ).'woocommerce/content-single-product.php';
		}

		return $template;
	}
*/

class Custom_Visit_Card {

	
	function __construct(){
		$this->init();
	}

	/**
	 *	INITIALIZE
	 */
	function init(){
		
		add_action( 'admin_menu', array( $this , 'register_metax_boxes' ) );

		add_filter( 'woocommerce_add_cart_item_data', array( $this, 'ars_add_extra_field_to_cart_item'), 10, 3 );
	}



	/**
	 *	ADD META
	 */

	// Metaboxes
	static function register_metax_boxes(){
		
		// Recto Metabox
		add_meta_box(
			'card_recto_id', 
			'Recto', 
			array( $this, 'card_recto'), 
			'product', 
			'side', 
			'high'
		);
	}



	/**
	 *	META CALLBACK
	 */
		
	public function card_recto(){
		
		global $post;
		
		$card_recto_meta_key = '_card_recto';

		$card_recto_meta_value = get_post_meta( $post->ID, $card_recto_meta_key ,  true );
		
		?>
		
		<style>
			.engraving-image {
				position: relative;
			}
			#engraving-container img{
				width: 100%;
			}
			.engraving-options{
				text-align: center;
			}
			.engraving-option {
			    display: flex;
			    justify-content: space-between;
			}
		</style>
		<div id="engraving-container" class="engraving-container">
			<div class="engraving-image">
				<span class="img">
					<?php if($card_recto_meta_value){ ?>
					<img src="<?php echo $card_recto_meta_value; ?>" alt="produit"/>
					<?php } ?>
				</span>
				<input type="hidden" name="<?php echo $card_recto_meta_key ?>" id="<?php echo $card_recto_meta_key ?>">
			</div>
			<div class="engraving-options">
				<div class="engraving-option">
					<button class="misha_upload_image_button button button-primary button-large">AJOUTER</button>
					<button class="misha_remove_image_button button-link delete-attachment" style="color: red;text-transform: lowercase;">SUPPRIMER</button>
				</div>
			</div>
		</div>
		
		
		<script>
			
			jQuery(function($){
			    /*
			     * Select/Upload image(s) event
			     */
			    $('body').on('click', '.misha_upload_image_button', function(e){
			        e.preventDefault();

		            var button = $(this),
		            custom_uploader = wp.media({
			            title: 'Insert image',
			            library : {
			                // uncomment the next line if you want to attach image to the current post
			                // uploadedTo : wp.media.view.settings.post.id, 
			                type : 'image'
			            },
			            button: {
			                text: 'Use this image' // button label text
			            },
			            multiple: false // for multiple image selection set to true
			        }).on('select', function() { // it also has "open" and "close" events 
			            var attachment = custom_uploader.state().get('selection').first().toJSON();
			            $(".engraving-image > span.img").html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />').next().val(attachment.id).next().show();
			            $("#<?php echo $card_recto_meta_key ?>").val(attachment.url);
			        })
			        .open();
			    });

			    /*
			     * Remove image event
			     */
			    $('body').on('click', '.misha_remove_image_button', function(){
			        $(this).hide().prev().val('').prev().addClass('button').html('Upload image');
			        $("#<?php echo $card_recto_meta_key ?>").val('');
			        return false;
			    });

			});
			
		</script>
		<?php
		$t=''; 
	}


	/**
	 * Add card color to cart item.
	 *
	 * @param array $cart_item_data
	 * @param int   $product_id
	 * @param int   $variation_id
	 *
	 * @return array
	 */
	function ars_add_extra_field_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
	    
	    // font, color, alignment, spacing, size
	    $card_font 		= filter_input( INPUT_POST, '_card_font' );
	    $card_color 	= filter_input( INPUT_POST, '_card_color' );
	    $card_alignment = filter_input( INPUT_POST, '_card_alignment' );
	    $card_spacing 	= filter_input( INPUT_POST, '_card_spacing' );
	    $card_size 		= filter_input( INPUT_POST, '_card_size' );
	 
	    // @TODO check fields to put defaults values 
	    /*
	    if ( empty(  ) ) {
	        
	    }
	    */

	 	$cart_item_data['_card_font'] = $card_font;
	    $cart_item_data['_card_color'] = $card_color;
	    $cart_item_data['_card_alignment'] = $card_alignment;
	    $cart_item_data['_card_spacing'] = $card_spacing;
	    $cart_item_data['_card_size'] = $card_size;
	 
	    return $cart_item_data;
	}
	 
	

	public static function Instance(){

		static $instance = null;
		
		if( $instance == null ){
			$instance = new Custom_Visit_Card();
		}

		return $instance;
	}













}

Custom_Visit_Card::Instance();




