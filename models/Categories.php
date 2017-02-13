<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pos
 * @property string $info
 * @property string $url
 * @property string $description
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pos', 'info', 'url'], 'required'],
            [['pos'], 'integer'],
            [['info', 'description'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pos' => 'Pos',
            'info' => 'Info',
            'url' => 'Url',
            'description' => 'Description',
        ];
    }
}
