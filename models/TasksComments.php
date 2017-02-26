<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;
/**
 * This is the model class for table "tasks_comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $task_id
 * @property integer $parent_id
 * @property string $date
 * @property string $text
 * @property integer $moderated
 */
class TasksComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'task_id', 'parent_id', 'text'], 'required'],
            [['user_id', 'task_id', 'parent_id', 'moderated'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string'],
        ];
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
            'id' => '#',
            'user_id' => 'Имя пользователя',
            'task_id' => 'Task ID',
            'parent_id' => 'Parent ID',
            'date' => 'Дата',
            'text' => 'Текст комментария',
            'moderated' => 'Модерация',
        ];
    }

    public function getModerated()
    {
        return [
            '0' => 'Отключено',
            '1' => 'Включено',
        ];
    }
}
