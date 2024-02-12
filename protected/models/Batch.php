<?php

/**
 * This is the model class for table "batch".
 *
 * The followings are the available columns in table 'batch':
 * @property string $batch_id
 * @property string $batch_name
 * @property string $batch_location
 * @property string $batch_timing
 * @property string $coach_id
 *
 * The followings are the available model relations:
 * @property Coach $coach
 * @property BatchStudents[] $batchStudents
 */
class Batch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Batch the static model class
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
		return 'batch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coach_id,batch_name, batch_location, batch_timing', 'required'),
			array('batch_name', 'length', 'max'=>60),
			array('batch_location', 'length', 'max'=>240),
			array('batch_timing', 'length', 'max'=>20),
			array('coach_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('batch_id, batch_name, batch_location, batch_timing, coach_id', 'safe', 'on'=>'search'),
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
			'coach' => array(self::BELONGS_TO, 'Coach', 'coach_id'),
			'batchStudents' => array(self::HAS_MANY, 'BatchStudents', 'batch_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'batch_id' => 'Batch',
			'batch_name' => 'Batch Name',
			'batch_location' => 'Batch Location',
			'batch_timing' => 'Batch Timing',
			'coach_id' => 'Coach',
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
		$criteria->join =' JOIN (coach) ON (coach.coach_id=t.coach_id)';
		$criteria->compare('batch_id',$this->batch_id,true);
		$criteria->compare('batch_name',$this->batch_name,true);
		$criteria->compare('batch_location',$this->batch_location,true);
		$criteria->compare('batch_timing',$this->batch_timing,true);
		$criteria->compare('coach_name',$this->coach_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'batch_id DESC',
  )
		));
	}
}