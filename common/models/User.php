<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password 
 * @property string $address
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const USER  = '2';
    const CUSTOMER = '1';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         TimestampBehavior::class,
    //         'value' => function ($event) {
    //             return date('Y-m-d H:i:s');
    //         }
    //     ];
    // }

     /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'fullname', 'address', 'tel'], 'required'],
            [['username', 'auth_key', 'password_hash', 'email', 'fullname', 'address', 'tel', 'cus_status'], 'required', 'on' => 'create' , 'message' => 'กรุณากรอกข้อมูลให้ครบ'],
            [['password_hash'], 'required', 'on' => 'changePassword' , 'message' => 'กรุณากรอกรหัสผ่านใหม่'],
            [['username', 'email', 'fullname', 'address', 'tel', 'cus_status' , 'status'], 'required', 'on' => 'update' , 'message' => 'กรุณากรอกข้อมูลให้ครบ'],
            [['username', 'email', 'fullname', 'address', 'tel', 'cus_status'], 'required', 'on' => 'editme' , 'message' => 'กรุณากรอกข้อมูลให้ครบ'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['fullname'], 'string', 'max' => 40],
            [['address'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 15],
            [['cus_status'], 'string', 'max' => 1],
            [['username'], 'unique' ,'message' => 'มีชื่อผู้ใช้นี้แล้ว'],
            [['email'], 'unique', 'message' => 'มีอีเมล์นี้แล้ว'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'fullname' => 'Fullname',
            'address' => 'Address',
            'tel' => 'Tel',
            'cus_status' => 'Customer Status',
        ];
    }

    public function attributeHints(){
        return [
            'password_hash' => 'กรุณากรอกรหัสผ่านใหม่ หากต้องการเปลี่ยนรหัสผ่าน',
        ];
    }

    public function scenarios()
    {
        $sn = parent::scenarios();
        $sn['update'] = ['username', 'email', 'fullname', 'address', 'tel', 'status' , 'cus_status'];
        $sn['editme'] = ['username', 'email', 'fullname', 'address', 'tel' , 'password_hash'];
        $sn['create'] = ['username', 'auth_key', 'password_hash', 'email', 'fullname', 'address', 'tel', 'status', 'cus_status'];
        $sn['changePassword'] = ['password_hash'];
        return $sn;
    }

    public static function ArrayStatus(){
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'Inactive',
        ];
    }

    public function getStatusValue(){
        $arr =[
            self::STATUS_ACTIVE => '<span class="badge text-bg-success">Active</span>',
            self::STATUS_INACTIVE => '<span class="badge text-bg-danger">Inactive</span>',
        ];
        return $arr[$this->status] ?? null;
    }

    public static function ArrayCusStatus(){
        return [
            self::USER => 'User',
            self::CUSTOMER => 'Customer',
        ];
    }

    public function getCustStatus(){
        $arr =[
            self::USER => '<span class="badge text-bg-success">User</span>',
            self::CUSTOMER => '<span class="badge text-bg-danger">Customer</span>',
        ];
        return $arr[$this->cus_status] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
