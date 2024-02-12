<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property string $payment_id
 * @property string $student_id
 * @property string $payment_date
 * @property string $joined_date
 * @property string $course_id
 * @property double $total_fee
 * @property double $pay_now
 * @property double $balnce
 * @property string $reciept_no
 * @property string $status
 * @property string $mode_of_payment
 *
 * The followings are the available model relations:
 * @property Registration $student
 * @property Fee $course
 */
class Payment extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Payment the static model class
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
    return 'payment';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array( 
      array('student_id, course_id, mode_of_payment,payment_due_date,paid_month,transaction_no', 'required'),
      //array('payment_due_date','compare','compareValue' => date("Y-m-d"),'operator'=>'>=','allowEmpty'=>false ,'message'=>'{attribute} must be greater than "{compareValue}".'),
      array('total_fee, pay_now, balnce', 'numerical'),
      array('student_id, course_id', 'length', 'max'=>10),
      array('reciept_no,paid_month', 'length', 'max'=>60),
	  array('reference', 'length', 'max'=>100),
      array('status,transaction_no', 'length', 'max'=>20),
      array('mode_of_payment,notes', 'length', 'max'=>2000),
      array('payment_date, joined_date', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('payment_id, student_id, payment_date, joined_date, course_id, total_fee, pay_now, balnce, reciept_no, status, mode_of_payment,payment_due_date,reference,paid_month,transaction_no,notes', 'safe', 'on'=>'search'),
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
      'student' => array(self::BELONGS_TO, 'Registration', 'student_id'),
      'course' => array(self::BELONGS_TO, 'Fee', 'course_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
      'payment_id' => 'Payment',
      'student_id' => 'Student',
      'payment_date' => 'Payment Date',
      'joined_date' => 'Joined Date',
      'course_id' => 'Course',
      'total_fee' => 'Fee Payable',
      'pay_now' => 'Pay Now',
      'balnce' => 'Balance',
      'reciept_no' => 'Reciept No',
      'status' => 'Status',
      'mode_of_payment' => 'Mode Of Payment',
      'payment_due_date'=>'payment_due_date',
	  'reference'=>'Payment Details',
	  'paid_month'=>'Paid Month',
	  'transaction_no'=>'Tr No',
	  'notes'=>'notes',
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
     $ctr=User::model()->findByPk(Yii::app()->user->id)->center;
    $criteria=new CDbCriteria;
    $criteria->join =' JOIN (registration,fee,batch_students,batch,center) ON (registration.register_id=t.student_id and fee.id=t.course_id and batch_students.student_id=t.student_id and batch_students.batch_id=batch.batch_id and batch.batch_location=center.id)';
    if($ctr!="" || !UserModule::isAdmin()) {
    $criteria->condition="batch.batch_location=$ctr";
    }
    $criteria->compare('payment_id',$this->payment_id,true);
    $criteria->compare('name',$this->student_id,true);
    $criteria->compare('payment_date',$this->payment_date,true);
    $criteria->compare('joined_date',$this->joined_date,true);
    $criteria->compare('duration',$this->course_id,true);
    $criteria->compare('total_fee',$this->total_fee);
    $criteria->compare('pay_now',$this->pay_now);
    $criteria->compare('balnce',$this->balnce);
    $criteria->compare('reciept_no',$this->reciept_no,true);
    $criteria->compare('status',$this->status,true);
    $criteria->compare('mode_of_payment',$this->mode_of_payment,true);
    $criteria->compare('payment_due_date',$this->payment_due_date,true);
	$criteria->compare('reference',$this->reference,true);
	$criteria->compare('paid_month',$this->paid_month,true);
	$criteria->compare('transaction_no',$this->transaction_no,true);
	$criteria->compare('notes',$this->notes,true);
    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
	  'sort'=>array(
    'defaultOrder'=>'payment_id DESC',
  )
    ));
  }
}