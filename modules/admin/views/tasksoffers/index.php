<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-offers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks Offers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'intime',
            [
                'attribute' => 'user_id',
                'content' => function($data){
                    if ($u = $data->user) {
                        return $u->name;
                    }
                },
            ],
            [
                'attribute' => 'task_id',
                'content' => function($data){
                    if ($t = $data->task) {
                        return $t->title;
                    }
                },
            ],
            'cost',
            'comment:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
