<?php

/**
 * This is the model class for table "Nota".
 *
 * The followings are the available columns in table 'Nota':
 * @property integer $id
 * @property double $primeira_certificacao
 * @property double $segunda_certificacao
 * @property double $terceira_certificacao
 * @property double $primeira_recuperacao
 * @property double $segunda_recuperacao
 * @property double $terceira_recuperacao
 * @property integer $disciplina_id
 * @property integer $usuario_id
 *
 * The followings are the available model relations:
 * @property Disciplina $disciplina
 * @property Usuario $usuario
 */
class Nota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Nota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('disciplina_id, usuario_id', 'required'),
			array('disciplina_id, usuario_id', 'numerical', 'integerOnly'=>true),
			array('primeira_certificacao, segunda_certificacao, terceira_certificacao, primeira_recuperacao, segunda_recuperacao, terceira_recuperacao', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, primeira_certificacao, segunda_certificacao, terceira_certificacao, primeira_recuperacao, segunda_recuperacao, terceira_recuperacao, disciplina_id, usuario_id', 'safe', 'on'=>'search'),
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
			'disciplina' => array(self::BELONGS_TO, 'Disciplina', 'disciplina_id'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'primeira_certificacao' => 'Primeira Certificacao',
			'segunda_certificacao' => 'Segunda Certificacao',
			'terceira_certificacao' => 'Terceira Certificacao',
			'primeira_recuperacao' => 'Primeira Recuperacao',
			'segunda_recuperacao' => 'Segunda Recuperacao',
			'terceira_recuperacao' => 'Terceira Recuperacao',
			'disciplina_id' => 'Disciplina',
			'usuario_id' => 'Usuario',
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
		$criteria->compare('primeira_certificacao',$this->primeira_certificacao);
		$criteria->compare('segunda_certificacao',$this->segunda_certificacao);
		$criteria->compare('terceira_certificacao',$this->terceira_certificacao);
		$criteria->compare('primeira_recuperacao',$this->primeira_recuperacao);
		$criteria->compare('segunda_recuperacao',$this->segunda_recuperacao);
		$criteria->compare('terceira_recuperacao',$this->terceira_recuperacao);
		$criteria->compare('disciplina_id',$this->disciplina_id);
		$criteria->compare('usuario_id',$this->usuario_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function calcularMediaAnual($primeiro_certificacao, $segunda_certificacao, $terceira_certificacao)
	{
		$media = (($primeiro_certificacao * 3) + ($segunda_certificacao * 3) + ($terceira_certificacao * 4)) / 10;
		return $media;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
