<?
class Maps
	{
	function show_indexes_container()
		{
		return '<div class="g-border-grey g-border-radius"><div id="mapsgkh" style="width:760px;height:550px"></div></div>';
		}
	function ret_fed_okrug($obj)
		{
		$this->connect_bd();
		if($obj->all)
			$obl[]=array('value'=>'all','name'=>'Все');
		else
			$obl[]=array('value'=>0,'name'=>'Выберите округ');	
		$q=mysql_query('Select name,id from fed_okrug');
		while($qq=mysql_fetch_array($q))
			{$obl[]=array('value'=>$qq['id'],'name'=>$qq['name']);}
		$input->status='ok';
		$input->data=$obl;
		$this->disconnect_bd();	
		return $input;
		}
	function ret_obl($obj)
		{
		if(is_numeric($obj->aoguid))
			{
			$this->connect_bd();
			if($obj->all)
				$obl[]=array('value'=>'all','name'=>'Весь регион');
			else
				$obl[]=array('value'=>0,'name'=>'Выберите область');	
			$q=mysql_query('Select name,aoguid from oblasti where okrugcode="'.$this->check_in($obj->aoguid).'"');
			while($qq=mysql_fetch_array($q)){
				$obl[]=array('value'=>$qq['aoguid'],'name'=>$qq['name']);
			}
			$input->status='ok';
			$input->data=$obl;
			$this->disconnect_bd();	
			}
		else
			$input->status='no';
		return $input;
		}
	function ret_geo_fias($obj)
		{
		if($obj->aoguid!='' && is_numeric($obj->level))
			{
			$obz=array('3'=>'район','4'=>'город','6'=>'населенный пункт','7'=>'улицу');
			$this->connect_bd();
			$q=mysql_query('Select shortname,formalname,aoguid from d_fias_addrobj where parentguid="'.$this->check_in($obj->aoguid).'" and '.(is_numeric($obj->level2)?'(':'').'aolevel="'.$this->check_in($obj->level).'" '.(is_numeric($obj->level2)?'or aolevel="'.$this->check_in($obj->level2).'")':'').' and actstatus="1" order by formalname');
			if($obj->all && $obj->level==3)
				$obl[]=array('value'=>0,'name'=>'Выберите '.$obz[$obj->level]);
			if($obj->all)
				$obl[]=array('value'=>'all','name'=>'Все');
			else
				$obl[]=array('value'=>0,'name'=>'Выберите '.$obz[$obj->level]);	
			while($qq=mysql_fetch_array($q)){
				$obl[]=array('value'=>$qq['aoguid'],'name'=>(($qq['shortname']!='ул' && $qq['shortname']!='г' && $qq['shortname']!='р-н')?$qq['shortname'].' ':'').$qq['formalname']);}
			$this->disconnect_bd();
			$input->status='ok';
			//$input->q='Select shortname,formalname,aoguid from d_fias_addrobj where parentguid="'.$this->check_in($obj->aoguid).'" and '.(is_numeric($obj->level2)?'(':'').' aolevel="'.$this->check_in($obj->level).'" '.(is_numeric($obj->level2)?'or aolevel="'.$this->check_in($obj->level2).'")':'').' and actstatus="1" order by formalname';
			$input->data=$obl;
			}
		else
			$input->status='no'; 
			return $input;	
		}
	function get_inf_geo($paket)
		{
		//получаем пакет с текстоами и id перерабатываем его и выдаем результат с id	
		//okrug//obl//sity////raion//house
		}
								
	}
?>