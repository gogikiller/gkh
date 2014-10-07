<?
if(!isset($_SESSION)) session_start();
//include("conn_bd.php");
include("lib/page_constructor.php");
//$bd_lib=new work_bd;
$page_c=new PageConstructor;
$page->content='';
$page->menu='';
$page->header='';
$page->title='';
$page=$page_c->page_generator($_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head><?echo $page->header;?></head>
<title><?echo $page->title;?></title>
<body>
<?echo $page->menu;?>
<?echo $page->content;?>
<div class="l-footer">
            <div class="b-footer">
                <div class="b-footer_logo">
                    ЖилКомХоз
                </div>
                <div class="b-footer_menu g-menu">
                    <ul>
                        <li><a href="о_проекте">О проекте</a></li>
                        <li><a href="контакты">Контакты</a></li>
                        <li><a href="как_это_работает">Как это работает</a></li>
                        <li><a href="сотрудничество">Сотрудничество</a></li>
                    </ul>
                </div>
            </div>
            <div class="b-footer-copy">
                ЖилКомХоз, 2014 &copy; Все права защищены
            </div>
        </div>
</body>
</html>