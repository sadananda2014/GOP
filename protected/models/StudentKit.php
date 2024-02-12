<?php

/**
 * This is the model class for table "student_kit".
 *
 * The followings are the available columns in table 'student_kit':
 * @property string $id
 * @property string $student_id
 * @property string $item_id
 * @property string $brand_id
 * @property string $color_id
 * @property string $size_id
 * @property string $inventory_id
 * @property string $date
 * @property string $status
 *
 * The followings are the available model relations:
 * @property BatchStudents $student
 * @property Item $item
 * @property Brand $brand
 * @property Color $color
 * @property Size $size
 */
class StudentKit extends CActiveRecord
{
  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'student_kit';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('student_id,size_id', 'required'),
      array('student_id, item_id, brand_id, color_id, size_id, inventory_id', 'length', 'max'=>10),
      array('date, status,replacement_fees', 'length', 'max'=>30),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id, student_id, item_id, brand_id, color_id, size_id, inventory_id, date, status,replacement_fees', 'safe', 'on'=>'search'),
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
      'student' => array(self::BELONGS_TO, 'BatchStudents', 'student_id'),
      'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
      'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
      'color' => array(self::BELONGS_TO, 'Color', 'color_id'),
      'size' => array(self::BELONGS_TO, 'Size', 'size_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
        public function getStudentId()
          {  
             return CHtml::listData(Registration::model()->findAll("student_status='Active'"), 'register_id', 'name');
          }
  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'student_id' => 'Student',
      'item_id' => 'Item',
      'brand_id' => 'Brand',
      'color_id' => 'Color',
      'size_id' => 'Size',
      'inventory_id' => 'Inventory',
      'date' => 'Date',
      'status' => 'Status',
      'replacement_fees'=>'Replacement Fee',
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
    $criteria->join =' JOIN (registration,item,brand,color,size) ON (registration.register_id=t.student_id and item.item_id=t.item_id and brand.brand_id=t.brand_id and color.color_id=t.color_id and size.size_id=t.size_id)';
    $criteria->compare('id',$this->id,true);
    $criteria->compare('name',$this->student_id,true);
    $criteria->compare('item_name',$this->item_id,true);
    $criteria->compare('brand_name',$this->brand_id,true);
    $criteria->compare('color_name',$this->color_id,true);
    $criteria->compare('size',$this->size_id,true);
    $criteria->compare('inventory_id',$this->inventory_id,true);
    $criteria->compare('date',$this->date,true);
    $criteria->compare('status',$this->status,true);
    $criteria->compare('replacement_fees',$this->replacement_fees,true);
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
   * @return StudentKit the static model class
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }
}
