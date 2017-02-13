<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories_bounds".
 *
 * @property integer $category_id
 * @property integer $user_id
 */
class CategoriesBounds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories_bounds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id'], 'required'],
            [['category_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
        ];
    }
}
