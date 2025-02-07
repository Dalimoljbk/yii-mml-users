<?php

namespace app\modules\auth\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $phone_number
 * @property string $create_at
 * @property string $update_at
 */
class SignupForm extends \yii\db\ActiveRecord implements IdentityInterface 
{
    public $confirm_password;
    public $auth_key = null;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','password','email','username','phone_number'],'required'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords do not match.'],
            [['create_at', 'update_at','phone_number'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
            [['email'],'unique'],
            [['phone_number'], 'match', 'pattern'=>"/^[0-9 ]+$/i", 'message'=>'Please enter valid phone number.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'phone_number' => 'Phone',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
     /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
       
        $user = self::findOne(['username' => $username]);
     
        return isset( $user)?  $user: null;

    }
     public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Only needed for API authentication
    }

//    public static function findByUsername($username)
//    {
//        return self::findOne(['username' => $username]);
//    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
