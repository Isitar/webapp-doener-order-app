<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FoodIngredient */

$this->title = Yii::t('app', 'Create Food Ingredient');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Food Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-ingredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('partials/_form', [
        'model' => $model,
    ]) ?>

</div>
