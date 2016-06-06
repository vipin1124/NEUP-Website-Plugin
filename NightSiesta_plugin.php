<?php  
/*
Plugin Name: NightSiesta plugin
Plugin URI: 
Description: 
Version: 1.0.0
Author: NightSiesta
Author URI: http://www.xxxx.com/
License: GPL
*/
?>
<?php
if( is_admin() ) {
    add_action('admin_menu', 'display_NightSiesta_menu');
}

function display_NightSiesta_menu() {
    /* add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);  */
    add_options_page('Set NightSiesta', 'NightSiesta Menu', 'administrator','display_nightsiesta', 'display_NightSiesta_html_page');    
}
function display_NightSiesta_html_page()
{	?>
	<form action="" method="post" id='123'>
	<?php global $wpdb?>
	<?php
	if(isset($_POST['submited'])){update_option("title1",$_POST['title1']);
	update_option("time1",$_POST['time1']);
	update_option("place1",$_POST['place1']);
	update_option("link1",$_POST['link1']);
	update_option("title2",$_POST['title2']);
	update_option("time2",$_POST['time2']);
	update_option("place2",$_POST['place2']);
	update_option("link2",$_POST['link2']);
	update_option("title3",$_POST['title3']);
	update_option("time3",$_POST['time3']);
	update_option("place3",$_POST['place3']);
	update_option("link3",$_POST['link3']);
	}
	?>
	<?php 
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'title3'");
	foreach($results as $a)
	$title3= $a->option_value;   
	?>
	<?php 
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'title2'");
	foreach($results as $b)
	$title2= $b->option_value;    
	?>
	<?php  
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'title1'");
	foreach($results as $c)
	$title1= $c->option_value;   
	?>
	<?php  
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'place1'");
	foreach($results as $d)
	$place1= $d->option_value;    
	?>
	<?php   
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'place2'");
	foreach($results as $e)
	$place2= $e->option_value;   
	?>
	<?php   
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'place3'");
	foreach($results as $f)
	$place3= $f->option_value;    
	?>
	<?php   
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'time1'");
	foreach($results as $g)
	$time1= $g->option_value;   
	?>
	<?php 
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'time2'");
	foreach($results as $h)
	$time2= $g->option_value;   
	?>
	<?php  
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'time3'");
	foreach($results as $i)
	$time3= $g->option_value;   
	?>
	<?php  
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'link1'");
	foreach($results as $j)
	$link1= $j->option_value;    
	?>
	<?php   
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'link2'");
	foreach($results as $k)
	$link2= $k->option_value;   
	?>
	<?php 
	$results = $wpdb->get_results("SELECT `option_value` FROM  $wpdb->options  WHERE option_name = 'link3'");
	foreach($results as $l)
	$link3= $l->option_value;   
	?>
	<p>Title1<input type="text" id="title_post1" name="title1" value="<?php echo("$title1") ?>"></p>
	<p>Time1<input class="form-control" name="time1" type="datetime-local" id="time_post1" value="<?php echo str_replace("","T", "$time1") ?>"></p>
	<p>Place1<input type="text" id="place_post1" name="place1" value="<?php echo("$place1") ?>"></p>
	<p>Link1<input type="text" id="link_post1" name="link1" value="<?php echo("$link1") ?>"></p>
	<p>Title2<input type="text" id="title_post2" name="title2" value="<?php echo("$title2") ?>"></p>
	<p>Time2<input class="form-control" name="time2" type="datetime-local" id="time_post2" value="<?php echo str_replace("","T", "$time2") ?>"></p>
	<p>Place2<input type="text" id="place_post2" name="place2" value="<?php echo("$place2") ?>"></p>
	<p>Link2<input type="text" id="link_post2" name="link2" value="<?php echo("$link2") ?>"></p>
	<p>Title3<input type="text" id="title_post3" name="title3" value="<?php echo("$title3") ?>"></p>
	<p>Time3<input class="form-control" name="time3" type="datetime-local" id="time_post3" value="<?php echo str_replace("","T", "$time1") ?>"></p>
	<p>Place3<input type="text" id="place_post3" name="place3" value="<?php echo("$place3") ?>"></p>
	<p>Link3<input type="text" id="link_post3" name="link3" value="<?php echo("$link3") ?>"></p>
	<input type="submit" value="submit"></input>
	<input type="hidden" name="submited" value="true"></input>
	</form></br>
	<?php
}
add_filter('the content','show_index');
/*下面是插件在主页的实现*/
function show_index()
{
	if(is_home())
	return $title1,$title2,$title3,$time1,$time2,$time3,$place1,$place2,$place3,$link1,$link2,$link3;
}
