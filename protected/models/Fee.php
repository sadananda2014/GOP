<?php

/**
 * This is the model class for table "fee".
 *
 * The followings are the available columns in table 'fee':
 * @property string $id
 * @property string $duration
 * @property double $total_fee
 *
 * The followings are the available model relations:
 * @property Payment[] $payments
 */
class Fee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fee the static model class
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
		return 'fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		   array('total_fee,duration,description', 'required'),
			array('total_fee,duration', 'numerical'),
			array('duration', 'length', 'max'=>60),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, duration, total_fee,description', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'Payment', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'duration' => 'Duration',
			'total_fee' => 'Total Fee',
			'description'=>'Description',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('total_fee',$this->total_fee);
		$criteria->compare('description',$this->total_fee);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'id DESC',
  )
		));
	}
}