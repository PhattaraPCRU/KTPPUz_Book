<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

User::find()->all();
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;

    public $cus_status;
    
    public $address;
    public $fullname;

    public $tel;


    const USER  = '2';

    const CUSTOMER = '1';
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['address', 'trim'],
            ['address', 'required'],
            ['address', 'string', 'max' => 255],

            ['fullname', 'trim'],
            ['fullname', 'required'],
            ['fullname', 'string', 'max' => 255],

            ['tel', 'trim'],
            ['tel', 'required'],
            ['tel', 'string', 'max' => 10],

            ['cus_status', 'string', 'max' => 1],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */

   
  
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->setPassword($this->password_hash);
        $user->status = User::STATUS_ACTIVE;
        $user->cus_status = User::USER;
        $user->fullname = $this->fullname;
        $user->tel = $this->tel;
        
        $user->generateAuthKey();

        return $user->save();
        // return $user->save() && $this->sendEmail($user);
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */

    
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }


}
