<?php
use yii\helpers\Html;
use \yii\grid\GridView;
/**
 * Created by PhpStorm.
 * User: pascal.luescher
 * Date: 18.07.2018
 * Time: 22:55
 */

/** @var \app\models\Order $model */
?>

<?= GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getIngredients(),
    ]),
    'columns' => [
        'name',
    ],
]); ?>