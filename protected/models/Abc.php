<?php

/**
 * This is the model class for table "alphabet".
 *
 * The followings are the available columns in table 'alphabet':
 * @property string $id
 * @property integer $lang_id
 * @property string $letter
 * @property double $order
 */
class Abc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Abc the static model class
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
		return 'alphabet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lang_id, letter', 'required'),
			array('lang_id', 'numerical', 'integerOnly'=>true),
			array('order', 'numerical'),
			array('letter', 'length', 'max'=>5),
			array('id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lang_id, letter, order', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'lang_id' => 'Lang',
			'letter' => 'Letter',
			'order' => 'Order',
		);
	}

    public function beforeValidate()
    {
        // if the letter has `,` we split them, and save them separately
        // AND return FALSE ... TODO probably not the best solution :/
        if( strstr( $this->letter, ',' ) )
        {
            $order = 0;
            $letters = explode( ',', $this->letter );
            foreach( $letters as $letter )
            {
                if( $letter )
                {
                    $new_letter = new Abc;
                    $new_letter->lang_id = $this->lang_id;
                    $new_letter->letter = trim($letter);
                    $new_letter->order = $order;
                    $order+=3;
                    $new_letter->save();
                }
            }
            $this->addError( 'letter', 'Bulk saved done ...' );
            return false;
        }
        return parent::beforeValidate();
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
		$criteria->compare('lang_id',$this->lang_id);
		$criteria->compare('letter',$this->letter,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
