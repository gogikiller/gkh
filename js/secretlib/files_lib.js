//Работа с файлами by saitix.dev
var Global_send_file=0;
function save_file(obj)
	{
	//$(obj.div).empty();
	//удаляем все из diva из obj.div грузим с obj.type из obj.id норм файлы грузим в obj.div_file
	if(dump)console.log(obj);
	var files_arr=document.getElementById(obj.id).files;
	if(dump)console.log(files_arr);
	var paket={type_file:obj.type_file};
	if(files_arr)
		{for(var i=0; i<files_arr.length; i++)
			{
			var formdata= new FormData();	
			var obj_file=files_arr[i];
			var ii=$('#'+obj.div+' span').size()+1;
			if(dump)console.log(ii);
			formdata.append('file',obj_file);
			formdata.append('query','save_new_file');
			formdata.append('paket',JSON.stringify(paket));
			formdata.append('js_token',js_token);
			$('#'+obj.div).append('<span id="F_'+obj.div+'_'+ii+'">'+obj_file.name+' <img src="img/load.gif" id="B_'+obj.div+'_'+ii+'"></span>');
			$('#B_'+obj.div+'_'+ii).css({width:'18px',height:'18px',top:'3px',position:'relative'});
			send_files_json({fd:formdata,div_file:obj.div,ii:ii});
			}
		}
	}
function send_files_json(obj)
	{
	//пишем в прогресс бар in.bar
	//грузим все файлы в in.div_file
	if(Global_send_file==1)
		window.setTimeout(function(){send_files_json(obj);},200);
	else	
		$.ajax({dataType:'json',data:obj.fd,processData:false,contentType:false,type:'POST',id:obj.div_file,ii:obj.ii,success:suc_upload_file});
	}		
function suc_upload_file(data)
	{	
	Global_send_file=0;
	if(dump)console.log(data);	
	if(dump)console.log(this.id);
	$('#B_'+this.id+'_'+this.ii).remove();
	if(data.status=='ok')
		{
		if(data.type==1)
			{
			$('#F_'+this.id+'_'+this.ii).empty();
			$('#F_'+this.id+'_'+this.ii).append('<img id="I_'+this.id+'_'+this.ii+'" src="'+data.src+'">');
			$('#I_'+this.id+'_'+this.ii).css({display:'block',marginbottom:'2px'});
			}
		$('#F_'+this.id+'_'+this.ii).append('<a href="#" onclick="dell_file(\''+data.id+'\');return false;">Удалить</a>');	
		}
	else
		{
		window.setTimeout('$(\'#F_'+this.id+'_'+this.ii+'\').remove()',4000);
		$('#F_'+this.id+'_'+this.ii).append(' '+data.err);
		}	
	}	