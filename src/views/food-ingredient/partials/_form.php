<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FoodIngredient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="food-ingredient-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if (empty($model->food_id)): ?>
        <?= $form->field($model, 'food_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Food::find()->all(), 'id', 'name')) ?>
    <?php else: ?>
        <?= $form->field($model, 'food_id')->hiddenInput()->label(false) ?>
    <?php endif; ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Ingredient::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
