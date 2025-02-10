<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\modules\auth\models\SignupForm;


class UserEmailController extends Controller
{
   
    public function actionSendEmail()
    {
             
        try {
            $all_users = SignupForm::find()->all();
            $result = "";
            $message = "";
            if(!empty($all_users)) {
                foreach($all_users as $user) {
   
                   $result = Yii::$app->mailer->compose('dailyEmail', ['user' => $user])
                      
                        ->setFrom('support@managemylawsuits.com')
                        ->setTo("dalimol@jbkinfotech.com")
                        ->setSubject('User Daily Update')
                        ->send();
//                         echo '<pre/>';print_r($result);exit;
                    
           
                    if ($result) {
                        Yii::info("Email sent successfully to {$user->email}.", __METHOD__);
                    } else {
                    
                        Yii::error("Failed to send email to {$user->email}.", __METHOD__);
                    }
    //                echo '<pre/>';print_r($result);exit;

                    echo $result ? "Email sent to {$user->email}\n" : "Failed to send email to {$user->email}\n";


                }

            }
        } catch (\Throwable $e) {
           
            Yii::error('Email error: ' . $e->getMessage(), 'email');
          
        }
        Yii::getLogger()->flush();

        return ExitCode::OK;
    }
}
