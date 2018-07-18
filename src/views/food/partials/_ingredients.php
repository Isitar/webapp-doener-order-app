<?php
use yii\helpers\Html;
use \yii\grid\GridView;
/**
 * Created by PhpStorm.
 * User: pascal.luescher
 * Date: 18.07.2018
 * Time: 22:55
 */

/** @var \app\models\Food $food */
?>
    <p>

        <?= Html::a(Yii::t('app', 'Create Ingredient'), ['food-ingredient/create','foodId'=>$food->id], ['class' => 'btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $food->getIngredients(),
    ]),
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
    ],
]); ?>