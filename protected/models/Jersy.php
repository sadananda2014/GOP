<?php

/**
 * This is the model class for table "jersy".
 *
 * The followings are the available columns in table 'jersy':
 * @property string $jersy_id
 * @property string $brand_id
 * @property string $color_id
 * @property string $size_id
 * @property string $quantity
 *
 * The followings are the available model relations:
 * @property Brand $brand
 * @property Color $color
 * @property Size $size
 */
class Jersy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jersy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_id, color_id, size_id', 'required'),
			array('brand_id, color_id, size_id', 'length', 'max'=>10),
			array('quantity', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('jersy_id, brand_id, color_id, size_id, quantity', 'safe', 'on'=>'search'),
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
			'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
			'color' => array(self::BELONGS_TO, 'Color', 'color_id'),
			'size' => array(self::BELONGS_TO, 'Size', 'size_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'jersy_id' => 'Jersy',
			'brand_id' => 'Brand',
			'color_id' => 'Color',
			'size_id' => 'Size',
			'quantity' => 'Quantity',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('jersy_id',$this->jersy_id,true);
		$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('color_id',$this->color_id,true);
		$criteria->compare('size_id',$this->size_id,true);
		$criteria->compare('quantity',$this->quantity,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'jersy_id DESC',
  )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jersy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
