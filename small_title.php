<?php 
add_shortcode('small_title','small_title_sec_func');
function small_title_sec_func($some){
	$result = shortcode_atts(array(
		'sm_title' =>'',
	),$some);
	extract($result);
	ob_start();
	?>
	<h3 class="about-section-title"><?php echo $sm_title;?></h3>
<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'title_small_section_elm' );
function title_small_section_elm() {
 vc_map( array(
  "name" => __( "Small Title", "praxis" ),
  "base" => "small_title",
  "category" => __( "praxis", "praxis"),
  "params" => array(
		 array(
		  "type" => "textfield",
		  "heading" => __( "Small Title", "praxis" ),
		  "param_name" => "sm_title",
		  "value" => __( "Default param value", "praxis" ),
		  "description" => __( "Description for foo param.", "praxis" )
		 ),
		
  )
 ) );
}

?>