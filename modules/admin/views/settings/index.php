<div class="container">
    <?php

    use yii\helpers\Html;
    use yii\grid\GridView;

    /* @var $this yii\web\View */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Настройки';
    ?>
    <div class="settings-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'value:ntext',
                ['class' => 'yii\grid\ActionColumn', 'template'=>'{update}'],
            ],
        ]); ?>
    </div>

</div>
