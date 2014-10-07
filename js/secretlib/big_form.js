//Работа с формами by saitix.dev
$.ajaxSetup({dataType:'json',type:'POST',url:'ajax.php'});
var dump=true;
function geo_on()
	{
	$('[name=fed_okrug]').change(
	function(element){
		if(dump)console.log(element.currentTarget.name);
	var id_elemet=element.currentTarget.id;
	var id=element.currentTarget.id.substring(element.currentTarget.name.length,element.currentTarget.id.length);
	if(dump)console.log(id+'+'+id_elemet);
	if(dump)console.log($('#'+id_elemet).val());
	var paket={aoguid:$('#'+id_elemet).val()};
	$.ajax({id:'oblasti'+id,data:'paket='+encodeURIComponent(JSON.stringify(paket))+'&query=ret_obl&js_token='+js_token,success:ob_option});
	ob_clear('oblasti',id,true);
	ob_clear('raion',id);
	ob_clear('gorod',id);
	ob_clear('street',id);
	ob_clear('house',id);
	});
$('[name=oblasti]').change(function(element){
	var id_elemet=element.currentTarget.id;
	var id=element.currentTarget.id.substring(element.currentTarget.name.length,element.currentTarget.id.length);
	if(dump)console.log(id+'+'+id_elemet);
	if(dump)console.log($('#'+id_elemet).val());
	var paket1={
		aoguid:$('#'+id_elemet).val(),
		level:3
	}
	var paket2={
		aoguid:$('#'+id_elemet).val(),
		level:4
	}
	var paket3={
		aoguid:$('#'+id_elemet).val(),
		level:7
	}
	$.ajax({id:'raion'+id,data:'paket='+encodeURIComponent(JSON.stringify(paket1))+'&query=ret_geo_fias&js_token='+js_token,success:ob_option});
	$.ajax({id:'gorod'+id,data:'paket='+encodeURIComponent(JSON.stringify(paket2))+'&query=ret_geo_fias&js_token='+js_token,success:ob_option});
	$.ajax({id:'street'+id,data:'paket='+encodeURIComponent(JSON.stringify(paket3))+'&query=ret_geo_fias&js_token='+js_token,success:ob_option});
	ob_clear('raion',id,true);
	ob_clear('gorod',id,true);
	ob_clear('street',id,true);
	ob_clear('house',id,2);
});
$('[name=raion]').change(function(element){
	var id_elemet=element.currentTarget.id;
	var id=element.currentTarget.id.substring(element.currentTarget.name.length,element.currentTarget.id.length);
	if(dump)console.log(id+'+'+id_elemet);
	if(dump)console.log($('#'+id_elemet).val());
	if($('#'+id_elemet).val()==0)
		{
		var paket={
		aoguid:$('#oblasti'+id).val(),
		level:4
		}
		}
	else {
	var paket={
		aoguid:$('#'+id_elemet).val(),
		level:6,
		level2:4
	}}
	$.ajax({id:'gorod'+id,id2:'street'+id,data:'paket='+encodeURIComponent(JSON.stringify(paket))+'&query=ret_geo_fias&js_token='+js_token,success:ob_option});
	ob_clear('gorod',id,true);
	ob_clear('street',id,false);
	ob_clear('house',id,2);
});
$('[name=gorod]').change(function(element){
	var id_elemet=element.currentTarget.id;
	var id=element.currentTarget.id.substring(element.currentTarget.name.length,element.currentTarget.id.length);
	if(dump)console.log(id+'+'+id_elemet);
	if(dump)console.log($('#'+id_elemet).val());
	var paket={
		aoguid:$('#'+id_elemet).val(),
		level:7
	}
	$.ajax({id:'street'+id,data:'paket='+encodeURIComponent(JSON.stringify(paket))+'&query=ret_geo_fias&js_token='+js_token,success:ob_option});
	ob_clear('street',id,true);
});
$('[name=street]').change(function(element){
	var id_elemet=element.currentTarget.id;
	var id=element.currentTarget.id.substring(element.currentTarget.name.length,element.currentTarget.id.length);
	if(dump)console.log($('#'+id_elemet).val());
	$('#house'+id).empty();
	$('#house'+id).removeAttr('disabled');
	$('#house'+id).val('');
	$('#house'+id).focus();
});
	}
$(function(){
	geo_on();
$('[name=ch').change(
function(element)
	{
	if(dump)console.log(element.currentTarget.id);
	if(dump)console.log(element.currentTarget.name);	
	//исчем чиканутые если есть то норм если не не чекаем 
	if($('#'+element.currentTarget.id).prop("checked"))
		{
		if(dump)console.log('on');
		var id=element.currentTarget.id.substring(element.currentTarget.name.length,element.currentTarget.id.length);	
		show_divs(id);//удяляем показываем...
		}
	else
		{
		var c_e=$("input[name='ch']:checked").length;	
		if(c_e>0)
			{
			if(dump)console.log('open_'+$("input[name='ch']:checked")[0].id);	
			var id=$("input[name='ch']:checked")[0].id.substring($("input[name='ch']:checked")[0].name.length,$("input[name='ch']:checked")[0].id.length);
			show_divs(id);//показываем первый выделенный
			}
		else
			{
			//не чего не делаем	
			$('#'+element.currentTarget.id).attr('checked', true);
			}		
		if(dump)console.log('off');
		}	
	});	
$('[name=file]').change(
	function(element){
		if(dump)console.log(element.currentTarget.id);
		//делаем очистку
		$('#I_'+element.currentTarget.id).empty();
		save_file({id:element.currentTarget.id,div:'I_'+element.currentTarget.id,type_file:1});
	});	
});
function ob_option(data)
	{	
	if(dump)console.log(this.id);
	if(dump)console.log(data);
	var id='#'+this.id;	
	$(id).empty();
	$(id).removeAttr('disabled');
	var db=data;
	$.each(db.data, function(key, value) 
		{//$(id).append($('<option>', {value:value.value,text:value.name}));if(dump)console.log(value.value+''+value.name+'#'+this.id);
		$(id).append('<option value="'+value.value+'">'+value.name+'</option>');
		});
	$(id).trigger('liszt:updated');
	}
function ob_clear(id,dop_id,l)//может потребоваться...
	{
	var obz={gorod:"Выберите район или область",raion:"Выберите область",street:"Выберите населенный пункт",house:"Выберите улицу"};
	$('#'+id+dop_id).empty();
	$('#'+id+dop_id).attr('disabled','disabled');
	if(l==2)
		$('#'+id+dop_id).val('Выберите улицу');
	else if(l)
		$('#'+id+dop_id).append($('<option>', {value:0,text:'загрузка...'}));
	else
		$('#'+id+dop_id).append($('<option>', {value:0,text:obz[id]}));
	$('#'+id+dop_id).trigger('liszt:updated');
	}
function show_divs(div)
	{
	if(dump)console.log('->>>'+div);
	//все закрываем
	$('#m_l_s li a').attr('style','padding:0 4px;font-size: 13px;color:#D5D5D5;cursor:default;background:#008fd2 !important;');
	//смотрим что открыто открываем
	var c_e_in=$("input[name='ch']:checked");
	for (var i = 0;i<c_e_in.length;i++) 
		{
		var	ii=c_e_in[i].id.substring(c_e_in[i].name.length,c_e_in[i].id.length);
		$('#ch'+ii+'_a').attr('style','padding:0 4px;font-size: 13px;color:#FFF; cursor:pointer;');
		}
		//$('#ch'+ii+'_a').attr('style','padding:0 4px;font-size: 13px;color:#FFF; cursor:pointer;');
	//открываем форму
	open_form(div);
	}		
function open_form(div)
    {
    if($('#ch'+div+'_a').css('cursor')=='pointer'){	
    $('#m_l_s li a').removeClass('active');	
	//что переданно подсвечиваем
	$('#ch'+div+'_a').addClass('active');
    //разные массивы с элементами
    hide_all();
    switch(div)
    	{
    	case '_1':
    		{
    		$('#relation_personal').show();
    		$('#title_relation_personal').show();
    		$('#geo_personal').show();
    		$('#title_geo_personal').show();
    		}
    	break
    	case '_2':
    		{
    		$('#sh2_inf').show();
    		$('#title_sh2_inf').show();
    		$('#sh2_inf_t').show();
    		$('#title_sh2_inf_t').show();
    		$('[id^="sh2_geo_"]').show();
    		$('[id^="title_sh2_geo_"]').show();
    		$('[id^="a_sh2_geo_"]').show();
    		}
    	break
    	case '_3':
    		{
    		$('#sh3_inf').show();
    		$('#title_sh3_inf').show();
    		}
    	break	
    	case '_4':
    		{
    		$('#sh4_inf').show();
    		$('#title_sh4_inf').show();
    		$('#sh4_sc').show();
    		$('#title_sh4_sc').show();
    		$('[id^="sh4_geo_"]').show();
    		$('[id^="title_sh4_geo_"]').show();
    		$('[id^="a_sh4_geo_"]').show();
    		}
    	break
    	case '_5':
    		{
    		$('#sh5_inf').show();
    		$('#title_sh5_inf').show();
    		$('#sh5_sc').show();
    		$('#title_sh5_sc').show();
    		}
    	break
    	}
    }
    }
function hide_all()
	{
	$('#relation_personal').hide();
    $('#title_relation_personal').hide();
    $('#geo_personal').hide();
    $('#title_geo_personal').hide();
	$('#sh2_inf').hide();
    $('#title_sh2_inf').hide();
    $('#sh2_inf_t').hide();
    $('#title_sh2_inf_t').hide();
    $('[id^="sh2_geo_"]').hide();
    $('[id^="title_sh2_geo_"]').hide();
    $('[id^="a_sh2_geo_"]').hide();
	$('#sh3_inf').hide();
   	$('#title_sh3_inf').hide();
	$('#sh4_inf').hide();
    $('#title_sh4_inf').hide();
    $('#sh4_sc').hide();
    $('#title_sh4_sc').hide();
    $('[id^="sh4_geo_"]').hide();
    $('[id^="title_sh4_geo_"]').hide();
    $('[id^="a_sh4_geo_"]').hide();
	$('#sh5_inf').hide();
    $('#title_sh5_inf').hide();
    $('#sh5_sc').hide();
    $('#title_sh5_sc').hide();
	} 
//добавление сферы деятельности	
function add_scope(n_id,text)
	{
	var n_el=$('[id^="'+n_id+'_"]').length;
	if(dump)console.log(n_el);
	if(dump)console.log(n_id);
	$('#add_'+n_id).closest('div').before('<div class="b-form_item b-form_item_text">\
		<div class="b-form_item_label">\
		<label for="'+n_id+'_'+(n_el+1)+'">'+text+'</label>\
		</div><div class="b-form_item_field g-border-radius">\
		<input autocomplete="off" type="text" id="'+n_id+'_'+(n_el+1)+'" value="">\
		</div></div><div class="g-clean"></div>');
	}
//добавление гео
function add_geo_region(n_id)
	{
	//добавляем див
	var n_el=($('[id^="'+n_id+'_"]').length+1);
	if(dump)console.log(n_el);
	if(dump)console.log(n_id);
	var ins='<h4 id="title_sh4_geo_'+n_el+'">Регион №'+n_el+'</h4>\
	<div class="b-form_area  g-border-radius" id="sh4_geo_'+n_el+'"><div class="b-form_item b-form_item_select" >\
	<div class="b-form_item_field"><select data-placeholder="Федеральный округ" name="fed_okrug" id="fed_okrug_ur_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option><option value="0" selected >Выберите округ</option>\
	<option value="1" >Центральный федеральный округ</option>\
	<option value="2" >Южный федеральный округ</option>\
	<option value="3" >Северо-Западный федеральный округ</option>\
	<option value="4" >Дальневосточный федеральный округ</option>\
	<option value="5" >Сибирский федеральный округ</option>\
	<option value="6" >Уральский федеральный округ</option>\
	<option value="7" >Приволжский федеральный округ</option>\
	<option value="8" >Северо-Кавказский федеральный округ</option>\
	</select></div>\
	</div><div class="g-clean"></div>\
	<div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Область" name="oblasti" id="oblasti_ur_'+n_el+'"    class="chosen-select-deselect">\
	<option value=""></option></select></div></div><div class="g-clean"></div><div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Район" name="raion" id="raion_ur_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option></select></div></div><div class="g-clean"></div><div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Город" name="gorod" id="gorod_ur_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option></select></div></div><div class="g-clean"></div><div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Улица" name="street" id="street_ur_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option></select></div></div>\
	<div class="g-clean"></div><div class="b-form_item b-form_item_text" >\
	<div class="b-form_item_label"><label for="house_ur_1">Дом</label>\
	</div><div class="b-form_item_field g-border-radius"><input autocomplete="off" type="text" name="house" id="house_ur_'+n_el+'" value="">\
	</div></div><div class="g-clean">\
	</div></div>\
	<div class="b-board-list_more" id="a_sh4_geo_'+n_el+'">\
		<a onclick="add_geo_region(\'sh4_geo\');return false;" href="#">Добавить регион</a>\
		</div>\
	</div>';
	$('#a_'+n_id+'_'+(n_el-1)).before(ins);
	//удаляем ссылку
	$('#a_'+n_id+'_'+(n_el-1)).remove();
	//добавляем обработчек
	$(".chosen-select-deselect").chosen({allow_single_deselect:true});
	$('.chosen-select').chosen();
	geo_on();
	}
//добавить мкд
function add_mkd(n_id)
	{
	//добавляем див
	var n_el=($('[id^="'+n_id+'_"]').length+1);
	if(dump)console.log(n_el);
	if(dump)console.log(n_id);
	var ins='<h4 id="title_sh2_geo_'+n_el+'">Адресс МКД №'+n_el+'</h4>\
	<div class="b-form_area  g-border-radius" id="sh2_geo_'+n_el+'">\
	<div class="b-form_item b-form_item_text" >\
	<div class="b-form_item_label"><label for="index_tsg_'+n_el+'">Индекс</label>\
	</div><div class="b-form_item_field g-border-radius"><input autocomplete="off" type="text" name="house" id="index_tsg_'+n_el+'" value="">\
	</div></div><div class="g-clean">\
	</div>\
	<div class="b-form_item b-form_item_select" >\
	<div class="b-form_item_field"><select data-placeholder="Федеральный округ" name="fed_okrug" id="fed_okrug_tsg_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option><option value="0" selected >Выберите округ</option>\
	<option value="1" >Центральный федеральный округ</option>\
	<option value="2" >Южный федеральный округ</option>\
	<option value="3" >Северо-Западный федеральный округ</option>\
	<option value="4" >Дальневосточный федеральный округ</option>\
	<option value="5" >Сибирский федеральный округ</option>\
	<option value="6" >Уральский федеральный округ</option>\
	<option value="7" >Приволжский федеральный округ</option>\
	<option value="8" >Северо-Кавказский федеральный округ</option>\
	</select></div>\
	</div><div class="g-clean"></div>\
	<div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Область" name="oblasti" id="oblasti_tsg_'+n_el+'"    class="chosen-select-deselect">\
	<option value=""></option></select></div></div><div class="g-clean"></div><div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Район" name="raion" id="raion_tsg_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option></select></div></div><div class="g-clean"></div><div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Город" name="gorod" id="gorod_tsg_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option></select></div></div><div class="g-clean"></div><div class="b-form_item b-form_item_select" ><div class="b-form_item_field">\
	<select data-placeholder="Улица" name="street" id="street_tsg_'+n_el+'" class="chosen-select-deselect">\
	<option value=""></option></select></div></div>\
	<div class="g-clean"></div><div class="b-form_item b-form_item_text" >\
	<div class="b-form_item_label"><label for="house_tsg_'+n_el+'	">Дом</label>\
	</div><div class="b-form_item_field g-border-radius"><input autocomplete="off" type="text" name="house" id="house_tsg_'+n_el+'" value="">\
	</div></div><div class="g-clean">\
	</div></div>\
	<div class="b-board-list_more" id="a_sh2_geo_'+n_el+'">\
		<a onclick="add_mkd(\'sh2_geo\');return false;" href="#">Добавить адресс МКД</a>\
		</div>\
	</div>';
	$('#a_'+n_id+'_'+(n_el-1)).before(ins);
	//удаляем ссылку
	$('#a_'+n_id+'_'+(n_el-1)).remove();
	//добавляем обработчек
	$(".chosen-select-deselect").chosen({allow_single_deselect:true});
	$('.chosen-select').chosen();
	geo_on();
	}
//изменение гео левела 	
function select_level()
	{
	if(1)
		{}
	else if(2)
		{}
	else if(3)
		{}
	else if(4)
		{}
	}