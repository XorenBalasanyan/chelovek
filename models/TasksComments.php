<?php

namespace app\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'task_id' => 'Task ID',
            'parent_id' => 'Parent ID',
            'date' => 'Date',
            'text' => 'Text',
            'moderated' => 'Moderated',
        ];
    }
}
