<?php

class AttendanceController extends Controller
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
        'actions'=>array('index','view','attupdate'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','atcheck','Batchids','active','deactive','admin'),
        'users'=>array('@')
      ),
	  array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','atcheck','Batchids','active','deactive','admin'),
        'users'=>UserModule::getDataentrys(),
      ),
	  
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('create','update','atcheck','Batchids','active','deactive','admin','admin','delete'),
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
    $model=new Attendance;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Attendance']))
    {
      $model->attributes=$_POST['Attendance'];
      if($model->save())
        $this->redirect(array('admin'));
    }

    $this->render('create',array(
      'model'=>$model,
    ));
  }



        public function actionattupdate()
          {
            $model=new Attendance;
            $models=array();
            $Criteria = new CDbCriteria();
      if(isset($_GET['batch']))
      {
            $Criteria->condition = "batch_id=".$_GET['batch']." and registration.student_status='Active'";
      $Criteria->join =' JOIN (registration) ON (registration.register_id=t.student_id)';
            $models = BatchStudents::model()->findAll($Criteria);
      }
            //array_unshift($models,"");
            //unset($models[0]);
              if(isset($_POST['Attendance']))
        {
          
                   
           foreach($models as $i=>$model1)
              {
            $valid=true;
             if(isset($_POST['Attendance'][$i]))
              {  
              //print_r($_POST['Attendance'][$i]);
              $model->student_batch_id =$model1->student_id;
              $model->date =date('Y-m-d');
                            $model->batch=$_GET['batch'];             
              $model->attributes=$_POST['Attendance'][$i];
                                                        //echo "hi".$model->status;
              $valid=$model->validate() && $valid;
              
                
                if($valid)
                  {
                    //echo "batch_id==".$model->batch_id;
                    $model->save();
                    $model=new Attendance;
                  }
            }
            }
      
          //if($model->save())
          $this->redirect(array('Attendance/admin'));
        }
                            
         $this->render('create1',array(
        'model'=>$model,
              'models'=>$models,
          ));
          }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id)
  {
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Attendance']))
    {
      $model->attributes=$_POST['Attendance'];
      if($model->save())
        $this->redirect(array('admin'));
    }

    $this->render('update',array(
      'model'=>$model,
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
      $this->loadModel($id)->delete();

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
    $dataProvider=new CActiveDataProvider('Attendance');
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin()
  {
    $model=new Attendance('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Attendance']))
      $model->attributes=$_GET['Attendance'];

    $this->render('admin',array(
      'model'=>$model,
    ));
  }
  
  
  public function actionBatchids()
  {
    
    $taluqs = Batch::model()->findAll('batch_location=:batch_location', array(':batch_location' => (int) $_POST['ctr']));
    $return = CHtml::listData($taluqs, 'batch_id', 'batch_name');
    foreach ($return as $taluqId => $taluqName) {
    echo CHtml::tag('option', array('value' => $taluqId), CHtml::encode($taluqName), true);
}
  }
  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id)
  {
    $model=Attendance::model()->findByPk($id);
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='attendance-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
  
  public function actionAtcheck()
  {
    $batch=$_POST['data1'];
	$date=$_POST['date'];
    $name4 = Attendance::model()->findByAttributes(array('batch'=>$batch,'date'=>$date));
     print_r($name4);
    
  }
  
  
}
