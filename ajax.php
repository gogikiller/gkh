<?
if(!isset($_SESSION))session_start();
include_once('lib/ajax_constructor.php');
$ajx=new AjaXConstructor;
if($_POST['query']=='save_new_file' && $ajx->check_js_token($_POST['js_token']))
	echo $ajx->constructor_ajax_file_input($_POST['query'],($_POST['paket']!=''?$_POST['paket']:''),$_FILES['file']);
elseif($_POST['query']!=''&& $ajx->check_js_token($_POST['js_token']))//проверка на запрос и ключ...
	echo $ajx->constructor_ajax_input($_POST['query'],($_POST['paket']!=''?$_POST['paket']:''),$_POST['js_token']);
else
	echo ':(';	
?>