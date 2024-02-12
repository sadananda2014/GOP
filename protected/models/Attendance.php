<?php

/**
 * This is the model class for table "attendance".
 *
 * The followings are the available columns in table 'attendance':
 * @property string $id
 * @property string $student_batch_id
 * @property string $date
 * @property string $status
 *
 * The followings are the available model relations:
 * @property BatchStudents $studentBatch
 */
class Attendance extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Attendance the static model class
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'attendance';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('student_batch_id,status', 'required'),
      array('student_batch_id', 'length', 'max'=>10),
      array('status', 'length', 'max'=>20),
      array('date', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, student_batch_id, date,batch, status', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations()
  {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'studentBatch' => array(self::BELONGS_TO, 'BatchStudents', 'student_batch_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'student_batch_id' => 'Student Batch',
      'date' => 'Date',
                        'batch' => 'Batch',
      'status' => 'Status',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
   */
  public function search()
  {
    // Warning: Please modify the following code to remove attributes that
    // should not be searched.

    $criteria=new CDbCriteria;
    $criteria->join =' JOIN (registration,batch) ON (registration.register_id=t.student_batch_id and batch.batch_id=t.batch)';
    //$criteria->join =' JOIN (Batch) ON (batch.batch_id=t.batch)';
    $criteria->compare('id',$this->id,true);
    $criteria->compare('name',$this->student_batch_id,true);
    $criteria->compare('date',$this->date,true);
        $criteria->compare('batch_name',$this->batch,true);
    $criteria->compare('status',$this->status,true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
	  'sort'=>array(
    'defaultOrder'=>'id DESC',
  )
    ));
  }
}
