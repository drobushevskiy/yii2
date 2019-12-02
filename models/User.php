<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    /**
     * Find User by email
     * @param string $email
     * @return User
     */
    public static function findByEmail( $email )
    {
        return self::find()->where(['email' => $email])->one();
    }

    /**
     * Set user's auth_key
     */
    public function setAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Set user's hashed password
     * @param string $password
     */
    public function setPassword( $password )
    {
        $this->password = Yii::$app->security->generatePasswordHash( $password );
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
