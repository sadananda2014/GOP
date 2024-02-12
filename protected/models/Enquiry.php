<?php

/**
 * This is the model class for table "enquiry".
 *
 * The followings are the available columns in table 'enquiry':
 * @property string $enquiry_id
 * @property string $enquiry_name
 * @property string $enquiry_location
 * @property string $enquiry_date
 * @property string $enquiry_type
 * @property string $how_did_they_know_about_us
 * @property string $trainee_name
 * @property string $trainee_age
 * @property string $trainee_school
 * @property string $status
 * @property string $relation_between_enquirer_joinee
 * @property string $phone
 * @property string $email
 * @property string $preferred_center
 * @property string $preferred_batch
 * @property string $additional_comments
 * @property string $follow_up
 * @property string $follow_up_comment
 *
 * The followings are the available model relations:
 * @property Registration[] $registrations
 */
class Enquiry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enquiry the static model class
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
		return 'enquiry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enquiry_name,follow_up', 'required'),
			array('enquiry_name, enquiry_location, trainee_name', 'length', 'max'=>120),
			array('enquiry_type', 'length', 'max'=>80),
			array('how_did_they_know_about_us, status, email', 'length', 'max'=>60),
			array('email', 'email'),
			array('phone,trainee_age', 'numerical'),
			array('trainee_age, relation_between_enquirer_joinee, preferred_center, preferred_batch', 'length', 'max'=>40),
			array('trainee_school, follow_up_comment', 'length', 'max'=>240),
			array('phone', 'length', 'min'=>10, 'max'=>12),
			array('enquiry_date, additional_comments, follow_up', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('enquiry_id, enquiry_name, enquiry_location, enquiry_date, enquiry_type, how_did_they_know_about_us, trainee_name, trainee_age, trainee_school, status, relation_between_enquirer_joinee, phone, email, preferred_center, preferred_batch, additional_comments, follow_up, follow_up_comment', 'safe', 'on'=>'search'),
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
			'registrations' => array(self::HAS_MANY, 'Registration', 'enquiry_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'enquiry_id' => 'Enquiry',
			'enquiry_name' => 'Enquiry Name',
			'enquiry_location' => 'Enquiry Location',
			'enquiry_date' => 'Enquiry Date',
			'enquiry_type' => 'Enquiry Type',
			'how_did_they_know_about_us' => 'How Did They Know About Us',
			'trainee_name' => 'Trainee Name',
			'trainee_age' => 'Trainee Age',
			'trainee_school' => 'Trainee School',
			'status' => 'Status',
			'relation_between_enquirer_joinee' => 'Relation Between Enquirer Joinee',
			'phone' => 'Phone',
			'email' => 'Email',
			'preferred_center' => 'Preferred Center',
			'preferred_batch' => 'Preferred Batch',
			'additional_comments' => 'Additional Comments',
			'follow_up' => 'Follow Up',
			'follow_up_comment' => 'Follow Up Comment',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getenquiryInfo()
	{
    	return $this->enquiry_id . ' - '. $this->trainee_name. ' - ' . $this->phone;
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('enquiry_id',$this->enquiry_id,true);
		$criteria->compare('enquiry_name',$this->enquiry_name,true);
		$criteria->compare('enquiry_location',$this->enquiry_location,true);
		$criteria->compare('enquiry_date',$this->enquiry_date,true);
		$criteria->compare('enquiry_type',$this->enquiry_type,true);
		$criteria->compare('how_did_they_know_about_us',$this->how_did_they_know_about_us,true);
		$criteria->compare('trainee_name',$this->trainee_name,true);
		$criteria->compare('trainee_age',$this->trainee_age,true);
		$criteria->compare('trainee_school',$this->trainee_school,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('relation_between_enquirer_joinee',$this->relation_between_enquirer_joinee,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('preferred_center',$this->preferred_center,true);
		$criteria->compare('preferred_batch',$this->preferred_batch,true);
		$criteria->compare('additional_comments',$this->additional_comments,true);
		$criteria->compare('follow_up',$this->follow_up,true);
		$criteria->compare('follow_up_comment',$this->follow_up_comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'enquiry_id DESC',
  )
		));
	}
}