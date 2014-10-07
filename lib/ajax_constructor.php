<?
if(!isset($_SESSION))session_start();
include_once('lib_bd.php');
class AjaXConstructor extends work_bd
{
//Построение ajax ответа
function constructor_ajax_input($query,$paket='',$token)
	{
	switch ($query) 
	{
	case 'ret_obl':
		{
		include_once('map.php');
		return json_encode(Maps::ret_obl(json_decode($paket)));
		}
		break;
	case 'ret_geo_fias':
		{
		include_once('map.php');
		return json_encode(Maps::ret_geo_fias(json_decode($paket)));
		}
		break;	
	default:
		return 'no';
		break;
	}
	}
//Постороение файлового ответа
function constructor_ajax_file_input($query,$paket='',$file)
	{
	include_once('files.php');
	return json_encode(Files::save_new_file($file,json_decode($paket)));	
	//var_dump(json_decode($paket));
	}		
}
?>