<?php

/**
 * This is the model class for table "batch_students".
 *
 * The followings are the available columns in table 'batch_students':
 * @property string $id
 * @property string $student_id
 * @property string $student_name
 * @property string $batch_id
 *
 * The followings are the available model relations:
 * @property AssignKit[] $assignKits
 * @property Attendance[] $attendances
 * @property Registration $student
 * @property Batch $batch
 */
class BatchStudents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BatchStudents the static model class
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
		return 'batch_students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, batch_id ,cycle_of_fee ,total_fee,registration_fees,monthly_fee', 'required'),
			array('student_id, batch_id', 'length', 'max'=>10),
			array('student_name', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, student_id, student_name, batch_id,cycle_of_fee,total_fee,registration_fees,monthly_fee', 'safe', 'on'=>'search'),
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
			'assignKits' => array(self::HAS_MANY, 'AssignKit', 'batch_students_id'),
			'attendances' => array(self::HAS_MANY, 'Attendance', 'student_batch_id'),
			'student' => array(self::BELONGS_TO, 'Registration', 'student_id'),
			'batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
		);
	}

		 public function getRegisterId()
          { 
              
             //this function returns the list of categories to use in a dropdown        
             return CHtml::listData(Registration::model()->findAll(), 'register_id', 'name');
          }
        public function getBatchId()
          { 
              
             //this function returns the list of categories to use in a dropdown        
             return CHtml::listData(Batch::model()->findAll(), 'batch_id', 'batch_name');
          }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student_id' => 'Student',
			'student_name' => 'Student Name',
			'batch_id' => 'Batch',
			'cycle_of_fee'=>'Cycle of Fee',
			'total_fee'=>'Total Fee',
			'registration_fees'=>'Registration Fee',
			'monthly_fee'=>'Monthly Fee',
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
		$criteria->join='JOIN (batch,fee) on (batch.batch_id=t.batch_id and fee.id=t.cycle_of_fee)';	
		$criteria->compare('id',$this->id,true);
		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('student_name',$this->student_name,true);
		$criteria->compare('batch_name',$this->batch_id,true);
		$criteria->compare('description',$this->cycle_of_fee,true);
		$criteria->compare('total_fee',$this->total_fee,true);
		$criteria->compare('registration_fees',$this->registration_fees,true);
		$criteria->compare('monthly_fee',$this->monthly_fee,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'id DESC',
  )
		));
	}
}