<?php

/**
 * This is the model class for table "kit_items".
 *
 * The followings are the available columns in table 'kit_items':
 * @property string $item_id
 * @property string $item_name
 * @property integer $qauntity
 * @property string $status
 *
 * The followings are the available model relations:
 * @property AssignKit[] $assignKits
 */
class KitItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KitItems the static model class
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
		return 'kit_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qauntity', 'numerical', 'integerOnly'=>true),
			array('item_name', 'length', 'max'=>120),
			array('status', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('item_id, item_name, qauntity, status', 'safe', 'on'=>'search'),
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
			'assignKits' => array(self::HAS_MANY, 'AssignKit', 'kit_item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Item',
			'item_name' => 'Item Name',
			'qauntity' => 'Qauntity',
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

		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('qauntity',$this->qauntity);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'item_id DESC',
  )
		));
	}
}