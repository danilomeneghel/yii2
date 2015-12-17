<?php

namespace app\models;

use app\models\Login as Login;

class Auth extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $idLogin;
    public $idUsuario;
    public $usuario;
    public $senha;
    public $nivel;
    public $ativo;
    
    const NIVEL_ADMIN = 1;
    const NIVEL_MODERADOR = 2;
    const NIVEL_USUARIO = 3;
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $login = Login::find()->where(['idLogin' => $id, 'ativo' => 1])->one();
        if ($login) {
            return new static($login);
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }*/

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($usuario)
    {
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }*/
        
        $login = Login::find()->where(['usuario'=>$usuario])->one();
        if ($login) {
            return new static($login);
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->idLogin;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
        //$this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return null;
        //$this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === sha1($password);
    }
}
