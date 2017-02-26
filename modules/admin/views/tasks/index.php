<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tasks;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
?>
<div class="tasks-index">

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
            [
                'attribute' => 'deadline',
                'content' => function($data){
                    $date = new DateTime($data->deadline);
                    return $date->format('d.m.Y');
                },
            ],
            'cost',
            'views',
            [
                'attribute' => 'deadline',
                'content' => function($data){
                    $date = new DateTime($data->deadline);
                    return $date->format('d.m.Y');
                },
            ],
            [
                'attribute' => 'status',
                'content' => function($data){
                    $css = 'btn dropdown-toggle btn-danger';
                    if ($data->status == 1) {
                        $css = 'btn dropdown-toggle btn-success';
                    }
                    $status_list = Tasks::getStatus();
                    $html  = Html::beginTag('div', ['class'=>'dropdown']);
                        $html .= Html::beginTag('button', ['class'=>$css,'type'=>'button', 'data-toggle'=>'dropdown']);
                            $html .= $status_list[$data->status];
                            $html .= Html::beginTag('span', ['class'=>'caret']);
                            $html .= Html::endTag('span');
                        $html .= Html::endTag('button');
                        $html  .= Html::beginTag('ul', ['class'=>'dropdown-menu']);
                            foreach ($status_list as $key => $value) {
                                $html .= Html::beginTag('li');
                                    $html .= Html::a($value, '#',['data-status'=>$key]);
                                $html .= Html::endTag('li');
                            }
                        $html .= Html::endTag('ul');
                    $html .= Html::endTag('div');
                    return $html;
                },
            ],
            // 'hidden',
            // 'review',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
