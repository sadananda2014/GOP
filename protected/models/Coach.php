<?php

/**
 * This is the model class for table "coach".
 *
 * The followings are the available columns in table 'coach':
 * @property string $coach_id
 * @property string $coach_name
 * @property string $address
 * @property string $phone
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Batch[] $batches
 */
class Coach extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coach the static model class
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
		return 'coach';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('coach_name,phone,email,address' ,'required'), 
			array('coach_name', 'length', 'max'=>60),
			array('phone', 'length', 'max'=>20),
			array('email', 'length', 'max'=>40),
			array('address', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('coach_id, coach_name, address, phone, email', 'safe', 'on'=>'search'),
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
			'batches' => array(self::HAS_MANY, 'Batch', 'coach_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'coach_id' => 'Coach',
			'coach_name' => 'Coach Name',
			'address' => 'Address',
			'phone' => 'Phone',
			'email' => 'Email',
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

		$criteria->compare('coach_id',$this->coach_id,true);
		$criteria->compare('coach_name',$this->coach_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'coach_id DESC',
  )
		));
	}
}