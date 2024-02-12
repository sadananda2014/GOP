<?php

/**
 * This is the model class for table "assign_kit".
 *
 * The followings are the available columns in table 'assign_kit':
 * @property string $id
 * @property string $batch_students_id
 * @property string $kit_item_id
 * @property string $brand
 * @property string $color
 * @property double $size
 *
 * The followings are the available model relations:
 * @property BatchStudents $batchStudents
 * @property KitItems $kitItem
 */
class AssignKit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssignKit the static model class
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
		return 'assign_kit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('batch_students_id, kit_item_id', 'required'),
			array('size', 'numerical'),
			array('batch_students_id, kit_item_id', 'length', 'max'=>10),
			array('brand, color', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, batch_students_id, kit_item_id, brand, color, size', 'safe', 'on'=>'search'),
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
			'batchStudents' => array(self::BELONGS_TO, 'BatchStudents', 'batch_students_id'),
			'kitItem' => array(self::BELONGS_TO, 'KitItems', 'kit_item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'batch_students_id' => 'Batch Students',
			'kit_item_id' => 'Kit Item',
			'brand' => 'Brand',
			'color' => 'Color',
			'size' => 'Size',
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
		$criteria->compare('batch_students_id',$this->batch_students_id,true);
		$criteria->compare('kit_item_id',$this->kit_item_id,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('size',$this->size);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'id DESC',
  )
		));
	}
}