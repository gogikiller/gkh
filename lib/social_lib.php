<?
if(!isset($_SESSION))session_start();
class social_logic
{
function shot_inf_face()
	{
	work_bd::connect_bd();
	$q=mysql_query('Select id,name,soname,img from users_inf where user_id="'.$this->global_user_id.'"');	
	$face=mysql_fetch_object($q);
	$face->img=($face->img==''?'tmp.png':$this->dop.'/usr/'.$this->global_user_id.'/a_'.$face->img);
	work_bd::disconnect_bd();
	// echo $_SESSION['key_a_clients'];
	// echo mysql_error();
	return $face;	
	}	
function show_friends()
	{
	return '<div class="b-panel-zkh_menu g-menu" id="i-panel-zkh_menu">
							<ul>
								<li><a href="17.html">Представители ОГВ<span class="num">3</span></a><span class="b-ico-4 g-ico" title="Представители органов государственной власти"></span>
									<ul>
										<li><a href="17.html">Василий Пупкин<span class="mar-g"></span></a></li>
										<li><a href="17.html">Константин Константинопольский<span class="mar-r"></span></a></li>
										<li><a href="17.html">Гоша Куценко<span class="mar-g"></span></a></li>
										<li><a href="17.html">Олимпиада Молодцова<span class="mar-g"></span></a></li>
										<li><a href="17.html">Владимир Владимиров<span class="mar-g"></span></a></li>
									</ul>
								</li>
								<li><a href="17.html">Представители УК/ТСЖ<span class="num">2</span></a><span class="b-ico-4 g-ico" title="Представители управляющей компании или товарищества собственников жилья"></span>
									<ul>
										<li><a href="17.html">Василий Пупкин<span class="mar-g"></span></a></li>
										<li><a href="17.html">Константин Константинопольский<span class="mar-r"></span></a></li>
										<li><a href="17.html">Гоша Куценко<span class="mar-g"></span></a></li>
										<li><a href="17.html">Олимпиада Молодцова<span class="mar-g"></span></a></li>
										<li><a href="17.html">Владимир Владимиров<span class="mar-g"></span></a></li>
									</ul>
								</li>
								<li><a href="#">Службы<span class="num">4</span></a><span class="b-ico-4 g-ico" title="Представители служб"></span>
									<ul>
										<li><a href="17.html">Василий Пупкин<span class="mar-g"></span></a></li>
										<li><a href="17.html">Константин Константинопольский<span class="mar-r"></span></a></li>
										<li><a href="17.html">Гоша Куценко<span class="mar-g"></span></a></li>
										<li><a href="17.html">Олимпиада Молодцова<span class="mar-g"></span></a></li>
										<li><a href="17.html">Владимир Владимиров<span class="mar-g"></span></a></li>
									</ul>
								</li>
								<li><a href="#">Соседи<span class="num">6</span></a><span class="b-ico-4 g-ico" title="Ваши соседи по дому"></span>
									<ul>
										<li><a href="17.html">Василий Пупкин<span class="mar-g"></span></a></li>
										<li><a href="17.html">Константин Константинопольский<span class="mar-r"></span></a></li>
										<li><a href="17.html">Гоша Куценко<span class="mar-g"></span></a></li>
										<li><a href="17.html">Олимпиада Молодцова<span class="mar-g"></span></a></li>
										<li><a href="17.html">Владимир Владимиров<span class="mar-g"></span></a></li>
									</ul>
								</li>
								<li>
									<a href="#">Друзья<span class="num">5</span></a><span class="b-ico-4 g-ico" title="Ваш список друзей"></span>
									<ul>
										<li><a href="17.html">Василий Пупкин<span class="mar-g"></span></a></li>
										<li><a href="17.html">Константин Константинопольский<span class="mar-r"></span></a></li>
										<li><a href="17.html">Гоша Куценко<span class="mar-g"></span></a></li>
										<li><a href="17.html">Олимпиада Молодцова<span class="mar-g"></span></a></li>
										<li><a href="17.html">Владимир Владимиров<span class="mar-g"></span></a></li>
									</ul>
								</li>
								<li>
									<a href="/">Товары и услуги<span class="num">999</span></a><span class="b-ico-4 g-ico" title="Компании и рекламные профили"></span>
									<ul>
										<li><a href="17.html">Василий Пупкин<span class="mar-g"></span></a></li>
										<li><a href="17.html">Константин Константинопольский<span class="mar-r"></span></a></li>
										<li><a href="17.html">Гоша Куценко<span class="mar-g"></span></a></li>
										<li><a href="17.html">Олимпиада Молодцова<span class="mar-g"></span></a></li>
										<li><a href="17.html">Владимир Владимиров<span class="mar-g"></span></a></li>
									</ul>
								</li>
							</ul>
						</div>';
	}
function show_global_rating()
	{
	return '<div class="b-panel-zkh_rating">
			<div class="b-panel-zkh_title">Рейтинг ЖКХ</div>
				<div class="b-panel-zkh_rating_holder">
					<div class="b-panel-zkh_rating_item">
					<div class="b-panel-zkh_rating_item_name">Страна</div>
					<div class="b-panel-zkh_rating_item_num">2</div>
					<div class="b-panel-zkh_rating_item_color b-pzric-2"></div>
				</div>
				<div class="b-panel-zkh_rating_item">
					<div class="b-panel-zkh_rating_item_name">Область/край</div>
					<div class="b-panel-zkh_rating_item_num">3</div>
					<div class="b-panel-zkh_rating_item_color b-pzric-3"></div>
				</div>
				<div class="b-panel-zkh_rating_item">
					<div class="b-panel-zkh_rating_item_name">Город</div>
					<div class="b-panel-zkh_rating_item_num">5</div>
					<div class="b-panel-zkh_rating_item_color b-pzric-5"></div>
				</div>
				<div class="b-panel-zkh_rating_item">
					<div class="b-panel-zkh_rating_item_name">Дом</div>
					<div class="b-panel-zkh_rating_item_num">9</div>
					<div class="b-panel-zkh_rating_item_color b-pzric-9"></div>
				</div>
			</div>
			</div>
			<div class="b-panel-zkh_stars">
				<div class="b-panel-zkh_title">Удовлетворённость ЖКХ</div>
			<div id="big_rating"></div>
			</div>';
	}	
function show_form_edit_profile($face=1,$type='')
	{
	$cont='<h1>Редактирование профиля</h1>';
	$from_type='';
	//$show=false;
	$in=1;
	$el=0;
	$q_bin=mysql_query('Select type from additional_inf_users where user_id="'.$this->global_user_id.'"');
	while($type_bins=mysql_fetch_object($q_bin))
		{$from_type[$type_bins->type]=true;}
	if($from_type=='')
		$from_type[2]=true;//по умолчанию роль физика ch_1
	$show=key($from_type);
	//$cont.=$show.' ';
	$acc_t=mysql_fetch_object(mysql_query('Select * from access_form_table where user_id="'.$this->global_user_id.'"'));
	$cont.='
	<h4>Веберите роль/роли в системе:</h4>
	<div class="b-order-list-filter">
	<form>
	<div class="b-order-list-filter_checkbox" style="margin-bottom: 20px;">
		<input type="checkbox" value="Y" '.($from_type[1]?'checked':'').' name="ch" id="ch_1" />
		<label for="ch_1">Физическое лицо</label>
	</div>
		<div class="b-order-list-filter_checkbox"  style="margin-bottom: 20px;">
			<input type="checkbox" value="Y" '.($from_type[2]?'checked':'').' name="ch" id="ch_2" />
			<label for="ch_2">Представитель УК/ТСЖ</label>
		</div>
		<div class="b-order-list-filter_checkbox" style="margin-bottom: 20px;">
			<input type="checkbox" value="Y" '.($from_type[3]?'checked':'').' name="ch" id="ch_3" />
			<label for="ch_3">Представитель ОГВ</label>
		</div>
		<div class="b-order-list-filter_checkbox" style="margin-bottom: 20px;">
			<input type="checkbox" value="Y" '.($from_type[4]?'checked':'').' name="ch" id="ch_4" />
			<label for="ch_4">Юридическое лицо</label>
		</div>
		
		<div class="b-order-list-filter_checkbox">
			<input type="checkbox" value="Y" '.($from_type[5]?'checked':'').' name="ch" id="ch_5" />
			<label for="ch_5">Представитель Cлужбы</label>
		</div>
		</form>
		<div class="g-clean"></div>
	</div>
	<div class="b-content-menu g-menu">
		<ul id="m_l_s">
		<li><a class="'.($show==1?'active':'').'" href="#" id="ch_1_a"  style="padding: 0 4px;font-size: 13px; '.($from_type[1]?'':'color:#D5D5D5; background:#008fd2 !important;').'" onclick="open_form(\'_1\'); return false;">Физическое лицо</a></li>
		<li><a class="'.($show==2?'active':'').'" href="#" id="ch_2_a" style="padding: 0 4px;font-size: 13px; '.($from_type[2]?'':'color:#D5D5D5; background:#008fd2 !important;').'" onclick="open_form(\'_2\'); return false;">Представитель УК/ТСЖ</a></li>
		<li><a class="'.($show==3?'active':'').'" href="#" id="ch_3_a" style="padding: 0 4px;font-size: 13px; '.($from_type[3]?'':'color:#D5D5D5; background:#008fd2 !important;').'" onclick="open_form(\'_3\'); return false;">Представитель ОГВ</a></li>
		<li><a class="'.($show==4?'active':'').'" href="#" id="ch_4_a" style="padding: 0 4px;font-size: 13px; '.($from_type[4]?'':'color:#D5D5D5; background:#008fd2 !important;').'" onclick="open_form(\'_4\'); return false;">Юридическое лицо</a></li>
		<li><a class="'.($show==5?'active':'').'" href="#" id="ch_5_a" style="padding: 0 4px;font-size: 13px; '.($from_type[5]?'':'color:#D5D5D5; background:#008fd2 !important;').'" onclick="open_form(\'_5\'); return false;">Представитель Cлужбы</a></li>
		</ul>
	</div>';
	//понять что первое открываем ????
	$fr->onsubmit='save_profile';
	$fr->area->{$in}->title='Персональная информация';
	$fr->area->{$in}->id='personal_info';
	$fr->area->{$in}->bd='users_inf';
	$fr->area->{$in}->bd_dop='user_id="'.$this->global_user_id.'"';
	$fr->area->{$in}->element->{$el++}=array('id'=>'name','label'=>'Имя');
	$fr->area->{$in}->element->{$el++}=array('id'=>'soname','label'=>'Фамилия');
	$fr->area->{$in}->element->{$el++}=array('id'=>'patronymic','label'=>'Отчество');
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select b-form_item_select_birth','id'=>'date_brith','label'=>'Дата рождения','global_type'=>'bthday_select','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_date','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:90px;',
		'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->date_brith);
	$fr->area->{$in}->element->{$el++}=array('id'=>'email','label'=>'Электронная почта');
	$fr->area->{$in}->element->{$el++}=array('id'=>'password_in','value'=>'','label'=>'Пароль','type'=>'password');
	$fr->area->{$in}->element->{$el++}=array('id'=>'img','label'=>'Фотография','global_type'=>'file','value'=>'Выбрать файл','type_c'=>'file');
	///Физ лицо
	$in++;$el=0;
	include_once('map.php');
	$fr->area->{$in}->title='Отношения к жилому помещению';
	$fr->area->{$in}->hide=($show==1?false:true);
	$fr->area->{$in}->id='relation_personal';
	$fr->area->{$in}->bd='additional_inf_users';
	$fr->area->{$in}->bd_dop='user_id="'.$this->global_user_id.'" and type=1';
	$fr->area->{$in}->element->{1}=array('id'=>'format','global_type'=>'select','type_c'=>'select',
		'options'=>array('1'=>'Собственик','2'=>'Арендатор','3'=>'Жилец'),'palceholder'=>'Выбор права собственности'
		);
	$in++;$el=0;
	$fr->area->{$in}->title='Адрес';
	$fr->area->{$in}->id='geo_personal';
	$fr->area->{$in}->hide=($show==1?false:true);
	$this->connect_bd();
	$q=mysql_query('Select * from geo_inf_users where user_id="'.$this->global_user_id.'" and user_add_inf_id=(Select id from additional_inf_users where user_id="'.$this->global_user_id.'" and type=1)');
	if(mysql_num_rows($q)>0)
		{
		//чтобы не писать билеберду надо сделать функцию возфрашения объекта.....
		$bd_geo=mysql_fetch_assoc($q);
		$fed=Maps::ret_fed_okrug('');
		$obl=Maps::ret_obl();
		$raion=Maps::ret_geo_fias($obj);
		if($bd_geo->raion!="")
			{
			$gorod=Maps::ret_geo_fias($obj);
			}
		else
			{
			$gorod=Maps::ret_geo_fias($obj);
			}	
		if($bd_geo->gorod!="")
			{
			$street=Maps::ret_geo_fias($obj);	
			}	
		else
			{
			$street=Maps::ret_geo_fias($obj);	
			}	
		$fr->area->{$in}->element->{$el++}=array('id'=>'index','label'=>'Индекс');
		$fr->area->{$in}->element->{$el++}=array('id'=>'fed_okrug_fiz','name'=>'fed_okrug','palceholder'=>"Федеральный округ",'global_type'=>'select','type_c'=>'select','options'=>$fed->data,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'oblasti_fiz','name'=>'oblasti','palceholder'=>"Область",'global_type'=>'select','type_c'=>'select','options'=>$fed->obl,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'raion_fiz','name'=>'raion','palceholder'=>"Район",'global_type'=>'select','type_c'=>'select','options'=>$fed->raion,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'gorod_fiz','name'=>'gorod','palceholder'=>"Город",'global_type'=>'select','type_c'=>'select','options'=>$fed->gorod,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'street_fiz','name'=>'street','palceholder'=>"Улица",'global_type'=>'select','type_c'=>'select','options'=>$fed->street,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'house_fiz','name'=>'house','label'=>'Дом','value'=>$bd_geo->house);
		$fr->area->{$in}->element->{$el++}=array('id'=>'apartment_fiz','label'=>'Квартира','value'=>$bd_geo->apartment);
		}
	else
		{
		$fed=Maps::ret_fed_okrug('');
		$fr->area->{$in}->element->{$el++}=array('id'=>'index','label'=>'Индекс');
		$fr->area->{$in}->element->{$el++}=array('id'=>'fed_okrug_fiz','name'=>'fed_okrug','palceholder'=>"Федеральный округ",'global_type'=>'select','type_c'=>'select','options'=>$fed->data,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'oblasti_fiz','name'=>'oblasti','palceholder'=>"Область",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'raion_fiz','name'=>'raion','palceholder'=>"Район",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'gorod_fiz','name'=>'gorod','palceholder'=>"Город",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'street_fiz','name'=>'street','palceholder'=>"Улица",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'house_fiz','name'=>'house','label'=>'Дом');
		$fr->area->{$in}->element->{$el++}=array('id'=>'apartment_fiz','label'=>'Квартира');
		}
	$in++;$el=0;
	//ук тсж
	$fr->area->{$in}->title='Должность представителя';
	$fr->area->{$in}->id='sh2_inf';
	$fr->area->{$in}->hide=($show==2?false:true);
	$fr->area->{$in}->element->{$el++}=array('id'=>'post_tsg','global_type'=>'select','type_c'=>'select',
	'options'=>array('1'=>'Директор','2'=>'Ген.директор','3'=>'Управляющий'),'palceholder'=>'Выбор должности');
	$in++;$el=0;
	$fr->area->{$in}->title='Информация об УК/ТСЖ';
	$fr->area->{$in}->id='sh2_inf_t';
	$fr->area->{$in}->hide=$fr->area->{$in-1}->hide;
	$fr->area->{$in}->element->{$el++}=array('id'=>'full_name_c','label'=>'Полное наименование');
	$fr->area->{$in}->element->{$el++}=array('id'=>'short_name_c','label'=>'Краткое наименование');
	$fr->area->{$in}->element->{$el++}=array('id'=>'format_c','global_type'=>'select','type_c'=>'select',
	'options'=>array('1'=>'УК','2'=>'ТСЖ','3'=>'ООО'),'palceholder'=>'Организационная форма');
	$fr->area->{$in}->element->{$el++}=array('id'=>'fio_c','label'=>'ФИО руководителя','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_fio_c','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->fio_c);
	$fr->area->{$in}->element->{$el++}=array('id'=>'ogrn','label'=>'ОГРН','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_ogrn','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->ogrn);
	$fr->area->{$in}->element->{$el++}=array('id'=>'inn','label'=>'ИНН','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_inn','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->inn);
	$fr->area->{$in}->element->{$el++}=array('id'=>'ur_adress_c','label'=>'Юридический адрес');
	$fr->area->{$in}->element->{$el++}=array('id'=>'fact_adress_c','label'=>'Фактический адрес');///!!!!бд не правильно !!!!
	$fr->area->{$in}->element->{$el++}=array('id'=>'postal_adress_c','label'=>'Почтовый адрес');
	$fr->area->{$in}->element->{$el++}=array('id'=>'phone','label'=>'Телефон');
	$fr->area->{$in}->element->{$el++}=array('id'=>'email','label'=>'Электронная почта');
	$fr->area->{$in}->element->{$el++}=array('id'=>'site','label'=>'Сайт');
	$fr->area->{$in}->element->{$el++}=array('id'=>'mode','label'=>'Режим работы');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_info','global_type'=>'textarea','type_c'=>'textarea','label'=>'Дополнит. информация');
	unset($q);
	// $fr->area->{6}->bot_a=false;
	$q=mysql_query('Select * from geo_inf_users where user_id="'.$this->global_user_id.'" and user_add_inf_id=(Select id from additional_inf_users where user_id="'.$this->global_user_id.'" and type=2)');
	if(mysql_num_rows($q)>0)
		{
		//перечисляем МКД 1-2-3
		$i=1;
		while($bd_geo=mysql_fetch_object($q))
			{
			$fr->area->{$in}->hide=($show==2?false:true);	
			$fr->area->{$in}->title='Адресс МКД №'.$i;
			$i++; $in++;$el=1;
			}
		//$fr->area->{$in}->hide=($show==2?false:true);	
		$fr->area->{$in}->id='sh2_geo_'.$i;
		$fr->area->{$in}->bot_a->name='Добавить адресс МКД';
		$fr->area->{$in}->bot_a->uri='#';
		$fr->area->{$in}->bot_a->onclick_f='add_mkd(\'sh2_geo\');return false;';
		}
	else
		{
		//грузим пустую
		$in++;$el=0;
		$fr->area->{$in}->title='Адресс МКД';
		$fr->area->{$in}->hide=($show==2?false:true);
		$fr->area->{$in}->id='sh2_geo_1';	
		$fed=Maps::ret_fed_okrug('');
		$fr->area->{$in}->element->{$el++}=array('id'=>'index_tsg_1','label'=>'Индекс');
		$fr->area->{$in}->element->{$el++}=array('id'=>'fed_okrug_tsg_1','name'=>'fed_okrug','palceholder'=>"Федеральный округ",'global_type'=>'select','type_c'=>'select','options'=>$fed->data,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'oblasti_tsg_1','name'=>'oblasti','palceholder'=>"Область",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'raion_tsg_1','name'=>'raion','palceholder'=>"Район",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'gorod_tsg_1','name'=>'gorod','palceholder'=>"Город",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'street_tsg_1','name'=>'street','palceholder'=>"Улица",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'house_tsg_1','name'=>'house','label'=>'Дом');	
		$fr->area->{$in}->bot_a->name='Добавить адресс МКД';
		$fr->area->{$in}->bot_a->uri='#';
		$fr->area->{$in}->bot_a->onclick_f='add_mkd(\'sh2_geo\');return false;';
		}
	//Представитель ОГВ	
	$in++;$el=0;$i=1;	
	$fr->area->{$in}->title='Должность и уровень';
	$fr->area->{$in}->id='sh3_inf';
	$fr->area->{$in}->hide=($show==3?false:true);
	$fr->area->{$in}->element->{$el++}=array('id'=>'level_ogv','global_type'=>'select','type_c'=>'select',
	'options'=>array('1'=>'Федеральный','2'=>'Региональный','3'=>'Областной','4'=>'Муниципальный'),'name'=>'level','palceholder'=>'Уровень');///level
	unset($q);
	$q=mysql_query('Select * from geo_inf_users where user_id="'.$this->global_user_id.'" and user_add_inf_id=(Select id from additional_inf_users where user_id="'.$this->global_user_id.'" and type=3)');
	if(mysql_num_rows($q)>0)
		{
		//Показываем тереторию
		while($bd_geo=mysql_fetch_object($q))
			{
			//$i++; 
			//$in++;
			}
		//$fr->area->{$in}->hide=($show==2?false:true);	
		// $fr->area->{$in}->id='sh2_geo_'.$i;
		// $fr->area->{$in}->bot_a->name='Добавить регион';
		// $fr->area->{$in}->bot_a->uri='#';
		}
	else
		{
		$fr->area->{$in}->element->{$el++}=array('id'=>'fed_okrug_ogv_'.$i,'name'=>'fed_okrug','palceholder'=>"Федеральный округ",'global_type'=>'select','type_c'=>'select','options'=>$fed->data,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'oblasti_ogv_'.$i,'name'=>'oblasti','palceholder'=>"Область",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'raion_ogv_'.$i,'name'=>'raion','palceholder'=>"Район",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'gorod_ogv_'.$i,'name'=>'gorod','palceholder'=>"Город",'global_type'=>'select','type_c'=>'select');
		}
	$fr->area->{$in}->element->{$el++}=array('id'=>'short_name_c_ogv','label'=>'Место работы');		
	$fr->area->{$in}->element->{$el++}=array('id'=>'post_ogv','label'=>'Должность');		
	$q1=mysql_query('Select * from scope_inf_users where id="'.$this->global_user_id.'" and type="3"');
	$i=0;
	if(mysql_num_rows($q1)>0)
		{
		while($sc=mysql_fetch_object($q1))
			{
			$fr->area->{$in}->element->{$el++}=array('id'=>'scope_ogv_'.($i++),'label'=>'Сфера обязаностей','value'=>$sc->name);
			}
		}
	else
		$fr->area->{$in}->element->{$el++}=array('id'=>'scope_ogv_'.($i++),'label'=>'Сфера обязаностей');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_scope_ogv','type'=>'a','uri'=>'#','global_type'=>'a','value'=>'Добавить сферу обязаностей','onclick_f'=>'add_scope(\'scope_ogv\',\'Сфера обязаностей\');return false;');	
	$fr->area->{$in}->element->{$el++}=array('id'=>'telephone_ogv','label'=>'Телефон');	
	$fr->area->{$in}->element->{$el++}=array('id'=>'site_ogv','label'=>'Сайт');
	$fr->area->{$in}->element->{$el++}=array('id'=>'mode_ogv','label'=>'Режим работы');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_info_ogv','global_type'=>'textarea','type_c'=>'textarea','label'=>'Дополнит. информация');
	//Юридическое лицо
	$in++;$el=0;$i=1;
	$fr->area->{$in}->title='Информация о компании';
	$fr->area->{$in}->id='sh4_inf';
	$fr->area->{$in}->hide=($show==4?false:true);
	$fr->area->{$in}->element->{$el++}=array('id'=>'full_name_c_ur','label'=>'Полное наименование');
	$fr->area->{$in}->element->{$el++}=array('id'=>'short_name_c_ur','label'=>'Краткое наименование');
	$fr->area->{$in}->element->{$el++}=array('id'=>'sсope_ur','label'=>'Сфера дефтельности');
	$fr->area->{$in}->element->{$el++}=array('id'=>'format_c_ur','global_type'=>'select','type_c'=>'select',
	'options'=>array('1'=>'УК','2'=>'ТСЖ','3'=>'ООО','4'=>'ИП','5'=>'ЗАО','6'=>'ОАО','7'=>'ГК'),'palceholder'=>'Организационная форма');
	$fr->area->{$in}->element->{$el++}=array('id'=>'fio_c_ur','label'=>'ФИО руководителя','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_fio_c_ur','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->fio_c);
	$fr->area->{$in}->element->{$el++}=array('id'=>'ogrn_ur','label'=>'ОГРН','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_ogrn_ur','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->ogrn);
	$fr->area->{$in}->element->{$el++}=array('id'=>'inn_ur','label'=>'ИНН','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_inn_ur','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->inn_ur);
	$fr->area->{$in}->element->{$el++}=array('id'=>'kpp_ur','label'=>'КПП','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_kpp_ur','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->kpp_ur);
	$fr->area->{$in}->element->{$el++}=array('id'=>'okpp_ur','label'=>'ОКПП','type_c'=>'text b-form_item_text_short','cl_n'=>true);
	$fr->area->{$in}->element->{$el++}=array('type_c'=>'select','id'=>'acess_okp_ur','global_type'=>'select','palceholder'=>'Доступ','style'=>'width:130px;',
	'options'=>array('0'=>'Все видят','2'=>'Только друзья','3'=>'Закрыт'),'value'=>$acc_t->okp_ur);
	$fr->area->{$in}->element->{$el++}=array('id'=>'ur_adress_c_ur','label'=>'Юридический адрес');
	$fr->area->{$in}->element->{$el++}=array('id'=>'fact_adress_c_ur','label'=>'Фактический адрес');///!!!!бд не правильно !!!!
	$fr->area->{$in}->element->{$el++}=array('id'=>'postal_adress_c_ur','label'=>'Почтовый адрес');
	$fr->area->{$in}->element->{$el++}=array('id'=>'phone_ur','label'=>'Телефон');
	$fr->area->{$in}->element->{$el++}=array('id'=>'email_ur','label'=>'Электронная почта');
	$fr->area->{$in}->element->{$el++}=array('id'=>'site_ur','label'=>'Сайт');
	$fr->area->{$in}->element->{$el++}=array('id'=>'mode_ur','label'=>'Режим работы');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_info_ur','global_type'=>'textarea','type_c'=>'textarea','label'=>'Дополнит. информация');
	$in++;$el=0;
	$fr->area->{$in}->title='Предлагаемые услуги и товары:';
	$fr->area->{$in}->id='sh4_sc';
	$fr->area->{$in}->hide=($show==4?false:true);
	$q1=mysql_query('Select * from scope_inf_users where id="'.$this->global_user_id.'" and type="4"');
	$i=1;
	if(mysql_num_rows($q1)>0)
		{
		while($sc=mysql_fetch_object($q1))
			{
			$fr->area->{$in}->element->{$el++}=array('id'=>'scopes_ur_'.($i++),'label'=>'Услуга / Товар','value'=>$sc->name);
			}
		}
	else
		$fr->area->{$in}->element->{$el++}=array('id'=>'scopes_ur_'.($i++),'label'=>'Услуга / Товар');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_scopes_ur','type'=>'a','uri'=>'#','global_type'=>'a','value'=>'Добавить Услугу / Товар','onclick_f'=>'add_scope(\'scopes_ur\',\'Услуга / Товар\');return false;');
	$in++;$el=0;
	unset($q);
	$q=mysql_query('Select * from geo_inf_users where user_id="'.$this->global_user_id.'" and user_add_inf_id=(Select id from additional_inf_users where user_id="'.$this->global_user_id.'" and type=4)');
	if(mysql_num_rows($q)>0)
		{
		//перечисляем МКД 1-2-3
		$i=1;
		while($bd_geo=mysql_fetch_object($q))
			{
			$fr->area->{$in}->hide=($show==4?false:true);	
			$fr->area->{$in}->title='Регион №'.$i;
			$i++; $in++;$el=1;
			}
		//$fr->area->{$in}->hide=($show==2?false:true);	
		$fr->area->{$in}->id='sh4_geo_'.$i;
		$fr->area->{$in}->bot_a->name='Добавить регион';
		$fr->area->{$in}->bot_a->uri='#';
		$fr->area->{$in}->bot_a->onclick_f='add_geo_region(\'sh4_geo\');return false;';
		}
	else
		{
		//грузим пустую
		$in++;$el=0;
		$fr->area->{$in}->title='Регион';
		$fr->area->{$in}->hide=($show==4?false:true);
		$fr->area->{$in}->id='sh4_geo_1';	
		$fed=Maps::ret_fed_okrug('');
		$fr->area->{$in}->element->{$el++}=array('id'=>'fed_okrug_ur_1','name'=>'fed_okrug','palceholder'=>"Федеральный округ",'global_type'=>'select','type_c'=>'select','options'=>$fed->data,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'oblasti_ur_1','name'=>'oblasti','palceholder'=>"Область",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'raion_ur_1','name'=>'raion','palceholder'=>"Район",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'gorod_ur_1','name'=>'gorod','palceholder'=>"Город",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'street_ur_1','name'=>'street','palceholder'=>"Улица",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'house_ur_1','name'=>'house','label'=>'Дом');	
		$fr->area->{$in}->bot_a->name='Добавить регион';
		$fr->area->{$in}->bot_a->uri='#';
		$fr->area->{$in}->bot_a->onclick_f='add_geo_region(\'sh4_geo\');return false;';
		}
	//Представитель Cлужбы	
	$in++;$el=0;$i=1;	
	$fr->area->{$in}->title='Должность и уровень';
	$fr->area->{$in}->id='sh5_inf';
	$fr->area->{$in}->hide=($show==5?false:true);
	$fr->area->{$in}->element->{$el++}=array('id'=>'level_slu','global_type'=>'select','type_c'=>'select',
	'options'=>array('1'=>'Федеральный','2'=>'Региональный','3'=>'Областной','3'=>'Муниципальный'),'name'=>'level','palceholder'=>'Уровень');///level
	unset($q);
	$q=mysql_query('Select * from geo_inf_users where user_id="'.$this->global_user_id.'" and user_add_inf_id=(Select id from additional_inf_users where user_id="'.$this->global_user_id.'" and type=5)');
	if(mysql_num_rows($q)>0)
		{
		//Показываем тереторию
		while($bd_geo=mysql_fetch_object($q))
			{
			//$i++; 
			//$in++;
			}
		//$fr->area->{$in}->hide=($show==2?false:true);	
		// $fr->area->{$in}->id='sh2_geo_'.$i;
		// $fr->area->{$in}->bot_a->name='Добавить регион';
		// $fr->area->{$in}->bot_a->uri='#';
		}
	else
		{
		$fr->area->{$in}->element->{$el++}=array('id'=>'fed_okrug_slu_'.$i,'name'=>'fed_okrug','palceholder'=>"Федеральный округ",'global_type'=>'select','type_c'=>'select','options'=>$fed->data,'op_t'=>'obj');
		$fr->area->{$in}->element->{$el++}=array('id'=>'oblasti_slu_'.$i,'name'=>'oblasti','palceholder'=>"Область",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'raion_slu_'.$i,'name'=>'raion','palceholder'=>"Район",'global_type'=>'select','type_c'=>'select');
		$fr->area->{$in}->element->{$el++}=array('id'=>'gorod_slu_'.$i,'name'=>'gorod','palceholder'=>"Город",'global_type'=>'select','type_c'=>'select');
		}
	$fr->area->{$in}->element->{$el++}=array('id'=>'short_name_c_slu','label'=>'Место работы');		
	$fr->area->{$in}->element->{$el++}=array('id'=>'post_ogv','label'=>'Должность');		
	$q1=mysql_query('Select * from scope_inf_users where id="'.$this->global_user_id.'" and type="5"');
	$i=0;
	if(mysql_num_rows($q1)>0)
		{
		while($sc=mysql_fetch_object($q1))
			{
			$fr->area->{$in}->element->{$el++}=array('id'=>'scope_slu_'.($i++),'label'=>'Сфера обязаностей','value'=>$sc->name);
			}
		}
	else
		$fr->area->{$in}->element->{$el++}=array('id'=>'scope_slu_'.($i++),'label'=>'Сфера обязаностей');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_scope_slu','type'=>'a','uri'=>'#','global_type'=>'a','value'=>'Добавить сферу обязаностей','onclick_f'=>'add_scope(\'scope_slu\',\'Сфера обязаностей\');return false;');	
	$fr->area->{$in}->element->{$el++}=array('id'=>'telephone_slu','label'=>'Телефон');	
	$fr->area->{$in}->element->{$el++}=array('id'=>'site_slu','label'=>'Сайт');
	$fr->area->{$in}->element->{$el++}=array('id'=>'mode_slu','label'=>'Режим работы');
	$fr->area->{$in}->element->{$el++}=array('id'=>'add_info_slu','global_type'=>'textarea','type_c'=>'textarea','label'=>'Дополнит. информация');		
	$fr->button_off->{1}->value='Сохранить';
	$fr->button_off->{1}->id='save_form_button';
	$fr->button_off->{2}->value='Отменить';
	$fr->button_off->{2}->uri='личный_кабинет';
	$fr->button_off->{2}->type='a';
	$cont.=$this->constructor_form_redact($fr);
	return $cont;
	}
}
?>