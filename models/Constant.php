<?php

/**
 * This is the model class for table "tbl_constant".
 *
 * The followings are the available columns in table 'tbl_constant':
 * @property string $ConstantName
 * @property string $ConstantValue
 * @property string $ConstantDesc
 * @property string $ConstantGroup
 */
class Constant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Constant the static model class
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
		return 'tbl_constant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('ConstantName, ConstantGroup,ConstantValue, ConstantDesc', 'required'),
            array('ConstantName, ConstantGroup', 'length', 'max'=>255),
			array('ConstantValue, ConstantDesc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ConstantName, ConstantValue, ConstantDesc, ConstantGroup', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ConstantName' => 'Name',
			'ConstantValue' => 'Value',
			'ConstantDesc' => 'Desc',
			'ConstantGroup' => 'Group',
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

		$criteria->compare('ConstantName',$this->ConstantName,true);
		$criteria->compare('ConstantValue',$this->ConstantValue,true);
		$criteria->compare('ConstantDesc',$this->ConstantDesc,true);
		$criteria->compare('ConstantGroup',$this->ConstantGroup,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria, 'pagination'=>array('pageSize'=>20),
		));
	}
    public function getConstantValue($ConstantName)
	{
		$model=Constant::model()->findByPk($ConstantName);
        return $model->ConstantValue;
	}
}