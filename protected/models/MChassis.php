<?php

/**
 * This is the model class for table "m_chassis".
 *
 * The followings are the available columns in table 'm_chassis':
 * @property string $chassis_number
 * @property string $police_number
 * @property integer $type
 * @property integer $year
 */
class MChassis extends CActiveRecord
{
	public $brand;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_chassis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chassis_number, police_number, type, year', 'required'),
			array('type, year', 'numerical', 'integerOnly'=>true),
			array('chassis_number', 'length', 'max'=>40),
			array('police_number', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('chassis_number, police_number, type, year', 'safe', 'on'=>'search'),
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
			'types' => array(self::BELONGS_TO, 'MBrandType', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'chassis_number' => 'Chassis Number',
			'police_number' => 'Police Number',
			'type' => 'Type',
			'year' => 'Year',
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

		$criteria->compare('chassis_number',$this->chassis_number,true);
		$criteria->compare('police_number',$this->police_number,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('year',$this->year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MChassis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getDataChassis()
	{
		$criteria = new CDbCriteria;
		$criteria->alias = "c";
		$criteria->join = "left join m_brand_type bt on c.type=bt.id LEFT JOIN m_brand b ON bt.brand = b.code";
		// $criteria->select = "c.chassis_number, c.police_number, b.name as merek, bt.name as type, c.year";
		return MChassis::model()->findAll($criteria);
	}
}
