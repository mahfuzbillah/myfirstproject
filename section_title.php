<?php 
add_shortcode('title_section','title_sec_func');
function title_sec_func($some){
	$result = shortcode_atts(array(
		'sec_title' =>'',
		'sec_des' =>''
	),$some);
	extract($result);
	ob_start();
	?>
	<div class="section-header text-center">
	    <h2><?php echo $sec_title;?></h2>
	    <p><?php echo $sec_des;?></p>
	</div>

<?php
return ob_get_clean();

}

add_action( 'vc_before_init', 'title_section_elm' );
function title_section_elm() {
 vc_map( array(
  "name" => __( "Section Title", "praxis" ),
  "base" => "title_section",
  "category" => __( "praxis", "praxis"),
  "params" => array(
		 array(
		  "type" => "textfield",
		  "heading" => __( "Section Title", "praxis" ),
		  "param_name" => "sec_title",
		  "value" => __( "Default param value", "my-text-domain" ),
		  "description" => __( "Description for foo param.", "my-text-domain" )
		 ),
		 array(
		  "type" => "textfield",
		  "heading" => __( "Section Description", "praxis" ),
		  "param_name" => "sec_des",
		 ),
  )
 ) );
}

?>