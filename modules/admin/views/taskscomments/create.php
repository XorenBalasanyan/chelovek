<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TasksComments */

$this->title = 'Create Tasks Comments';
$this->params['breadcrumbs'][] = ['label' => 'Tasks Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
