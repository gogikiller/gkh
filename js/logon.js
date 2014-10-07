function on_registration()
	{
	var paket=new Object();
	paket={
		name:$('#name').val(),
		soname:$('#soname').val(),
		email:$('#email').val(),
		password:$('#password').val(),
		date_brith:$('#date_brith').val(),
		montch_brith:$('#montch_brith').val(),
		year_brith:$('#year_brith').val(),
		sex:$('input[name=sex]:checked').val(),
		captcha:$('#kapcha').val()
	}
	console.log(paket);	
	$('#error_report').html('<img src="/gkh/img/load_s.gif">');
	$('#reg_button').prop('disabled', true);
	console.log(paket);
	$.ajax({dataType:'json',type:'POST',url:'lib/logon_lib.php',
		data:'paket='+encodeURIComponent(JSON.stringify(paket))+'&query=on_reg',
		complete:activ_registration});
	}	
function activ_registration(data)
	{
	console.log(data);
	var big_data=jQuery.parseJSON(data.responseText);
	if(big_data.status=='no'){
		$('#error_report').html(big_data.err);
		$('#reg_button').prop('disabled', false);
		$('#kapcha_img').html('<center><img src="/gkh/img/captcha.php?1"></center>');
		$('#kapcha').val('');
	}
	else
		{
		$('.b-form').hide();	
		$('.l-page-content').html(big_data.div);
		}
	}
function on_logon()
	{
	var paket=new Object();
	paket={
		login:$('#login').val(),
		password:$('#password').val()
		}
	if($("#kapcha_img").length)
		paket.captcha=$('#kapcha').val();
	$('#error_report').html('<img src="/gkh/img/load_s.gif">');
	$('#logon_button').prop('disabled', true);
	console.log(paket);
	$.ajax({dataType:'json',type:'POST',url:'lib/logon_lib.php',
		data:'paket='+encodeURIComponent(JSON.stringify(paket))+'&query=on_logon',
		complete:activ_onlogon});	
	}
function activ_onlogon(data)
	{
	console.log(data);
	var big_data=jQuery.parseJSON(data.responseText);
	if(big_data.status=='no'){
		console.log('#err:'+big_data.err);
		$('#error_report').html(big_data.err);
		$('#logon_button').prop('disabled', false);
		if($("#kapcha_img").length)
			{
			$('#kapcha_img').html('<center><img src="/gkh/img/captcha.php?1"></center>');
			$('#kapcha').val('');
			}
		else if(big_data.captcha)
		{
		$('#big_form').after(function (){
			return '<h5 style="margin-top: 30px;">Введите код с картинки</h5> \
			<div class="b-form_captcha  g-border-radius"><div class="b-form_captcha_item"> \
			<div id="kapcha_img"><center><img src="/gkh/img/captcha.php?11"></center></div> \
			</div><div class="g-clean"></div> \
			<div class="b-form_captcha_item"><div class="b-form_captcha_item_field g-border-radius"> \
			<input type="text" id="kapcha"></div></div><div class="g-clean"></div></div>';
		});
		}
	}
	else
		window.location = "/gkh/личный_кабинет";
	}
function on_recovery()
	{
	var paket=new Object();
	paket={
		login:$('#email').val(),
		captcha:$('#kapcha').val()
	}
	$('#error_report').html('<img src="img/load_s.gif">');
	$('#recov_users_button').prop('disabled', true);
	console.log(paket);
	$.ajax({dataType:'json',type:'POST',url:'lib/logon_lib.php',
		data:'paket='+encodeURIComponent(JSON.stringify(paket))+'&query=on_rec',
		complete:activ_recovery});	
	}	
function activ_recovery(data)
	{
	console.log(data);
	var big_data=jQuery.parseJSON(data.responseText);
	if(big_data.status=='no'){
		$('#error_report').html(big_data.err);
		$('#recov_users_button').prop('disabled', false);
		$('#kapcha_form').html('<center><img src="images/captcha.php?1"></center><input type="text" id="kapcha">');
	}
	else
		{
		$('.b-form').hide();	
		$('.l-page-content').html(big_data.div);
		}
	}
$(function(){
	$('#reg_button').click(function(){on_registration()});
	$('#logon_button').click(function(){on_logon()});
	$('#recov_users_button').click(function(){on_recovery()});
});		
