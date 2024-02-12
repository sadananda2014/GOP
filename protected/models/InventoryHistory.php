<?php

/**
 * This is the model class for table "inventory_history".
 *
 * The followings are the available columns in table 'inventory_history':
 * @property string $id
 * @property string $item_id
 * @property string $brand_id
 * @property string $color_id
 * @property string $size_id
 * @property string $quantity
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Item $item
 * @property Brand $brand
 * @property Color $color
 * @property Size $size
 */
class InventoryHistory extends CActiveRecord
{
  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'inventory_history';
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
      array('quantity, date', 'length', 'max'=>30),
      array('quantity', 'numerical'),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id, item_id, brand_id, color_id, size_id, quantity, date', 'safe', 'on'=>'search'),
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
      'id' => 'ID',
      'item_id' => 'Item',
      'brand_id' => 'Brand',
      'color_id' => 'Color',
      'size_id' => 'Size',
      'quantity' => 'Quantity',
      'date' => 'Date',
    );
  }

  
  public function inventoryadd($item_id,$color_id,$brand_id,$size_id)
  {
    $record = Inventory::model()->findByAttributes(array('item_id'=>$item_id,'brand_id'=>$brand_id , 'color_id'=> $color_id,'size_id'=>$size_id));  
    $count = null;
    $count = count($record);
    //echo "count".$count;
    
      //total quqntity entered
      $criteria = new CDbCriteria;
      $criteria->select='SUM(quantity) as quantity';
      $criteria->condition='item_id="'.$item_id.'" and brand_id="'.$brand_id.'" and color_id="'.$color_id.'" and size_id="'.$size_id.'"';
      $totalqty = InventoryHistory::model()->find($criteria)->getAttribute('quantity');
      //print_r($totalqty);
      //total delivered quantity

      $deliveredqty = StudentKit::model()->findAllByAttributes(array('item_id'=>$item_id,'brand_id'=>$brand_id , 'color_id'=> $color_id,'size_id'=>$size_id,'status'=>'Delivery'));
      $deliveredqty1 = count($deliveredqty);
      $availableqty=$totalqty-$deliveredqty1;
    //echo "available".$availableqty;
      //delete old record from inventory
      if(isset($record))
      {
      $id= $record->inventory_id;
        //echo "id".$id;
       if(isset($id))  
       {
        Inventory::model()->findByPk($id)->delete();
       }
      }
      $connection=Yii::app()->db; 
      $command=$connection->createCommand("SELECT item_id,brand_id,color_id,size_id,sum(quantity) as quantity  FROM inventory_history  where item_id=$item_id and brand_id=$brand_id and color_id=$color_id and size_id=$size_id  group by item_id,color_id,brand_id,size_id");
      $row =  $command->queryRow();
      //print_r($row);
      
      $model1=new Inventory;
      
      $model1->item_id=$row['item_id'];
      $model1->brand_id=$row['brand_id'];
      $model1->color_id=$row['color_id'];
      $model1->size_id=$row['size_id'];
      $model1->quantity=$row['quantity'];
      $model1->available_qty=$availableqty;
      $model1->save();  
    
    
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
    $criteria->compare('id',$this->id,true);
    $criteria->compare('item_name',$this->item_id,true);
    $criteria->compare('brand_name',$this->brand_id,true);
    $criteria->compare('color_name',$this->color_id,true);
    $criteria->compare('size',$this->size_id,true);
    $criteria->compare('quantity',$this->quantity,true);
    $criteria->compare('date',$this->date,true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
	  'sort'=>array(
    'defaultOrder'=>'id DESC',
  )
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return InventoryHistory the static model class
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }
}
