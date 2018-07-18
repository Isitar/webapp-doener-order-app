<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FoodIngredient */

$this->title = $model->food_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Food Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-ingredient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'food_id',
            'ingredient_id',
        ],
    ]) ?>

</div>
