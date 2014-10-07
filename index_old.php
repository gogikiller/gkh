<?
if(!isset($_SESSION))
{
session_start();
}
include("function.php");
include("conn_bd.php");
$bd_lib=new work_bd;
function transform_adrr($adrr)
	{
	$adrr=urldecode($adrr);
	$adrr=str_replace(' ',"",$adrr);
	$adrr=mb_substr($adrr,iconv_strlen("/gkh/"));
	return $adrr;
	}
$adrr=transform_adrr($_SERVER['REQUEST_URI']);
//echo $adrr;
$content='<div id="successful_div">Такой страницы пока нет</div>';
$title='ЖилКомХоз';
$menu='<div id="menu_mini"><div><a href="#">Люди</a></div><div><a href="#">УК/ТСЖ</a></div><div><a href="#">Компании</a></div><div id="search_logo"><input type="text" value="Поиск" id="search_text_pol"></div>'.($bd_lib->check_access()?'<div><a href="/gkh/личный_кабинет">Личный кабинет</a></div><div><a href="/gkh/выход" onclick="logoff();">Выход </a></div>':'<div><a href="/gkh/вход">Вход</a></div><div><a href="/gkh/регистрация">Регистрация </a></div>').'</div>';if($adrr=='' || $adrr=='index.html')
    {  
   $content='<div id="mapsgkh">
    </div>
    <div id="lenta_novosti">
    <span id="lenta_novosti_zag">Лента публикаций</span><div id="filtr"></div>
    <hr></hr>
    <div id="navigator_filtr">
    <select>
    <option>Регион</option>
    <option>Алтайский край</option>
    <option>Амурская обл.</option>
    <option>Архангельская обл.</option>
    <option>Астраханская обл.</option>
    <option>Белгородская обл.</option>
    <option>Брянская обл.</option>
    <option>Владимирская обл.</option>
    <option>Волгоградская обл.</option>
    <option>Вологодская обл.</option>
    <option>Ивановская обл.</option>
    <option>Иркутская обл.</option>
    <option>Кабардино-Балкарская Республика</option>
    <option>Калининградская обл.</option>
    <option>Камчатская обл.</option>
    <option>Карачаево-Черкесская Республика</option>
    <option>Кировская обл.</option>
    <option>Костромская обл.</option>
    <option>Краснодарский край</option>
    <option>Красноярский край</option>
    <option>Курганская обл.</option>
    <option>Ленинградская обл.</option>
    <option>Липецкая обл.</option>
    <option>Магаданская обл.</option>
    <option>Московская обл.</option>
    <option>Мурманская обл.</option>
    <option>Нижегородская обл.</option>
    <option>Новгородская обл.</option>
    <option>Новосибирская обл.</option>
    <option>Омская обл.</option>
    <option>Оренбургская обл.</option>
    <option>Орловская обл.</option>
    <option>Пермский край</option>
    <option>Приморский край</option>
    <option>Псковская обл.</option>
    <option>Республика Адыгея</option>
    <option>Республика Башкортостан</option>
    <option>Республика Бурятия</option>
    <option>Республика Дагестан</option>
    <option>Республика Ингушетия</option>
    <option>Республика Калмыкия</option>
    <option>Республика Коми</option>
    <option>Республика Марий Эл</option>
    <option>Республика Саха (Якутия)</option>
    <option>Республика Северная Осетия - Алания</option>
    <option>Республика Татарстан</option>
    <option>Республика Хакасия</option>
    <option>Рязанская обл.</option>
    <option>Самарская обл.</option>
    <option>Саратовская обл.</option>
    <option>Сахалинская обл.</option>
    <option>Свердловская обл.</option>
    <option>Смоленская обл.</option>
    <option>Ставропольский край</option>
    <option>Тамбовская обл.</option>
    <option>Тверская обл.</option>
    <option>Томская обл.</option>
    <option>Тульская обл.</option>
    <option>Тюменская обл.</option>
    <option>Удмуртская Республика</option>
    <option>Ульяновская обл.</option>
    <option>Хабаровский край</option>
    <option>Челябинская обл.</option>
    <option>Чеченская Республика</option>
    <option>Читинская обл.</option>
    <option>Чувашская республика - Чувашия</option>
    <option>Ярославская обл.</option>
    </select>
    <span>Тема</span>
    <input type="radio" name="theme" value="1" id="theme_1"><label for="theme_1">Политика</label> 
    <input type="radio" name="theme" value="2" id="theme_2"><label for="theme_2">ЖКХ</label> 
    <input type="radio" name="theme" value="3" id="theme_3"><label for="theme_3">Общество</label>
   <hr></hr>
   <span>Автор</span>
   <input type="text">
   <hr></hr>
   <span>Рейтинг</span>
    <input type="radio" name="rating" value="1" id="rating_1"><label for="rating_1">Высокий</label> 
    <input type="radio" name="rating" value="2" id="rating_2"><label for="rating_2">Низкий</label> 
    <input type="button" value="Применить фильтр">
    </div>
    <div id="lenta_novosti_content">
    <div id="item_lent">
        <span id="time_lent">08:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">11:30</span>
        <span id="zag_lent">Общество</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">15:30</span>
        <span id="zag_lent">Экономика и бизнесс</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">15:45</span>
        <span id="zag_lent">Политика</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">16:30</span>
        <span id="zag_lent">Спорт</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">18:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">19:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">20:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">21:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">21:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <div id="item_lent">
        <span id="time_lent">21:30</span>
        <span id="zag_lent">Международная панорама</span>
        <div id="tetx_lent">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div>
    </div>
    <hr></hr>
    <br>
    <center><img src=\'images/load.gif\'/></center>
    </div>
    </div>
    <div id="novosti">
    <div id="news_item">
        <div id="news_date">22.04.2014 18:30</div>
        <div id="news_img_avtor"></div>
        <div id="news_avtor">Петров Александр</div>
        <div id="buttons"><span id="like_but">12</span><span id="bed_but">2</span></div>
        <div id="news_title">В Санкт-Петербурге охлаждают батареи</div>
        <div id="news_text">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div></br>
        <div id="news_dalee">читать далее</div>  
    </div>
    <div id="news_item">
        <div id="news_date">22.04.2014 18:30</div>
        <div id="news_img_avtor" style="background-image:url(images/image_avtor2.jpg);"></div>
        <div id="news_avtor">Петров Александр</div>
        <div id="buttons"><span id="like_but">12</span><span id="bed_but">2</span></div>
        <div id="news_title">В Санкт-Петербурге охлаждают батареи</div>
        <div id="news_text">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div></br>
        <div id="news_dalee">читать далее</div>  
    </div>
    <div id="news_item">
        <div id="news_date">22.04.2014 18:30</div>
        <div id="news_img_avtor"></div>
        <div id="news_avtor">Петров Александр</div>
        <div id="buttons"><span id="like_but">12</span><span id="bed_but">2</span></div>
        <div id="news_title">В Санкт-Петербурге охлаждают батареи</div>
        <div id="news_text">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div></br>
        <div id="news_dalee">читать далее</div>  
    </div>
    <div id="news_item">
        <div id="news_date">22.04.2014 18:30</div>
        <div id="news_img_avtor" ></div>
        <div id="news_avtor">Петров Александр</div>
        <div id="buttons"><span id="like_but">12</span><span id="bed_but">2</span></div>
        <div id="news_title">В Санкт-Петербурге охлаждают батареи</div>
        <div id="news_text">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div></br>
        <div id="news_dalee">читать далее</div>  
    </div>
    <div id="news_item">
        <div id="news_date">22.04.2014 18:30</div>
        <div id="news_img_avtor" style="background-image:url(images/image_avtor2.jpg);"></div>
        <div id="news_avtor">Петров Александр</div>
        <div id="buttons"><span id="like_but">12</span><span id="bed_but">2</span></div>
        <div id="news_title">В Санкт-Петербурге охлаждают батареи</div>
        <div id="news_text">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div></br>
        <div id="news_dalee">читать далее</div>  
    </div>
    <div id="news_item">
        <div id="news_date">22.04.2014 18:30</div>
        <div id="news_img_avtor" style="background-image:url(images/image_avtor2.jpg);"></div>
        <div id="news_avtor">Константинопольский Константин</div>
        <div id="buttons"><span id="like_but">12</span><span id="bed_but">2</span></div>
        <div id="news_title">В Санкт-Петербурге охлаждают батареи</div>
        <div id="news_text">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание</div></br>
        <div id="news_dalee">читать далее</div>  
    </div>
    <div id="add_all_novosti">Загрузить еще</div>
    </div>';
}
elseif($adrr=='регистрация')
    {
    $montch=array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
    $day=range(1,31);
    $yeaars=range(1940,1994);
    $menu='<div id="menu_mini"><div><a href="#">Люди</a></div><div><a href="#">УК/ТСЖ</a></div><div><a href="#">Компании</a></div><div id="search_logo"><input type="text" value="Поиск" id="search_text_pol"></div><div><a href="вход">Вход</a></div><div class="active"><a href="регистрация">Регистрация </a></div></div>';
    $title.=' | Регистрация';
    $content='<span id="big_form_zag">Регистрация</span>
<div id="big_form">
<form>
<label for="name">Имя</label>
<input type="text" id="name">
<label for="soname">Фамилия</label>
<input type="text" id="soname">
<label for="email">Эл.почта</label>
<input type="text" id="email">
<label for="password">Пароль</label>
<input type="password" id="password">
<label for="date_brith">Дата рождения</label>
<select id="date_brith">
<option value="0">день</option>';
foreach ($day as $val)
    $content.='<option value="'.$val.'">'.$val.'</option>';
$content.='
</select>
<select id="montch_brith">
<option value="0">месяц</option>';
foreach ($montch as $key=>$val)
    $content.='<option value="'.($key+1).'">'.$val.'</option>';
$content.='
</select>
<select id="year_brith">
<option value="0">год</option>
';
foreach ($yeaars as $val)
    $content.='<option value="'.$val.'">'.$val.'</option>';
$content.='
</select>
<center>
<input type="radio" name="sex" value="m" id="male">
<label for="male">Мужчина</label>
<input type="radio" value="f" name="sex" id="female">
<label for="female">Женщина</label>
</center>
</div>
<span id="dop_form_inf">Введите код с картинки</span>
<div id="kapcha_form">
<center><img src="images/captcha.php?1"></center>
<input type="text" id="kapcha">
</div>
<div id="reg_policy">
Нажимая кнопку "Регистрация", вы соглашаетесь с нашими <a href="условия_использования">Условиями использования</a> и подтверждаете, что ознакомились с нашей  <a href="политика_использования_данных">Политикой использования данных</a>.
</div>
<input type="button" class="button_1" id="reg_button" value="Регистрация">
<div id="error_form_login"></div>
</form>';
    } 
elseif ($adrr=='вход') 
    {
    $title.=' | Авторизация';
    $menu='<div id="menu_mini"><div><a href="#">Люди</a></div><div><a href="#">УК/ТСЖ</a></div><div><a href="#">Компании</a></div><div id="search_logo"><input type="text" value="Поиск" id="search_text_pol"></div><div class="active"><a href="вход">Вход</a></div><div><a href="регистрация">Регистрация </a></div></div>';
    $content='<span id="big_form_zag">Авторизация</span>
<div id="big_form">
<form>
<label for="login">Эл. почта</label>
<input type="text" id="login">
<label for="password">Пароль</label>
<input type="password" id="password">
</div>';
if($_SESSION['captcha_count']>3)
    $content.='<span id="dop_form_inf">Введите код с картинки</span><div id="kapcha_form">
<center><img src="images/captcha.php?1"></center>
<input type="text" id="kapcha">
</div>';
$content.='<div id="error_form_login"></div>
<div id="buttons_nav_form">
<input type="button" id="logon_button"  class="button_1" value="Войти"> <a href="востановление_пароля">Вспомнить пароль</a><a href="регистрация">Регистрация</a>
</div>
</form>';  
    }  
elseif ($adrr=='востановление_пароля') 
    {
    $title.=' | Восстановление пароля';
    $content='<span id="big_form_zag">Восстановление пароля</span>
<div id="big_form">
<form>
<label for="login">Эл. почта</label>
<input type="text" id="login">
</div>
<span id="dop_form_inf">Введите код с картинки</span>
<div id="kapcha_form">
<center><img src="images/captcha.php?1"></center>
<input type="text" id="kapcha">
</div><div id="error_form_login"></div>
<div id="buttons_nav_form">
<input type="button" id="recov_users_button" class="button_1" value="Отправить"><a href="регистрация">Регистрация</a> <a href="вход">Авторизация</a>
</div>

</form>';
    } 
elseif($adrr=='личный_кабинет')
    {
    $title.=' | Личный кабинет';   
    if($bd_lib->check_access())
       {
       $content='<div id="successful_div">Вы удачно авторизовались,</br>личный кабинет находится в разработке</br><a href="/gkh/">На главную</a></div>';
       $menu.='';
       }
    else
       $content='<div id="successful_div">Авторизуйтесь!<a href="/gkh/вход">Войти</a></div>'; 
    }  
elseif($adrr=='выход') 
    {
    include('lib/logon_lib.php');   # code...
    if($autorization->logoff())
        header('Location: /gkh/');
    else
        $content='<div id="successful_div">Такой страницы пока нет</div>';
    }     
elseif(preg_match("/^активация\/([a-z0-9]+)$/",$adrr,$ma)) 
    {
    include('lib/logon_lib.php');
    $content=$autorization->activaited_account($ma[1]);
    }   
 $dop='/gkh/';    
echo 
'<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>'.$title.'</title>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="'. $dop.'js/jquery.jscrollpane.min.js"></script>
<script src="'.$dop.'/js/jquery.mousewheel.js"></script>
<script src="'.$dop.'/js/mwheelIntent.js"></script>
<link type="text/css" href="'.$dop.'/css/css.css" rel="stylesheet" media="all">
<link type="text/css" href="'.$dop.'/css/jquery.jscrollpane.css" rel="stylesheet" media="all">
<script src="'.$dop.'/js/index_lib.js" type="text/javascript"></script>
'.(($adrr=='регистрация'|| $adrr=='вход' || $adrr=='востановление_пароля')?'<script src="js/logon.js" type="text/javascript"></script>':'').'
</head>
<body>
<div id="menu">
<a href="/gkh/"><div id="logo_text"></div></a>
    '.$menu.'
</div><center>
<div id="content">
'.$content.'
</div>
<div id="footer_big">
    <div id="footer_menu">
    <a href="#">О проекте</a><span> </span><a href="#">Контакты</a><span> </span><a href="#">Как это работает</a><span> </span><a href="#">Сотрудничество</a>
    </div>
</div>
</center>
</body>
</html>
';
?>	