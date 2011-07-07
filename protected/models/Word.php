<?php

/**
 * This is the model class for table "word".
 *
 * The followings are the available columns in table 'word':
 * @property string $id
 * @property integer $alphabet_id
 * @property string $word
 * @property string $in_english
 * @property string $video
 * @property string $picture
 * @property string $ext_link
 * @property string $meaning
 * @property integer $active_yn
 * @property integer $created
 * @property integer $updated
 */
class Word extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Word the static model class
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
		return 'word';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alphabet_id,word,picture', 'required'),
			array('alphabet_id, active_yn, created, updated', 'numerical', 'integerOnly'=>true),
			array('word, in_english, video, picture, ext_link', 'length', 'max'=>255),
			array('id, meaning', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alphabet_id, word, in_english, video, picture, ext_link, meaning, active_yn, created, updated', 'safe', 'on'=>'search'),
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
            'abc'  => array( self::BELONGS_TO, 'Abc', 'alphabet_id' )
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alphabet_id' => 'Alphabet',
			'word' => 'Word',
			'in_english' => 'In English',
			'video' => 'Video',
			'picture' => 'Picture',
			'ext_link' => 'Ext Link',
			'meaning' => 'Meaning',
			'active_yn' => 'Active Yn',
			'created' => 'Created',
			'updated' => 'Updated',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('alphabet_id',$this->alphabet_id);
		$criteria->compare('word',$this->word,true);
		$criteria->compare('in_english',$this->in_english,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('ext_link',$this->ext_link,true);
		$criteria->compare('meaning',$this->meaning,true);
		$criteria->compare('active_yn',$this->active_yn);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

    /**
     * beforeSave 
     * 
     * @access public
     * @return void
     */
    public function beforeSave()
    {
        if( 0 === stripos( $this->picture, 'http://' ) )
        {
            $files_path = YiiBase::getPathOfAlias( 'webroot.files' );
            $image_name = MUtility::strToPretty( $this->word ) . rand(0,time()) . '.' . end( explode('.', $this->picture));

            if( ! file_put_contents( $files_path . '/' . $image_name,  file_get_contents($this->picture ) ) )
            {
                $this->addError( 'picture', 'Image could not be uploaded' );
                return false;
            }

            $this->picture = $image_name;
        }

        return parent::beforeSave();
    }
}
