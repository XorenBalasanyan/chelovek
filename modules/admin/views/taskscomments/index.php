<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TasksComments;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
?>
<div class="tasks-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'text:ntext',
            [
                'attribute' => 'user_id',
                'content' => function($data){
                    if ($u = $data->user) {
                        return $u->name;
                    }
                },
            ],
            'date',
            [
                'attribute' => 'moderated',
                'content' => function($data){
                    $css = 'btn dropdown-toggle btn-danger';
                    if ($data->moderated == 1) {
                        $css = 'btn dropdown-toggle btn-success';
                    }
                    $moderated_list = TasksComments::getModerated();
                    $html  = Html::beginTag('div', ['class'=>'dropdown']);
                        $html .= Html::beginTag('button', ['class'=>$css,'type'=>'button', 'data-toggle'=>'dropdown']);
                            $html .= $moderated_list[$data->moderated];
                            $html .= Html::beginTag('span', ['class'=>'caret']);
                            $html .= Html::endTag('span');
                        $html .= Html::endTag('button');
                        $html  .= Html::beginTag('ul', ['class'=>'dropdown-menu']);
                            foreach ($moderated_list as $key => $value) {
                                $html .= Html::beginTag('li');
                                    $html .= Html::a($value, '#',['data-status'=>$key]);
                                $html .= Html::endTag('li');
                            }
                        $html .= Html::endTag('ul');
                    $html .= Html::endTag('div');
                    return $html;
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{delete}'],
        ],
    ]); ?>
</div>
