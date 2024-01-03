<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bs_category".
 *
 * @property int $cate_id
 * @property string $cate_name
 */
class BsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bs_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_name'], 'required'],
            [['cate_name'], 'string', 'max' => 50],
            [['cate_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => 'Cate ID',
            'cate_name' => 'Cate Name',
        ];
    }
}
