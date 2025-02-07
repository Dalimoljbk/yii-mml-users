<?php

namespace app\modules\auth\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\base\Security;


class AuthController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }
    
    public function actionSignUp()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['auth/index']);
        }
        $security = new Security();
        $model = new \app\modules\auth\models\SignupForm();
        $mail_content = "";
         if ($model->load(Yii::$app->request->post()) && $model->validate()) { 
            $password = $model->password;
            $encyPassword = $security->generatePasswordHash($password);
            $model->password = $encyPassword;
            $model->confirm_password = $encyPassword;
            if ($model->save()) {
                $mail_content = "Dear $model->name,"."Your registration has been successfully completed";
                Yii::$app->mailer->compose()
//                ->setTo($this->email)
                ->setTo('dalimol@jbkinfotech.com')        
                ->setFrom('dalimol@jbkinfotech.com')
                ->setSubject("Registration Successful")
                ->setTextBody($mail_content)
                ->send();
                            
               return $this->redirect(['auth/login']); 
            } 
             
             
         } else {
                
            foreach ($model->errors as $field => $errors) {
                Yii::$app->session->setFlash($field, implode(', ', $errors));
            }
                
        }
        return $this->render('signup',['model' => $model]);
    }
    
    public function actionLogin() {
        $model = new \app\modules\auth\models\AuthLogin();        
        if (!Yii::$app->user->isGuest) {
         
            return $this->redirect(['auth/index']);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            return $this->redirect(['auth/index']); 
        }

        return $this->render('authLogin', [
            'model' => $model,
        ]);
    }
}
