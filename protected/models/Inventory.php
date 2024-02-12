<?php

/**
 * This is the model class for table "inventory".
 *
 * The followings are the available columns in table 'inventory':
 * @property string $inventory_id
 * @property string $item_id
 * @property string $brand_id
 * @property string $color_id
 * @property string $size_id
 * @property string $quantity
 *
 * The followings are the available model relations:
 * @property Item $item
 * @property Brand $brand
 * @property Color $color
 * @property Size $size
 */
class Inventory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, brand_id, color_id, size_id,quantity', 'required'),
			array('item_id, brand_id, color_id, size_id', 'length', 'max'=>10),
			array('quantity', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('inventory_id, item_id, brand_id, color_id, size_id, quantity,available_qty', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
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
			'inventory_id' => 'Inventory',
			'item_id' => 'Item',
			'brand_id' => 'Brand',
			'color_id' => 'Color',
			'size_id' => 'Size',
			'quantity' => 'Quantity',
			'available_qty'=>'Available Quantity',
		);
	}



         public function getBrandId()
          {  
             return CHtml::listData(Brand::model()->findAll(), 'brand_id', 'brand_name');
          }
         public function getColorId()
          {  
             return CHtml::listData(Color::model()->findAll(), 'color_id', 'color_name');
          }
         public function getItemId()
          {  
             return CHtml::listData(Item::model()->findAll(), 'item_id', 'item_name');
          }
         public function getSizeId()
          {  
             return CHtml::listData(Size::model()->findAll(), 'size_id', 'size');
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
		$criteria->join =' JOIN (item,brand,color,size) ON (item.item_id=t.item_id and brand.brand_id=t.brand_id and color.color_id=t.color_id and size.size_id=t.size_id)';
		$criteria->compare('inventory_id',$this->inventory_id,true);
		$criteria->compare('item_name',$this->item_id,true);
		$criteria->compare('brand_name',$this->brand_id,true);
		$criteria->compare('color_name',$this->color_id,true);
		$criteria->compare('size',$this->size_id,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('available_qty',$this->available_qty,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'inventory_id DESC',
  )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
