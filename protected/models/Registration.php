<?php

/**
 * This is the model class for table "registration".
 *
 * The followings are the available columns in table 'registration':
 * @property string $register_id
 * @property string $enquiry_id
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property string $age
 * @property string $class
 * @property double $weight
 * @property double $height
 * @property string $blood_group
 * @property string $uniform_size
 * @property string $past_training_experience
 * @property string $represented_team
 * @property string $school
 * @property string $medical_conditions
 * @property string $image
 * @property string $full_address
 * @property string $pincode
 * @property string $trainee_phone
 * @property string $trainee_email
 * @property string $residence_phone
 * @property string $primary_contact_person
 * @property string $emergency_contact
 * @property string $fathers_name
 * @property string $fathers_phone
 * @property string $fathers_email
 * @property string $mothers_name
 * @property string $mothers_phone
 * @property string $mothers_email
 *
 * The followings are the available model relations:
 * @property BatchStudents[] $batchStudents
 * @property Payment[] $payments
 * @property Enquiry $enquiry
 */
class Registration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registration the static model class
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
		return 'registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('enquiry_id,name, dob, gender, age, class, weight, height, blood_group, uniform_size, past_training_experience, represented_team, school, medical_conditions, image, full_address, pincode, trainee_phone, trainee_email, residence_phone, primary_contact_person, emergency_contact, fathers_name, fathers_phone, fathers_email, mothers_name, mothers_phone, mothers_email', 'required'),
			array('name,dob, gender, age,primary_contact_person,school,full_address, pincode,last_name,joined_date', 'required'),
			
			array('fathers_name, fathers_phone, fathers_email', 'required','on'=>'father'), 
			array('guardian_email, guardian_name, guardian_phone', 'required','on'=>'guardian'),
			array('trainee_phone, trainee_email', 'required','on'=>'self'),
			array('mothers_name, mothers_phone, mothers_email', 'required','on'=>'mother'),
			array('weight, height,uniform_size ,pincode, trainee_phone,residence_phone,fathers_phone,mothers_phone,guardian_phone', 'numerical'),
			array('enquiry_id, gender,fathers_phone,mothers_phone,trainee_phone,guardian_phone', 'length', 'max'=>10),
			array('trainee_phone,residence_phone,fathers_phone,mothers_phone,guardian_phone', 'length', 'min'=>10, 'max'=>10),
			array('name, represented_team, primary_contact_person, fathers_name, mothers_name', 'length', 'max'=>120),
			array('pincode','length','min'=>6, 'max'=>6),
			array('dob', 'length', 'max'=>30),
			array('age, class, blood_group, uniform_size, pincode, trainee_phone, residence_phone, fathers_phone, mothers_phone', 'length', 'max'=>60),
			array('school, medical_conditions, image', 'length', 'max'=>240),
			array('trainee_email, fathers_email, mothers_email', 'length', 'max'=>60),
			array('past_training_experience, full_address, emergency_contact', 'safe'),
			array('trainee_email, fathers_email, mothers_email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('register_id, enquiry_id, name, dob, gender, age, class, weight, height, blood_group, uniform_size, past_training_experience, represented_team, school, medical_conditions, image, full_address, pincode, trainee_phone, trainee_email, residence_phone, primary_contact_person, emergency_contact, fathers_name, fathers_phone, fathers_email, mothers_name, mothers_phone, mothers_email,student_status,last_name,middle_name,guardian_email, guardian_name, guardian_phone,joined_date', 'safe', 'on'=>'search'),
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
			'batchStudents' => array(self::HAS_MANY, 'BatchStudents', 'student_id'),
			'payments' => array(self::HAS_MANY, 'Payment', 'student_id'),
			'enquiry' => array(self::BELONGS_TO, 'Enquiry', 'enquiry_id'),
			'batchname' => array(self::BELONGS_TO, 'BatchStudents', '','foreignKey' => array('register_id' => 'student_id')),
		);
	}
	
	public function get_active_students()
	{
		$models = Registration::model()->findAll();
		$data = array();

		foreach ($models as $model) {
			$data[$model->register_id] = $model->name . ' '. $model->last_name;
		}
			return $data;
	}

	public function get_active_students_lists()
	{
		$models = Registration::model()->findAll();
		$data = array();

		foreach ($models as $model) {
			$data[$model->register_id] = $model->name . ' '. $model->last_name;
		}
			return $data;
	}


	public function get_active_students_lists_search()
	{
		$models = Registration::model()->findAll();
		$data = array();

		foreach ($models as $model) {
			//$batchname=BatchStudents::model()->findByPk((int)$model->register_id);
			//echo $batchname->batch_id;
			if($model->batchname)
			{
				$batchid=$model->batchname->batch_id;
				$batch = Batch::model()->findByPk($batchid);
				$batchname = $batch->batch_name; 
			}
			else
			{
				$batchname="No Batch";
			}
			$data[$model->register_id] = $model->name . ' '. $model->last_name .' - ' .$batchname;
		}
			return $data;
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'register_id' => 'Register',
			'enquiry_id' => 'Enquiry',
			'name' => 'First Name',
			'dob' => 'Dob',
			'gender' => 'Gender',
			'age' => 'Age',
			'class' => 'Class',
			'weight' => 'Weight',
			'height' => 'Height',
			'blood_group' => 'Blood Group',
			'uniform_size' => 'Uniform Size',
			'past_training_experience' => 'Past Training Experience',
			'represented_team' => 'Represented Team',
			'school' => 'School',
			'medical_conditions' => 'Medical Conditions',
			'image' => 'Image',
			'full_address' => 'Full Address',
			'pincode' => 'Pincode',
			'trainee_phone' => 'Trainee Phone',
			'trainee_email' => 'Trainee Email',
			'residence_phone' => 'Residence Phone',
			'primary_contact_person' => 'Primary Contact Person',
			'emergency_contact' => 'Emergency Contact',
			'fathers_name' => 'Fathers Name',
			'fathers_phone' => 'Fathers Phone',
			'fathers_email' => 'Fathers Email',
			'mothers_name' => 'Mothers Name',
			'mothers_phone' => 'Mothers Phone',
			'mothers_email' => 'Mothers Email',
			'student_status'=>'student status',
			'middle_name'=>'Middle Name',
			'last_name'=>'Last Name',
		    'guardian_email'=>'Guardian Email',
			'guardian_name'=>'Guardian Name', 
			'guardian_phone'=>'Guardian Phone',
		'joined_date'=>'Join Date',
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

		$criteria->compare('register_id',$this->register_id,true);
		$criteria->compare('enquiry_id',$this->enquiry_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('height',$this->height);
		$criteria->compare('blood_group',$this->blood_group,true);
		$criteria->compare('uniform_size',$this->uniform_size,true);
		$criteria->compare('past_training_experience',$this->past_training_experience,true);
		$criteria->compare('represented_team',$this->represented_team,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('medical_conditions',$this->medical_conditions,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('full_address',$this->full_address,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('trainee_phone',$this->trainee_phone,true);
		$criteria->compare('trainee_email',$this->trainee_email,true);
		$criteria->compare('residence_phone',$this->residence_phone,true);
		$criteria->compare('primary_contact_person',$this->primary_contact_person,true);
		$criteria->compare('emergency_contact',$this->emergency_contact,true);
		$criteria->compare('fathers_name',$this->fathers_name,true);
		$criteria->compare('fathers_phone',$this->fathers_phone,true);
		$criteria->compare('fathers_email',$this->fathers_email,true);
		$criteria->compare('mothers_name',$this->mothers_name,true);
		$criteria->compare('mothers_phone',$this->mothers_phone,true);
		$criteria->compare('mothers_email',$this->mothers_email,true);
		$criteria->compare('student_status',$this->student_status,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('guardian_email',$this->guardian_email,true);
		$criteria->compare('guardian_name',$this->guardian_name,true);
		$criteria->compare('guardian_phone',$this->guardian_phone,true);
		$criteria->compare('joined_date',$this->joined_date,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    'defaultOrder'=>'register_id DESC',
  )
		));
	}
}