<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FoodIngredient */

$this->title = Yii::t('app', 'Update Food Ingredient: ' . $model->food_id, [
    'nameAttribute' => '' . $model->food_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Food Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->food_id, 'url' => ['view', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="food-ingredient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('partials/_form', [
        'model' => $model,
    ]) ?>

</div>
