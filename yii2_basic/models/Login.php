<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property integer $idLogin
 * @property integer $idUsuario
 * @property string $usuario
 * @property string $senha
 * @property integer $ativo
 *
 * @property Usuario $idUsuario0
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'usuario', 'senha', 'ativo'], 'required'],
            [['idUsuario', 'nivel', 'ativo'], 'integer'],
            [['usuario', 'senha'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLogin' => 'Id Login',
            'idUsuario' => 'Id Usuario',
            'usuario' => 'Usuário',
            'senha' => 'Senha',
            'nivel' => 'Nível',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
}
