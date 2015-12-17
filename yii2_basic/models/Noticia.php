<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $idNoticia
 * @property integer $idUsuario
 * @property string $autor
 * @property string $titulo
 * @property string $descricao
 * @property integer $ativo
 * @property integer $data_criacao
 *
 * @property Usuario $idUsuario0
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'titulo', 'descricao', 'ativo'], 'required'],
            [['ativo'], 'integer'],
            [['descricao'], 'string'],
            [['autor', 'titulo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'autor' => 'Autor',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
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
