
<?php
include "usable.php";
if(isset($_GET['file']) && isset($_GET['url']) && !empty($_GET['url']) && !empty($_GET['file'])){
	$url = clean_up(trim($_GET['url']));
	$name= $_GET['file'];
	 header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("admin/videos/".$name));
    ob_clean();
    flush();
    if(readfile("admin/videos/".$name)){ 
    exit;
	header('Location: '.$_SERVER['HTTP_REFERER'].'?url='.$url.'');
	/* echo 'Location: '.$_SERVER['HTTP_REFERER'].'?uid='.$uid.'&url='.$url.'';
	die(); */
	}
}
?>