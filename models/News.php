<?php

namespace app\models;

use yii\web\IdentityInterface;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "News".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $short
 * @property string $text
 * @property integer $category_id
 * @property string $slug
 * @property integer $author_id
 * @property integer $time
 * @property integer $views
 * @property integer $status
 */
class News extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['category_id', 'author_id', 'time', 'views', 'status'], 'integer'],
            [['title', 'image', 'slug'], 'string', 'max' => 128],
            [['short'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'short' => 'Short',
            'text' => 'Text',
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'author_id' => 'Author ID',
            'time' => 'Time',
            'views' => 'Views',
            'status' => 'Status',
        ];
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
