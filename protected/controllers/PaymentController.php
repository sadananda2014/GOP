<?php

class PaymentController extends Controller
{
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  //public $layout='//layouts/column2';

  /**
   * @return array action filters
   */
  public function filters()
  {
    return array(
      'accessControl', // perform access control for CRUD operations
    );
  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules()
  {
    return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('index','view'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','name','course','history','Paymentreport','Duration','admin'),
        'users'=>UserModule::getDataentrys(),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('create','update','name','course','history','Paymentreport','Duration','admin','delete','CreateExcel'),
        'users'=>UserModule::getAdmins(),    
      ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
    );
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id)
  {
    Yii::app()->clientScript->registerCoreScript('jquery'); 
    $this->render('view',array(
      'model'=>$this->loadModel($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate()
  {
    $model=new Payment;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Payment']))
    {
	 //print_r($_POST['Payment']);
	 $duration=Fee::model()->findByPk($_POST['Payment']['course_id'])->duration;
	 $criteria = new CDbCriteria;
	$criteria->select='MAX(transaction_no) as transaction_no';
	$product = Payment::model()->find($criteria);
	$duration=$duration+1;
	 $models=array();
	 for($i=1;$i<=$duration;$i++)
	  {
	     $models[$i]=new Payment;
		 
	  } 
	  
	 $student=$_POST['Payment']['student_id'];
	 $payment_due_date=$_POST['Payment']['payment_due_date'];
	 $payment_date=$_POST['Payment']['payment_date'];
	 $joined_date=$_POST['Payment']['joined_date'];
	 $mode_of_payment=$_POST['Payment']['mode_of_payment'];
	 $payment_details=$_POST['Payment']['reference'];
	 $balance=$_POST['Payment']['balnce'];
	 $status=$_POST['Payment']['status'];
	 $reciept_no=$_POST['Payment']['reciept_no'];
	 $course_id=$_POST['Payment']['course_id'];
	 $total_fee=$_POST['Payment']['total_fee'];
	 $notes=$_POST['Payment']['notes'];
	 foreach($models as $i=>$model1)
	  {
      $model->attributes=$_POST['Payment'][$i];
	  //print_r("paid month".$i."aa".$model->pay_now);
	  $model->student_id=$student;
	  $model->payment_due_date=$payment_due_date;
	  $model->payment_date=$payment_date;
	  $model->joined_date=$joined_date;
	  $model->mode_of_payment=$mode_of_payment;
	  $model->reference=$payment_details;
	  $model->balnce=$balance;
	  $model->status=$status;
	  $model->reciept_no=$reciept_no;
	  $model->course_id=$course_id;
	  $model->total_fee=$total_fee;
	  $model->transaction_no=$product[transaction_no]+1;
	  $model->notes=$notes;
	  //$model->paid_month=$_POST['Payment'][$i]['paid_month'];
	  
	  
	  
      //$date = new DateTime("+".Fee::model()->findByPk($model->course_id)->duration."");
      //$model->payment_due_date= $date->format("Y-m-d");
      //echo "shfsf".$model->payment_due_date;
	  if($model->paid_month != null && $model->pay_now != null )
           { 
      $model->save();
           }
       $model=new Payment; 
     }
	 $this->redirect(array('admin'));
 }
    $this->render('create',array(
      'model'=>$model,
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated.transaction_no
   */
  public function actionUpdate($id)
  {
    $model=Payment::model()->findByAttributes(array('transaction_no'=>$id));;
    $models=array();
    $models=Payment::model()->findAll('transaction_no='.$id.'');
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    $valid=true;
	
    if(isset($_POST['Payment']))
    {
	  //print_r($_POST['Payment']);
	 $student=$_POST['Payment']['student_id'];
	 $payment_due_date=$_POST['Payment']['payment_due_date'];
	 $payment_date=$_POST['Payment']['payment_date'];
	 $joined_date=$_POST['Payment']['joined_date'];
	 $mode_of_payment=$_POST['Payment']['mode_of_payment'];
	 $payment_details=$_POST['Payment']['reference'];
	 $balance=$_POST['Payment']['balnce'];
	 $status=$_POST['Payment']['status'];
	 $reciept_no=$_POST['Payment']['reciept_no'];
	 $course_id=$_POST['Payment']['course_id'];
	 $total_fee=$_POST['Payment']['total_fee']; 
	 $transaction_no=$_POST['Payment']['transaction_no'];
	 $notes=$_POST['Payment']['notes'];
	 $count=count($models);
	   foreach($models as $i=>$model)
        {
	  if(isset($_POST['Payment'][$i]))
      $model->attributes=$_POST['Payment'][$i];
	  $model->student_id=$student;
	  $model->payment_due_date=$payment_due_date;
	  $model->payment_date=$payment_date;
	  $model->joined_date=$joined_date;
	  $model->mode_of_payment=$mode_of_payment;
	  $model->reference=$payment_details;
	  $model->balnce=$balance;
	  $model->status=$status;
	  $model->reciept_no=$reciept_no;
	  $model->course_id=$course_id;
	  $model->total_fee=$total_fee;
	  $model->transaction_no=$transaction_no;
	  	  $model->notes=$notes;
	  $valid=$model->validate() && $valid;
       if($valid)
        {
			if($i==$count-1)
			{
			  //print("IIcount".$i);
			   $model->save(false);
			   $this->redirect(array('admin'));
			}
			else
			{
			   //print("IIIelse".$i);
			   $model->save(false);
			}
		 }
		 
	}
        
    }

    $this->render('update',array(
      'model'=>$model,'models'=>$models,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id)
  {
    if(Yii::app()->request->isPostRequest)
    {
      // we only allow deletion via POST request
      //$this->loadModel($id)->delete();
		Payment::model()->deleteAll("transaction_no='$id'");
      // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    else
      throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
  }

  /**
   * Lists all models.
   */
  public function actionIndex()
  {
    $dataProvider=new CActiveDataProvider('Payment');
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }

    public function actionName(){

    $varFromPost = $_POST['selected_code']; 
    
  /*  $previous = Payment::model()->findByAttributes(array('student_id'=>$varFromPost),array('order'=>'payment_id DESC'));
     if(isset($previous))
     {
      $payment_date=null;
      $payment_date=$previous->payment_date;  
       $return_array[] = array(
        'payment_id'=>$previous->payment_id,
        'student_id'=>$previous->student_id,
        'payment_date'=>$previous->payment_date,
        'joined_date'=>$previous->joined_date,
        'course_id'=>$previous->course_id,
        'total_fee'=>$previous->total_fee,
        'pay_now'=>$previous->pay_now,
        'balnce'=>$previous->balnce,
        'reciept_no'=>$previous->reciept_no,
        'status'=>$previous->status,
        'mode_of_payment'=>$previous->mode_of_payment,
        'payment_due_date'=>$previous->payment_due_date,
        );
    }
    else
    {*/
    
      $name1 = Registration::model()->findByPk($varFromPost)->joined_date;
      
      $name2 = BatchStudents::model()->findByAttributes(array('student_id'=>$varFromPost));
      $cycle_month=$name2->cycle_of_fee;
      $total_fee=$name2->total_fee;
	  $duration=Fee::model()->findByPk($cycle_month)->duration;
      
      $return_array[] = array(
                  'course_id'=>$cycle_month,
                  'total_fee'=>$total_fee,
                  'joined_date'=>$name1,
				  'duration'=>$duration,
                  );
    //}     
    echo  json_encode($return_array);
  
  }
  
  public function actionCourse(){

    $varFromPost = $_POST['selected_code']; 
    $name1 = Fee::model()->findByPk($varFromPost)->total_fee;
    echo $name1;
  
  }
  
  public function actionDuration(){

    $course_id = $_POST['course_id']; 
    $name1 = Fee::model()->findByPk($course_id)->duration;
    echo $name1;
  
  }
  
  public function actionHistory($id)
    {
	Yii::app()->clientScript->registerCoreScript('jquery');
    $history = Payment::model()->findAllByAttributes(array('student_id'=>$id)); 
    //print_r($history);
    $this->render('history',array(
    'history'=>$history , 
    )); 
    }
	
	public function actionPaymentreport($date=0)
    {
	Yii::app()->clientScript->registerCoreScript('jquery');
	$Criteria = new CDbCriteria();
	$Criteria->condition = "registration.student_status='Active' and payment_date<='$date' and  t.payment_due_date >= '$date'";
    $Criteria->join ='JOIN (registration) ON (registration.register_id=t.student_id)';
    $payment_report = Payment::model()->findAll($Criteria); 
    //print_r($payment_report);
    $this->render('payment_report',array(
    'payment_report'=>$payment_report , 
    )); 
    }
  /**
   * Manages all models.
   */
  public function actionAdmin()
  {
    $model=new Payment('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Payment']))
      $model->attributes=$_GET['Payment'];
      Yii::app()->user->setState('exportModel',$model);

    $this->render('admin',array(
      'model'=>$model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id)
  {
    $model=Payment::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param CModel the model to be validated
   */
  protected function performAjaxValidation($model)
  {
    if(isset($_POST['ajax']) && $_POST['ajax']==='payment-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
  
public function actionCreateExcel()
	{
		Yii::import('ext.phpexcel.XPHPExcel');
		$objPHPExcel= XPHPExcel::createPHPExcel();
		$objPHPExcel->getProperties()->setCreator("Payment Reports")
		->setLastModifiedBy("Payment Reports")
		->setTitle("Office 2007 XLSX Test Document")
		->setSubject("Office 2007 XLSX Test Document")
		->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
		->setKeywords("office 2007 openxml php")
		->setCategory("Payment Reports result file");

	$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'payment_id');
	$objPHPExcel->getActiveSheet()->SetCellValue('B3', 'student_id');
	$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'payment_date');
	$objPHPExcel->getActiveSheet()->SetCellValue('D3', 'joined_date');
	$objPHPExcel->getActiveSheet()->SetCellValue('E3', 'course_id');
	$objPHPExcel->getActiveSheet()->SetCellValue('F3', 'total_fee');
	$objPHPExcel->getActiveSheet()->SetCellValue('G3', 'pay_now');
	$objPHPExcel->getActiveSheet()->SetCellValue('H3', 'balance');
	$objPHPExcel->getActiveSheet()->SetCellValue('I3', 'reciept_no');
	$objPHPExcel->getActiveSheet()->SetCellValue('J3', 'status');
	$objPHPExcel->getActiveSheet()->SetCellValue('K3', 'mode_of_payment');
	$objPHPExcel->getActiveSheet()->SetCellValue('L3', 'payment_due_date');
    $objPHPExcel->getActiveSheet()->SetCellValue('M3', 'reference');
	$objPHPExcel->getActiveSheet()->SetCellValue('N3', 'paid_month');
	$objPHPExcel->getActiveSheet()->SetCellValue('O3', 'transaction_no');
	$objPHPExcel->getActiveSheet()->SetCellValue('P3', 'notes');
			/*$query = "SELECT vds_id,form_id,submitted_date,submitter_ip_address,form_name,literature,asset,first_name,last_name,email,phone,country,continents,utm_medium,utm_campaign,adgroup,keyword,channel,utm_source,custom1,custom2,custom3 from test.test123";

			$count=Yii::app()->db->createCommand('SELECT COUNT(*) from test.test123')->queryScalar();
			$sqldataProvider = new CSqlDataProvider(
                    $query,
                    array(
                           'totalItemCount'=>$count,
                           'keyField' =>'vds_id',
                           'pagination'=>false,
                          )
                    );

		// Get rawData and create dataProvider
		$rawData=$sqldataProvider->data;*/
	 if(Yii::app()->user->getState('exportModel'))
           $model=Yii::app()->user->getState('exportModel');		
           $dataProvider = $model->search();
		   $dataProvider->pagination = False;
		   $rawData=$dataProvider->getData();
		   $data = array();
         foreach ($rawData as $item) 
		  {
            $item->student_id=Registration::model()->findByPk($item->student_id)->name;
            $item->course_id=Fee::model()->findByPk($item->course_id)->description;
		  	$data[] = $item->attributes;
           
           
          }
						
									
		$objPHPExcel->getActiveSheet()->fromArray($data, null, 'A4');
		foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) 
		{
			$objPHPExcel->getActiveSheet()
             ->getColumnDimension($col)
             ->setAutoSize(true);
		} 
	    
		$col=$objPHPExcel->getActiveSheet()->getHighestDataColumn();
		$row=$objPHPExcel->getActiveSheet()->getHighestDataRow();
		$colrow=$col.$row;
		//echo $colrow;
	 $styleArray = array( 'borders' => array( 'allborders' => array( 'style' => PHPExcel_Style_Border::BORDER_THICK, 'color' => array('argb' => '00000000'), ), ), ); 
	 $objPHPExcel->getActiveSheet()->getStyle("A3:P3")->applyFromArray($styleArray);
	 $objPHPExcel->getActiveSheet()->getStyle("A3:$colrow")->getFill()->applyFromArray(
    array(
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => 'E9E9E9'),
    )
		);	
		
	$objPHPExcel->getActiveSheet()
    ->getStyle("A3:$colrow")
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
		//$objPHPExcel->getActiveSheet()->setAutoFilter('A3:R3');
	// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Roots Payment report');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="01payment-report.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		 $objWriter->save('php://output');
		Yii::app()->end();
	}
}
