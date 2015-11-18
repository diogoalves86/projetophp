<?php

/**
 * This is the model class for table "Usuario".
 *
 * The followings are the available columns in table 'Usuario':
 * @property integer $id
 * @property string $nome
 * @property string $cpf
 * @property string $matricula
 * @property integer $nivel
 * @property integer $ativo
 * @property string $email
 * @property string $senha
 *
 * The followings are the available model relations:
 * @property AlunoTurma[] $alunoTurmas
 * @property Nota[] $notas
 * @property ProfessorDisciplina[] $professorDisciplinas
 * @property Regra $nivel_relacao
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, cpf, matricula, nivel, email, senha', 'required'),
			array('nivel, ativo', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>100),
			array('cpf', 'length', 'max'=>14),
			array('matricula, email, senha', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, cpf, matricula, nivel, ativo, email, senha', 'safe', 'on'=>'search'),
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
			'alunoTurmas' => array(self::HAS_MANY, 'AlunoTurma', 'aluno_id'),
			'notas' => array(self::HAS_MANY, 'Nota', 'usuario_id'),
			'professorDisciplinas' => array(self::HAS_MANY, 'ProfessorDisciplina', 'professor_id'),
			'nivel_relacao' => array(self::BELONGS_TO, 'Regra', 'nivel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'cpf' => 'Cpf',
			'matricula' => 'Matricula',
			'nivel' => 'Nivel',
			'ativo' => 'Ativo',
			'email' => 'Email',
			'senha' => 'Senha',
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
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('cpf',$this->cpf,true);
		$criteria->compare('matricula',$this->matricula,true);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('ativo',$this->ativo);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('senha',$this->senha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
