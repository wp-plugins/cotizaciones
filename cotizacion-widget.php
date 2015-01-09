<?php
/*
Plugin Name: Cotizacion
Plugin URI: http://nordestedesign.com.ar/blog/
Description: Cotizacion del Dolar Blue y Dolar Oficial , Euro , Real
Author: Luis Daniel
Version: 1.0.0
Author URI: http://www.nordestedesign.com.ar/
*/
class XRCostaRica_Widget extends WP_Widget
{
	function XRCostaRica_Widget() {
	$widget_ops = array('classname' => 'XRCostaRica_Widget', 'description' => 'Cotizacion del dolar blue,dolar oficial, Euro , Real' );
	$this->WP_Widget( 'XRCostaRica_Widget', 'Cotizacion Dolar', $widget_ops );
	}
 
	function form( $instance )
	{
	$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	$title = ( $instance['title'] ) ? $instance['title'] : 'Cotizaciones' ;
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
	<?php
	}
 																																																																																																																																																																																																																																					
	function update( $new_instance, $old_instance )
	{
	$instance = $old_instance;

	$instance['title'] = $new_instance['title'];

	return $instance;
	}
 

 
	function widget( $args, $instance )
	{
	extract( $args, EXTR_SKIP );
 	echo $before_widget;
	$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
	if ( ! empty($title) ) {
		echo $before_title . $title . $after_title;
		

$euro=file_get_contents("http://www.dolar-bluehoy.com/api.php?d=EUR&a=ARS");


$euro = explode(',',$euro);

$real=file_get_contents("http://www.dolar-bluehoy.com/api.php?d=BRL&a=ARS");


$real = explode(',',$real);


$dolar=file_get_contents("http://www.dolar-bluehoy.com/api.php?d=USD&a=ARS");


$dolar = explode(',',$dolar);


		echo '<div id="liveclock" style="display:none;"></div>
	<style type="text/css">
	#container-1{width: 100%;margin: 10px 0 10px 0;}

	#container-1 .anchors{font-size: 12px;list-style: none;margin-left: 0px;margin-bottom: 0;padding: 0;width: 297px;font-family: tahoma;}

	#container-1 .anchors:after{display: block;clear: both;content: " ";}

	#container-1 .anchors li{float: left;margin: 0;height: 25px;text-align: center;position: relative;}

	#container-1 .anchors li#solVotadas{width: 74px;}

	#container-1 .anchors li#solRecom{width: 125px;width: 110px;}

	#container-1 .anchors a{display: block;height: 16px;padding: 5px 5px 0 5px;margin-top: 3px;color: #B6B6B6;background: url(image/solapa-off.gif) repeat-x;text-decoration: none;font-size: 11px;font-size: 10px;border-top: 1px solid #EEE;border-right: 1px solid #EEE;border-left: 1px solid #EEE;font-weight: bold;}

	#container-1 .anchors .tabs-selected a{color: #0C6392;background: url('.plugins_url().'image/solapa-on.gif) repeat-x;text-decoration: none;height: 19px;font-weight: bold;position: absolute;top: 1px;left: 0;z-index: 2;border-left: 1px solid #CCC;border-top: 1px solid #CCC;border-right: 1px solid #CCC;margin-top: 0px;}

	#container-1 .anchors li.tabs-selected{background-color: #f0f0f0;}

	#container-1 .anchors a:focus, .anchors a:active{outline: none;}

	#container-1 .anchors a:hover{color: #0C6392;text-decoration: none;}

	#container-1 .anchors .tabs-selected a, .anchors a:focus, .anchors a:active, #container-1 .fragment{text-decoration: none;background-color: #FFFFFF;}

	#container-1 .anchors .tabs-selected a:link, .anchors .tabs-selected a:visited, #container-1 .anchors .tabs-disabled a:link, .anchors .tabs-disabled a:visited{cursor: text;}

	#container-1 .anchors a:hover, .anchors a:focus, .anchors a:active{cursor: pointer;}

	#container-1 .anchors .tabs-disabled{}

	#container-1 .anchors .tabs-disabled a:hover, .anchors .tabs-disabled a:focus, .anchors .tabs-disabled a:active{}

	#container-1 .fragment{background: url(image/solapaBg.gif) repeat-x bottom;border: 1px solid #CCC;padding-bottom: 0px;}

	#container-1 .fragment ul{list-style: none;margin: 10px 0 0 0;line-height: 16px;}

	#container-1 .fragment ul li{font-size: 11px;font-family: Tahoma;padding: 0 0 0 22px;background: url(image/bg_right_NOTAS_RELACONADAS_2.gif) 8px 2px no-repeat;}

	#container-1 .fragment ul li a{color: #0C6392;text-decoration: none;}

	#container-1 table{margin: 1px;border-collapse: collapse;width: 100%;}

	#container-1 table td,#container-1 table th{font-family: Tahoma;font-size: 11px;color: #666;padding: 4px;border-bottom: 1px solid #666;}
	</style>
	<div align="center">
		<div id="container-1">
		
		                    <ul class="anchors">
		        				<li id="solVotadas" class="tabs-selected"><a tabindex="1" href="#section-1">Cotizaciones</a></li>
		        			</ul>

		    <div class="fragment" id="section-1">
		                        <table>
									<tbody><tr>
										<th align="left"><strong>Moneda</strong></th>
										<th align="center"><center><strong>Compra</strong></center></th>
										<th align="center"><center><strong>Venta</strong></center></th>
									</tr>
									<tr>
										<td><img width="13" height="9" alt="" style="border: medium none;" src="'.plugins_url().'/cotizaciones/image/b_USA.gif">&nbsp;Dolar</td>
										<td align="center">'.$dolar[4].'</td>
										<td align="center">'.$dolar[5].'</td>
									</tr>
									<tr>
										<td><img width="13" height="9" alt="" style="border: medium none;" src="'.plugins_url().'/cotizaciones/image/b_EURO.gif">&nbsp;Euro</td>
										<td align="center">'.$euro[4].'</td>
										<td align="center">'.$euro[5].'</td>
									</tr>
									<tr>
										<td><img width="13" height="9" alt="" style="border: medium none;" src="'.plugins_url().'/cotizaciones/image/b_BRASIL.gif">&nbsp;Real</td>
										<td align="center">'.$real[4].'</td>
										<td align="center">'.$real[5].'</td>
									</tr>
								</tbody></table>

		</div>
	</div>
' ;
		


		echo $after_widget;
	}
  }
 
}

add_action( 'widgets_init', create_function('', 'return register_widget("XRCostaRica_Widget");') );?>