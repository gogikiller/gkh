<?
if(!isset($_SESSION))session_start();
class Files
{
//Дозагрузка файла	
function save_new_file($file,$paket)
	{
	//var_dump($paket);	
	$input->status='no';
	$dir='/var/www/gkh/usr';
		$in=($this->global_user_id?$dir.'/'.$this->global_user_id:$dir);
	$tr_file->{1}=array("image/gif","image/png","image/jpeg","image/pjpeg","image/x-png");
	$tr_ext->{1}=array('.gif','.jpg','.png','.JPG','.GIF','.PNG');
	if($paket->type_file==1)
		{
		//проверка на соответсвие граф файлу...
		$ext_name=strrchr($file['name'],'.');
		if(in_array($file['type'],$tr_file->{1}) && in_array($ext_name,$tr_ext->{1}))
			{
			if(!is_dir($in))mkdir($in);
			$new_f_n1=uniqid(2);
			$new_f_n=$new_f_n1.strtolower($ext_name);
			if(file_exists($in."/".$new_f_n))$new_f_n=uniqid(2).$new_f_n;
			if(move_uploaded_file($file['tmp_name'],$in.'/'.$new_f_n))
				{
				$this->connect_bd();
				$input->dop_dell=Files::dell_files_once(1);
				$hashsumm=md5_file($in.'/'.$new_f_n);
				$add_q=mysql_query('Insert into files values ("","'.$in.'","'.$this->check_in($file['name']).'","'.$new_f_n.'","1","'.$this->global_user_id.'","'.$hashsumm.'","'.$this->date_time_bd().'")');
				$this->disconnect_bd();
				if($add_q)
					{
					$mass_t=array('.gif'=>'giv','.jpg'=>'jpg','.png'=>'png','.JPG'=>'jpg','.GIF'=>'gif','.PNG'=>'png');
					include_once('doplib/ac_image_class.php');
					$preloader=new acResizeImage($in.'/'.$new_f_n);
					$preloader->resize(170, 170)->save($in.'/',$new_f_n1,$mass_t[$ext_name],true,100);
					$preloader->resize(57, 57)->save($in.'/','a_'.$new_f_n1,$mass_t[$ext_name],true,100);
					$input->status="ok";
					$input->id=mysql_insert_id();
					$input->src=$this->dop.'usr/'.$this->global_user_id.'/'.$new_f_n;
					$input->type=1;
					}
				else
					$input->err='Файл не загружен из-за ошибки базы данных!';		
				}
			else
				$input->err='Файл не загружен!';
			}
		else
			$input->err='Файл не является картинкой!';	
		}
	return $input;
	}
//Удаляем лишние файлы 
function dell_files_once($type)
	{
	if($type==1)
		{$img=mysql_result(mysql_query('Select img from users_inf where user_id="'.$this->global_user_id.'"'),0);
		if($img)$and=' and name_in<>'.$img;}
	$dell_f_a='';
	$dell_f=mysql_query('Select name_in,dir,id from files where type="'.$type.'" and user_id="'.$this->global_user_id.'"'.$and);
	while($f=mysql_fetch_object($dell_f))
		{
		unlink($f->dir.'/'.$f->name_in);	
		unlink($f->dir.'/a_'.$f->name_in);	
		$dell_f_a[]=$f->id;
		}
	if($dell_f_a!='')
		$dell=mysql_query('Delete from files where id in ('.implode(',',$dell_f_a).')');
	else
		$dell=true;	
	return $dell;
	} 	
}
?>