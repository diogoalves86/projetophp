<?php

/**
 * This is the model class for table "Comentario".
 *
 * The followings are the available columns in table 'Comentario':
 * @property integer $id
 * @property string $assunto
 * @property string $mensagem
 * @property integer $visualizada
 * @property integer $aluno_id
 * @property integer $professor_id
 *
 * The followings are the available model relations:
 * @property Usuario $professor
 * @property Usuario $aluno
 */
class Comentario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('assunto, mensagem, visualizada, aluno_id, professor_id', 'required'),
			array('visualizada, aluno_id, professor_id', 'numerical', 'integerOnly'=>true),
			array('assunto', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, assunto, mensagem, visualizada, aluno_id, professor_id', 'safe', 'on'=>'search'),
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
			'professor' => array(self::BELONGS_TO, 'Usuario', 'professor_id'),
			'aluno' => array(self::BELONGS_TO, 'Usuario', 'aluno_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'assunto' => 'Assunto',
			'mensagem' => 'Mensagem',
			'visualizada' => 'Visualizada',
			'aluno_id' => 'Aluno',
			'professor_id' => 'Professor',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('assunto',$this->assunto,true);
		$criteria->compare('mensagem',$this->mensagem,true);
		$criteria->compare('visualizada',$this->visualizada);
		$criteria->compare('aluno_id',$this->aluno_id);
		$criteria->compare('professor_id',$this->professor_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comentario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
