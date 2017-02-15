<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'user_id',
            'date',
            'text:ntext',
            'moderated',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
