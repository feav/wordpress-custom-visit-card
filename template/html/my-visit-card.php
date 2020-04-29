
<?php

if(isset($_POST['nom_vc']) && $_POST['nom_vc']){
    $post_information = array(
        'post_title' =>  $_POST['nom_vc'],
        'post_content' => '',
        'post_type' =>  'wp_custom_visit_card',
        'post_status' => "publish",
        'post_parent' => 0,
        'author' => get_current_user_id(),
    );
    $post_id = wp_insert_post( $post_information );
    
    wp_redirect( get_page_link( $post_id  ) );

?>
    <script type="text/javascript">
        document.location.href = "<?php echo get_page_link( $post_id  ) ;?>";
    </script>
<?php

}   
// WP_Query arguments
$args = array(
	'post_type'              => array( 'wp_custom_visit_card' ),
	'author'                 => get_current_user_id(),
    'post_status'            => array( 'publish','future'),    
    'post_parent'            => 0,    
	'nopaging'               => true,
	'order'                  => 'ASC',
	'orderby'                => 'modified',
);


// The Query
$query_manifestations = new WP_Query( $args );
?>

        <form action="" method="POST" style="display: flex;justify-content: space-around;width: max-content;min-width: 400px;">
            <input type="text" placeholder="Titre de la carte de visite" name="nom_vc" style="">        
            <button class="btn btn-primary" type="submit" style="height: 45px;background: #fcca02;width: 50px;"> + </button>

        </form>
<?php
// The Loop
if ( $query_manifestations->have_posts() ) {
	?>
	<div>
	<?php
	while ( $query_manifestations->have_posts() ) {
		$query_manifestations->the_post();
		?>
		<div class="card-block">
			<!-- Card -->
			<div class="card">

			  <!-- Card image -->
			  <div class="view overlay">
			    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQlsVnV0W1u3MyJUlD76RgQT5Fu8uIf3ccvKzimQ7bbReCKnqAR&usqp=CAU" alt="Card image cap">
			    <a>
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>


              <a href="<?php echo esc_url( get_page_link( get_the_ID() ) ); ?>?post=<?php echo get_the_ID(); ?>" class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i
                  class="fa fa-edit" style="margin: 3px;"></i></a>

			  <!-- Card content -->
			  <div class="card-body">

			    <!-- Title -->
			    <h4 class="card-title"><?php the_title(); ?></h4>
			    <hr>
			  </div>


			</div>
			<!-- Card -->
		</div>


		<?php
	}
		?>
	</div>
	<?php
} else {
	?>
	Aucune Manifestation trouvee
	<?php
}

// Restore original Post Data
wp_reset_postdata();

?>



<style type="text/css">
	.mdb-color.lighten-3 {
	    background-color: #333333 !important;
	}
	.mdb-color {
	    background-color: #45526e !important;
	}
	.text-center {
	    text-align: center !important;
	}
	.pt-3, .py-3 {
	    padding-top: 1rem !important;
	}
	.rounded-bottom {
	    border-bottom-right-radius: .25rem !important;
	    border-bottom-left-radius: .25rem !important;
	}
	.card {
	    font-weight: 400;
	    border: 0;
	    -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
	    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
	}
	.card {
	    position: relative;
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    min-width: 0;
	    word-wrap: break-word;
	    background-color: #fff;
	    background-clip: border-box;
	    border: 1px solid rgba(0,0,0,0.125);
	    border-radius: .25rem;
	    max-width: 284px;
        
        height: max-content;
        max-height: max-content;
	}
	.view img, .view video {
	    position: relative;
	    display: block;
	}
	.card-img, .card-img-top {
	    border-top-left-radius: calc(0.25rem - 1px);
	    border-top-right-radius: calc(0.25rem - 1px);
	}
	.card-img, .card-img-top, .card-img-bottom {
	    -ms-flex-negative: 0;
	    flex-shrink: 0;
	    width: 100%;
	}
	img {
	    vertical-align: middle;
	    border-style: none;
	}
	*, *::before, *::after {
	    box-sizing: border-box;
	}
	.view {
	    position: relative;
	    overflow: hidden;
	    cursor: default;
        min-height: 200px;
	}
	a:not([href]):not([tabindex]), a:not([href]):not([tabindex]):focus, a:not([href]):not([tabindex]):hover {
	    color: inherit;
	    text-decoration: none;
	}

	.card .btn-action {
	    margin-top: -1.44rem;
	    margin-bottom: -1.44rem;
        padding: 13px;
        color: white;
	}
	.mdb-color.lighten-3 {
	    background-color: #333333 !important;
	}
	a.waves-effect, a.waves-light {
	    display: inline-block;
	}
	a:not([href]) {
	    color: inherit;
	    text-decoration: none;
	}
	.btn-floating {
	    position: relative;
	    z-index: 1;
	    display: inline-block;
	    padding: 0;
	    margin: 10px;
	    overflow: hidden;
	    vertical-align: middle;
	    cursor: pointer;
	    border-radius: 50%;
	    -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
	    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
	    -webkit-transition: all .2s ease-in-out;
	    transition: all .2s ease-in-out;
	    width: 47px;
	    height: 47px;
	}
	.waves-effect {
	    position: relative;
	    overflow: hidden;
	    cursor: pointer;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	    -webkit-tap-highlight-color: transparent;
	}
	.mdb-color {
	    background-color: #45526e !important;
	}
	.ml-auto, .mx-auto {
	    margin-left: auto !important;
	}
	.mr-4, .mx-4 {
	    margin-right: 1.5rem !important;
	}
	.btn-floating i {
	    display: inline-block;
	    width: inherit;
	    color: #fff;
	    text-align: center;
	}
	.btn-floating i {
	    font-size: 1.25rem;
	    line-height: 47px;
	}
     .btn-floating i {
        font-size: 1.25rem;
        line-height: 0;
        text-align: center;
        width: max-content;
    }
	.fa, .fas {
	    font-weight: 900;
	}
	.card-body {
	    padding-top: 1.5rem;
	    padding-bottom: 0;
	    border-radius: 0 !important;
	}
	.card .card-body h1, .card .card-body h2, .card .card-body h3, .card .card-body h4, .card .card-body h5, .card .card-body h6 {
	    font-weight: 400;
	}
	.card-title {
	    margin-bottom: .75rem;
	}
	.card .card-body .card-text {
	    font-size: .9rem;
	    font-weight: 400;
	    color: #747373;
	}
	.card-text:last-child {
	    margin-bottom: 0;
	}
		
	.font-small {
	    font-size: .9rem;
	}
	.list-inline {
	    padding-left: 0;
	    list-style: none;
	}
	.list-unstyled {
	    padding-left: 0;
	    list-style: none;
	}
	.card-title {
	    margin-bottom: .75rem;
	    padding: 10px;
	}
	.card .card-body .card-text {
	    font-size: .9rem;
	    font-weight: 400;
	    color: #747373;
	    padding: 10px;
	}
	.list-unstyled {
	    padding-left: 0;
	    list-style: none;
	    display: flex;
	    justify-content: space-around;
	}
	li.list-inline-item a, li.list-inline-item {
	    color: white !important;
	    font-weight: 700;
	}
	.fa, .fas {
	    margin: 2px;
	}
	.card-block {
	    display: inline-block;
	    margin: 10px;
	}
    .view img, .view video {
    position: relative;
    display: block;
    max-height: 200px;
}
#content .row.row-main {
    padding: 0;
    margin: 0 !important;
}

 #content .row.row-main > div {
    width: 100%;
    margin: 0;
}
</style>