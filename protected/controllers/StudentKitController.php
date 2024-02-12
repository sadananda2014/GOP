<?php

class StudentKitController extends Controller
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
        'actions'=>array('create','update','checkavl','replace','admin'),
        'users'=>UserModule::getDataentrys(),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('create','update','checkavl','replace','admin','delete'),
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
  
  
  public function actionCheckavl()
  {
    $size=$_POST['size'];
    $color=$_POST['color'];
    $brand=$_POST['brand'];
    $item=$_POST['item'];
    $criteria = new CDbCriteria;
    $criteria->condition='item_id="'.$item.'" and brand_id="'.$brand.'" and color_id="'.$color.'" and size_id="'.$size.'" and available_qty > 0';
    $previous = Inventory::model()->findAll($criteria);
    if((bool)$previous)
    {
      echo 1;
    }
    else
    {
       echo 0;
    }
  }
  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.models
   */
  public function actionCreate()
  {
    $model=new StudentKit;
                $models=array();
				for($i=1;$i<5;$i++)
				{
                    $models[$i] = new Item();
                }
			//$models=Item::model()->findAll();
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['StudentKit']))
    {  
      //print_r($_POST['StudentKit']['student_id'] );
      foreach($models as $i=>$model1)
       {
        $valid=true;
        if(isset($_POST['StudentKit'][$i]))
         {
          $model->attributes=$_POST['StudentKit'][$i];
          $model->student_id=$_POST['StudentKit']['student_id'];
          //print_r($model->attributes);
          if($model->status==null)
          {
            $model->status='Pending';
          }
          $model->date=date('Y-m-d');
          $valid=$model->validate() && $valid;
          if($model->item_id != null && $model->color_id != null && $model->brand_id != null && $model->size_id != null && $valid)
           {
            $model->save();
            InventoryHistory::model()->inventoryadd($model->item_id,$model->color_id,$model->brand_id,$model->size_id);
            $model=new StudentKit;
           }  
         }    
          
         }
       
       $this->redirect(array('admin'));
        }
    $this->render('create1',array(
      'model'=>$model,'models'=>$models,
    ));
  }

  
  public function actionReplace()
  {
    $model=new StudentKit;
                $models=array();
				for($i=1;$i<3;$i++)
				{
                    $models[$i] = new Item();
                }
			//$models=Item::model()->findAll();
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['StudentKit']))
    {  
    
      
      //print_r($_POST['StudentKit']['student_id'] );
      foreach($models as $i=>$model1)
       {
        $valid=true;
        if(isset($_POST['StudentKit'][$i]))
         {
          $model->attributes=$_POST['StudentKit'][$i];
          $model->student_id=$_POST['StudentKit']['student_id'];
          //print_r($model->attributes);
          if($model->status==null)
          {
            $model->status='Pending';
          }
          $model->date=date('Y-m-d');
          $valid=$model->validate() && $valid;
          if($model->item_id != null && $model->color_id != null && $model->brand_id != null && $model->size_id != null && $valid)
           {
            $model->save();
            InventoryHistory::model()->inventoryadd($model->item_id,$model->color_id,$model->brand_id,$model->size_id);
            $model=new StudentKit;
           }  
         }    
          
         }
       
       $this->redirect(array('admin'));
        }
    $this->render('createre',array(
      'model'=>$model,'models'=>$models,
    ));
  }
  
  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id)
  {
    $model=StudentKit::model()->findByAttributes(array('student_id'=>$id));
    $models=array();
        $models=StudentKit::model()->findAll('student_id='.$id.'');
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    $valid=true;

    if(isset($_POST['StudentKit']))
    {
      foreach($models as $i=>$model)
                        {
                                if(isset($_POST['StudentKit'][$i]))
                $model->attributes=$_POST['StudentKit'][$i];
                                $valid=$model->validate() && $valid;
                                if($valid)
                                {
                                        $model->save(false);  
                    InventoryHistory::model()->inventoryadd($model->item_id,$model->color_id,$model->brand_id,$model->size_id);  
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
  	$data=StudentKit::model()->findByPk($id);
    $this->loadModel($id)->delete();
    InventoryHistory::model()->inventoryadd($data->item_id,$data->color_id,$data->brand_id,$data->size_id); 
    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if(!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }

  /**
   * Lists all models.
   */
  public function actionIndex()
  {
    $dataProvider=new CActiveDataProvider('StudentKit');
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin()
  {
    $model=new StudentKit('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['StudentKit']))
      $model->attributes=$_GET['StudentKit'];

    $this->render('admin',array(
      'model'=>$model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return StudentKit the loaded model
   * @throws CHttpException
   */
  public function loadModel($id)
  {
    $model=StudentKit::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param StudentKit $model the model to be validated
   */
  protected function performAjaxValidation($model)
  {
    if(isset($_POST['ajax']) && $_POST['ajax']==='student-kit-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}
