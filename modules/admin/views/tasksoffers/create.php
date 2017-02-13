<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TasksOffers */

$this->title = 'Create Tasks Offers';
$this->params['breadcrumbs'][] = ['label' => 'Tasks Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-offers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
