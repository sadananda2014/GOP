<?php

/**
 * This is the model class for table "schools".
 *
 * The followings are the available columns in table 'schools':
 * @property integer $school_id
 * @property string $school_name
 * @property integer $cust1
 * @property integer $cust2
 */
class Schools extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Schools the static model class
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
		return 'schools';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_name, cust1, cust2', 'required'),
			array('cust1, cust2', 'numerical', 'integerOnly'=>true),
			array('school_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('school_id, school_name, cust1, cust2', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'school_id' => 'School',
			'school_name' => 'School Name',
			'cust1' => 'Cust1',
			'cust2' => 'Cust2',
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

		$criteria->compare('school_id',$this->school_id);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('cust1',$this->cust1);
		$criteria->compare('cust2',$this->cust2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}