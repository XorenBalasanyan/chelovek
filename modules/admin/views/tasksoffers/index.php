<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
?>
<div class="tasks-offers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'intime',
                'content' => function($data){
                    $date = new DateTime($data->intime);
                    return $date->format('d.m.Y');
                },
            ],
            [
                'attribute' => 'user_id',
                'content' => function($data){
                    if ($u = $data->user) {
                        return $u->name;
                    }
                },
            ],
            'comment:ntext',
            'cost',
            [
                'attribute' => 'task_id',
                'content' => function($data){
                    if ($t = $data->task) {
                        return $t->title;
                    }
                },
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
