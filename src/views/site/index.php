<?php

/* @var $this yii\web\View */

$this->title = 'Döner Dürüm darum';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app','Welcome') ?></h1>

        <p class="lead"><?= Yii::t('app','You have successfully entered the Döner-Palace')?></p>

        <p><a class="btn btn-lg btn-success" href="<?=\yii\helpers\Url::to(['order/create'])?>"><?= Yii::t('app','Order now!')?></a></p>
    </div>
</div>
