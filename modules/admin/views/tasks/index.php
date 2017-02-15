<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'category_id',
                'content' => function($data){
                    if ($c = $data->category) {
                        return $c->name;
                    }
                },
            ],
            'title',
            // 'description:ntext',
            'deadline',
            'cost',
            'views',
            'status',
            // 'hidden',
            // 'review',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
