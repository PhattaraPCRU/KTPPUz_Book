<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bs_customer".
 *
 * @property string $cus_login
 * @property string $cus_fullname
 * @property string $cus_address
 * @property string $cus_tel
 * @property string $cus_email
 * @property string $cus_password
 */
class BsCustomer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bs_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cus_login', 'cus_fullname', 'cus_address', 'cus_tel', 'cus_email', 'cus_password'], 'required'],
            [['cus_address'], 'string'],
            [['cus_login', 'cus_tel', 'cus_email'], 'string', 'max' => 30],
            [['cus_fullname'], 'string', 'max' => 50],
            [['cus_password'], 'string', 'max' => 15],
            [['cus_login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cus_login' => 'Cus Login',
            'cus_fullname' => 'Cus Fullname',
            'cus_address' => 'Cus Address',
            'cus_tel' => 'Cus Tel',
            'cus_email' => 'Cus Email',
            'cus_password' => 'Cus Password',
        ];
    }
}
