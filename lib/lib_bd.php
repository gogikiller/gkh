<?php
class work_bd
{	
public $linkmsql;
const parol_bd="12345"; //Пароль к базе данных
const user_bd="name"; //Логин к бд
const baza_dannix="gkh"; //База данных
const address_bazi_dannix="localhost";
public $dop='/gkh/';
public $dop2='/gkh';
public $global_user_id='0';
//Подключение к базе данных
function check_access()	
	{
	if($_COOKIE['key_aut_clients']!="" and $_SESSION['key_a_clients']=="")
		{
		$_SESSION['key_a_clients']=substr_replace(substr_replace($_COOKIE['key_aut_clients'],'',0,3),'',-3,strlen($_COOKIE['key_aut_clients']));
		SetCookie("key_aut_clients","",-1,"/gkh/");//Удаляем куку
		$new_session=true;
		}	
	if($_SESSION['key_a_clients']!="")
		{
		$this->connect_bd();
		$q1=mysql_query('Select * from session_a where key_a="'.$_SESSION['key_a_clients'].'"');
	    if(mysql_num_rows($q1)>0)
	       	{
			$q2=mysql_fetch_array($q1);
			SetCookie("key_aut_clients","");
	       	SetCookie("key_aut_clients",substr(md5(rand(100,120)),0,3).$q2['key_a'].rand(100,999),time()+1296000,"/gkh/");
	       	$_SESSION['key_a_clients']=$q2['key_a'];
	       	$update_users=mysql_query('UPDATE session_a SET date_time="'.date('Y-m-d H:i:s').'" '.($new_session?',session_id="'.session_id().'",session_ip="'.$_SERVER["REMOTE_ADDR"].'"':'').' WHERE key_a="'.$q2['key_a'].'"');
			$this->global_user_id=$q2['user_id'];
			$this->disconnect_bd();
			return true;
	       	}
	    else 
	       	{
	       	$this->disconnect_bd();
	       	//$this->logerr_error((object)array('function'=>__FUNCTION__,'text'=>$_SESSION['key_a_clients'],'id_error'=>'003','class_error'=>'1'));
	       	return false;
	       	}
		}
	else 
		return false;

	}	
function connect_bd()
	{
	$this->linkmsql=mysql_connect(work_bd::address_bazi_dannix,work_bd::user_bd,work_bd::parol_bd);
	if($this->linkmsql and mysql_select_db(work_bd::baza_dannix, $this->linkmsql))
		{
		mysql_query('SET NAMES utf8;');
		return true;
		}
	else
		{
		echo '<center>Сервер не доступен...</center>';
		exit();
		return false;	
		}	
	}	
function count_str_mysql($bd,$us)
	{
	$this->connect_bd();
	$result=mysql_result(mysql_query('Select count(*) from '.$bd.($us?' where '.$us:'')),0);
	$this->disconnect_bd();
	return (!$result?0:$result);
	}	
//Отключение от базы данных	
function disconnect_bd()
	{
	mysql_close($this->linkmsql);
	}	
function rename_date_time($date)
	{
	$data_time=explode(" ",$date);
	$datam=explode("-",$data_time[0]);
		switch ($datam['1'])
			{
			case 01: $mes='января';
			break;
			case 02: $mes='февраля';
			break;
			case 03: $mes='марта';
			break;
			case 04: $mes='апреля';
			break;
			case 05: $mes='мая';
			break;
			case 06: $mes='июня';
			break;
			case 07: $mes='июля';
			break;
			case 8: $mes='августа';
			break;
			case 9: $mes='сентября';
			break;
			case 10: $mes='октября';
			break;
			case 11: $mes='ноября';
			break;
			case 12: $mes='декабря';
			break;
			default: $mes="-";
			break;
			}
		if(date("Y")!=$datam[0])
			{
			$year="&nbsp;".$datam[0];
			}
		if($datam['2'][0]=="0")
			$datam['2']=substr($datam['2'],1);
		$insert=$datam['2'].'&nbsp;'.$mes.$year.",&nbsp;".substr_replace($data_time[1],"",-3);
		return $insert;
	}
function rename_month_name($month)
	{
	$montch_array=array ("","Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
	return $montch_array[$month];
	}
function dayN($d)
	{
	$day_name=array("Вс","Пн","Вт","Ср","Чт","Пт","Cб");
	return $day_name[$d];
	}
function translit_str($str) 
{
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"," "=>"_"
    );
    return strtr($str,$tr);
}
//Проверка строк	
function check_in($str)
	{
	$str=trim($str);
	$str=strip_tags($str);
	$str = htmlspecialchars($str);
	$str=addslashes($str);
	return $str;
	}
function cutString($string, $maxlen) 
	{
    $len=(mb_strlen($string)>$maxlen)
        ? mb_strripos(mb_substr($string, 0, $maxlen), ' ')
        : $maxlen;
    $cutStr = mb_substr($string, 0, $len);
    return (mb_strlen($string) > $maxlen)
        ? $cutStr .'...'
        :$cutStr;
	}
function check_date($date)
	{
	$date=explode('-',$date);
	if(checkdate($date[1],$date[2],$date[0]))
		return true;
	else
		return false;
	}
function compare_date_time($date)
	{
	//date_default_timezone_set('Asia/Yekaterinburg');
	$curent=strtotime("now");	
	$old=strtotime($date);
	return ($curent>$old ? true : false);
	}
function compare_date_time_5_min($date)
	{
	$curent=strtotime("-5 minute");
	$old=strtotime($date);
	return ($curent>=$old ? false : true);
	}
function date_time_bd()
	{
	return date('Y-m-d H:i:s');
	}
function new_js_token()
	{
	return substr(md5(rand(1,99)),0,3).substr(md5(substr($_SESSION['key_a_clients'],-3,3)),0,5).substr(md5(rand(1,99)),0,3);
	}
//Проверка джс ключа
function check_js_token($token)
	{
	$jk_k=substr(md5(substr($_SESSION['key_a_clients'],-3,3)),0,5)==substr_replace(substr_replace($token,'',0,3),'',-6,strlen($token))?true:false;
	$jf_d=$this->check_access();
	return ($jk_k==true && $jf_d==true)?true:false;
	}
}
?>