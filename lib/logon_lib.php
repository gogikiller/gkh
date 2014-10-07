<?
if(!isset($_SESSION))session_start();
include_once("lib_bd.php");
class autorizLib 
{
function show_index_entering()
	{
	//необходима проверка на вход!!!!	
	$forma->big_title='Авторизация';
	$forma->onsubmit='logon';
	$forma->area->{1}->id='big_form';
	$forma->area->{1}->element->{1}=array('id'=>'login','label'=>'Эл. почта');
	$forma->area->{1}->element->{2}=array('id'=>'password','label'=>'Пароль','type'=>'password');
	//$_SESSION['captcha_count']=4;
	if($_SESSION['captcha_count']>3)
		{
		$forma->area->{2}->title2='Введите код с картинки';		
		$forma->area->{2}->type='captcha';		
		$forma->area->{2}->element->{1}=array(
		'global_type'=>'div','id'=>'kapcha_img',
		'value'=>'<center><img src="'.($this->dop).'img/captcha.php?11"/></center>');
		$forma->area->{2}->element->{2}=array('id'=>'kapcha');
		}
	$forma->button_off->{1}->value='Войти';
	$forma->button_off->{1}->id='logon_button';
	$forma->button_off->{2}->value='Вспомнить пароль';
	$forma->button_off->{2}->uri='восстановление_пароля';
	$forma->button_off->{2}->type='a';
	$forma->button_off->{3}->value='Регистрация';
	$forma->button_off->{3}->uri='регистрация';
	$forma->button_off->{3}->type='a';
	return PageConstructor::constructor_form_add((object)$forma);
	}	
function show_index_reg()
	{
	$forma->big_title='Регистрация';
	$forma->onsubmit='on_registration';
	$forma->area->{1}->element->{1}=array('id'=>'name','label'=>'Имя');
	$forma->area->{1}->element->{2}=array('id'=>'soname','label'=>'Фамилия');
	$forma->area->{1}->element->{3}=array('id'=>'email','label'=>'Эл.почта');
	$forma->area->{1}->element->{5}=array('id'=>'password','label'=>'Пароль','type'=>'password');
	$forma->area->{1}->element->{6}=array('type_c'=>'select b-form_item_select_birth','id'=>'brith','label'=>'Дата рождения','global_type'=>'bthday_select');
	$forma->area->{1}->element->{7}=array('type_c'=>'checkbox','type_s'=>'float:left; margin-left: 90px;',
		'global_type'=>'radio',
		'name'=>'sex','id'=>'male','value'=>'m','label'=>'Мужчина','cl_n'=>true
		);
	$forma->area->{1}->element->{8}=array('type_c'=>'checkbox','type_s'=>'float:left; margin-left: 30px;',
		'global_type'=>'radio',
		'name'=>'sex','id'=>'female','value'=>'f','label'=>'Женшина'
		);
	$forma->area->{2}->title2='Введите код с картинки';		
	$forma->area->{2}->type='captcha';		
	$forma->area->{2}->element->{1}=array(
		'global_type'=>'div','id'=>'kapcha_img',
		'value'=>'<center><img src="'.($this->dop).'img/captcha.php?11"/></center>');
		$forma->area->{2}->element->{2}=array('id'=>'kapcha');
	$forma->button_off->{1}->type='div';
	$forma->button_off->{1}->value='Нажимая кнопку "Регистрация",вы соглашаетесь с нашими 
	<a href="условия_использования">Условиями использования</a> 
	и подтверждаете, что ознакомились с нашей 
	<a href="политика_использования_данных">Политикой использования данных</a>.';
	$forma->button_off->{1}->id='reg_policy';
	$forma->button_off->{2}->id='reg_button';
	$forma->button_off->{2}->value='Регистрация';
	$forma->button_off->{3}->value='Вспомнить пароль';
	$forma->button_off->{3}->uri='восстановление_пароля';
	$forma->button_off->{3}->type='a';
	$forma->button_off->{4}->value='Войти';
	$forma->button_off->{4}->uri='вход';
	$forma->button_off->{4}->type='a';
	return PageConstructor::constructor_form_add((object)$forma);
	}
function show_index_recovery()
	{
	$forma->big_title='Восстановление пароля';
	$forma->onsubmit='on_recovery';
	$forma->area->{1}->element->{3}=array('id'=>'email','label'=>'Эл.почта');
	$forma->area->{2}->title2='Введите код с картинки';		
	$forma->area->{2}->type='captcha';		
	$forma->area->{2}->element->{1}=array(
		'global_type'=>'div','id'=>'kapcha_img',
		'value'=>'<center><img src="'.($this->dop).'img/captcha.php?11"/></center>');
	$forma->area->{2}->element->{2}=array('id'=>'kapcha');
	$forma->button_off->{1}->value='Восстановить';
	$forma->button_off->{1}->id='recov_users_button';
	$forma->button_off->{2}->value='Войти';
	$forma->button_off->{2}->uri='вход';
	$forma->button_off->{2}->type='a';
	$forma->button_off->{3}->value='Регистрация';
	$forma->button_off->{3}->uri='регистрация';
	$forma->button_off->{3}->type='a';	
	return PageConstructor::constructor_form_add((object)$forma);
	}		
function registration($paket)
	{
	$paket=json_decode($paket);
	$paket->name=work_bd::check_in($paket->name);	
	$paket->soname=work_bd::check_in($paket->soname);	
	$paket->email=work_bd::check_in($paket->email);	
	$paket->password=work_bd::check_in($paket->password);	
	$paket->sex=work_bd::check_in($paket->sex);	
	$paket->year_brith=work_bd::check_in($paket->year_brith);	
	$paket->montch_brith=work_bd::check_in($paket->montch_brith);	
	$paket->date_brith=work_bd::check_in($paket->date_brith);	
	work_bd::connect_bd();	
	$input->status="no";
	$input->err='';
	if(!preg_match("/[а-я]/i", $paket->name) || mb_strlen($paket->name)<2)
		$input->err.="Имя введено не коректно!</br>";
	if(!preg_match("/[а-я]/i", $paket->soname) || mb_strlen($paket->soname)<2)
		$input->err.="Фамилия введена не коректно</br>";
	if(!filter_var($paket->email, FILTER_VALIDATE_EMAIL))
		$input->err.="Эл.почта введена не коректно!</br>";
	else
		{
		if($this->check_login($paket->email))
			$input->err.="Пользователь с такой эл.почтой уже зарегистрирован!</br>";
		}
	if($paket->password=="")
		$input->err.="Пароль введен не коректно!</br>";
	elseif(mb_strlen($paket->password)<5)
		$input->err.="Пароль должен быть больше пяти симбволов!</br>";		
	if($paket->sex!="m" and $paket->sex!="f")
		$input->err.="Выберите пол!</br>";
	if(!checkdate($paket->montch_brith, $paket->date_brith, $paket->year_brith))
		$input->err.="Дата введена не коректно!</br>";
	else
		$date_brith=$paket->year_brith.'-'.$paket->montch_brith.'-'.$paket->date_brith;
	if($_SESSION['capthaid']!=$paket->captcha)
		$input->err.="Код с картинки введен не коректно!</br>";
	if($input->err=='')
		{
		$salt=md5(substr(uniqid().time(),0,10));
		$query_id=md5(uniqid().time());
		$password_bd=md5(md5($salt.$paket->password."systemsaitix"));
		//$new_key=substr(md5(md5(rand(10,99).time().uniqid())),0,20);
		//$input->err=$salt."=".$password_bd."=".$new_key."=".$query_id;
		$add_new_user=mysql_query('Insert into users values (0,"'.$paket->email.'","'.$password_bd.'","'.$salt.'",-1,"'.$_SERVER["REMOTE_ADDR"].'","'.work_bd::date_time_bd().'")');
		//$add_new_user=true;
		if($add_new_user)
			{
			$user_id=mysql_insert_id();
			$add_inf_user=mysql_query('Insert into users_inf values (0,"'.$user_id.'","'.$paket->name.'","'.$paket->soname.'","","'.$date_brith.'","'.($paket->sex=="m"?2:1).'","","'.$paket->email.'")');
			$add_new_query_autorization=mysql_query('Insert into authorization_query values (0,1,"'.$query_id.'","'.$user_id.'","'.work_bd::date_time_bd().'")');
			$mail->email=$paket->email;
			$mail->soname=$paket->soname;
			$mail->name=$paket->name;
			$mail->query=$query_id;
			$mail->type=1;
			//$add_new_query_autorization=true;
			if($add_new_query_autorization && $this->sendmails($mail))
				{
				$input->status="ok";
				$input->div='<div id="successful_div">Вы зарегистрировались на портале!
				Для активации аккаунта перейдите по ссылке из эл.почты <a href="/gkh/">На главную</a></div>';
				}
			}
		else
			$input->err.="База данных временно не доступна...</br>";	
		}
	work_bd::disconnect_bd();
	return json_encode($input);
	}
function check_login($login)
	{
	$q=mysql_result(mysql_query('Select count(*) from users where login="'.$login.'"'),0);
	return ($q>0?true:false);
	}
function sendmails($paket)
	{
	$server_ip=$_SERVER['SERVER_ADDR'];
	$headers  = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: ЖилКомХоз <saitixdev@gmail.com>\r\n";
	$subject=($paket->type==1?'Активация':'Восстановление')." аккаунта на портале ЖилКомХоз";
	$message='<html>
    <head>
        <title>'.($paket->type==1?'Активация':'Восстановление').' аккаунта на портале ЖилКомХоз</title>
    </head>
    <body>
    Здравствуйте '.$paket->soname.' '.$paket->name.'! </br>';
    if($paket->type==1 || $paket->type==3)
		$message.='Для '.($paket->type==1?'активации':'восстановления').' аккаунта перейдите по ссылке: <a href="http://'.$server_ip.'/gkh/активация/'.$paket->query.'">http://'.$server_ip.'/gkh/активация/'.$paket->query.'</a>';
	elseif($paket->type==2)
		$message.='Ваш новый пароль для входа на портал:'.$paket->password;
    $message.='</body>
</html>';
	if(mail($paket->email,$subject,$message,$headers))
		return true;
	else
		return false;	
	}
function activaited_account($query)
	{
	work_bd::connect_bd();
	$q=mysql_fetch_array(mysql_query('Select * from authorization_query where query="'.work_bd::check_in($query).'"'));
	if($q['id']!='')
		{
		if($q['type']==1)
			{
			$update_user=mysql_query('Update users set permission=1 where id="'.$q['user_id'].'"');
			if($update_user)
				{
				$del_q=mysql_query('Delete from authorization_query where id="'.$q['id'].'"');	
				return '<div id="successful_div">Ваш аккаунт активирован!</br><a href="/gkh/вход">Войти на портал</a></div>';
				}
			else 
				return '<div id="successful_div">Ссылки не существует...</br><a href="/gkh/">На главную</a></div>';	
			}
		elseif($q['type']==2) 
			{
			$new_password=substr(md5(substr(uniqid().time(),0,10)),0,6);
			$salt=md5(substr(uniqid().time(),0,10));
			//$query_id=md5(uniqid().time());
			$password_bd=md5(md5($salt.$new_password."systemsaitix"));
			//$new_key=substr(md5(md5(rand(10,99).time().uniqid())),0,20);
			$update_user=mysql_query('Update users set password="'.$password_bd.'",salt="'.$salt.'" where id="'.$q['user_id'].'"');
			$mail->type=2;
			$user=mysql_fetch_array(mysql_query('Select * from users_inf where user_id="'.$q['user_id'].'"'));
			$mail->email=$user['email'];
			$mail->soname=$user['soname'];
			$mail->name=$user['name'];
			$mail->password=$new_password;
			if($update_user && autorizLib::sendmails($mail))
				{
				$del_q=mysql_query('Delete from authorization_query where id="'.$q['id'].'"');	
				return '<div id="successful_div">Ваш новый пароль выслан на эл.почту !</br><a href="/gkh/вход">Войти на портал</a></div>';
				}
			else 
				return '<div id="successful_div">Ссылки не существует...</br><a href="/gkh/">На главную</a></div>';		
			}	
		}
	else
		return '<div id="successful_div">Ссылки не существует...</br><a href="/gkh/">На главную</a></div>';
		work_bd::disconnect_bd();		
	//return '<div id="successful_div">Ваш аккаунт активирован!</br><a href="/gkh/вход">Войти на портал</a></div>';
	}
function recoverypassword($paket)
	{
	$paket=json_decode($paket);
	$paket->email=work_bd::check_in($paket->login);	
	work_bd::connect_bd();	
	$input->status="no";
	$input->err='';
	if(!filter_var($paket->email, FILTER_VALIDATE_EMAIL))
		$input->err.="Эл.почта введена не коректно!</br>";
	else
		{
		if(!$this->check_login($paket->email))
			$input->err.="Пользователь с такой эл.почтой не зарегистрирован!</br>";
		}
	if($_SESSION['capthaid']!=$paket->captcha)
		$input->err.="Код с картинки введен не коректно!</br>";	
	if($input->err=='')
		{
		$user_id=mysql_result(mysql_query('Select id from users where login="'.$paket->email.'"'),0);
		$user=mysql_fetch_array(mysql_query('Select * from users_inf where user_id="'.$user_id.'"'));
		$query_id=md5(uniqid().time());
		$add_new_query_autorization=mysql_query('Insert into authorization_query values (0,2,"'.$query_id.'","'.$user['user_id'].'","'.work_bd::date_time_bd().'")');
		$mail->email=$user['email'];
		$mail->soname=$user['soname'];
		$mail->name=$user['name'];
		$mail->query=$query_id;
		$mail->type=3;
		if($add_new_query_autorization && $this->sendmails($mail))
			{
			$input->status="ok";
			$input->div='<div id="successful_div">
			Для восстановления пароля от аккаунта перейдите по ссылке из эл.почты</br><a href="/gkh/">На главную</a></div>';
			}
		else
			$input->err.="База данных временно не доступна...</br>";	
		}
	work_bd::disconnect_bd();
	return json_encode($input);
	}
function autorization($paket)
	{
	$paket=json_decode($paket);
	$paket->email=work_bd::check_in($paket->login);	
	$paket->password=work_bd::check_in($paket->password);
	$paket->captcha=work_bd::check_in($paket->captcha);
	$input->status="no";
	$input->err='';
	work_bd::connect_bd();
	if(!filter_var($paket->email, FILTER_VALIDATE_EMAIL))
		$input->err.="Эл.почта введена не коректно!</br>";
	else
		{
		if(!$this->check_login($paket->email))
			$input->err.="Пользователь с такой эл.почтой не зарегистрирован!</br>";
		}
	if($paket->password=="")
		$input->err.="Введите пароль!</br>";	
	if($_SESSION['captcha_count']>3)
		if($_SESSION['capthaid']!=$paket->captcha)
			$input->err.="Код с картинки введен не коректно!</br>";	
	if($input->err=='')
		{
		$salt=mysql_result(mysql_query('Select salt from users where login="'.$paket->email.'"'),0);
		$pass=md5(md5($salt.($paket->password)."systemsaitix"));
		$q=mysql_query('Select id,permission from users where password="'.$pass.'" and login="'.$paket->email.'"');
		if(mysql_num_rows($q)>0)
			{
			if(mysql_result($q,0,'permission')=='-1')
				$input->err.="Вам необходимо активировать аккаунт!</br>";	
			else
				{
				$id_u=mysql_result($q,0);	
				$new_key=substr(md5(md5(rand(10,99).time().uniqid().$_SERVER["REMOTE_ADDR"])),0,20);	
	       		$update_user=mysql_query("UPDATE users SET last_date='".work_bd::date_time_bd()."',last_ip='".$_SERVER["REMOTE_ADDR"]."' WHERE id='".$id_u."'");
	       		$ins_session=mysql_query('Insert into session_a values ("'.$new_key.'","'.$id_u.'","'.session_id().'","'.$_SERVER["REMOTE_ADDR"].'","'.work_bd::date_time_bd().'")');
	       		SetCookie("key_aut_clients",substr(md5(rand(100,500)),0,3).$new_key.substr(rand(100,999),0,3),time()+1296000,"/gkh/");//Генерим нову
				$_SESSION['captcha_count']=0;	
	       		$_SESSION['key_a_clients']=$new_key;
				$input->status="ok";
				}
			}
		else
			$input->err.="Эл.почта и пароль введены не коректно!</br>";
		}
	if($input->err!='')
		{
		if($_SESSION['captcha_count']=="")
			$_SESSION['captcha_count']=1;
		else
			$_SESSION['captcha_count']++;
		}				
	if($_SESSION['captcha_count']>3)
		$input->captcha=true;	
	//$input->err.=$pass;
	work_bd::disconnect_bd();
	return json_encode($input);	
	}
function logoff()
	{
	work_bd::connect_bd();
	if($_SESSION['key_a_clients']!="")
		$del_s=mysql_query('Delete from session_a where key_a="'.$_SESSION['key_a_clients'].'"');
	SetCookie("key_aut_clients","",0,"/gkh/");
	$_SESSION['key_a_clients']="";
	session_destroy();
	work_bd::disconnect_bd();
	header('location:'.$this->dop);
	return true;
	}					
}
$autorization=new autorizLib;
if($_POST['query']=="on_reg")
	echo $autorization->registration($_POST['paket']);
if($_POST['query']=="on_rec")
	echo $autorization->recoverypassword($_POST['paket']);
if($_POST['query']=="on_logon")
	echo $autorization->autorization($_POST['paket']);
if($_POST['query']=="off_logon")
	$autorization->logoff();
?>