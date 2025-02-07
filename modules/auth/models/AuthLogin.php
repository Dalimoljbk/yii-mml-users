<?php
namespace app\modules\auth\models;
use yii;
use yii\base\Model;
use app\modules\auth\models\SignupForm;

class AuthLogin extends Model
{
    public $username;
    public $password;
     private $_user = false;
    
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }
    public function validatePassword($attribute, $params)
    {
         if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 300);
        }
        return false;
    }
    
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = SignupForm::findByUsername($this->username);
        }

        return $this->_user;
    }
}