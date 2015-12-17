<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property string $nome
 * @property string $email
 * @property integer $telefone
 * @property string $data_criacao
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'telefone'], 'required'],
            [['telefone'], 'integer'],
            //[['data_criacao'], 'safe'],
            [['nome', 'email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'idUsuario' => 'Id Usuario',
            'nome' => 'Nome',
            'email' => 'Email',
            'telefone' => 'Telefone',
            //'data_criacao' => 'Data Criacao',
        ];
    }
}
