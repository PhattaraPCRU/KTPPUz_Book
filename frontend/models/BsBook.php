<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bs_book".
 *
 * @property string $book_isbn
 * @property string $book_title
 * @property string $book_writer
 * @property string $book_publishing
 * @property int $book_pages
 * @property float $book_cost
 * @property float $book_price
 * @property int $book_total
 * @property string $book_note
 * @property string $book_date
 * @property string $book_pic
 * @property int $cate_id
 */
class BsBook extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'pic';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bs_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_isbn', 'book_title', 'book_writer', 'book_publishing', 'book_note', 'book_pic', 'cate_id'], 'required'],
            [['book_writer', 'book_note'], 'string'],
            [['book_pages', 'book_total', 'cate_id'], 'integer'],
            [['book_cost', 'book_price'], 'number'],
            [['book_date'], 'safe'],
            [['book_isbn', 'book_publishing'], 'string', 'max' => 30],
            [['book_title'], 'string', 'max' => 100],
            [['book_pic'], 'string', 'max' => 50],
            [['book_isbn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_isbn' => 'ISBN',
            'book_title' => 'ชื่อเรื่อง',
            'book_writer' => 'ผู้แต่ง',
            'book_publishing' => 'สำนักพิมพ์',
            'book_pages' => 'จำนวนหน้า',
            'book_cost' => 'Cost',
            'book_price' => 'ราคา',
            'book_total' => 'เหลือ',
            'book_note' => 'รายละเอียด',
            'book_date' => 'Date',
            'book_pic' => 'รูป',
            'cate_id' => 'หมวดหมู่',
        ];
    }

    public static function getUploadPath()
    {
        return  Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . self::UPLOAD_FOLDER . DIRECTORY_SEPARATOR;
    }

    public function getUploadUrl()
    {
        return Yii::getAlias('@web') . DIRECTORY_SEPARATOR . self::UPLOAD_FOLDER . DIRECTORY_SEPARATOR;
    }

  

    public function getInitialPreview() {
        $initialPreview = [];
        $initialPreviewConfig = [];
        array_push($initialPreview,  static::getUploadUrl() . $this->book_pic);
        array_push($initialPreviewConfig, [
            'downloadUrl' =>  static::getUploadUrl() . $this->book_pic,
   
        ]);
        return [$initialPreview,$initialPreviewConfig];
    }

    public function getCategory(){
        return $this->hasOne(BsCategory::class, ['cate_id' => 'cate_id']);
    }
}
