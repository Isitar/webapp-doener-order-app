<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
/* @var $foods \app\models\Food[] */

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'food_id')->dropDownList(\yii\helpers\ArrayHelper::map($foods, 'id', 'name'),['id'=>'ddl-food']) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <div class="form-group">
        <h2><?= Yii::t('app', 'ingredients') ?></h2>
        <?php foreach ($foods as $food): ?>
            <div class="ingredient-list" id="<?= $food->id?>-ingredients">
                <?php foreach ($food->foodIngredients as $foodIngredient): ?>
                    <?= $foodIngredient->ingredient->name ?>
                    <?= Html::checkbox('Order[ingredientIds][]',null,['value'=>$foodIngredient->ingredient_id]) ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>`

    </div>

    <?php ActiveForm::end(); ?>

</div>
