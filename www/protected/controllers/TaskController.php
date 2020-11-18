<?php   
class TaskController extends Controller {
	public $layout='//layouts/column1';
	private $_model;

//---------------------------------------------------------
	public function actionIndex()	{
	$this->redirect(array('begin/list'));
}
//---------------------------------------------------------
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

//---------------------------------------------------------

	public function accessRules()	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'actions'=>array('update','delete','create','list','all','cart','timeauto','postag','povozrg',
							'step1','updatebd','form','defect','printdefect','invautocomplete',
							'fioautocomplete','fio2autocomplete','act','forma','viewProch','sablon1'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
//---------------------------------------------------------
//----------------------------------------------
	public function actionForma()	{ 
	//	$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
	$model=Defect::model();

	if (isset($_POST['vse'])) {
	$model=new Defect;

			if(isset($_POST['Defect'])){
			$model->attributes=$_POST['Defect'];
			$model->fio1=$model->findbyfio($_POST['fio1']);
			$this->redirect(array('viewProch','nom'=>$model->nom,'fio1'=>$model->fio1));
                        } else print_r($model->geterrors());}
			$this->render('forma',array('model'=>$model));
		
//}	
				
}
//---------------------------------------------------------
//----------------------------------------------
	public function actionStep1()	{ 
	//	$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
	$model=Begin::model();
//$gurl=" "; 

			$this->render('step1',array('model'=>$model));
}
//----------------------------------------------
//----------------------------------------------
public function actionCart()	{ 
	//	$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
	$model=Begin::model();
//$gurl=" "; 

			$this->render('cart',array('model'=>$model));
		
	
				

}
//----------------------------------------------
	public function actionSablon1()	{ 
	//	$id=$_GET['id'];
		$nom=$_GET['nom'];
		$invlist=$_GET['invlist'];
		$data=$_GET['data'];
		$datae=$_GET['datae'];
		$tec=$_GET['tec'];
	$model=Defect::model();
	//	$fmodel=Fio::model()->findByPk($id);
		//	$model=Defect::model()->stage($id);
		$this->layout='//layouts/print';
		 	$this->render('sablon1',
			array('model'=>$model,'nom'=>$nom,'invlist'=>$invlist,'data'=>$data,'datae'=>$datae,'tec'=>$tec));
		
//}	
				
}
//---------------------------------------------------------
//----------------------------------------------
	public function actionViewProch()	{ 
		$nom=$_GET['nom'];
		$fio1=$_GET['fio1'];
	//	$fmodel=Fio::model()->findByPk($id);
			$model=Defect::model();
		$this->layout='//layouts/print';
		 	$this->render('_viewProch',array('model'=>$model,'nom'=>$nom,'fio1'=>$fio1));
		
//}	
				
}
//----------------------------------------------
	public function actionDefect()	{ 
	//	$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
	$model=Defect::model();
$gurl=" "; 
	if (isset($_POST['vse'])) {
	$model=new Defect;

			if(isset($_POST['Defect'])){
			$model->attributes=$_POST['Defect'];
			$model->fiolist=$model->findbyfio($_POST['fiolist']);
			$model->fio1=$model->findbyfio($_POST['fio1']);
			$model->fio2=$model->findbyfio($_POST['fio2']);
			$model->whodid=$model->findbyfio($_POST['whodid']);
                        $model->invlist=$_POST['invlist'];
//echo $model->invlist;
			$model->data=date("Y-m-d", strtotime($_POST['Defect']['data']));
			$model->datae=date("Y-m-d", strtotime($_POST['Defect']['datae']));
			if(isset($_POST['Defect']['tec'])) 
			$gurl.=((($gurl)?'&':'').$_POST['Defect']['tec']);
//echo ($_POST['Defect']['tec']).'YES!!!';
                	
			$model->tec=$model->fromArr($_POST['Defect']['tec']);
		} else
			$model->tec='';

	if ($model->validate()) {
			$model->save(); 
			$this->redirect(array('printdefect','id'=>$model->id));
                        } else print_r($model->geterrors());}
                       // $this->redirect(array('printdefect','id'=>$model->id));
		 
		 	
			$this->render('defect',array('model'=>$model));
		
//}	
				
}
//---------------------------------------------------------
//----------------------------------------------
	public function actionPrintdefect()	{ 
		$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
			$model=Defect::model()->findByPk($id);
		$this->layout='//layouts/print';
		 	$this->render('printdefect',array('model'=>$model));
		
//}	
				
}
//---------------------------------------------------------
public function actionCreate()	{
	$model=Upeaple::model(); 
	if (isset($_POST['vse1'])) {$model->eventNew($_POST['event']);};
	$otmodel=new Upeaple;
	if(isset($_POST['Upeaple'])){
		$otmodel->attributes=$_POST['Upeaple'];
		$otmodel->datae=date("Y-m-d", strtotime($_POST['Upeaple']['datae']));
		$time=($_POST['Upeaple']['hour'].':'.substr(100+$_POST['Upeaple']['minutes'],1));
		$otmodel->timemb=$time;
		$timeend=($_POST['Upeaple']['houre'].':'.substr(100+$_POST['Upeaple']['minutese'],1));
		$otmodel->timeend=$timeend;
	        $otmodel->tab=Yii::app()->user->id;
    		$otmodel->id_event=$otmodel->findbyevent($_POST['event']);						
		if ($otmodel->validate()) {
			$otmodel->save();
	//		$this->redirect(array('povozrg'));
print_r($otmodel->attributes);
		} else print_r($otmodel->geterrors());
	} 
		
					
	$this->render('create',array('model'=>$model,'otmodel'=>$otmodel));
}
//---------------------------------------------------------
public function actionUpdate()	{

        $id=$_GET['id'];
//	$model=new Upeaple;
	$upmodel=Upeaple::model()->findByPk($id);
//print $id;  
	if(isset($_POST['Upeaple'])){
	
		$upmodel->attributes=$_POST['Upeaple'];
		$upmodel->datae=date("Y-m-d", strtotime($_POST['Upeaple']['datae']));
		$time=($_POST['Upeaple']['hour'].':'.substr(100+$_POST['Upeaple']['minutes'],1));
		$upmodel->timemb=$time;
		$timeend=($_POST['Upeaple']['houre'].':'.substr(100+$_POST['Upeaple']['minutese'],1));
		$upmodel->timeend=$timeend;
	        $upmodel->tab=Yii::app()->user->id;
		$event=$_POST['Upeaple']['event'];
		if ($upmodel->validate()) {
			$upmodel->save();
		$this->redirect(array('povozrg'));
//print_r($upmodel->attributes);
		} else print_r($upmodel->geterrors());
	} 
		
					
	$this->render('update',array('model'=>$upmodel));
}


//---------------------------------------------------------
	public function actionPovozrg()
	{  	       	$model=Upeaple::model(); 
	               	if(isset($_POST['Upeaple'])) { 
					$up=Upeaple::model();
	
			$up->attributes=$_POST['Upeaple'];
				 
					if ($up->validate()) {
						$up->save();
					} else print_r($up->geterrors());  }
		if (!isset($tab)) { $tab=Yii::app()->user->id;}
//print Yii::app()->user->id;
//	$tab="sklad".(-1*$_POST['tab']);
//echo $tab;
		
	
                
			$this->render('povozrg',array('model'=>$model,'tab'=>Yii::app()->user->id));
//	$this->redirect(array('upeaple/povozrg'));

	
}
	
 //---------------------------------------------------------

public function actionBdays() {
		$model=Myotchet::model();  


		if (isset($_POST['fiolist']) and ($_POST['fiolist'])) {
			$find_id_fio=$model->findbyfio($_POST['fiolist']);
			if  ($find_id_fio>0) {
				$url=array('reestr/edit/'.$find_id_fio);
			}
				if ($url) {
					$this->redirect($url); //array('rassyl/addplusoper/'.$id.$rmodel->tab%600000)); 
				}
				
		}
		if(isset($_GET['Myotchet'])) {
			$model->attributes=$_GET['Myotchet'];
					if(isset($_POST['Myotchet']['newdevice'])){
						$model->attributes=$_POST['Myotchet'];
						if ($model->validate()) {
							$model->save();
//						$this->redirect(array('forma','id'=>$model->id));
						} else print_r($model->geterrors());}}
					
		$this->render('bdays',
			array(
				'model'=>$model,
				'filtr'=>array()
			)
		);

}
	
//------------------------------------------------
public function actionPostag()	{
	$model=Fio::model(); 
/*	if (isset($_POST['Fio'])) {
		$otmodel->tab=$_POST['Fio']['tab'];   */
//		$otmodel->attributes=$_GET['Myotchet'];
	$otmodel=new Myotchet;
	if(isset($_POST['Myotchet'])){
		$otmodel->attributes=$_POST['Myotchet'];
		$otmodel->data=Site::fromrusdat($otmodel->data);						
		if ($otmodel->validate()) {
			$otmodel->save();
			$this->redirect(array('bdays'));
print_r($otmodel->attributes);
		} else print_r($otmodel->geterrors());
	} 
		
					
	$this->render('postag',array('model'=>$model,'otmodel'=>$otmodel));
	}


//------------------------------------------------
public function actionBirthday()	{
	$model=Upeaple::model(); 
	$this->render('birthday',array('model'=>$model));
	}


//------------------------------------------------
//------------------------------------------------
public function actionForm()	{
	$model=Upeaple::model(); 
	$model->eventNew($_POST['Upeaple']['event']);
	$this->render('_form',array('model'=>$model));
	}


//------------------------------------------------

public function actionUpdatebd()	{
	$model=new Upeaple;
	if(isset($_POST['Upeaple'])){
	$dt=date("Y-m-d", strtotime($_POST['Upeaple']['datebd']));
	Upeaple::bdup($dt,$_POST['Upeaple']['name'],$_POST['Upeaple']['who']);
	$this->redirect(array('birthday'));}
//print_r($model->attributes); 
//print "Error";
	$this->render('updatebd',array('model'=>$model));
	}

//------------------------------------------------
	public function actionTimeauto() {
   		$resStr='';
		if (isset($_GET['q'])) {
			$parq=$_GET['q'];
			$sql=sprintf("
			select name
				from event 
				where name like '%s'
				order by name;
			     ",'%'.$parq.'%'
			);
			$command=Yii::app()->db->createCommand($sql); 
			$prows = $command->queryAll();
			foreach($prows as $prow) {
				$resStr .= ($prow['name']."\n");
			
			}
		}
	       	echo $resStr;
	}
	
//------------------------------------------------
/*	public function actionEventauto() {
   		$resStr='';
//		$skv=iconv('UTF-8','WINDOWS-1251','��.');

		if (isset($_GET['q'])) {
			$parq=$_GET['q'];
		//	if(is_numeric($parq) and strlen($parq)>3) $parq=substr($parq,0,3).'-'.substr($parq,3);
			$sql=sprintf("
				select name
				from event 
				where name like '%s'
				order by name;
			     ",'%'.$parq.'%'
			);
//print $sql;
			$command=Yii::app()->db->createCommand($sql); 
			$prows = $command->queryAll();
			foreach($prows as $prow) {
				$resStr .= ($prow['name']."\n");
			}
		}
	       	echo $resStr;
//	echo json_encode($aret);
	}
	    */    
//------------------------------------------------

	public function actionManauto() {

	$aret=array();
	$aret[]=array('id'=>0,'name'=>'-');
	$parq='';
	if ($_POST['id_org']) {
		$parq=$_POST['id_org'];
		$sql=sprintf("
			select t.tab as id, t.fio as name
			from kadry_vse.fio t
			inner join kadry_vse.otdels ON otdels.kod=t.otdel
			where t.otdel=%s
			order by t.fio;        
        	",      $parq
		);

		$command=Yii::app()->db->createCommand($sql); 
		$prows = $command->queryAll();
   
        	foreach($prows as $prow) {
//			$aret[]=array('id'=>$prow["id"],'name'=>iconv('WINDOWS-1251','UTF-8',$prow["name"]));
			$aret[]=array('id'=>$prow["id"],'name'=>$prow["name"]);
	        }
	}
	echo json_encode($aret);
	}
//----------------------------------------------
	public function actionInvautocomplete() {

		$resStr='';
	if (isset($_GET['q'])) {
		$parq=$_GET['q'];
		$sql=sprintf("
			select _typepc.name, reestr.inv_nom,pc.nameUs 
			from bit.reestr
			inner join _typepc on _typepc.id=reestr.type
			inner join pc on pc.id=substring(reestr.id,3) and pc.type=reestr.type
			where reestr.inv_nom like '%s'
		     ",'%'.$parq.'%'
		);
		$command=Yii::app()->db->createCommand($sql);
 
		$prows = $command->queryAll();
		foreach($prows as $prow) { 
			$resStr .= ($prow['name']." ".$prow['inv_nom']." ".$prow['nameUs']."\n"); 
		}
	}
       	echo $resStr;
	}
 //----------------------------------------------

	public function actionFioautocomplete() {

		$resStr='';
	if (isset($_GET['q'])) {
		$parq=$_GET['q'];
		$sql=sprintf("
			select ff.tab,concat(ff.fam,' ',ff.im,' ',ff.ot,' - ',ff.dolg ) as name,dolg 
			from fio ff
			where concat(ff.fam,' ',ff.im,' ',ff.ot) like '%s'  AND (END > DATE(NOW() - INTERVAL 2 MONTH) OR END =  '0000-00-00')
			order by tab;
		     ",$parq.'%','%'.$parq.'%'
		);
		$command=Yii::app()->db->createCommand($sql); 
		$prows = $command->queryAll();
		foreach($prows as $prow) {
			$resStr .= ($prow['name']." ".$prow['dolg']."\n"); 
		}
	}
       	echo $resStr;
	}
//----------------------------------------------

	public function actionFio2autocomplete() {

		$resStr='';
	if (isset($_GET['q'])) {
		$parq=$_GET['q'];
		$sql=sprintf("
			select ff.tab,concat(ff.fam,' ',ff.im,' ',ff.ot,' - ',ff.dolg ) as name,dolg 
			from fio ff
			where concat(ff.fam,' ',ff.im,' ',ff.ot) like '%s'  AND (END > DATE(NOW() - INTERVAL 2 MONTH) OR END =  '0000-00-00')
			order by tab;
		     ",$parq.'%','%'.$parq.'%'
		);
		$command=Yii::app()->db->createCommand($sql); 
		$prows = $command->queryAll();
		foreach($prows as $prow) {
			$resStr .= ($prow['name']."\n"); 
		}
	}
       	echo $resStr;
	}


}	
?>