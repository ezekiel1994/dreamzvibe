<?php
function logged_in(){
	return (isset($_SESSION['admin_id']))?true : false;
}

function register_student($register_item){
	global $con;
	array_walk($register_item,'san_all');
	$register_item['password'] = md5($register_item['password']);
	$array_keys = array_keys($register_item);
	$column = implode(',',$array_keys);
	$data = "'".implode("','",$register_item)."'";
	mysqli_query($con,"insert into student($column)values($data)");
}
function Check_skills(){
	global $con;
	return (mysqli_num_rows(mysqli_query($con,"select * from skills"))>0)? true : false;
}
function rename_img($img_name){
	$new_name = explode(".",$img_name);
	$ext = end($new_name);
	$rd = $new_name[0].rand(12,90);
	$ln = $rd.".".$ext;
	return $ln;
}
function skill_exist($value){
	global $con;
	$value=clean_up($value);
	return (mysqli_num_rows(mysqli_query($con,"select skill from skills where  skill= '$value'"))==1)?true : false;	
}
function count_posts(){
	global $con;
	return mysqli_num_rows(mysqli_query($con,"select * from posts"));	
}
function count_songs(){
	global $con;
	return mysqli_num_rows(mysqli_query($con,"select * from songs where song_action = 1"))or die(mysqli_error($con));	
}
function count_subscribers(){
	global $con;
	return mysqli_num_rows(mysqli_query($con,"select * from users"));
}
function count_videos(){
	global $con;
	return mysqli_num_rows(mysqli_query($con,"select * from videos where video_action = 1"));
}
function count_categories(){
	global $con;
	return mysqli_num_rows(mysqli_query($con,"select * from categories"));
}
function title_exist($value){
	global $con;
	$value=clean_up($value);
	return (mysqli_num_rows(mysqli_query($con,"select song_title from songs where  song_title = '$value'"))>0)?true : false;
}
function disable_enable_post($id,$table,$action,$col,$table_id){
	global $con;
	$table = clean_up($table);
	$id = clean_up($id);
	$action = clean_up($action);
	$col = clean_up($col);
	$table_id = clean_up($table_id);
	$run = "update ".$table." set ".$col."=".$action." where ".$table_id."='$id'";
	//die($run);
	mysqli_query($con,$run);
}
function post_title_exist($value){
	global $con;
	$value=clean_up($value);
	return (mysqli_num_rows(mysqli_query($con,"select post_title from posts where  post_title = '$value'"))>0)?true : false;
}
function category_exist($value){
	global $con;
	$value=clean_up($value);
	return (mysqli_num_rows(mysqli_query($con,"select category from categories where  category = '$value'"))>0)?true : false;
}
function video_title_exist($value){
	global $con;
	$value=clean_up($value);
	return (mysqli_num_rows(mysqli_query($con,"select video_title from songs where  video_title = '$value'"))>0)?true : false;
}
function seo_url($value){
	$new_string = preg_replace('/[^a-z0-9]+/','-',strtolower($value));
	return $new_string;
}
function san_all(&$item){
	global $con;
	return mysqli_real_escape_string($con,$item);
}
function register_song($register_item){
	global $con;
	array_walk($register_item,'san_all');
	$array_keys = array_keys($register_item);
	$column = implode(',',$array_keys);
	$data = "'".implode("','",$register_item)."'";
	mysqli_query($con,"insert into songs($column)values($data)")or die(mysqli_error($con))or die(mysqli_error($con));
}
function register_post($register_item){
	global $con;
	array_walk($register_item,'san_all');
	$array_keys = array_keys($register_item);
	$column = implode(',',$array_keys);
	$data = "'".implode("','",$register_item)."'";
	mysqli_query($con,"insert into posts($column)values($data)")or die(mysqli_error($con));
}
function register_video($register_item){
	global $con;
	array_walk($register_item,'san_all');
	$array_keys = array_keys($register_item);
	$column = implode(',',$array_keys);
	$data = "'".implode("','",$register_item)."'";
	mysqli_query($con,"insert into videos($column)values($data)")or die(mysqli_error($con))or die(mysqli_error($con));
}
?>