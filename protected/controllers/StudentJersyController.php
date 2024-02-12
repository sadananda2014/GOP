<?php

class StudentJersyController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update','checkavl','admin'),
				'users'=>UserModule::getDataentrys(),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','checkavl','admin','delete'),
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
	   
		$model =new StudentJersy;
        $models=array();
				for($i=1;$i<=2;$i++)
				{
                    $models[$i] = new StudentJersy();
                }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentJersy']))
		{
		
		foreach($models as $i=>$model1)
			{
			$valid=true;
			 if(isset($_POST['StudentJersy'][$i]))
			 {
			   $model->attributes=$_POST['StudentJersy'][$i];
			   //print_r($model->attributes);
			   $model->student_id=$_POST['StudentJersy']['student_id'];
			   $valid=$model->validate() && $valid;
			   if($model->color_id != null && $model->brand_id != null && $valid)
			   {
				$model->save();
				//print_r($model->color_id);
			   }
		}
		$model =new StudentJersy;
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
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=StudentJersy::model()->findByAttributes(array('student_id'=>$id));
		//print_r($model);
        $models=array();
        $models=StudentJersy::model()->findAll('student_id='.$id.'');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
         $valid=true;
		if(isset($_POST['StudentJersy']))
		{
		   foreach($models as $i=>$model)
             {
			 if(isset($_POST['StudentJersy'][$i]))
			$model->attributes=$_POST['StudentJersy'][$i];
			$valid=$model->validate() && $valid;
			if($valid)
             {
			$model->save(false);
			 }
			 }
        $this->redirect(array('admin'));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('StudentJersy');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentJersy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentJersy']))
			$model->attributes=$_GET['StudentJersy'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function actionCheckavl()
	{
		$size=$_POST['size'];
		$color=$_POST['color'];
		$brand=$_POST['brand'];
		$total_count=0;
		$quantity_sum =0;
		//$criteria = new CDbCriteria;
		//$criteria->condition='" brand_id="'.$brand.'" and color_id="'.$color.'" and size_id="'.$size.'"';
		//$previous = Inventory::model()->findAll($criteria);
		$jersy = Jersy::model()->findBySql('select sum(quantity) as quantity from jersy where brand_id="'.$brand.'" and color_id="'.$color.'" and size_id="'.$size.'" ', array());
        
		$jersyassign = StudentJersy::model()->findBySql('select count(jersy_id) as jersy_id from student_jersy where brand_id="'.$brand.'" and color_id="'.$color.'" and size_id="'.$size.'" ', array());
		
		if(!empty($jersy))
		{
			$quantity_sum =$jersy->quantity;
			//echo "sum".$quantity_sum;
		}
		
		if(!empty($jersyassign))
		{
			$total_count =$jersyassign->jersy_id;
			//echo "count".$total_count;
		}
		
		if(($quantity_sum - $total_count)>0)
		  {
		    echo 1;
		}
		else
		{
		   echo 0;
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentJersy the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=StudentJersy::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentJersy $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-jersy-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
