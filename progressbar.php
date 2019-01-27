<?php 
add_shortcode('progressbar','progressbar_sec_func');
function progressbar_sec_func($some){
	$result = shortcode_atts(array(
		'p_title' =>'',
		'width' =>'',
	),$some);
	extract($result);
	ob_start();
	?>
		<div class="progressbar-wrapper">
            <div class="single-rogressbar">
                <h4 class="progress-bar-title"><?php echo $p_title;?></h4>
                <div class="progressbar">
	                <div class="inner-progress wow fadeInLeft" 
	                    data-progress="<?php echo $width;?>" 
	                    data-wow-duration="2s" data-wow-delay="0.1s" 
	                    style="width: <?php echo $width;?>; visibility: visible; animation-duration: 2s; animation-delay: 0.1s;
	                    animation-name: fadeInLeft;">
                    </div>
                </div>
            </div><!-- .single-rogressbar -->
		</div>
<?php
return ob_get_clean();

}

add_action( 'vc_before_init', 'progressbar_section_elm' );
function progressbar_section_elm() {
 vc_map( array(
  "name" => __( "Progressbar", "praxis" ),
  "base" => "progressbar",
  "category" => __( "praxis", "praxis"),
  "params" => array(
		 array(
		  "type" => "textfield",
		  "heading" => __( "progressbar Title", "praxis" ),
		  "param_name" => "p_title",
		 ),
		 array(
		  "type" => "textfield",
		  "heading" => __( "progressbar %", "praxis" ),
		  "param_name" => "width",
		 ),
		
  )
 ) );
}

?>