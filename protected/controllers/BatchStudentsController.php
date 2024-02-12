<?php

class BatchStudentsController extends Controller
{
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout='//layouts/column1';

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
        'actions'=>array('create','update','createbatch','feedetails','admin'),
        'users'=>UserModule::getDataentrys(), 
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('create','update','createbatch','feedetails','admin','delete'),
        'users'=>UserModule::getAdmins(),
      ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
    );
  }

  /*BATCH CREATE  */
  
  public function actionCreatebatch()
          {
            $model=new BatchStudents;
            $models=array();
            $Criteria = new CDbCriteria();
            $Criteria->condition = "register_id not in(select student_id from batch_students) and student_status='Active'";
            $models = Registration::model()->findAll($Criteria);
            //array_unshift($models,"");
            //unset($models[0]);
              if(isset($_POST['BatchStudents']))
        {
          
                   
           foreach($models as $i=>$model1)
              {
            $valid=true;
             if(isset($_POST['BatchStudents'][$i]))
              {  
              //print_r($_POST['BatchStudents'][$i]);
              $model->student_id =$model1->register_id;
              $model->student_name =$model1->name;
              $model->attributes=$_POST['BatchStudents'][$i];
              $duration=Fee::model()->findByPk($model->cycle_of_fee)->duration;
              $model->total_fee=$model->monthly_fee*$duration;
              //print_r($model->attributes);
              $valid=$model->validate() && $valid;
              
                
                if($model->batch_id != null && $valid)
                  {
                    //echo "cycle==".$model->cycle_of_fee;
                    $model->save();
                    $model=new BatchStudents;
                  }
            }
            }
      
          //if($model->save())
          $this->redirect(array('BatchStudents/admin'));
        }
                            
         $this->render('create1',array(
        'model'=>$model,
              'models'=>$models,
          ));
          }
  
  
  
  /* Create batch end       */
  
  
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
    $model=new BatchStudents;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['BatchStudents']))
    {
      $model->attributes=$_POST['BatchStudents'];
      if($model->save())
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
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['BatchStudents']))
    {
      $model->attributes=$_POST['BatchStudents'];
      $duration=Fee::model()->findByPk($model->cycle_of_fee)->duration;
      $model->total_fee=$model->monthly_fee*$duration;
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
    $dataProvider=new CActiveDataProvider('BatchStudents');
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin()
  {
    $model=new BatchStudents('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['BatchStudents']))
      $model->attributes=$_GET['BatchStudents'];

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
    $model=BatchStudents::model()->findByPk($id);
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='batch-students-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
  
  public function actionFeedetails(){
  
      $varFromPost = $_POST['cycle_of_fee']; 
      $name2 = Fee::model()->findByAttributes(array('id'=>$varFromPost));
	  $monthly_fee=$name2->total_fee;
	  $duration=$name2->duration;
	  $total_fee=$monthly_fee*$duration;
	  $return_array[] = array(
                  'monthly_fee'=>$monthly_fee,
                  'total_fee'=>$total_fee,
				  'duration'=>$duration,
                  );
		echo  json_encode($return_array);
  		  
  }
}
