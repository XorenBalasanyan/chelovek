<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks_offers".
 *
 * @property integer $id
 * @property string $intime
 * @property integer $user_id
 * @property integer $task_id
 * @property integer $cost
 * @property string $comment
 * @property integer $status
 */
class TasksOffers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks_offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intime'], 'safe'],
            [['user_id', 'task_id', 'cost', 'comment'], 'required'],
            [['user_id', 'task_id', 'cost', 'status'], 'integer'],
            [['comment'], 'string'],
        ];
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
            'task_id' => 'Task ID',
            'cost' => 'Cost',
            'comment' => 'Comment',
            'status' => 'Status',
        ];
    }
}
