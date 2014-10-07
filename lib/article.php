<?
class Articles
{
//левый столбик	
function show_index_shot_article($str=0,$type='text',$search='')
	{
	return '<!-- <div class="l-page-left"> Левая колонка </div> -->
			<div class="l-page-right">
				
				<div class="b-mod-news g-border-grey g-border-radius">
					<div class="b-mod-news_holder">
						<div class="b-mod-news_title">
							Лента публикаций
							<span class="g-ico b-ico-1" style="cursor:pointer;" id="filtr_b" onclick="s_f();"></span>
						</div>
						<div class="b-mod-news_border" style="display:none;"></div>
						<div class="b-mod-filter"  style="display:none;">
							<form>
								<div class="b-mod-filter_item b-mod-filter_select">
									<select class="chosen-select" name="item1">
										<option value="">Все регионы</option>
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
								</div>
								<div class="b-mod-filter_item b-mod-filter_checkbox">
									<div class="b-mod-filter_item_label">
										Тема
									</div>
									<div class="b-mod-filter_checkbox_item">
										<input type="checkbox" value="Y" name="f-1-02" id="f-1-02" /><label for="f-1-02">ЖКХ</label>
									</div>
									<div class="b-mod-filter_checkbox_item">
										<input type="checkbox" value="Y" name="f-1-01" id="f-1-01" /><label for="f-1-01">Политика</label>
									</div>
									
									<div class="b-mod-filter_checkbox_item">
										<input type="checkbox" value="Y" name="f-1-03" id="f-1-03" /><label for="f-1-03">Общество</label>
									</div>
								</div>
								<div class="b-mod-news_border"></div>
								<div class="b-mod-filter_item b-mod-filter_text">
									<div class="b-mod-filter_item_label">
										Автор
									</div>
									<div class="b-mod-filter_item_field">
										<input type="text" value="" />
									</div>
								</div>
								<div class="b-mod-news_border"></div>
								<div class="b-mod-filter_item b-mod-filter_checkbox">
									<div class="b-mod-filter_item_label">
										Рейтинг
									</div>
									<div class="b-mod-filter_checkbox_item">
										<input type="checkbox" value="Y" name="f-1-04" id="f-1-04" /><label for="f-1-04">Высокий</label>
									</div>
									<div class="b-mod-filter_checkbox_item">
										<input type="checkbox" value="Y" name="f-1-05" id="f-1-05" /><label for="f-1-05">Низкий</label>
									</div>
								</div>
								<div class="b-mod-filter_button">
									<input class="g-button" type="submit" value="Применить фильтр" />
								</div>
							</form>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Константинопольский Константин
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:30</span>
								<a href="05.html">Политика</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Пустовалова Екатерина
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">Общество</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Петров Александр
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">ЖКХ</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Пустовалова Екатерина
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">ЖКХ</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Пустовалова Екатерина
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">Политика</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Петров Александр
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">Общество</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Константинопольский Константин
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">Политика</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
						<div class="b-mod-news_item">
							<div class="b-mod-news_item_autor">
								Константинопольский Константин
							</div>
							<div class="b-mod-news_item_title">
								<span class="b-mod-news_item_date">18:25</span>
								<a href="05.html">ЖКХ</a>
							</div>
							<div class="b-mod-news_item_text">
								<a href="05.html">Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.</a>
							</div>
						</div>
					</div>
				</div>

			</div>';	
	}
//нижний столбик	
function show_index_big_article($str=0,$type='text')
	{
	return '<div class="b-news-list-user">
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u003.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Петров Александр
									</div></a>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>12</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u001.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Константинопольский Константин
									</div></a>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>25</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u002.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Пустовалова Екатерина
									</div></a>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>35</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u003.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Петров Александр
									</div></a>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>12</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u001.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Константинопольский Константин
									</div>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>25</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u002.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Пустовалова Екатерина
									</div>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>35</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u003.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Петров Александр
									</div>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>12</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u001.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Константинопольский Константин
									</div>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>25</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="b-news-list-user_item g-border-grey g-border-radius">
							<div class="b-news-list-user_item_holder">
								<div class="b-news-list-user_item_date">
									22.04.2014 18:30
								</div>
								<div class="b-news-list-user_item_user">
									<a href="17.html"><div class="b-news-list-user_item_user_pic">
										<img src="img/tmp/u002.png" alt="" />
									</div>
									<div class="b-news-list-user_item_user_name">
										Пустовалова Екатерина
									</div>
									<div class="b-news-list-user_item_user_vote">
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>35</a>
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>
									</div>
								</div>
								<div class="b-news-list-user_item_title">
									<a href="05.html">В Санкт-Петербурге охлаждают батареии</a>
								</div>
								<div class="b-news-list-user_item_text">
									Правительство Санкт-Петербурга приняло решение о переходе теплоэнергетических компаний на переодичное отапливание.
								</div>
								<div class="b-news-list-user_item_link">
									<a href="05.html">читать дальше</a>
								</div>
							</div>
						</div>
						<div class="g-clean"></div>
						<div class="b-news-list-user_more">
							<a href="#">Загрузить ещё</a>
						</div>		
					</div>';
	}		
//
function save_article($paket)
	{}	
}
?>