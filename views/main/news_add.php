<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsForm */
/* @var $form ActiveForm */
?>
<div class="main-news_add">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'image')->fileinput() ?>
        <?= $form->field($model, 'short') ?>
        <?= $form->field($model, 'text')->textArea(['rows'=>6]) ?>
        <?= $form->field($model, 'category')->dropdownlist(['1'=>'Офисная недвижимость','2'=>'Аналитика','3'=>'Склады и производство','4'=>'Партнеры'])?>
        <?= $form->field($model, 'slug') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-news_add -->
