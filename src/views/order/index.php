<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',

            'user_name',
            [
                'attribute' => 'date',
                'format' => 'date',
            ],

            'food.name',
            [
                'label' => Yii::t('app', 'Ingredients'),
                'value' => function ($model) {
                    /** @var \app\models\Order $model */
                    return implode(', ', array_map(function ($ingredient) {
                        /** @var \app\models\Ingredient $ingredient */
                        return $ingredient->name;
                    }, $model->ingredients));
                }
            ],
            'comment:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
