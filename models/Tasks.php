<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string $intime
 * @property integer $user_id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $deadline
 * @property integer $cost
 * @property integer $views
 * @property integer $status
 * @property integer $hidden
 * @property integer $review
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intime', 'deadline'], 'safe'],
            [['user_id', 'category_id', 'description', 'deadline', 'cost', 'views', 'status', 'hidden'], 'required'],
            [['user_id', 'category_id', 'cost', 'views', 'status', 'hidden', 'review'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    public function getCategory(){
        return $this->hasOne(Categories::classname(),['id' => 'category_id']);
    }

    public function getUser(){
        return $this->hasOne(User::classname(),['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'intime' => 'Intime',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'deadline' => 'Deadline',
            'cost' => 'Cost',
            'views' => 'Views',
            'status' => 'Status',
            'hidden' => 'Hidden',
            'review' => 'Review',
        ];
    }
}
