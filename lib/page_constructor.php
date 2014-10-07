<?
if(!isset($_SESSION))session_start();
include_once('lib_bd.php');
class PageConstructor extends work_bd
{
//Трансформер адреса
function transform_adrr($adrr)
	{
	$adrr=urldecode($adrr);
	$adrr=str_replace(' ',"",$adrr);
	$adrr=mb_substr($adrr,iconv_strlen($this->dop));
	return $adrr;
	}
//Глобальная статистика новых уведомлений	
function global_new_statistic()
	{	
	$obj_stat->message=0;//новые сообщения
	$obj_stat->news=0;//новые новости
	$obj_stat->qq=0;//открытые вопросы	
	$obj_stat->uk_qq=0;//вопросы представителю ук	
	$obj_stat->uk_ap=0;//заявки представителю ук	
	$obj_stat->ogv_qq=0;//вопросы представителю огв	
	$obj_stat->slug_qq=0;//вопросы представителю служб !	
	$obj_stat->notice=0;//уведомления
	$obj_stat->notice_notebook=0;//уведомления зап книжки
	$obj_stat->d_t=time();//время метки	
	return $obj_stat;	
	}			
//Главная страничка	
function display_index_page($adress,$param='')
	{
	//echo 'display_index_lk_page';
	$adress=($adress==''?'index':$adress);
	$ar_title=array('index'=>'Главная','регистрация'=>'Регистрация','вход'=>'Вход','восстановление_пароля'=>'Восстановление пароля','активация'=>'Активация');	
	$menu_i=array(array('name'=>'Люди','uri'=>'поиск'),array('name'=>'УК/ТСЖ','uri'=>'поиск'),array('name'=>'Компании','uri'=>'поиск'));
	include_once('lib/logon_lib.php');
	if($this->check_access())
		{$menu_i[]=array('name'=>'Личный кабинет','uri'=>'личный_кабинет');$menu_i[]=array('name'=>'Выход','uri'=>'выход');}
	else
		{$menu_i[]=array('name'=>'Вход','uri'=>'вход');$menu_i[]=array('name'=>'Регистрация','uri'=>'регистрация');}		
	$page->title='ЖилКомХоз | '.$ar_title[$adress];
	$page->content='ЖилКомХоз | '.$ar_title[$adress];
	$page->header='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style.css" />
	<!--[if IE]><link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style-ie.css" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style-ie6.css" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style-ie7.css" /><![endif]-->
	<script type="text/javascript" src="'.$this->dop.'js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="'.$this->dop.'js/f.js"></script>
	<script type="text/javascript" src="'.$this->dop.'js/chosen.jquery.js"></script>';
	switch($adress)
		{
		case 'активация':
			{
			include_once('lib/logon_lib.php');
			$page->content='<div class="l-page-holder"><div class="l-page-left">&nbsp;</div><div class="l-page-right">&nbsp;</div>
				<div class="l-page-content">
				<div class="l-content b-content">
				</div>'.autorizLib::activaited_account($param).'</div>';	
			}	
		break;	
		case 'index':
			{
			$page->header.='<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
				<script type="text/javascript" src="js/index_lib.js"></script>';
			include_once('lib/article.php');
			include_once('lib/map.php');
			$page->content='<div class="l-page-holder">'.Articles::show_index_shot_article().'<div class="l-page-content">
				<div class="l-content b-content">'.Maps::show_indexes_container(10).''.Articles::show_index_big_article(10).'</div></div>';
			}
			break;
		case 'вход':
			{
			if($this->check_access())
				header('location:'.$this->dop.'личный_кабинет');
			else
				{
				include_once('lib/logon_lib.php');	
				$menu_i[3]['activ']=true;
				$page->header.='<script type="text/javascript" src="js/logon.js"></script>';
				$page->content='<div class="l-page-holder"><div class="l-page-left">&nbsp;</div><div class="l-page-right">&nbsp;</div>
				<div class="l-page-content">
				<div class="l-content b-content">
				</div>'.autorizLib::show_index_entering().'</div>';
				}
			}
			break;
		case 'регистрация':
			{
			include_once('lib/logon_lib.php');	
			$menu_i[4]['activ']=true;
			$page->header.='<script type="text/javascript" src="js/logon.js"></script>';
			$page->content='<div class="l-page-holder"><div class="l-page-left">&nbsp;</div><div class="l-page-right">&nbsp;</div>
				<div class="l-page-content">
				<div class="l-content b-content">
				</div>'.autorizLib::show_index_reg().'</div>';
			}
			break;
		case 'восстановление_пароля':
			{
			include_once('lib/logon_lib.php');	
			$menu_i[3]['activ']=true;
			$page->header.='<script type="text/javascript" src="js/logon.js"></script>';
			$page->content='<div class="l-page-holder"><div class="l-page-left">&nbsp;</div><div class="l-page-right">&nbsp;</div>
				<div class="l-page-content">
				<div class="l-content b-content">
				</div>'.autorizLib::show_index_recovery().'</div>';
			}
			break;
		case 'выход':
			{
			include_once('lib/logon_lib.php');
			autorizLib::logoff();	
			}			
		}
	$page->menu='<div class="l-page"><div class="l-header"><div class="l-header-holder"><div class="b-header-logo"><a href="'.$this->dop.'">ЖилКомХоз</a></div>
				<div class="b-header-menu g-menu">
					<ul>';
					$i_1=0;
					foreach ($menu_i as $key=>$value) 
						{
						$page->menu.='<li><a href="'.$this->dop.$value['uri'].'"'.($value['activ']?'class="active"':'').'>'.$value['name'].'</a></li>';
						if($i_1==2)
							$page->menu.='<li class="search">
							<div class="b-header-search">
								<form action="'.$this->dop.'поиск" method="post">
									<label for="i-input-search">Поиск</label>
									<input id="i-input-search" class="input g-input-undo-label" type="text" name="q" value="" maxlength="50" autocomplete="off" />
									<input class="submit" name="s" type="submit" value="Поиск" />
								</form>
							</div>
						</li>';
						$i_1++;	
						}
				$page->menu.='</ul></div></div></div>';	
	//var_dump($menu_i);
	return $page;	
	}
//Личные странички	
function display_lk_page($adress,$param='')
	{
	if($this->check_access())
		{
		include_once('lib/social_lib.php');
		if($this->count_str_mysql('additional_inf_users','users_id="'.$this->global_user_id.'"')==0)
			{
			$adress='редактирование_профиля';
			$page->content='Чтобы использование системы было полноценно</br> необходимо ввести данные!';
			}
		$ar_title=array('личный_кабинет'=>'Личный кабинет','редактирование_профиля'=>'Редактирование профиля');
		$obj_stat=$this->global_new_statistic();
		$page->title='ЖилКомХоз | '.$ar_title[$adress];
		$page->header='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		<link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style.css" />
		<!--[if IE]><link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style-ie.css" /><![endif]-->
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style-ie6.css" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="'.$this->dop.'css/style-ie7.css" /><![endif]-->
		<script type="text/javascript" src="'.$this->dop.'js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="'.$this->dop.'js/chosen.jquery.min.js"></script>
		<script type="text/javascript" src="'.$this->dop.'js/jquery.tipTip.js"></script>
		<link rel="stylesheet" type="text/css" href="'.$this->dop.'css/modules/tipTip.css"/>
		<script type="text/javascript" src="'.$this->dop.'js/jquery.raty.js"></script>
		<script type="text/javascript" src="'.$this->dop.'js/f.js"></script>
		<script type="text/javascript" src="'.$this->dop.'js/lic.js"></script>';
		$face=social_logic::shot_inf_face();
		$obj_stat=$this->global_new_statistic();
		$page->menu='<div class="l-page">
		<div class="l-header">
			<div class="l-header-holder">
				<div class="b-header-logo">
					<a href="'.$this->dop.'">ЖилКомХоз</a>
				</div>
				<div class="b-header-personal">
					<div class="b-header-personal_user">
						<div class="b-header-personal_user_pic">
							<a href="id'.$face->id.'"><img src="'.$face->img.'" alt="" style="width: 26px; height: 26px;" /></a>
						</div>
						<div class="b-header-personal_user_name">
							'.$face->name.' '.$face->soname.'
						</div>
					</div>
					<div class="b-header-personal_search">
						<div class="b-header-search b-header-search_mini">
							<form action="03.html" method="get">
								<label for="i-input-search">Поиск</label>
								<input id="i-input-search" class="input g-input-undo-label" type="text" name="q" value="" maxlength="50" autocomplete="off" />
								<input class="submit" name="s" type="submit" value="Поиск" />
							</form>
						</div>
					</div>
					<div class="b-header-personal_menu g-menu">
						<ul>
							<li><a href="14.html">Открытые вопросы'.($obj_stat->qq>0?'<span class="g-info-num">'.$obj_stat->qq.'</span>':'').'</a></li>
							<li><a href="26.html">Сообщения'.($obj_stat->qq>0?'<span class="g-info-num">'.$obj_stat->message.'</span>':'').'</a></li>
							<li><a href="24.html">Уведомления'.($obj_stat->notice>0?'<span class="g-info-num">'.$obj_stat->notice.'</span>':'').'</a></li>
							<li><a href="19.html">Новости'.($obj_stat->news>0?'<span class="g-info-num">'.$obj_stat->news.'</span>':'').'</a></li>
						</ul>
					</div>
					<div class="b-header-personal_exit">
						<a href="'.$this->dop.'выход">Выход</a>
					</div>
				</div>
			</div>
		</div>';
		switch($adress)
		{
		case 'редактирование_профиля':
			{
			$page->header.='<script type="text/javascript">var js_token="'.$this->new_js_token().'bf1"</script>
			<script type="text/javascript" src="'.$this->dop.'js/secretlib/files_lib.js"></script>
			<script type="text/javascript" src="'.$this->dop.'js/secretlib/big_form.js"></script>';	
			$page->content.=social_logic::show_form_edit_profile();	
			}
		break;
		case 'личный_кабинет':
			{}
		break;		
		}
		$page->content='<div class="l-page-holder">
				<div class="l-page-left">
				<div class="b-panel-zkh g-border-grey g-border-radius">
				<div class="b-panel-zkh_holder">
				'.social_logic::show_global_rating().'
				'.social_logic::show_friends().'
				<div class="b-panel-zkh_dopmenu g-menu">
							<ul>
							<li class="notebook"><a href="27.html">Записная книжка</a>'.($obj_stat->notice_notebook>0?'<span class="g-info-num">'.$obj_stat->notice_notebook.'</span>':'').'</li>
							<li>
								<a href="11.html">Навигатор по ЖКХ</a>
								<ul class="b-submenu">
									<li><a href="12.html"><span class="b-ico-5 g-ico"></span>Календарь событий</a></li>
									<li><a href="14.html"><span class="b-ico-6 g-ico"></span>'.($obj_stat->uk_ap>0?'<span class="g-info-num">'.$obj_stat->uk_ap.'</span>':'').'Заявки по общедомовому имуществу</a></li>
									<li><a href="14.html"><span class="b-ico-7 g-ico"></span>'.($obj_stat->uk_qq>0?'<span class="g-info-num">'.$obj_stat->uk_qq.'</span>':'').'Вопрос представителю УК/ТСЖ</a></li>
									<li><a href="14.html"><span class="b-ico-7 g-ico"></span>'.($obj_stat->ogv_qq>0?'<span class="g-info-num">'.$obj_stat->ogv_qq.'</span>':'').'Вопросы представителю ОГВ</a></li>
									<li><a href="16.html"><span class="b-ico-8 g-ico"></span>Информация</a></li>	
									<li><a href="25.html"><span class="b-ico-8 g-ico"></span>Общая информация</a></li>	
								</ul>
							</li>
							<li><a href="09.html">Онлайн-карта ЖКХ</a></li>
							<li><a href="23.html">Написать статью</a></li>
							<li><a href="21.html">Мои файлы</a></li>
						</ul>
				</div>
				</div>
				</div>
				</div>
			<div class="l-page-right">
				<div class="b-moderator-button g-border-radius">
					<a href="mod.html">Написать модератору</a>
				</div>
				<div class="b-infopic">
					<img src="img/tmp/b01.png" alt="" />
				</div>
				<div class="b-infopic">
					<img src="img/tmp/b02.png" alt="" />
				</div>
				<div class="b-infopic">
					<img src="img/tmp/b03.png" alt="" />
				</div>

			</div>
			<div class="l-page-content">
				<div class="l-content b-content">
				'.$page->content.'
				</div>
			</div><div class="g-clean"></div></div>';	
		return $page;
		}
	else
		header('location:'.$this->dop);		
	}
//Генерация странички
function page_generator($adress)
	{
	$adress=$this->transform_adrr($adress);
	//Проверяем смотрим что грузить итд.
	if($adress=='index' || $adress=='' || $adress=='регистрация' || $adress=="вход" || $adress=="восстановление_пароля" || $adress=="выход" || $adress=="поиск")
		$page=$this->display_index_page($adress);
	elseif(preg_match("/^активация\/([a-z0-9]+)$/",$adress,$math))
		$page=$this->display_index_page('активация',$math[1]);
	elseif($adress=='личный_кабинет' || $adress=='редактирование_профиля' || $adress=='личные_сообщения')
		$page=$this->display_lk_page($adress);
	else 
		$page->content='404';
	//$page->content.=$adress;
	return $page;
	}
function constructor_form_add($obj)
	{
	$form.=(($obj->big_title)?'<h1>'.$obj->big_title.'</h1>':'');//если есть большой заголовк	
	$form.='<div class="b-form">';//div начала формы
	$form.=(($obj->title)?'<h4>'.$obj->title.'</h4>':'');//заголовок внутри формы	
	$form.='<form onsubmit="'.$obj->onsubmit.'()">';//сама htm форма
	foreach($obj->area as $key_ar=>$area)//обход пространств формы
		{
		$area=(object)$area;
		$form.=(($area->title)?'<h4>'.$area->title.'</h4>':'');//если есть заголовк внутри формы
		$form.=(($area->title2)?'<h5 style="margin-top: 30px;">'.$area->title2.'</h5>':'');//если есть заголовк внутри формы
		$form.='<div class="b-form_'.(($area->type)?$area->type:'area').'  g-border-radius" '.(($area->id)?'id="'.$area->id.'"':'').'>';//начало внутренненго разделителя если буттон то другое
		foreach ($area->element as $key => $v)//перебираем элементы разделителя 
			{
			$v=(object)$v;
			$form.='<div class="'.($v->type=='a'?'b-board-list_more':($area->type=='captcha'?'b-form_captcha_item':'b-form_item b-form_item_'.(($v->type_c)?$v->type_c:'text'))).'" '.(($v->type_s)?'style="'.$v->type_s.'"':'').'>';//если ссылка то другое
			$form.=(($v->label&&$v->global_type!='radio')?'<div class="b-form_item_label"><label for="'.$v->id.'">'.$v->label.'</label></div>':'');//если есть лэйбл
			$in='id="'.$v->id.'" '.(($v->onclick)?'onclick="'.$v->onclick.'(\''.$obj->page.'\')"':'').' '.(($v->onclick_f)?'onclick="'.$v->onclick_f.'"':'').' '.(($v->style)?'style="'.$v->style.'"':'');//формируем параметры
			if(!$v->global_type || $v->global_type=='input')//просто инпут
				$form.='<div class="b-form_'.($area->type=='captcha'?'captcha_':'').'item_field g-border-radius"><input type="'.(($v->type)?$v->type:'text').'" '.$in.' '.(($v->value)?'value="'.$v->value.'"':'').'></div>';
			elseif($v->global_type=='bthday_select')
				{
				$montch=array("","Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");	
				$form.='<div class="b-form_item_field">
				<select data-placeholder="День" class="chosen-select-deselect" id="date_'.$v->id.'" style="width: 85px;">
										<option value=""></option>';
											foreach (range(1,31) as $v1): $form.='<option value="'.$v1.'">'.$v1.'</option>'; endforeach;
										$form.='</select>
										<select data-placeholder="Месяц" class="chosen-select-deselect" id="montch_'.$v->id.'" style="width: 85px;">';
											foreach ($montch as $vv1=>$v1): $form.='<option value="'.$vv1.'">'.$v1.'</option>'; endforeach;
										$form.='</select>
										<select data-placeholder="Год" class="chosen-select-deselect" id="year_'.$v->id.'" style="width: 85px;">
											<option value=""></option>';	
											foreach (range(1940,1994) as $v1): $form.='<option value="'.$v1.'">'.$v1.'</option>'; endforeach;
										$form.='</select>
									</div>';
				}
			elseif($v->global_type=='input_a')
				{
				$form.='<div class="b-form_item_field g-border-radius"><input type="'.(($v->type)?$v->type:'text').'" '.$in.' '.(($v->value)?'value="'.$v->value.'"':'').'></div>
				</div><div class="b-form_item b-form_item_select" id="'.$v->id.'_a";><div class="b-form_item_field"><select data-placeholder="Доступ" class="chosen-select-deselect"  style="width: 130px;">
				<option value=""></option>
				<option value="1">Никому нет доступа</option>
				<option value="2" selected>Всем есть доступ</option>
				</select>
				</div>';
				}
			elseif($v->global_type=='select')
				{
				$form.='<div class="b-form_item_field"><select data-placeholder="'.$v->palceholder.'" '.$in.' class="chosen-select-deselect">
						<option value=""></option>';
						foreach ($v->options as $k=>$v): echo '<option value="'.$k.'" '.($v->value==$k?'selected ':'').'>'.$v.'</option>'; endforeach;
						$form.'</select>
						</div';
				}
			elseif($v->global_type=='a')
				$form.='<a href="'.$v->uri.'" '.$in.'>'.$v->value.'</a>';	
			elseif($v->global_type=='div')
				$form.='<div '.$in.'>'.$v->value.'</div>';	
			elseif($v->global_type=='textarea')
				$form.='<div class="b-form_item_field g-border-radius"><textarea '.$in.'></textarea></div>';
			elseif($v->global_type=='file'){
				$form.='<div class="b-form_item_files"><div class="b-form_item_files_item">';
				$form.='</div></div>';
				$form.='<div class="b-form_item_field"><a class="g-button" href="#" '.$in.'>'.$v->value.'</a></div>';}									
			elseif ($v->global_type=='radio' || $v->global_type=='checkbox') 
				$form.='<input type="'.$v->global_type.'" value="'.$v->value.'" name="'.$v->name.'" id="'.$v->id.'" /><label for="'.$v->id.'">'.$v->label.'</label>';
			$form.='</div>';							
			$form.=(($v->cl_n)?'':'<div class="g-clean"></div>');//если перенос не нужен
			unset($in);	
			}
		$form.='</div>';
		}
	//Кнопочке....
	if($obj->button_off){
	$form.='<div class="b-form_button"><span id="error_report"></span>';
	foreach ($obj->button_off as $v_b) 
		{
		if($v_b->type=='')
			$form.='<input class="g-button" name="submit" type="submit" id="'.$v_b->id.'" value="'.$v_b->value.'">';
		elseif($v_b->type=='a')
			$form.='<a href="'.$v_b->uri.'">'.$v_b->value.'</a>';
		if($v_b->type=='div')
			$form.='<div id="'.$v_b->id.'">'.$v_b->value.'</div>';
		}
		$form.='</div>';}
	return $form.'</form></div>';
	}	
function test_load($value)
	{
	//var_dump($value);	
	return 'Page_constructor sacessful loading...';	
	}		
function constructor_form_redact($obj)
	{
	$this->connect_bd();
	$form.=(($obj->big_title)?'<h1>'.$obj->big_title.'</h1>':'');//если есть большой заголовк	
	$form.='<div class="b-form">';//div начала формы
	$form.=(($obj->title)?'<h4>'.$obj->title.'</h4>':'');//заголовок внутри формы	
	$form.='<form onsubmit="'.$obj->onsubmit.'()">';//сама htm форма
	foreach($obj->area as $key_ar=>$area)//обход пространств формы
		{
		$area=(object)$area;
		if($area->bd!='')
			{
			$q=mysql_query('Select * from '.$area->bd.''.(($area->bd_dop)?' where '.$area->bd_dop:'').' limit 0,1');
			$bd_v=mysql_fetch_assoc($q);
			//var_dump('Select * from '.$area->bd.''.(($area->bd_dop)?' where '.$area->bd_dop:'').' limit 0,1');
			}
		if($area->hide)
			{$area->style.='display:none';$area->tlstyle.='display:none';$area->astyle.='display:none';}	
		$form.=(($area->dop_id)?'<div id="'.$area->dop_id.'">':'');
		$form.=(($area->title)?'<h4 '.(($area->id)?'id="title_'.$area->id.'"':'').' '.(($area->tlstyle)?'style="'.$area->tlstyle.'"':'').'>'.$area->title.'</h4>':'');//если есть заголовк внутри формы
		$form.=(($area->title2)?'<h5 style="margin-top: 30px;">'.$area->title2.'</h5>':'');//если есть заголовк внутри формы
		if($area->element)$form.='<div class="b-form_'.(($area->type)?$area->type:'area').'  g-border-radius" '.(($area->id)?'id="'.$area->id.'"':'').' '.(($area->style)?'style="'.$area->style.'"':'').'>';//начало внутренненго разделителя если буттон то другое
		foreach ($area->element as $key => $v)//перебираем элементы разделителя 
			{
			$v=(object)$v;
			$form.='<div class="'.($v->type=='a'?'b-board-list_more':($area->type=='captcha'?'b-form_captcha_item':'b-form_item b-form_item_'.(($v->type_c)?$v->type_c:'text'))).'" '.(($v->type_s)?'style="'.$v->type_s.'"':'').'>';//если ссылка то другое
			$form.=(($v->label&&$v->global_type!='radio')?'<div class="b-form_item_label"><label for="'.$v->id.'">'.$v->label.'</label></div>':'');//если есть лэйбл
			$in=''.(($v->name)?'name="'.$v->name.'" ':'').'id="'.$v->id.'" '.(($v->onclick)?'onclick="'.$v->onclick.'(\''.$obj->page.'\')"':'').' '.(($v->onclick_f)?'onclick="'.$v->onclick_f.'"':'').' '.(($v->style)?'style="'.$v->style.'"':'').''.(($v->disable)?' disabled':'');//формируем параметры
			if(!$v->global_type || $v->global_type=='input')//просто инпут
				$form.='<div class="b-form_'.($area->type=='captcha'?'captcha_':'').'item_field g-border-radius"><input autocomplete="off" type="'.(($v->type)?$v->type:'text').'" '.$in.' value="'.(($v->value)?$v->value:$bd_v[$v->id]).'"></div>';
			elseif($v->global_type=='bthday_select')
				{
				$bd_v[$v->id]=explode('-',$bd_v[$v->id]);	
				$montch=array("","Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");	
				$form.='<div class="b-form_item_field">
				<select data-placeholder="День" class="chosen-select-deselect" id="date_'.$v->id.'" style="width: 85px;">
										<option value=""></option>';
											foreach (range(1,31) as $v1): $form.='<option value="'.$v1.'" '.($v1==(int)$bd_v[$v->id][1]?'selected':'').'>'.$v1.'</option>'; endforeach;
										$form.='</select>
										<select data-placeholder="Месяц" class="chosen-select-deselect" id="montch_'.$v->id.'" style="width: 85px;">';
											foreach ($montch as $vv1=>$v1): $form.='<option value="'.$vv1.'" '.($vv1==(int)$bd_v[$v->id][1]?'selected':'').'>'.$v1.'</option>'; endforeach;
										$form.='</select>
										<select data-placeholder="Год" class="chosen-select-deselect" id="year_'.$v->id.'" style="width: 85px;">
											<option value=""></option>';	
											foreach (range(1940,1994) as $v1): $form.='<option value="'.$v1.'" '.($v1==(int)$bd_v[$v->id][0]?'selected':'').'>'.$v1.'</option>'; endforeach;
										$form.='</select>
									</div>';
				}
			elseif($v->global_type=='input_a')
				{
					$form.='<div class="b-form_item_field g-border-radius"><input type="'.(($v->type)?$v->type:'text').'" '.$in.' '.(($v->value)?'value="'.$v->value.'"':'').'></div>
				</div><div class="b-form_item b-form_item_select" id="'.$v->id.'_a";><div class="b-form_item_field"><select data-placeholder="Доступ" class="chosen-select-deselect"  style="width: 130px;">
				<option value=""></option>
				<option value="1">Никому нет доступа</option>
				<option value="2" selected>Всем есть доступ</option>
				</select>
				</div>';
				}
			elseif($v->global_type=='select')
				{
				//var_dump($v->options);
				$selected=(($v->value)?$v->value:($v->in_bd?mysql_result(mysql_query('Select '.($v->name?$v->name:$v->id).' from '.$v->in_bd->bd.' where '.$v->in_bd->usl)):$bd_v[$v->id]));
				$form.='<div class="b-form_item_field">
				<select data-placeholder="'.$v->palceholder.'" '.$in.' class="chosen-select-deselect"> 
						<option value=""></option>';
						if($v->op_t=='obj')
							foreach ($v->options as $v): $form.='<option value="'.$v['value'].'" '.($selected==$v['value']?'selected ':'').'>'.$v['name'].'</option>'; endforeach;
						else
							foreach ($v->options as $k=>$v): $form.='<option value="'.$k.'" '.($selected==$k?'selected ':'').'>'.$v.'</option>'; endforeach;
						$form.='</select></div>';
				}
			elseif($v->global_type=='a')
				$form.='<a href="'.$v->uri.'" '.$in.'>'.$v->value.'</a>';	
			elseif($v->global_type=='div')
				$form.='<div '.$in.'>'.$v->value.'</div>';	
			elseif($v->global_type=='textarea')
				$form.='<div class="b-form_item_field g-border-radius"><textarea '.$in.'>'.$bd_v[$v->id].'</textarea></div>';
			elseif($v->global_type=='file'){
				//если передан value то запросить айди и вписать если нет то нет
				$form.='<div class="b-form_item_files">
				<div class="b-form_item_files_item" id="I_'.$v->id.'">';
				//либо тип если есть....
				$f_q=mysql_query('Select id,name_in,type from files where name_in="'.$bd_v[$v->id].'"');
				while($f_v=mysql_fetch_object($f_q))
					{
					$form.='<span>'.($f_v->type==1?'<img src="'.$this->dop.'/usr/'.$this->global_user_id.'/'.$f_v->name_in.'"/>':$f_v->name_in).'<a href="dell_file(\''.$f_v->id.'\')">Удалить</a></span>';
					}
				//$form.='<span>Фотография.jpg</span><a href="#">Удалить</a>';
				$form.='</div></div>';
				$form.='<div class="b-form_item_field"><a class="g-button" onclick="$(\'#'.$v->id.'\').click(); return false;" href="#">'.$v->value.'</a>
				<input type="file" multiple="multiple" name="file" id="'.$v->id.'" style="display:none">
				</div>';}									
			elseif ($v->global_type=='radio' || $v->global_type=='checkbox') 
				$form.='<input type="'.$v->global_type.'" value="'.$v->value.'" name="'.$v->name.'" id="'.$v->id.'" /><label for="'.$v->id.'">'.$v->label.'</label>';
			$form.='</div>';
			$form.=(($area->dop_id)?'</div>':'');							
			$form.=(($v->cl_n)?'':'<div class="g-clean"></div>');//если перенос не нужен
			unset($in);	
			}
		if($area->element)$form.='</div>';
		if($area->bot_a)$form.='<div class="b-board-list_more" '.(($area->id)?'id="a_'.$area->id.'"':'').' '.(($area->astyle)?'style="'.$area->astyle.'"':'').'>
			<a '.(($area->bot_a->onclick)?'onclick="'.$area->bot_a->onclick.'(\'a_'.$area->id.'\')"':'').' '.(($area->bot_a->onclick_f)?'onclick="'.$area->bot_a->onclick_f.'"':'').' href="'.$area->bot_a->uri.'">'.$area->bot_a->name.'</a>
		</div>';
		}
		if($obj->button_off){
	$form.='<div class="b-form_button"><span id="error_report"></span>';
	foreach ($obj->button_off as $v_b) 
		{
		if($v_b->type=='')
			$form.='<input class="g-button" name="submit" type="submit" id="'.$v_b->id.'" value="'.$v_b->value.'">';
		elseif($v_b->type=='a')
			$form.='<a href="'.$v_b->uri.'">'.$v_b->value.'</a>';
		if($v_b->type=='div')
			$form.='<div id="'.$v_b->id.'">'.$v_b->value.'</div>';
		}
		$form.='</div>';}
		$this->disconnect_bd();	
	return $form.'</form></div>';
	}		
}
?>