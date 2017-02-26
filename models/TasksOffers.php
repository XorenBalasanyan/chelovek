<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;
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

    public function getTask(){
        return $this->hasOne(Tasks::classname(),['id' => 'task_id']);
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
            'intime' => 'Дата',
            'user_id' => 'Имя пользователя',
            'task_id' => 'Название задания',
            'cost' => 'Стоимость',
            'comment' => 'Текст заявки',
            'status' => 'Status',
        ];
    }
}
